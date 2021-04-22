<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';

    public function sub_kategori(){
        return $this->hasMany(Sub_kategori::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }
}
