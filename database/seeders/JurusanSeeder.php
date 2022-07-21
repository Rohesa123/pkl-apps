<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class JurusanSeeder extends Seeder
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
            ['kode_mata_pelajaran'=>'A001','nama_mata_pelajaran'=>'Matematika','semester'=>'2020', 'jurusan'=>"RPL"],
            ['kode_mata_pelajaran'=>'A002','nama_mata_pelajaran'=>'Pai','semester'=>'2021', 'jurusan'=>"TBSM"],
            ['kode_mata_pelajaran'=>'A003','nama_mata_pelajaran'=>'Sunda','semester'=>'2022', 'jurusan'=>"TKRO"],
        ];

        DB::table('jurusans')->insert($sampel); 
    }
}
