<?php

namespace App\Http\Controllers\toko_controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Toko_controller extends Controller
{
    //
    public function index(){
        return view('toko.dashboard');
    }

    public function informasi_dasar(){
        return view('toko.informasi_dasar');
    }
}
