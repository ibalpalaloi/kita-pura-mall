<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keynota extends Model
{
    use HasFactory;

    protected $table = "keynota";

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function toko(){
        return $this->belongsTo(Toko::class);
    }
}
