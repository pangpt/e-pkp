<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekapPkpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekap_pkp', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penilaian_kinerja_id');
            $table->unsignedBigInteger('user_id');
            $table->string('indikator_kegiatan');
            $table->integer('total_nilai');
            $table->string('bulan')->nullable();
            $table->year('tahun')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekap_pkp');
    }
}
