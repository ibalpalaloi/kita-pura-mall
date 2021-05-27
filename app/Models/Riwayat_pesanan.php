<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat_pesanan extends Model
{
    use HasFactory;
    protected $table = "riwayat_pesanan";

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function toko(){
        return $this->belongsTo(Toko::class);
    }
}
