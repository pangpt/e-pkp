<?php

use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $now = \Carbon\Carbon::now();

        DB::table('jabatan')->insert([
            [
                'nama_jabatan' => 'Ketua',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nama_jabatan' => 'Wakil Ketua',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nama_jabatan' => 'Panitera',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nama_jabatan' => 'Sekretaris',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nama_jabatan' => 'Kasubbag Kepegawaian & Ortala',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nama_jabatan' => 'Kasubbag Umum & Keuangan',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nama_jabatan' => 'Kasubbag PTIP',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nama_jabatan' => 'Panitera Muda Permohonan',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nama_jabatan' => 'Panitera Muda Gugatan',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nama_jabatan' => 'Panitera Muda Hukum',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nama_jabatan' => 'Panitera Pengganti',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nama_jabatan' => 'Jurusita',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nama_jabatan' => 'Jurusita Pengganti',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nama_jabatan' => 'Analis Kepegawaian',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nama_jabatan' => 'Pranata Komputer',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nama_jabatan' => 'Analis Perkara Pengadilan',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nama_jabatan' => 'Pengelola BMN',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nama_jabatan' => 'Arsiparis',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nama_jabatan' => 'CPNS',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
    }
}
