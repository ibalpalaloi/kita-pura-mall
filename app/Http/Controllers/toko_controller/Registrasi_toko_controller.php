<?php

namespace App\Http\Controllers\toko_controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Registrasi_toko_controller extends Controller
{
    //
    public function index(){
        return view('toko.registrasi');
    }
}
