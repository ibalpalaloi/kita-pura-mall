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
use Auth;
use DB;
class LandingPageController extends Controller
{
	public function landing_page_mitra($mitra, Request $request){
		if(Auth::user()){
			$keranjang = DB::table('keranjang_belanja')->select(DB::raw('sum(keranjang_belanja.jumlah) as jumlah_keranjang'))->join('product', 'product.id', '=', 'keranjang_belanja.product_id')->join('toko', 'toko.id', '=', 'keranjang_belanja.toko_id')->where('user_id', Auth()->user()->id)->first()->jumlah_keranjang;	
			// dd($keranjang);	
		}
		else{
			$keranjang = 0;
		}
		// 
		$previous = "";
		if (!empty($_GET['previous'])){
			$previous = $_GET['previous'];			
		}
		$toko = Toko::where('username', $mitra)->first();
		if ($toko){
			$produk = Product::where('toko_id', $toko->id)->where('tampil','ya')->get();
			if(count($produk) == 0){
				$produk = Product::where('toko_id', $toko->id)->take(3)->get();
			}
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
			if(Auth::user()){
				if(Auth()->user()->id != $toko->user->id){
					$pengunjung = new Pengunjung_toko;
					$pengunjung->user_id = Auth()->user()->id;
					$pengunjung->toko_id = $toko->user->id;
					$pengunjung->save();
				}
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
			$color_status_bar = $request->get('colorStatusBar');
			$color_code = $str = ltrim($landing_page->warna_header, '#'); 
			if(is_null($color_status_bar)){
				if ($previous != ""){
					return redirect(url()->current()."?colorStatusBar=".$color_code."&previous=".$previous);					
				}
				else {
					return redirect(url()->current()."?colorStatusBar=".$color_code);		
				}
			}
			return view('landing_page/index', compact('toko', 'produk', 'keranjang', 'penilaian', 'rating', 'foto_map', 'fasilitas', 'video', 'landing_page'));

		}
		else {
			return abort(404);
		}
		$landing_page = Landing_page_toko::where('toko_id', $toko->id)->first();
		$color_status_bar = $request->get('colorStatusBar');
		$color_code = $str = ltrim($landing_page->warna_header, '#'); 
		if(is_null($color_status_bar)){
			if ($previous != ""){
				return redirect(url()->current()."?colorStatusBar=".$color_code."&previous=".$previous);					
			}
			else {
				return redirect(url()->current()."?colorStatusBar=".$color_code);		
			}
		}
		
		return view('landing_page/index', compact('toko', 'produk', 'keranjang', 'penilaian', 'rating', 'foto_map', 'fasilitas', 'video', 'landing_page'));
	}

	public function daftar_menu(Request $request, $mitra){
		if(Auth::user()){
			$keranjang = keranjang_belanja::where('user_id', Auth()->user()->id)->get();
		}
		else{
			$keranjang = 0;
		}
		$toko = Toko::where('username', $mitra)->first();
		$produk = Product::where('toko_id', $toko->id)->get();
		$page = Landing_page_toko::where('toko_id', $toko->id)->first();
		$color_status_bar = substr($page->warna_header, 1);
		$get_color_status_bar = $request->get('colorStatusBar');
		if(empty($get_color_status_bar)){
			return redirect('/'.$mitra.'/daftar-menu?colorStatusBar='.$color_status_bar);
		}
		return view('landing_page/daftar_menu', compact('produk', 'page', 'toko', 'keranjang'));
	}

	public function detail_produk($mitra, $id_produk){
		$product = DB::table('product')->select('product.*', 'sub_kategori.nama as sub_kategori')->leftJoin('sub_kategori', 'sub_kategori.id', '=', 'product.sub_kategori_id')->where('product.id', $id_produk)->first();
		$toko = DB::table('toko')->select('toko.nama_toko', 'toko.logo_toko', 'toko.username', 'toko.no_hp', 'toko.deskripsi as deskripsi_toko', 'toko.id')->where('id', $product->toko_id)->first();
		$produk_lainnya = DB::table('product')->select()->where('toko_id', $product->toko_id)->get();
		$produk_serupa = DB::table('product')->select()->where('sub_kategori_id', $product->sub_kategori_id)->where('id', '!=', $product->id)->get();
		$landing_page_toko = Landing_page_toko::where('toko_id', $toko->id)->first();
		if(Auth::user()){
			$keranjang = DB::table('keranjang_belanja')->select('product.nama', 'jenis_harga', 'harga', 'harga_terendah', 'harga_tertinggi', 'diskon', 'foto_produk', 'toko.nama_toko')->join('product', 'product.id', '=', 'keranjang_belanja.product_id')->join('toko', 'toko.id', '=', 'keranjang_belanja.toko_id')->where('user_id', Auth()->user()->id)->get();		
		}
		else{
			$keranjang = 0;
		}
		return view('landing_page/detail_produk', compact('landing_page_toko','product', 'toko', 'produk_lainnya', 'produk_serupa', 'keranjang'));	
	}
}
