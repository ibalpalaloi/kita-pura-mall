<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    public function pesanan(){
        return $this->hasMany(Pesanan::class);
    }
    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }
}
