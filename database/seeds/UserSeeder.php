<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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

        DB::table('users')->insert([
            [
                'name' => 'Panggih Tridarma',
                'nip' => '199609022020121004',
                'email' => 'panggih@tridarma.com',
                'password' => bcrypt('password'),
                'pangkat' => 'III A',
                'satker' => 'Pengadilan Agama Watampone',
                'phone' => '082192912912',
                'jabatan' => 'Ahli Jago Pranata Komputer',
                'level' => '2',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Random Girls',
                'nip' => '199609022020121001',
                'email' => 'random@girl.com',
                'password' => bcrypt('password'),
                'pangkat' => 'III A',
                'satker' => 'Pengadilan Agama Watampone',
                'phone' => '0821929122322',
                'jabatan' => 'Ahli Jago Pranata Komputer',
                'level' => '2',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
    }
}
