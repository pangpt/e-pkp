<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PegawaiController extends Controller
{
    //
    public function index()
    {
        $data = User::get();

        return view('pegawai.index', [
            'data' => $data,
        ]);
    }

    public function create()
    {
        return view('pegawai.create');
    }
}
