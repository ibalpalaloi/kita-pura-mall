<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko;
use App\Models\Product;
use App\Models\Keranjang_belanja;

class LandingPageController extends Controller
{
	public function landing_page_mitra($mitra){
		$keranjang = Keranjang_belanja::where('user_id', Auth()->user()->id)->get();
		$toko = Toko::where('username', $mitra)->first();
		$produk = Product::where('toko_id', $toko->id)->get();
		return view('landing_page/index', compact('toko', 'produk', 'keranjang'));
	}

	public function daftar_menu(){
		return  view('landing_page/daftar_menu');
	}

	public function detail_produk(){
		return view('landing_page/detail_produk');
	}
    //
}
