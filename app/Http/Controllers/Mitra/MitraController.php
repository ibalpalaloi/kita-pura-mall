<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Kategori_toko;
use App\Models\Kategori;
use App\Models\toko;
use App\Models\product;
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
	

	public function mitra(){

		// $toko = toko::where('user_id', Session::get('id_user'))->first();
		// if($toko){

		// 	if($toko->status == 'Tidak Aktif'){

		// 		// dd($toko);

		// 		$notification = array(
		// 			'message' => 'Belum Terverifikasi ',
		// 			'jenis_mitra' => $toko->jenis_mitra
		// 		 );     
		
		// 		return redirect()->back()->with($notification);
		// 	}

		// 	else{

		// 		return redirect('/akun/mitra/'.$toko->jenis_mitra);

		// 	}

		// }
		// else{

		// 	return redirect('/akun/jadi-mitra');
		
		// }

	}



	public function jadi_mitra(){

		$toko = toko::where('user_id', Session::get('id_user'))->first();

		if($toko){

			if($toko->status == 'Tidak Aktif'){

				// dd($toko);

				$notification = array(
					'message' => 'Belum Terverifikasi ',
					'jenis_mitra' => $toko->jenis_mitra
				);     

				return redirect()->back()->with($notification);
			}

			else{

				return redirect('/akun/mitra/'.$toko->jenis_mitra);

			}
		}
		else{

			return view('users/user/m-mitra/jadi_mitra');

		}
	}




	public function index_free(){
		$kategori = Kategori_toko::all();

		$toko = toko::where('user_id', Session::get('id_user'))->first();

		$jadwal_toko = Jadwal_toko::where('toko_id', $toko->id)->get();

		return view('users/user/m-mitra/index_free', ['daftar_kategori'=>$kategori,'toko'=>$toko, 'jadwal'=>$jadwal_toko]);
	}

	public function simpan_data_free(Request $request){
		
		$this->validate($request,[
			'nama_pemilik' => 'required',
			'kategori_toko' => 'required',
			'no_hp' => 'required',
			'jadwal_hari' => 'required',
			'jadwal_buka' => 'required',
			'jadwal_tutup' => 'required',
			'alamat' => 'required',
		]);

		$toko = toko::where('user_id', Session::get('id_user'))->first();
		$toko->nama_pemilik = $request->nama_pemilik;
		$toko->kategori_id = $request->kategori_toko;
		$toko->no_hp = $request->no_hp;
		$toko->alamat = $request->alamat;
		if($request->file("foto_toko")){
			$files = $request->file("foto_toko");
			$type = $request->file("foto_toko")->getClientOriginalExtension();
			$file_upload = $toko->id.".".$type;
			\Storage::disk('public')->put('img/toko/'.$toko->jenis_mitra.'/'.$file_upload, file_get_contents($files));
		}
		$toko->save();

		$hapus_jadwal = Jadwal_toko::where('toko_id', $toko->id)->delete();

		$hari = explode('~', $request->get('jadwal_hari'));
		$jam_buka = explode('~', $request->get('jadwal_buka'));
		$jam_tutup = explode('~', $request->get('jadwal_tutup'));

		for ($i = 0; $i < count($hari); $i++) {
			$jadwal = new Jadwal_toko;
			$jadwal->toko_id = $toko->id;
			$jadwal->hari = $hari[$i];
			$jadwal->jam_buka = $jam_buka[$i];
			$jadwal->jam_tutup = $jam_tutup[$i];
			$jadwal->save();
		}

		$notification = array(
			'message' => 'Data Toko Berhasil Diperbarui'
		);     

		return redirect()->back()->with($notification);


	}

	public function upgrade_premium(){

		$daftar_kategori = Kategori_toko::all();
		$toko = toko::where('user_id', Session::get('id_user'))->first();
		$jadwal = Jadwal_toko::where('toko_id', $toko->id)->get();

		return view('users/user/m-mitra/upgrade_premium', compact('daftar_kategori','toko','jadwal'));
	}

	public function simpan_upgrade_premium(Request $request){

		// dd($request->all());

		$this->validate($request,[
			'nama_pemilik' => 'required',
			'kategori_toko' => 'required',
			'no_hp' => 'required',
			'jadwal_hari' => 'required',
			'jadwal_buka' => 'required',
			'jadwal_tutup' => 'required',
			'alamat' => 'required',
			'deskripsi' => 'required',
			'foto_toko' => 'required'
		]);
		
		$toko = toko::where('user_id', Session::get('id_user'))->first();

		// dd($toko->id);
		$toko->nama_pemilik = $request->nama_pemilik;
		$toko->jenis_mitra = "premium";
		$toko->kategori_id = $request->kategori_toko;
		$toko->no_hp = $request->no_hp;
		$toko->alamat = $request->alamat;
		$toko->status = "Tidak Aktif";
		$toko->deskripsi = $request->deskripsi;
		if($request->file("foto_toko")){
			$files = $request->file("foto_toko");
			$type = $request->file("foto_toko")->getClientOriginalExtension();
			$file_upload = $toko->id.".".$type;
			\Storage::disk('public')->put('img/toko/premium/'.$file_upload, file_get_contents($files));
		}
		$toko->save();

		$hapus_jadwal = Jadwal_toko::where('toko_id', $toko->id)->delete();

		$hari = explode('~', $request->get('jadwal_hari'));
		$jam_buka = explode('~', $request->get('jadwal_buka'));
		$jam_tutup = explode('~', $request->get('jadwal_tutup'));

		for ($i = 0; $i < count($hari); $i++) {
			$jadwal = new Jadwal_toko;
			$jadwal->toko_id = $toko->id;
			$jadwal->hari = $hari[$i];
			$jadwal->jam_buka = $jam_buka[$i];
			$jadwal->jam_tutup = $jam_tutup[$i];
			$jadwal->save();
		}

		Session::put('status_mitra', "premium");

		$notification = array(
			'message' => 'Belum Terverifikasi',
			'jenis_mitra' => 'premium'
		);     

		return redirect('/akun')->with($notification);
	}



	public function tambah_produk_premium(){
		$kategori = Kategori_toko::all();
		$toko = toko::where('user_id', Session::get('id_user'))->first();
		$jadwal = Jadwal_toko::where('toko_id', $toko->id)->get();
		return view('users/user/m-mitra/premium/tambah_produk', ['daftar_kategori'=>$kategori,'toko'=>$toko,'jadwal'=>$jadwal]);
	}

	public function daftar_produk_premium(){
		$kategori_produk = Kategori::all();

		$toko = toko::where('user_id', Session::get('id_user'))->first();
		$produk = product::where('id_toko', $toko->id)->get();
		return view('users/user/m-mitra/premium/daftar_produk', compact('kategori_produk','produk'));		
	}

	public function index_premium(){

		$toko = toko::where('user_id', Session::get('id_user'))->first();


		if($toko->status == "Belum lengkap"){
			return view('users/user/m-mitra/register_nik');
		}
		else if ($toko->status == 'Tidak Aktif'){
			$daftar_kategori = Kategori_toko::all();
			$jadwal = Jadwal_toko::where('toko_id', $toko->id)->get();
			return view('users/user/m-mitra/upgrade_premium', compact('daftar_kategori','toko','jadwal'));
		}
		else{
			return view('users/user/m-mitra/index_premium');
		}

	}

	public function simpan_data_premium(Request $request){

		// dd($request->all());

		$this->validate($request,[
			'nama_pemilik' => 'required',
			'kategori_toko' => 'required',
			'no_hp' => 'required',
			'jadwal_hari' => 'required',
			'jadwal_buka' => 'required',
			'jadwal_tutup' => 'required',
			'alamat' => 'required',
			'deskripsi' => 'required',
		]);

		$toko = toko::where('user_id', Session::get('id_user'))->first();
		$toko->nama_pemilik = $request->nama_pemilik;
		$toko->kategori_toko_id = $request->kategori_toko;
		$toko->no_hp = $request->no_hp;
		$toko->alamat = $request->alamat;
		$toko->deskripsi = $request->deskripsi;
		if($request->file("foto_toko")){
			$files = $request->file("foto_toko");
			$type = $request->file("foto_toko")->getClientOriginalExtension();
			$file_upload = $toko->id.".".$type;
			\Storage::disk('public')->put('img/toko/'.$toko->jenis_mitra.'/'.$file_upload, file_get_contents($files));
		}
		$toko->save();

		$hapus_jadwal = Jadwal_toko::where('toko_id', $toko->id)->delete();

		$hari = explode('~', $request->get('jadwal_hari'));
		$jam_buka = explode('~', $request->get('jadwal_buka'));
		$jam_tutup = explode('~', $request->get('jadwal_tutup'));

		for ($i = 0; $i < count($hari); $i++) {
			$jadwal = new Jadwal_toko;
			$jadwal->toko_id = $toko->id;
			$jadwal->hari = $hari[$i];
			$jadwal->jam_buka = $jam_buka[$i];
			$jadwal->jam_tutup = $jam_tutup[$i];
			$jadwal->save();
		}

		$notification = array(
			'message' => 'Data Toko Berhasil Diperbarui'
		);     

		if($toko->status == "Aktif"){

			return redirect()->back()->with($notification);
		}
		else{

			$notification = array(
				'message' => 'Belum Terverifikasi',
				'jenis_mitra' => 'premium'
			);     

			return redirect('/akun')->with($notification);
		}
	}

	public function atur_toko_premium(){

		$kategori = Kategori_toko::all();
		$toko = toko::where('user_id', Session::get('id_user'))->first();
		$jadwal = Jadwal_toko::where('toko_id', $toko->id)->get();

		return view('users/user/m-mitra/premium/atur_toko', ['daftar_kategori'=>$kategori,'toko'=>$toko,'jadwal'=>$jadwal]);
	}

	public function atur_produk_premium(){

		$kategori_produk = Kategori::all();

		$toko = toko::where('user_id', Session::get('id_user'))->first();
		$produk = product::where('id_toko', $toko->id)->get();

		return view('users/user/m-mitra/premium/atur_produk', compact('kategori_produk','produk'));
	}

	public function simpan_atur_produk_premium(Request $request){

		// dd($request->all());

		$this->validate($request,[
			'nama' => 'required',
			'kategori_produk' => 'required',
			'harga' => 'required',
			'stok' => 'required',
			'deskripsi' => 'required',
			'foto_toko' => 'required',
		]);

		$toko = toko::where('user_id', Session::get('id_user'))->first();
		$produk_id = $this->autocode('PD-');

		// @Tambah Produk
		$produk = new product;
		$produk->id = $produk_id;
		$produk->toko_id = $toko->id;
		$produk->kategori_id = $request->kategori_produk;
		$produk->nama = $request->nama;
		$produk->harga = $request->harga;
		$produk->stok = $request->stok;
		$produk->deskripsi = $request->deskripsi;
		// @Tambah Foto
		$files = $request->file("foto_toko");
		$type = $request->file("foto_toko")->getClientOriginalExtension();
		$file_upload = $produk_id.".".$type;
		\Storage::disk('public')->put('img/toko/'.$toko->id.'/produk/'.$file_upload, file_get_contents($files));
		$produk->foto_produk = $file_upload;
		$produk->save();

		return redirect()->back();

	}

	public function update_atur_produk_premium(Request $request){

		$this->validate($request,[
			'edit_id_produk' => 'required',
			'edit_nama_produk' => 'required',
			'edit_kategori' => 'required',
			'edit_harga' => 'required',
			'edit_stok' => 'required',
			'edit_deskripsi' => 'required',
		]);

		$toko = toko::where('user_id', Session::get('id_user'))->first();
		$produk = product::where('id', $request->edit_id_produk)->first();
		$produk->kategori_id = $request->edit_kategori;
		$produk->nama = $request->edit_nama_produk;
		$produk->harga = $request->edit_harga;
		$produk->stok = $request->edit_stok;
		$produk->deskripsi = $request->edit_deskripsi;
		// @Tambah Foto
		if($request->file('edit_foto_toko')){

			$files = $request->file("edit_foto_toko");
			$type = $request->file("edit_foto_toko")->getClientOriginalExtension();
			$file_upload = $produk->id.".".$type;
			\Storage::disk('public')->put('img/toko/'.$toko->id.'/produk/'.$file_upload, file_get_contents($files));
			$produk->foto_produk = $file_upload;
		}

		$produk->save();

		return redirect()->back();
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

		// @Tambah Foto
		$files = $request->file("foto_toko");
		$type = $request->file("foto_toko")->getClientOriginalExtension();
		$file_upload = $toko_id.".".$type;
		\Storage::disk('public')->put('img/toko/'.$jenis_mitra.'/'.$file_upload, file_get_contents($files));
		$toko->foto = $file_upload;
		if ($jenis_mitra == 'premium'){
			$toko->deskripsi = $request->deskripsi;
			$toko->status = "Belum lengkap";			
		}
		else {
			$toko->status = "Tidak Aktif";			
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
		if ($jenis_mitra == 'premium'){
			return redirect('/akun?daftar_mitra_premium=success');
		}
		else {
			return redirect('/akun?daftar_mitra=success');			
		}
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





}
