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


class AturBandController extends Controller
{
	public function index(){
		$band = DB::table('band')->select('band.*', 'dd_genre.nama_genre as nama_genre')->join('dd_genre', 'dd_genre.id', '=', 'band.genre')->where('users_id', Auth()->User()->id)->first();
		$genre = DB::table('dd_genre')->select('id', 'nama_genre')->get();
		$album = DB::table('dd_album_single')->select()->where('id_band', $band->id)->where('status', 'album')->get();
		$single = DB::table('dd_album_single')->select()->where('id_band', $band->id)->where('status', 'single')->get();
		$foto_band = DB::table('dd_foto_band')->select()->where('id_band', $band->id)->get();
		// dd($genre);
		return view('users/user/m-digital-download/akun/atur-band/index', compact('band', 'genre', 'album', 'single', 'foto_band'));
	}

	public function autocode($kode){
		$timestamp = time(); 
		$random = rand(10, 100);
		$current_date = date('mdYs'.$random, $timestamp); 
		return $kode.$current_date;
	}

	public function simpan_foto_band(Request $request){
		$band = DB::table('band')->where('users_id', Session::get('id_user'))->first();
		// dd($band);
		$db = new Dd_foto_band;
		$db->id = $this->autocode('FTB-');
		$db->keterangan = $request->foto_band_keterangan;
		$db->id_band = $band->id;
		$files = $request->file("foto_band_file");
		$generate = $this->generateRandomString().".png";
		\Storage::disk('public')->put("img/digital_download/foto/$band->id/".$generate, file_get_contents($files));
		$db->foto = $generate;
		$db->save();
		return redirect()->back();

	}

	public function simpan_foto_cover(Request $request){
		$image = $request->image;
		$size = $request->size;
		list($type, $image) = explode(';', $image);
		list(, $image)      = explode(',', $image);
		$image = base64_decode($image);
		$image_name= $request->nama.".png";
		$band = DB::table('band')->where('users_id', Session::get('id_user'))->first();
		// dd($band->id);
		\Storage::disk('public')->put("img/digital_download/band/$band->id/cover/".$size."/".$image_name, file_get_contents($request->image));
		$image_path = "img/digital_download/band/$band->id/cover/$size/$image_name";
		if ($band){
			\File::delete("public/img/digital_download/band/$band->id/cover/$size/$band->foto_cover");
		}
		if ($size == '600x600'){
			$band = Band::where('users_id', Session::get('id_user'))->first();
			$band->foto_cover = $image_name;
			$band->save();			
		}
		echo $image_path;
	}

	public function simpan_data_band(Request $request){
		// $user = User::where('users_id', Auth()->User()->id)->first();
		$band = Band::where('users_id', Auth()->User()->id)->first();
		$band->nama_band = $request->nama_band;
		$band->genre = $request->genre;
		$band->deskripsi = $request->deskripsi;
		$band->save();
		return redirect()->back();
	}

	public function simpan_foto_lagu(Request $request){
		$image = $request->image;
		$size = $request->size;
		list($type, $image) = explode(';', $image);
		list(, $image)      = explode(',', $image);
		$image = base64_decode($image);
		$image_name= $request->nama.'.png';
		$band = DB::table('band')->where('users_id', Session::get('id_user'))->first();
		\Storage::disk('public')->put("img/digital_download/temp_produk/".$size."/".$image_name, file_get_contents($request->image));
		$image_path = "img/digital_download/temp_produk/".$size."/$image_name";

		echo $image_path;
	}

