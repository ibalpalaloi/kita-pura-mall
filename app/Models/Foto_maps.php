<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto_maps extends Model
{
    protected $table = "foto_maps";
    use HasFactory;

    public function toko(){

    	return $this->belongsTo(Toko::class);
    }
}
