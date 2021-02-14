<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;
    protected $table = 'toko';

    public function kategori_toko(){
        return $this->belongsTo(Kategori_toko::class);
    }
}
