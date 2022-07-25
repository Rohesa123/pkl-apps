<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sampel=[
            ['nis'=>1001,'nama_siswa'=>'Rohesa','jenis_kelamin' => 'Laki-laki','agama' => 'Islam','alamat_siswa'=>'Kp Bojong Tanjung 1', 'tanggal_lahir'=>"2005-03-18"],
            ['nis'=>1002,'nama_siswa'=>'Rohesa','jenis_kelamin' => 'Laki-laki','agama' => 'Islam','alamat_siswa'=>'Kp Bojong Tanjung 1', 'tanggal_lahir'=>"2005-03-18"],
            ['nis'=>1003,'nama_siswa'=>'Rohesa','jenis_kelamin' => 'Laki-laki','agama' => 'Islam','alamat_siswa'=>'Kp Bojong Tanjung 1', 'tanggal_lahir'=>"2005-03-18"],
        ];

        DB::table('siswas')->insert($sampel);
    }
}
