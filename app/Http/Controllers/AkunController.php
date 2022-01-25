<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class AkunController extends Controller
{
    //
    public function akun()
    {
        $data = User::where('id', Auth::user()->id)->first();

        // dd($data);

        return view('akun.index',[
            'data' => $data,
        ]);
    }

    public function editAkun (Request $request)
    {

        $data = User::where('id', Auth::user()->id)->first();

        $data->nip = $request->nip;
        $data->name = $request->name;
        $data->birth_date = $request->birth_date;
        $data->pangkat = $request->pangkat;
        $data->jabatan = $request->jabatan;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->update();

        return redirect()->route('akun')->withSuccess([
            'success' => 'Berhasil mengubah profil',
        ]);
    }
}
