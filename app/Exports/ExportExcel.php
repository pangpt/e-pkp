<?php

namespace App\Exports;

use App\PenilaianKinerja;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportExcel implements FromCollection, WithHeadings
{
    public function collection()
    {
        return PenilaianKinerja::all();
    }

    public function headings(): array
    {
        return [
            'No.',
            'Kegiatan Tugas Jabatan',
            'AK',
            'Kuant/Output Target',
            'Satuan Target',
            'Kual/Mutu Target',
            'AK Realisasi',
            'Kuant/Output Realisasi',
            'Satuan Realisasi',
            'Kual/Mutu Realisasi',
            'Nilai Capaian Kerja',
        ];
    }
}
