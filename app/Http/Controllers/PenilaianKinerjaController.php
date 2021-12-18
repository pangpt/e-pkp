<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IndikatorKegiatan;
use App\PenilaianKinerja;

class PenilaianKinerjaController extends Controller
{
    //

    public function index() {

        return view('pkp.index');
    }

    public function create() {

        $indikator = IndikatorKegiatan::get();
        // dd($indikator);

        return view('pkp.create')->with([
            'indikator' => $indikator,
        ]);
    }
}
