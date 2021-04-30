<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar_tunggu_pesanan extends Model
{
    use HasFactory;
    protected $table = 'daftar_tunggu_pesanan';

    public function toko(){
        return $this->belongsTo(Toko::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

}
