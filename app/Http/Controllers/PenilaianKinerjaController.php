<?php

namespace App\Http\Controllers;

use App\Exports\ExportExcel;
use Illuminate\Http\Request;
use App\IndikatorKegiatan;
use App\PenilaianKinerja;
use App\RekapPkp;
use DB;
use PDF;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use App\UnitKerja;
use Illuminate\Support\Collection;

class PenilaianKinerjaController extends Controller
{
    //

    public function index() {

        $data = IndikatorKegiatan::where('user_id', Auth::user()->id)->get();
        $nilai = PenilaianKinerja::where('user_id', Auth::user()->id)->sum('nilai_capaian');

        $rata_indikator = [];
        foreach ($data as $item) {
            $capaian = PenilaianKinerja::where('indikator_kegiatan_id', $item->id)->pluck('nilai_capaian');
            $rataCapaian = $capaian->count() > 0 ? $capaian->sum() / $capaian->count() : 0;

            $rata_indikator[$item->id] = $rataCapaian;
        }

        $totalNilai = array_sum($rata_indikator);

        // Hitung rata-rata dari array indikator
        $rataTotal = count($rata_indikator) > 0 ? $totalNilai / count($rata_indikator) : 0;

        // dd($rata_indikator, $totalNilai, $rataTotal);

        return view('pkp.index', [
            'data' => $data,
            'rataIndikator' => $rata_indikator,
            'nilai' => $totalNilai,
            'rata' => $rataTotal
            // 'pembagi' => $pembagi,
        ]);
    }

    public function create() {

        $indikator = IndikatorKegiatan::get();
        // dd($indikator);

        return view('pkp.create')->with([
            'indikator' => $indikator,
        ]);
    }

    public function inputPenilaian(Request $request) {
        // $delete = PenilaianKinerja::where('user_id', 1)->delete();

        foreach($request->kegiatan as $key => $val){
            $penilaian  = new PenilaianKinerja;
            $penilaian->user_id =  Auth::user()->id;
            $penilaian->indikator_kegiatan_id = $request->indikator_kegiatan_id;
            $penilaian->tanggal = $request->tanggal;
            $penilaian->kegiatan =  $val;
            $penilaian->angka_kredit_target =  $request->angka_kredit_target[$key];
            $penilaian->kuant_target =  $request->kuant_target[$key];
            $penilaian->satuan_target =  $request->satuan_target[$key];
            $penilaian->kual_target =  100;
            $penilaian->angka_kredit_realisasi =  $request->angka_kredit_realisasi[$key];
            $penilaian->kuant_realisasi =  $request->kuant_realisasi[$key];
            $penilaian->satuan_realisasi =  $request->satuan_realisasi[$key];
            $penilaian->kual_realisasi =  100;
            $penilaian->bulan = Carbon::now()->isoFormat('MMMM');
            $penilaian->tahun = Carbon::now()->isoFormat('YYYY');




            $penilaian->nilai_capaian =  $request->kuant_realisasi[$key] / $request->kuant_target[$key] * 100;

            // dd($penilaian);
            $penilaian->save();

        }


        return redirect()->route('penilaian.index');
    }

    public function editPKP(Request $request, $id)
    {
        $penilaian = PenilaianKinerja::where('id', $id)->first();

        $penilaian->kegiatan = $request->kegiatan;
        $penilaian->angka_kredit_target = $request->angka_kredit_target;
        $penilaian->angka_kredit_realisasi = $request->angka_kredit_realisasi;
        $penilaian->satuan_target = $request->satuan_target;
        $penilaian->satuan_realisasi = $request->satuan_realisasi;
        $penilaian->kuant_target = $request->kuant_target;
        $penilaian->kual_target = $request->kual_target;
        $penilaian->kuant_realisasi = $request->kuant_realisasi;
        $penilaian->kual_realisasi = $request->kual_realisasi;

        $penilaian->nilai_capaian = $request->kuant_realisasi / $request->kuant_target * 100;

        $penilaian->update();

        return redirect()->back();
    }

    public function hapus($id)
    {
        $data = PenilaianKinerja::findOrFail($id);
        $data->delete();

        return redirect()->back();
    }

    public function actionPenilaian(Request $request)
    {
        if($request->ajax())
        {
            if($request->action == 'edit')
            {
                $data = array(
    				'angka_kredit_target'	=>	$request->angka_kredit_target,
    				'kegiatan'		=>	$request->kegiatan,
    				'kuant_target'		=>	$request->kuant_target,
    				'satuan_target'		=>	$request->satuan_target,
    				'kual_target'		=>	$request->kual_target,
    				'anga_kredit_realisasi'		=>	$request->anga_kredit_realisasi,
    				'kuant_realisasi'		=>	$request->kuant_realisasi,
    				'satuan_realisasi'		=>	$request->satuan_realisasi,
    				'kual_realisasi'		=>	$request->kual_realisasi,
    			);

                DB::table('penilaian_kinerja')->where('id', $request->id)->update($data);
            }
            if($request->action == 'delete')
            {
                DB::table('penilaian_kinerja')->where('id', $request->id)->delete();
            }

            return response()->json($request);
        }
    }

