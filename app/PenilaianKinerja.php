<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenilaianKinerja extends Model
{
    //
    protected $table = 'penilaian_kinerja';

    public function indikator_kegiatan()
    {
        return $this->belongsTo(IndikatorKegiatan::class);
    }
}
