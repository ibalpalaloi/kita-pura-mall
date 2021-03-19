<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategorinya_toko extends Model
{
	use HasFactory;
	protected $table = "Kategorinya_toko";
	public function kategori_toko(){
		return $this->belongsTo(Kategori_toko::class);
	}
}
