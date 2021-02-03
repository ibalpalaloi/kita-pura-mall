<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
	public function index(){
		return view('users/user/m-profil/index');
	}

	public function biodata(){
		return view('users/user/m-profil/biodata');
	}

	public function jadi_mitra(){
		return view('users/user/m-mitra/jadi_mitra');
	}

	public function jenis_mitra($status_mitra){
		return view('users/user/m-mitra/jenis_mitra_free');
	}
}