    public function print(Request $request)
    {
        $datapkp = PenilaianKinerja::where('user_id', Auth::user()->id)->groupBy('indikator_kegiatan_id')->selectRaw('sum(nilai_capaian) as nilai_capaian, user_id, indikator_kegiatan_id, user_id,id, tanggal, bulan')->get();
        // dd($datapkp);
// dd($datapkp->indikator_kegiatan->uraian);

        $nilai = PenilaianKinerja::where('user_id', Auth::user()->id)->sum('nilai_capaian');
        $pembagi = PenilaianKinerja::where('user_id', Auth::user()->id)->count('nilai_capaian');

        $a = [];
        $data = IndikatorKegiatan::where('user_id', Auth::user()->id)->get();
        $rekap = RekapPkp::where('user_id', Auth::user()->id)->get();
        // dd($rekap);


        if(!empty($rekap)) {
            $rekap = RekapPkp::where('user_id', Auth::user()->id)->delete();
            foreach($datapkp as $item){
                $inputnilai = new RekapPkp;
                $inputnilai->user_id = Auth::user()->id;
                $inputnilai->indikator_kegiatan = $item->indikator_kegiatan->uraian;
                $inputnilai->penilaian_kinerja_id = $item->id;
                $inputnilai->bulan = $item->bulan;
                $inputnilai->tahun = $item->tahun;
                $inputnilai->total_nilai = $item->nilai_capaian;
                $inputnilai->save();
                // dd($inputnilai);
            }
        } else {
            foreach($datapkp as $item){
                $inputnilai = new RekapPkp;
                $inputnilai->user_id = Auth::user()->id;
                $inputnilai->indikator_kegiatan = $item->indikator_kegiatan->uraian;
                $inputnilai->penilaian_kinerja_id = $item->id;
                $inputnilai->bulan = $item->bulan;
                $inputnilai->tahun = $item->tahun;
                $inputnilai->total_nilai = $item->nilai_capaian;
                $inputnilai->save();
                // dd($inputnilai);
            }
        }


        // dd($inputnilai);


        $data = IndikatorKegiatan::where('user_id', Auth::user()->id)->get();
        $unitkerja = UnitKerja::first();
        // $pkptotal = PkpTotal::get();
        // dd($pkptotal);
        $rata_indikator = [];
        foreach ($data as $item) {
            $capaian = PenilaianKinerja::where('indikator_kegiatan_id', $item->id)->pluck('nilai_capaian');
            $rataCapaian = $capaian->count() > 0 ? $capaian->sum() / $capaian->count() : 0;

            $rata_indikator[$item->id] = $rataCapaian;
        }

        $totalNilai = array_sum($rata_indikator);

        // Hitung rata-rata dari array indikator
        $rataTotal = count($rata_indikator) > 0 ? $totalNilai / count($rata_indikator) : 0;


        $pdf = PDF::loadview('print.pkp_pdf',[
            'data' => $data,
            'unitkerja' => $unitkerja,
            'pembagi' => $pembagi,
            'nilai' => $nilai,
            'rata' => $rataTotal,
        ])->setPaper('A4','landscape');
        return $pdf->stream();
    }

    public function exportToExcel()
    {
        // Retrieve data from database
        $data = DB::table('users')->get();

        // Create a collection of data for export
        $exportData = new Collection();

        // Set the header for the exported data
        $exportData->push([
            'No',
            'Name',
            'Address',
            'Contact',
            'Status',
            'Details'
        ]);

        // Loop through the data and add each row to the collection
        foreach ($data as $key => $value) {
            $row = [];

            // Add the value for each column in the row
            $row[] = $key + 1;
            $row[] = 'ad';
            $row[] = 'sdsd';
            $row[] ='asdsd';
            $row[] ='asdsds';

            // Add the details row with rowspan and colspan
            $row[] = [
                [
                    'rowspan' => 2,
                    'value' => 'Details'
                ],
                [
                    'value' => 'Indikator 1',
                    'colspan' => 2,
                ],
                [
                    'value' => 'Indikator 2',
                    'colspan' => 2,
                ],
                [
                    'value' => 'Indikator 3',
                    'colspan' => 2,
                ]
            ];
            $row[] = [
                [
                    'value' => 'Nilai',
                ],
                [
                    'value' => 'Bobot',
                ],
                [
                    'value' => 'Nilai',
                ],
                [
                    'value' => 'Bobot',
                ],
                [
                    'value' => 'Nilai',
                ],
                [
                    'value' => 'Bobot',
                ]
            ];
            $exportData->push($row);
        }

        // Export the data to Excel
        return Excel::download(new ExportExcel($exportData), 'data.xlsx');
    }

}
