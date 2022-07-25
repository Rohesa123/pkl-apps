<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    public $fillable = ['nama_siswa','nis','jenis_kelamin','agama','alamat_siswa','tanggal_lahir'];
    public $timestamps = true;

    public function wali() 
    {
        return $this->hasOne(Wali::class,'id_siswa');   
    }
}
