<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kode_lupa_password extends Model
{
    use HasFactory;
    protected $table = 'kode_lupa_password';

    public function user(){
        $this->belongsTo(User::class);
    }
}
