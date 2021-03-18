<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko;
use App\Models\Product;
use App\Models\Keranjang_belanja;
use App\Models\Penilaian_toko;
use App\Models\Foto_maps;
use App\Models\Landing_page_fasilitas_toko;
use App\Models\Video_landing_page;
use App\Models\Pengunjung_toko;
use App\Models\Landing_page_toko;
use App\Models\Template_landing_page;

class LandingPageController extends Controller
{
	public function landing_page_mitra($mitra){
		$keranjang = Keranjang_belanja::where('user_id', Auth()->user()->id)->get();
		$toko = Toko::where('username', $mitra)->first();
		$produk = Product::where('toko_id', $toko->id)->where('tampil','ya')->get();
		$penilaian = Penilaian_toko::where('toko_id', $toko->id)->take(4)->get();
		$fasilitas = Landing_page_fasilitas_toko::where('toko_id', $toko->id)->get();
		$foto_maps = Foto_maps::where('toko_id', $toko->id)->get();
		$video_ = Video_landing_page::where('toko_id', $toko->id)->get();
		$video = array();
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
		foreach($video_ as $video_){
			$link = $video_->link_video;
			$cek = substr($link, 0, 11);
			if(str_contains($link, 'youtu.be')){
				$link = trim(substr($link, strpos($link, '/')+2));
				$link = trim(substr($link, strpos($link, '/')+1));
			}
			else{
				$link = trim(substr($link, strpos($link, '=')+1));
			}
			array_push($video, $link);
		}
		// pengunjung toko
		if(Auth()->user()->id != $toko->user->id){
			$pengunjung = new Pengunjung_toko;
			$pengunjung->user_id = Auth()->user()->id;
			$pengunjung->toko_id = $toko->user->id;
			$pengunjung->save();
		}

		$landing_page = Landing_page_toko::where('toko_id', $toko->id)->get();
		if(count($landing_page)==0){
			$template = Template_landing_page::find(1);
			$page = new Landing_page_toko;
			$page->toko_id = Auth()->user()->toko->id;
			$page->warna_header = $template->warna_header;
			$page->warna_body = $template->warna_body;
			$page->warna_footer_1 = $template->warna_footer_1;
			$page->warna_footer_2 = $template->warna_footer_2;
			$page->warna_tulisan_header = $template->warna_tulisan_header;
			$page->warna_tulisan_body = $template->warna_tulisan_body;
			$page->warna_tulisan_footer = $template->warna_tulisan_footer;
			$page->save();
		}
		$landing_page = Landing_page_toko::where('toko_id', $toko->id)->first();
		return view('landing_page/index', compact('toko', 'produk', 'keranjang', 'penilaian', 'rating', 'foto_map', 'fasilitas', 'video', 'landing_page'));
	}

	public function daftar_menu($mitra){
		$toko = Toko::where('username', $mitra)->first();
		$produk = Product::where('toko_id', $toko->id)->get();
		return view('landing_page/daftar_menu', compact('produk', 'toko'));
	}

	public function detail_produk($mitra, $id_produk){

		$keranjang = Keranjang_belanja::where('user_id', Auth()->user()->id)->get();
		$produk = Product::whereId($id_produk)->first();
		
		return view('landing_page/detail_produk', compact('produk', 'keranjang'));
	}
    //
}
