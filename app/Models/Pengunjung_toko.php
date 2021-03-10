<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjung_toko extends Model
{
    use HasFactory;
    protected $table = "pengunjung_toko";

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function toko(){
        return $this->belongsTo(toko::class);
    }
}
