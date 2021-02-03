<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    //
    public function register($mitra){
    	// if ($mitra ==)
    	return view('users/user/m-mitra/register');
    }

    public function pilih_lokasi(){
    	return view('users/user/m-mitra/pilih_lokasi');
    }
}
