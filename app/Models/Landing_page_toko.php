<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Landing_page_toko extends Model
{
    use HasFactory;
    protected $table = "landing_page_toko";

    public function toko(){
        return $this->belongsTo(Toko::class);
    }
}
