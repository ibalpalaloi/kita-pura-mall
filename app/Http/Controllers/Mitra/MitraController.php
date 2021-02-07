<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    //
    public function register($mitra){
    	if ($mitra == 'free'){
	    	return view('users/user/m-mitra/register_free');
    	}
    	else {
    		return view('users/user/m-mitra/register_premium');
    	}
    }

    public function register_nik(){
    	return view('users/user/m-mitra/register_nik');
    }

    public function upload_foto(){
    	return view('users/user/m-mitra/upload_foto');
    }

    public function pilih_lokasi(){
    	return view('users/user/m-mitra/pilih_lokasi');
    }

}
