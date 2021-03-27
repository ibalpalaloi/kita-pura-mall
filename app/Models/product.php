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
    public function sub_kategori(){
        return $this->belongsTo(Sub_kategori::class);
    }
    public function toko(){
        return $this->belongsTo(Toko::class);
    }
    public function get_nama_sub_kategori(){
        if(empty($this->sub_kategori_id)){
            return "";
        }
        else{
            return $this->sub_kategori->nama;
        }
    }
    public function get_id_sub_kategori(){
        if(empty($this->sub_kategori_id)){
            return "";
        }
        else{
            return $this->sub_kategori->id;
        }
    }
}
