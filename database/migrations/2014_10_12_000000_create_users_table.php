<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('atasan_id')->nullable();
            $table->string('name');
            $table->string('nip')->unique();
            $table->string('email')->unique()->nullable();
            $table->date('birth_date')->nullable();
            $table->string('pangkat')->nullable();
            $table->string('satker')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('jabatan')->nullable();
            $table->string('password');
            $table->string('level')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
