<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndikatorKegiatan extends Model
{
    //
    protected $table = 'indikator_kegiatan';

    public function penilaian_kinerja()
    {
        return $this->hasMany(PenilaianKinerja::class);
    }
}
