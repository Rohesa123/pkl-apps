<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class NilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sampel = [
            ['nis'=>1001,'kode_mata_pelajaran'=>'A001','nilai'=>100,'indeks_nilai'=>'A'],
            ['nis'=>1002,'kode_mata_pelajaran'=>'A002','nilai'=>100,'indeks_nilai'=>'A'],
            ['nis'=>1003,'kode_mata_pelajaran'=>'A003','nilai'=>100,'indeks_nilai'=>'A'],
        ];

        DB::table('nilais')->insert($sampel); 
    }
}
