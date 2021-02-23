<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang_belanja extends Model
{
    use HasFactory;
    protected $table = 'keranjang_belanja';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function toko(){
        return $this->belongsTo(Toko::class);
    }

    public function product(){
        return $this->belongsTo(product::class);
    }
}
