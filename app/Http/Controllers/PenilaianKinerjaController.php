<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IndikatorKegiatan;
use App\PenilaianKinerja;

class PenilaianKinerjaController extends Controller
{
    //

    public function index() {

        $data = PenilaianKinerja::get();

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
            // $penilaian->user_id =  1;
            $penilaian->indikator_kegiatan_id = 1;
            // $penilaian->tanggal = $request->tanggal;
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
}
