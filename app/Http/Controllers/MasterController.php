<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UnitKerja;
use App\Atasan;
use App\Jabatan;

class MasterController extends Controller
{
    //
    public function unitkerja()
    {
        $data = UnitKerja::first();

        return view('masterdata.unitkerja.index', [
            'data' => $data,
        ]);
    }

    public function editUnitKerja(Request $request)
    {
        $data = UnitKerja::first();
        
        if(empty($data)) {
            $data = new UnitKerja;
            $data->nama_unit_kerja = $request->nama_unit_kerja;
            $data->save();
        } else {
            $data->nama_unit_kerja = $request->nama_unit_kerja;
            $data->update();
        }
        
        return redirect()->route('unitkerja.index')->withSuccess([
            'success' => 'Berhasil mengubah unit kerja',
        ]);
    }

    public function atasan()
    {
        $data = Atasan::get();

        return view('masterdata.atasan.index',[
            'data' => $data,
        ]);
    }

    public function createAtasan()
    {
        $jabatan = Jabatan::get();

        return view('masterdata.atasan.create',[
            'jabatan' => $jabatan,
        ]);
    }

    public function inputAtasan(Request $request)
    {
        $data = new Atasan;
        $data->nip = $request->nip;
        $data->name = $request->name;
        $data->jabatan = $request->jabatan;
        $data->save();

        return redirect()->route('atasan.index')->with([
            'data' => $data,
        ]);
    }
}
