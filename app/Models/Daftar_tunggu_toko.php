<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar_tunggu_toko extends Model
{
    use HasFactory;
    protected $table = 'daftar_tunggu_toko';

    public function user(){
        return $this->belongsTo(User::class, 'users_id');
    }

    public function kategori_toko(){
        return $this->belongsTo(Kategori_toko::class);
    }
}
