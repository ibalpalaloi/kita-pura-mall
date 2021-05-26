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


class AlbumController extends Controller
{
	public function play_album($lagu){
		$band = DB::table('band')->select('band.*', 'dd_genre.nama_genre as nama_genre')->join('dd_genre', 'dd_genre.id', '=', 'band.genre')->where('users_id', Auth()->User()->id)->first();
		$album_single = DB::table('dd_album_single')->select('dd_album_single.*', 'dd_lagu.judul as judul_lagu', 'dd_lagu.id as id_lagu', 'dd_lagu.file')->join('dd_lagu', 'dd_lagu.id_album_single', '=', 'dd_album_single.id')->where('dd_album_single.id', $lagu)->first();
		$daftar_lagu = DB::table("dd_lagu")->select('*')->where('id_album_single', $album_single->id)->where('id', '!=', $album_single->id_lagu)->get();
    	// dd($daftar_lagu);
		return view('users/user/m-digital-download/akun/album/play_lagu', compact('album_single', 'band', 'daftar_lagu'));
	}

	public function ubah($id_album){
		$band = DB::table('band')->select('band.*', 'dd_genre.nama_genre as nama_genre')->join('dd_genre', 'dd_genre.id', '=', 'band.genre')->where('users_id', Auth()->User()->id)->first();
		$album_single = DB::table('dd_album_single')->select('dd_album_single.*', 'dd_lagu.judul as judul_lagu', 'dd_lagu.id as id_lagu', 'dd_lagu.file')->join('dd_lagu', 'dd_lagu.id_album_single', '=', 'dd_album_single.id')->where('dd_album_single.id', $id_album)->first();
		$daftar_lagu = DB::table("dd_lagu")->select('*')->where('id_album_single', $album_single->id)->get();
		// dd($daftar_lagu);
		return view('users/user/m-digital-download/akun/album/ubah', compact('album_single', 'band', 'daftar_lagu'));
	}

	public function update(Request $request){
		// dd($request);
		$album = Dd_album_single::where('id', $request->id)->first();
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
			$album->foto_cover = $request->judul_foto;

		}
		$album->judul = $request->judul;
		$album->harga = str_replace(',', '', $request->harga);

		$count_daftar = explode(",", $request->daftar_id);
		// dd($count_daftar);
		$array_where = array();
		$j = 0;
		for ($i = 0; $i < count($count_daftar)-1; $i++){
			$check_lagu = Dd_lagu::where('id', $request->input('id_lagu_'.$count_daftar[$i]))->first();
			if ($check_lagu){
				if ($check_lagu->file != $request->input('nama_file_'.$count_daftar[$i])){
					echo "cocok"."<br>";
					$nama_file = $request->input('nama_file_'.$count_daftar[$i]);
					$lagu_path = "lagu/$album->id_band/$request->id/$request->judul_foto";
					$lagu_preview_path = "preview_lagu/$album->id_band/$request->id/$request->judul_foto";
					File::move(public_path("temp_lagu/$album->id_band/$nama_file"), public_path("lagu/$album->id_band/$request->id/$nama_file"));
					\falahati\PHPMP3\MpegAudio::fromFile($_SERVER['DOCUMENT_ROOT']."/kita-pura-mall/public/lagu/$album->id_band/$request->id/$nama_file")->trim(10, 30)->saveFile($_SERVER['DOCUMENT_ROOT']."/kita-pura-mall/public/preview_lagu/$album->id_band/$request->id/$nama_file");
					$check_lagu->file = $nama_file;
				}
				$array_where[$j] = $request->input('id_lagu_'.$count_daftar[$i]);
				$j++;
				$check_lagu->judul = $request->input('judul_lagu_'.$count_daftar[$i]);
				$check_lagu->save();					
			}
			else {
				$nama_file = $request->input('nama_file_'.$count_daftar[$i]);
				File::move(public_path("temp_lagu/$album->id_band/$nama_file"), public_path("lagu/$album->id_band/$request->id/$nama_file"));
				\falahati\PHPMP3\MpegAudio::fromFile($_SERVER['DOCUMENT_ROOT']."/kita-pura-mall/public/lagu/$album->id_band/$request->id/$nama_file")->trim(10, 30)->saveFile($_SERVER['DOCUMENT_ROOT']."/kita-pura-mall/public/preview_lagu/$album->id_band/$request->id/$nama_file");
				$db = new Dd_lagu;
				$db->id = $this->autocode('LGU');
				$db->judul = $request->input('judul_lagu_'.$count_daftar[$i]);
				$db->id_album_single = $request->id;
				$db->file = $nama_file;
				$db->save();
			}

		}
		$delete_lagu = DB::table('dd_lagu')->select('id')->where('id_album_single', $request->id)->whereNotIn('id', $array_where)->get();
		// dd($delete_lagu);
		foreach ($delete_lagu as $row){
			DB::table('dd_lagu')->where('id', $row->id)->delete();
		}
		$album->save();
		return redirect('digital-download/akun/atur-band');
	}

	public function autocode($kode){
		$timestamp = time(); 
		$random = rand(10, 100);
		$current_date = date('mdYs'.$random, $timestamp); 
		return $kode.$current_date;
	}


}
