<?php

namespace App\Http\Controllers\toko_controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Produk_controller extends Controller
{
    //
    public function semua_produk(){
        return view('toko.semua_produk');
    }
}
