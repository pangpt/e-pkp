<?php

namespace App\Exports;

use App\IndikatorKegiatan;
use App\PenilaianKinerja;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PenilaianView implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        //
        $data = IndikatorKegiatan::get();
        foreach($data as $item){
            $idn[] = IndikatorKegiatan::where('id', $item->id)->with('penilaian_kinerja')->get();
        }

        return view('exports.pkp_excel', [
            'data' => $data,
        ]);
    }
}
