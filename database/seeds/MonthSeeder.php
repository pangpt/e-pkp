<?php

use Illuminate\Database\Seeder;

class MonthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();

        DB::table('months')->insert([
            [
                'nama' => 'Januari',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nama_jabatan' => 'Februari',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nama_jabatan' => 'Maret',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nama_jabatan' => 'April',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nama_jabatan' => 'Mei',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nama_jabatan' => 'Juni',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nama_jabatan' => 'Juli',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nama_jabatan' => 'Agustus',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nama_jabatan' => 'September',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nama_jabatan' => 'Oktober',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nama_jabatan' => 'November',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nama_jabatan' => 'Desember',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
    }
}
