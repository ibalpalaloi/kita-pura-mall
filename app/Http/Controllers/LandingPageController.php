<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
	public function landing_page_mitra(){
		return view('landing_page/index');
	}

	public function daftar_menu(){
		return  view('landing_page/daftar_menu');
	}

	public function detail_produk(){
		return view('landing_page/detail_produk');
	}
    //
}
