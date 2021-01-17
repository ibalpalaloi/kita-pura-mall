<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    use HasFactory;
    protected $table = 'kecamatan';

    public function kabupaten_kota(){
        return $this->belongsTo(Kabupaten_kota::class);
    }

    public function kelurahan(){
        return $this->hasMany(Kelurahan::class);
    }
}
