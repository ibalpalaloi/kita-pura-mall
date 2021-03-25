<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;
    protected $table = 'toko';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    public function kategori_toko(){
        return $this->belongsTo(Kategori_toko::class);
    }

    public function pesanan(){
        return $this->hasMany(Pesanan::class);
    }

    public function foto_maps(){
        return $this->hasMany(Foto_maps::class);
    }

    public function logo(){
        if($this->logo_toko){
            return asset('public/img/toko/'.$this->id.'/logo/'.$this->logo_toko);
        }
        return asset('public/img/toko/logo/premium.svg');

    }

    public function video_landing_page(){
        return $this->hasMany(Video_landing_page::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'users_id');
    }
    
    public function kategorinya_toko(){
        return $this->hasMany(Kategorinya_toko::class);
    }

    public function kelurahan(){
        return $this->belongsTo(kelurahan::class);
    }
}
