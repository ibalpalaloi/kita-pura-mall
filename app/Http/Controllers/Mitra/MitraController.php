<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Kategori_toko;
use App\Models\toko;
use App\Models\Jadwal_toko;


class MitraController extends Controller
{
	//
	
	public function autocode($kode){
		$timestamp = time(); 
		$random = rand(10, 100);
		$current_date = date('mdYs'.$random, $timestamp); 
		return $kode.$current_date;
	}
	

	public function index_free(){
		$kategori = Kategori_toko::all();

		return view('users/user/m-mitra/index_free', ['daftar_kategori'=>$kategori]);
	}

	public function index_premium(){
		$kategori = Kategori_toko::all();
		return view('users/user/m-mitra/index_premium', ['daftar_kategori'=>$kategori]);
	}

	public function register($mitra){

		$kategori = Kategori_toko::all();

		// dd($kategori);

		if ($mitra == 'free'){

			return view('users/user/m-mitra/register_free', ['daftar_kategori'=>$kategori]);
			
		}
		else {

			return view('users/user/m-mitra/register_premium', ['daftar_kategori'=>$kategori]);
			
		}
	}
	
	public function simpan_mitra(Request $request, $jenis_mitra){
		// dd($request->all());

		$this->validate($request,[
			'nama_pemilik' => 'required',
			'kategori_toko' => 'required',
			'no_hp' => 'required',
			'jadwal_hari' => 'required',
			'jadwal_buka' => 'required',
			'jadwal_tutup' => 'required',
			'alamat' => 'required',
			'latitude' => 'required',
			'longitude' => 'required',			
			'foto_toko' => 'required'
		]);
		
		if ($jenis_mitra == 'premium'){
			$this->validate($request,[
				'deskripsi' => 'required'
			]);
		};

		$toko_id = $this->autocode('TK-');

		// @Tambah Toko
		$toko = new toko;
		$toko->id = $toko_id;
		$toko->user_id = Session::get('id_user');
		$toko->jenis_mitra = $jenis_mitra;
		$toko->kategori_id = $request->kategori_toko;
		$toko->nama_toko = $request->nama_pemilik;
		$toko->nama_pemilik = $request->nama_pemilik;
		$toko->no_hp = $request->no_hp;
		$toko->alamat = $request->alamat;
		$toko->kelurahan_id = "1";
		$toko->latitude = $request->latitude;
		$toko->longitude = $request->longitude;
		$toko->status = "Tidak Aktif";


		// @Tambah Foto
		$files = $request->file("foto_toko");
		$type = $request->file("foto_toko")->getClientOriginalExtension();
		$file_upload = $toko_id.".".$type;
		\Storage::disk('public')->put('img/toko/'.$jenis_mitra.'/'.$file_upload, file_get_contents($files));
		$toko->foto = $file_upload;
		if ($jenis_mitra == 'premium'){

			$toko->deskripsi = $request->deskripsi;
		}

		$toko->save();

		// @Tambah Jadwal
		$hari = explode('~', $request->get('jadwal_hari'));
		$jam_buka = explode('~', $request->get('jadwal_buka'));
		$jam_tutup = explode('~', $request->get('jadwal_tutup'));

		for ($i = 0; $i < count($hari); $i++) {
			$jadwal = new Jadwal_toko;
			$jadwal->toko_id = $toko_id;
			$jadwal->hari = $hari[$i];
			$jadwal->jam_buka = $jam_buka[$i];
			$jadwal->jam_tutup = $jam_tutup[$i];
			$jadwal->save();
		}
		
		return redirect('/akun');
	}

	public function register_nik(){
		return view('users/user/m-mitra/register_nik');
	}

	public function upload_foto(){
		return view('users/user/m-mitra/upload_foto');
	} 

	public function pilih_lokasi($jenis_mitra){
		if ($jenis_mitra == 'free'){
			return view('users/user/m-mitra/pilih_lokasi_free');

		}
		else {
	    	return view('users/user/m-mitra/pilih_lokasi_premium');			
		}
	}

	public function atur_toko_premium(){
		$kategori = Kategori_toko::all();
		return view('users/user/m-mitra/premium/atur_toko', ['daftar_kategori'=>$kategori]);
	}

	public function atur_produk_premium(){
		return view('users/user/m-mitra/premium/atur_produk');
	}

}
