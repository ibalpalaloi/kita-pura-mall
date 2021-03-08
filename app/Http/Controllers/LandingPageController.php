<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko;
use App\Models\Product;
use App\Models\Keranjang_belanja;
use App\Models\Penilaian_toko;
use App\Models\Foto_maps;

class LandingPageController extends Controller
{
	public function landing_page_mitra($mitra){
		$keranjang = Keranjang_belanja::where('user_id', Auth()->user()->id)->get();
		$toko = Toko::where('username', $mitra)->first();
		$produk = Product::where('toko_id', $toko->id)->where('tampil','ya')->get();
		$penilaian = Penilaian_toko::where('toko_id', $toko->id)->take(4)->get();
		$foto_maps = Foto_maps::where('toko_id', $toko->id)->get();
		$foto_map = array();
		if(!empty($foto_maps)){
			foreach($foto_maps as $foto){
				$foto_map[$foto->no_foto] = $foto->foto;
			} 
		}
		$rating = 0;
		if(count($penilaian) != 0){
			foreach($penilaian as $data){
				$rating += $data->bintang;
			}
			$rating = $rating / count($penilaian);
		}
		$rating = floor($rating);
		return view('landing_page/index', compact('toko', 'produk', 'keranjang', 'penilaian', 'rating', 'foto_map'));
	}

	public function daftar_menu($mitra){
		$toko = Toko::where('username', $mitra)->first();
		$produk = Product::where('toko_id', $toko->id)->get();
		return view('landing_page/daftar_menu', compact('produk'));
	}

	public function detail_produk($mitra, $id_produk){

		$keranjang = Keranjang_belanja::where('user_id', Auth()->user()->id)->get();
		$produk = Product::whereId($id_produk)->first();
		
		return view('landing_page/detail_produk', compact('produk', 'keranjang'));
	}
    //
}
