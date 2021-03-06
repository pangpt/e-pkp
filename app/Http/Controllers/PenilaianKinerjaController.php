<?php

namespace App\Http\Controllers;

use App\Exports\PenilaianView;
use Illuminate\Http\Request;
use App\IndikatorKegiatan;
use App\PenilaianKinerja;
use DB;
use PDF;
use Auth;
use Maatwebsite\Excel\Facades\Excel;

class PenilaianKinerjaController extends Controller
{
    //

    public function index() {

        $data = IndikatorKegiatan::get();
        foreach($data as $item){
            $idn[] = IndikatorKegiatan::where('id', $item->id)->with('penilaian_kinerja')->get();
        }



        // dd($a);

        // foreach($data as $item){
        //     $ind = IndikatorKegiatan::where('id', $a)->with('penilaian_kinerja')->get();
        //         foreach($ind as $key) {
        //             $b = $key->penilaian_kinerja->sum('nilai_capaian');
        //         }
        // }
        // dd($b);



        return view('pkp.index', [
            'data' => $data,
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
        // $data = IndikatorKegiatan::get();

        // $pdf = PDF::loadview('print.pkp_pdf',[
        //     'data' => $data,
        // ])->setPaper('A4','landscape');
        // return $pdf->stream();
        return Excel::download(new PenilaianView, 'pkp.xlsx');
    }
}
