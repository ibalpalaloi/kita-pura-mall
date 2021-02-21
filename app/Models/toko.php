<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;
    protected $table = 'toko';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    public function kategori_toko(){
        return $this->belongsTo(Kategori_toko::class);
    }

    public function pesanan(){
        return $this->hasMany(Pesanan::class);
    }
}
