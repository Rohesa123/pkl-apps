<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wali extends Model
{
    use HasFactory;
    public $filable = ['nama','foto','id_siswa'];
    public $timestamps = true;

    public function siswa() 
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function image() 
    {
        if ($this->foto_produk && file_exists(public_path('images/produk/' . $this->foto_produk))) {
            return asset('images/produk/' . $this->foto_produk);
        } else {
            return asset('images/produk/no_image.jpg');
        }
    }

    public function deleteImage()
    {
        if ($this->foto_produk && file_exists(public_path('images/wali/'.$this->foto_produk))) {
            return unlink(public_path('images/produk/'.$this->foto_produk));
        }
    }
}
