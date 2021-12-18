<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IndikatorKegiatan;

class IndikatorKegiatanController extends Controller
{
    //
    public function index() {

        $data = IndikatorKegiatan::get();

        return view('masterdata.indikator.index', [
            'data' => $data,
        ]);
    }

    public function create() {

        return view('masterdata.indikator.create');
    }

    public function inputIndikator(Request $request){

        $data = new IndikatorKegiatan;
        $data->uraian = $request->uraian;
        $data->save();

        return redirect()->route('indikator.index')->with([
            'data' => $data,
        ]);

    }
}
