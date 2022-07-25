<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UnitKerja;

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
}
