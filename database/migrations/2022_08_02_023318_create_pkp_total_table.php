<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePkpTotalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pkp_total', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penilaian_kinerja_id');
            $table->unsignedBigInteger('indikator_kegiatan_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('total_nilai');
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
        Schema::dropIfExists('pkp_total');
    }
}
