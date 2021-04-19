<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori_toko extends Model
{
    use HasFactory;

    protected $table = 'kategori_toko';

    public function toko(){
        return $this->hasMany(Toko::class);
    }

    public function daftar_tunggu_toko(){
        return $this->hasMany(Daftar_tunggu_toko::class);
    }

    public function kategorinya_toko(){
        return $this->hasMany(Kategorinya_toko::class);
    }
}
