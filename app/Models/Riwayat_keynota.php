<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat_keynota extends Model
{
    use HasFactory;

    protected $table = "riwayat_keynota";

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function riwayat_pesanan(){
        return $this->hasMany(Riwayat_pesanan::class);
    }
}
