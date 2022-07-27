<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Jabatan;
use App\Atasan;

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
        $atasan = Atasan::get();
        $jabatan = Jabatan::get();

        return view('pegawai.create', [
            'atasan' => $atasan,
            'jabatan' => $jabatan
        ]);
    }

    public function input(Request $request)
    {
        $data = new User;
        $data->nip = $request->nip;
        $data->name = $request->name;
        $data->atasan_id = $request->atasan_id;
        $data->password = bcrypt($request->nip);
        $data->pangkat = $request->pangkat;
        $data->phone = $request->phone;
        $data->jabatan = $request->jabatan;
        // $data->birth_date = $request->birth_date;
        $data->email = $request->email;
        $data->level = $request->level;
        $data->save();

        return redirect()->route('pegawai.index')->with([
            'data' => $data,
        ]);
    }
}