	public function simpan_album(Request $request){
		$db = new Dd_album_single;
		$id = "";
		if ($request->status == 'album'){
			$id = $this->autocode('ALB-');
		}
		else {
			$id = $this->autocode('SNG-');
		}
		$band = DB::table('band')->where('users_id', Session::get('id_user'))->first();

		$files = $request->file("foto_cover");

		$image_path_ori = "img/digital_download/album_single/$band->id/$id/ori/$request->judul_foto";
		$image_path_250x201 = "img/digital_download/album_single/$band->id/$id/250x201/$request->judul_foto";
		$image_path_600x483 = "img/digital_download/album_single/$band->id/$id/600x483/$request->judul_foto";

		\Storage::disk('public')->put($image_path_ori, file_get_contents($files));
		\Storage::disk('public')->put($image_path_250x201, file_get_contents($files));
		\Storage::disk('public')->put($image_path_600x483, file_get_contents($files));

		\File::delete("public/$image_path_250x201");			
		\File::delete("public/$image_path_600x483");			
		// \File::delete("public/$image_path_240x200");			

		File::move(public_path('img/digital_download/temp_produk/250x201/'.$request->judul_foto), public_path($image_path_250x201));
		File::move(public_path('img/digital_download/temp_produk/600x483/'.$request->judul_foto), public_path($image_path_600x483));

		$db->id = $id;		
		$db->judul = $request->judul;
		$db->harga = str_replace(',', '', $request->harga);
		$db->status = $request->status;
		$db->foto_cover = $request->judul_foto;
		$db->id_band = $band->id;
		$db->save();

		$count_daftar = explode(",", $request->daftar_id);
		// dd($count_daftar);
		for ($i = 0; $i < count($count_daftar)-1; $i++){
			$nama_file = $request->input('nama_file_'.$count_daftar[$i]);
			$lagu_path = "lagu/$band->id/$id/$request->judul_foto";
			$lagu_preview_path = "preview_lagu/$band->id/$id/$request->judul_foto";
			\Storage::disk('public')->put($lagu_path, file_get_contents($files));
			\Storage::disk('public')->put($lagu_preview_path, file_get_contents($files));
			\File::delete("public/$lagu_path");
			\File::delete("public/$lagu_preview_path");
			File::move(public_path("temp_lagu/$band->id/$nama_file"), public_path("lagu/$band->id/$id/$nama_file"));
			\falahati\PHPMP3\MpegAudio::fromFile($_SERVER['DOCUMENT_ROOT']."/kita-pura-mall/public/lagu/$band->id/$id/$nama_file")->trim(10, 30)->saveFile($_SERVER['DOCUMENT_ROOT']."/kita-pura-mall/public/preview_lagu/$band->id/$id/$nama_file");			
			$db = new Dd_lagu;
			$db->id = $this->autocode('LGU');
			$db->judul = $request->input('judul_lagu_'.$count_daftar[$i]);
			$db->id_album_single = $id;
			$db->file = $nama_file;
			$db->save();
		}
		return redirect('digital-download/akun/atur-band');

	}

	public function generateRandomString($length = 20) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}



	public function simpan_lagu(Request $request){
		$lagu = $request->file('file');
		$new_name = rand().".".$lagu->getClientOriginalExtension();
		$band = DB::table('band')->where('users_id', Session::get('id_user'))->first();
		$lagu->move(public_path("temp_lagu/$band->id"), $new_name);
		if ($request->status_upload == 'ubah'){
			\File::delete("public/temp_lagu/$band->id/$request->nama_file");			
		}
		return response()->json([
			'message' => "Data Berhasil Disimpan",
			'nama_file' => $new_name
		]);
	}

	public function hapus_temp_lagu(Request $request){
		$band = DB::table('band')->where('users_id', Session::get('id_user'))->first();
		\File::delete("public/temp_lagu/$band->id/$request->nama_file");			
		echo "berhasil";
	}

	public function tambah_single_album(){
		return view('users/user/m-digital-download/akun/atur-band/tambah_single_album');
	}

	public function tambah_single(){
		return view('users/user/m-digital-download/akun/atur-band/tambah_single');
	}

	public function tambah_album(){
		return view('users/user/m-digital-download/akun/atur-band/tambah_album');
	}

}
