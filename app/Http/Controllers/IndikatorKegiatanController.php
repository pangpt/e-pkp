<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IndikatorKegiatan;
use Auth;

class IndikatorKegiatanController extends Controller
{
    //
    public function index() {

        $data = IndikatorKegiatan::where('user_id', Auth::user()->id)->get();

        return view('masterdata.indikator.index', [
            'data' => $data,
        ]);
    }

    public function create() {

        return view('masterdata.indikator.create');
    }

    public function inputIndikator(Request $request){

        $data = new IndikatorKegiatan;
        $data->user_id = Auth::user()->id;
        $data->uraian = $request->uraian;
        $data->save();

        return redirect()->route('indikator.index')->with([
            'data' => $data,
        ]);

    }
}
