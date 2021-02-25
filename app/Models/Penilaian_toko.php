<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian_toko extends Model
{
    use HasFactory;
    protected $table = 'penilaian_toko';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function toko(){
        return $this->belongsTo(Toko::class);
    }
}
