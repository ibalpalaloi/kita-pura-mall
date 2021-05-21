<?php

namespace App\Http\Controllers\DigitalDownload\Akun;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Band;
use App\Models\Transaksi;
use App\Models\Dd_album_single;
use App\Models\Dd_lagu;
use App\Models\Dd_foto_band;
use Session;
use DB;
use File;


class SingleController extends Controller
{
    //
	public function play_single($lagu){
		$band = DB::table('band')->select('band.*', 'dd_genre.nama_genre as nama_genre')->join('dd_genre', 'dd_genre.id', '=', 'band.genre')->where('users_id', Auth()->User()->id)->first();
		$album_single = DB::table('dd_album_single')->select('dd_album_single.*', 'dd_lagu.id as id_lagu', 'dd_lagu.file')->join('dd_lagu', 'dd_lagu.id_album_single', '=', 'dd_album_single.id')->where('dd_album_single.id', $lagu)->first();
    	// dd($album_single);
		return view('users/user/m-digital-download/akun/single/play_lagu', compact('album_single', 'band'));
	}

	public function ubah($id_single){
		$band = DB::table('band')->select('band.*', 'dd_genre.nama_genre as nama_genre')->join('dd_genre', 'dd_genre.id', '=', 'band.genre')->where('users_id', Auth()->User()->id)->first();
		$album_single = DB::table('dd_album_single')->select('dd_album_single.*', 'dd_lagu.id as id_lagu', 'dd_lagu.file')->join('dd_lagu', 'dd_lagu.id_album_single', '=', 'dd_album_single.id')->where('dd_album_single.id', $id_single)->first();
    	// dd($album_single);
		return view('users/user/m-digital-download/akun/single/ubah', compact('album_single', 'band'));
	}

	public function autocode($kode){
		$timestamp = time(); 
		$random = rand(10, 100);
		$current_date = date('mdYs'.$random, $timestamp); 
		return $kode.$current_date;
	}

	public function update(Request $request){

		$single = Dd_album_single::where('id', $request->id)->first();
		$files = $request->file("foto_cover");

		if ($files){
			$image_path_ori = "img/digital_download/album_single/$single->id_band/$request->id/ori/$request->judul_foto";
			$image_path_250x201 = "img/digital_download/album_single/$single->id_band/$request->id/250x201/$request->judul_foto";
			$image_path_600x483 = "img/digital_download/album_single/$single->id_band/$request->id/600x483/$request->judul_foto";
			\Storage::disk('public')->put($image_path_ori, file_get_contents($files));
			\Storage::disk('public')->put($image_path_250x201, file_get_contents($files));
			\Storage::disk('public')->put($image_path_600x483, file_get_contents($files));

			\File::delete("public/$image_path_250x201");			
			\File::delete("public/$image_path_600x483");

			File::move(public_path('img/digital_download/temp_produk/250x201/'.$request->judul_foto), public_path($image_path_250x201));
			File::move(public_path('img/digital_download/temp_produk/600x483/'.$request->judul_foto), public_path($image_path_600x483));
			$single->foto_cover = $request->judul_foto;
		}
		$single->judul = $request->judul;
		$single->harga = str_replace(',', '', $request->harga);

		$count_daftar = explode(",", $request->daftar_id);
		// dd($count_daftar);
		$lagu = Dd_lagu::where('id_album_single', $request->id)->first();
		for ($i = 0; $i < count($count_daftar)-1; $i++){
			if ($lagu->file != $request->input('nama_file_'.$count_daftar[$i])){
				$nama_file = $request->input('nama_file_'.$count_daftar[$i]);
				$lagu_path = "lagu/$single->id_band/$request->id/$request->judul_foto";
				$lagu_preview_path = "preview_lagu/$single->id_band/$request->id/$request->judul_foto";
				File::move(public_path("temp_lagu/$single->id_band/$nama_file"), public_path("lagu/$single->id_band/$request->id/$nama_file"));
				\falahati\PHPMP3\MpegAudio::fromFile($_SERVER['DOCUMENT_ROOT']."/kita-pura-mall/public/lagu/$single->id_band/$request->id/$nama_file")->trim(10, 30)->saveFile($_SERVER['DOCUMENT_ROOT']."/kita-pura-mall/public/preview_lagu/$single->id_band/$request->id/$nama_file");
				$lagu->judul = $request->input('judul_lagu_'.$count_daftar[$i]);
				$lagu->file = $nama_file;
				$lagu->save();
			}

		}
		$single->save();
		return redirect('digital-download/akun/atur-band');

	}
}
