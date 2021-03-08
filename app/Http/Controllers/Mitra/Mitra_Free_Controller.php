<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Kategori_toko;
use App\Models\Foto_maps;
use App\Models\kelurahan;
use App\Models\Kategori;
use App\Models\Kategorinya_toko;
use App\Models\toko;
use App\Models\Daftar_tunggu_toko;
use App\Models\Jadwal_toko;
use App\Models\Ktp_toko;



class Mitra_Free_Controller extends Controller
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

		$kelurahan = kelurahan::all();

		$toko = toko::where('users_id', Session::get('id_user'))->first();

		if($toko){

			$jadwal_toko = Jadwal_toko::where('toko_id', $toko->id)->get();

			$foto_1 = Foto_maps::where('toko_id', $toko->id)->where('no_foto','1')->first();
			$foto_2 = Foto_maps::where('toko_id', $toko->id)->where('no_foto','2')->first();
			$foto_3 = Foto_maps::where('toko_id', $toko->id)->where('no_foto','3')->first();

			$kategorinya_toko = Kategorinya_toko::where('toko_id', $toko->id)->get();

			// dd($foto_1);

			return view('users/user/m-mitra/free/index_free', [
				'daftar_kategori'=>$kategori,
				'toko'=>$toko, 
				'jadwal'=>$jadwal_toko,
				'kelurahan'=>$kelurahan,
				'foto_1'=> $foto_1,
				'foto_2' => $foto_2,
				'foto_3' => $foto_3,
				'status_upgrade'=>'ya',
				'kategorinya_toko'=>$kategorinya_toko
			]);

		}
		else{

			$daftar_tunggu = Daftar_tunggu_toko::where('users_id', Session::get('id_user'))->first();
			$jadwal_toko = Jadwal_toko::where('toko_id', $daftar_tunggu->toko_id)->get();

			$foto_1 = Foto_maps::where('toko_id', $daftar_tunggu->toko_id)->where('no_foto','1')->first();
			$foto_2 = Foto_maps::where('toko_id', $daftar_tunggu->toko_id)->where('no_foto','2')->first();
			$foto_3 = Foto_maps::where('toko_id', $daftar_tunggu->toko_id)->where('no_foto','3')->first();


            // dd($foto_maps);
            // dd($jadwal_toko);

			return view('users/user/m-mitra/free/index_free', [
				'daftar_kategori'=>$kategori,
				'toko'=>$daftar_tunggu, 
				'jadwal'=>$jadwal_toko,
				'kelurahan'=>$kelurahan,
				'foto_1'=> $foto_1,
				'foto_2' => $foto_2,
				'foto_3' => $foto_3
			]);

		}

	}

	public function simpan_data_free(Request $request){
        // dd($request->all());
		$this->validate($request,[
			'nama_toko' => 'required',
			'no_hp' => 'required',
			'jadwal_hari' => 'required',
			'jadwal_buka' => 'required',
			'jadwal_tutup' => 'required',
			'alamat' => 'required',
		]);

		$toko = toko::where('users_id', Session::get('id_user'))->first();
		if($toko){
			$toko->nama_toko = $request->nama_toko;
			$toko->kategori_toko_id = $request->kategori_toko;
			$toko->no_hp = $request->no_hp;
			$toko->alamat = $request->alamat;
			$toko->kelurahan_id = $request->kelurahan;
			$toko->save();

			$toko_id = $toko->id;

		}
		else{

			$toko = Daftar_tunggu_toko::where('users_id', Session::get('id_user'))->first();
			$toko->nama_toko = $request->nama_toko;
			$toko->kategori_toko_id = $request->kategori_toko;
			$toko->no_hp = $request->no_hp;
			$toko->alamat = $request->alamat;
			$toko->kelurahan_id = $request->kelurahan;
			$toko->save();
			
			$toko_id = $toko->toko_id;
		}

		if($request->file("foto_toko_1")){

			$foto = Foto_maps::where('id', $request->id_foto_toko_1)->first();
			if(is_null($foto)){
				$foto = new Foto_maps;
				$foto->toko_id = $toko_id;
			}
			else{
				\Storage::disk('public')->delete('img/toko/'.$toko_id.'/maps/'.$foto->foto);
			}
			$files = $request->file("foto_toko_1");
			$type = $request->file("foto_toko_1")->getClientOriginalExtension();
			$file_upload = $this->autocode('IMG').".".$type;
			\Storage::disk('public')->put('img/toko/'.$toko_id.'/maps/'.$file_upload, file_get_contents($files));
			$foto->foto = $file_upload;
			$foto->no_foto = "1";
			$foto->save();
		}

		if($request->file("foto_toko_2")){
			
			$foto = Foto_maps::where('id', $request->id_foto_toko_2)->first();
			if(is_null($foto)){
				$foto = new Foto_maps;
				$foto->toko_id = $toko_id;
			}
			else{
				\Storage::disk('public')->delete('img/toko/'.$toko_id.'/maps/'.$foto->foto);
			}
			$files = $request->file("foto_toko_2");
			$type = $request->file("foto_toko_2")->getClientOriginalExtension();
			$file_upload = $this->autocode('IMG').".".$type;
			\Storage::disk('public')->put('img/toko/'.$toko_id.'/maps/'.$file_upload, file_get_contents($files));
			$foto->foto = $file_upload;
			$foto->no_foto = "2";
			$foto->save();
		}

		if($request->file("foto_toko_3")){

			$foto = Foto_maps::where('id', $request->id_foto_toko_3)->first();
			if(is_null($foto)){
				$foto = new Foto_maps;
				$foto->toko_id = $toko_id;
			}
			else{
				\Storage::disk('public')->delete('img/toko/'.$toko_id.'/maps/'.$foto->foto);
			}
			$files = $request->file("foto_toko_3");
			$type = $request->file("foto_toko_3")->getClientOriginalExtension();
			$file_upload = $this->autocode('IMG').".".$type;
			\Storage::disk('public')->put('img/toko/'.$toko_id.'/maps/'.$file_upload, file_get_contents($files));
			$foto->foto = $file_upload;
			$foto->no_foto = "3";
			$foto->save();
		}


		$hapus_jadwal = Jadwal_toko::where('toko_id', $toko_id)->delete();

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

		Kategorinya_toko::where('toko_id', $toko_id)->delete();
		$kategori_toko = explode('~', $request->get('input_id_kategori'));
		for ($i = 0; $i < count($kategori_toko); $i++){
			$db = new Kategorinya_toko;
			$db->toko_id = $toko_id;
			$db->kategori_toko_id = $kategori_toko[$i];
			$db->save();
		}
		$notification = array(
			'message' => 'Data Toko Berhasil Diperbarui'
		);     

		return redirect()->back()->with($notification);


	}

	public function atur_lokasi(){
		$toko = toko::where('users_id', Session::get('id_user'))->first();
		return view('users/user/m-mitra/free/pilih_lokasi_free', ['toko'=>$toko]);
	}

	public function simpan_lokasi(Request $request){

		// dd($request->all());

		$toko = toko::where('users_id', Session::get('id_user'))->first();

		if($toko){

			$toko->latitude = $request->latitude;
			$toko->longitude = $request->longitude;
			$toko->save();

		}
		else{

			$toko = Daftar_tunggu_toko::where('users_id', Session::get('id_user'))->first();
			$toko->latitude = $request->latitude;
			$toko->longitude = $request->longitude;
			$toko->save();
		}


		$notification = array(
			'message' => 'Lokasi Berhasil Diperbarui'
		);     

		return redirect('/akun/mitra/free')->with($notification);
	}

	public function upgrade_premium(){

		$daftar_kategori = Kategori_toko::all();
		$kelurahan = kelurahan::all();

		$toko = toko::where('users_id', Session::get('id_user'))->first();
		if($toko){

			$jadwal = Jadwal_toko::where('toko_id', $toko->id)->get();
			$foto_toko = Foto_maps::where('toko_id', $toko->id)->get();
		}
		else{

			$toko = Daftar_tunggu_toko::where('users_id', Session::get('id_user'))->first();
			$jadwal = Jadwal_toko::where('toko_id', $toko->toko_id)->get();
			$foto_toko = Foto_maps::where('toko_id', $toko->toko_id)->get();
		}
		$kategorinya_toko = Kategorinya_toko::where('toko_id', $toko->id)->get();

		return view('users/user/m-mitra/free/upgrade_premium', compact('daftar_kategori','kelurahan','toko','jadwal','foto_toko', 'kategorinya_toko'));
	}

	public function simpan_upgrade_premium(Request $request){

		// dd($request->all());

		$this->validate($request,[
			'nama_toko' => 'required',
			// 'kategori_toko' => 'required',
			'no_hp' => 'required',
			'jadwal_hari' => 'required',
			'jadwal_buka' => 'required',
			'jadwal_tutup' => 'required',
			'alamat' => 'required',
			'deskripsi' => 'required'
		]);


		$old_toko = toko::where('users_id', Session::get('id_user'))->first();

		if($old_toko){

			$toko = new Daftar_tunggu_toko;
			$toko->nama_toko = $request->nama_toko;
			$toko->users_id = Session::get('id_user');
			$toko->toko_id = $old_toko->id;
			$toko->jenis_mitra = "premium";
			$toko->kategori_toko_id = $request->kategori_toko;
			$toko->no_hp = $request->no_hp;
			$toko->alamat = $request->alamat;
			$toko->kelurahan_id = $request->kelurahan;
			$toko->deskripsi = $request->deskripsi;
			$toko->latitude = $old_toko->latitude;
			$toko->longitude = $old_toko->longitude;

			if($request->file("foto_toko")){

				$files = $request->file("foto_toko");
				$type = $request->file("foto_toko")->getClientOriginalExtension();
				$file_upload = $this->autocode('Logo').".".$type;
				\Storage::disk('public')->put('img/toko/'.$old_toko->id.'/logo/'.$file_upload, file_get_contents($files));
				$toko->logo_toko = $file_upload;
			}
			$toko->save();

			$toko_id = $old_toko->id;

		}
		else{

			$toko = Daftar_tunggu_toko::where('users_id', Session::get('id_user'))->first();;
			$toko->nama_toko = $request->nama_toko;
			$toko->users_id = Session::get('id_user');
			$toko->jenis_mitra = "premium";
			$toko->kategori_toko_id = $request->kategori_toko;
			$toko->no_hp = $request->no_hp;
			$toko->alamat = $request->alamat;
			$toko->kelurahan_id = $request->kelurahan;
			$toko->deskripsi = $request->deskripsi;

			if($request->file("foto_toko")){

				$files = $request->file("foto_toko");
				$type = $request->file("foto_toko")->getClientOriginalExtension();
				$file_upload = $this->autocode('Logo').".".$type;
				\Storage::disk('public')->put('img/toko/'.$toko->toko_id.'/logo/'.$file_upload, file_get_contents($files));
				$toko->logo_toko = $file_upload;
			}
			$toko->save();

			$toko_id = $toko->toko_id;

		}

		if($request->file("foto_toko_1")){

			$foto = Foto_maps::where('id', $request->id_foto_toko_1)->first();
			if(is_null($foto)){
				$foto = new Foto_maps;
				$foto->toko_id = $toko_id;
			}
			else{
				\Storage::disk('public')->delete('img/toko/'.$toko_id.'/maps/'.$foto->foto);
			}
			$files = $request->file("foto_toko_1");
			$type = $request->file("foto_toko_1")->getClientOriginalExtension();
			$file_upload = $this->autocode('IMG').".".$type;
			\Storage::disk('public')->put('img/toko/'.$toko_id.'/maps/'.$file_upload, file_get_contents($files));
			$foto->foto = $file_upload;
			$foto->no_foto = "1";
			$foto->save();
		}


		if($request->file("foto_toko_2")){
			
			$foto = Foto_maps::where('id', $request->id_foto_toko_2)->first();
			if(is_null($foto)){
				$foto = new Foto_maps;
				$foto->toko_id = $toko_id;
			}
			else{
				\Storage::disk('public')->delete('img/toko/'.$toko_id.'/maps/'.$foto->foto);
			}
			$files = $request->file("foto_toko_2");
			$type = $request->file("foto_toko_2")->getClientOriginalExtension();
			$file_upload = $this->autocode('IMG').".".$type;
			\Storage::disk('public')->put('img/toko/'.$toko_id.'/maps/'.$file_upload, file_get_contents($files));
			$foto->foto = $file_upload;
			$foto->no_foto = "2";
			$foto->save();
		}

		if($request->file("foto_toko_3")){

			$foto = Foto_maps::where('id', $request->id_foto_toko_3)->first();
			if(is_null($foto)){
				$foto = new Foto_maps;
				$foto->toko_id = $toko_id;
			}
			else{
				\Storage::disk('public')->delete('img/toko/'.$toko_id.'/maps/'.$foto->foto);
			}
			$files = $request->file("foto_toko_3");
			$type = $request->file("foto_toko_3")->getClientOriginalExtension();
			$file_upload = $this->autocode('IMG').".".$type;
			\Storage::disk('public')->put('img/toko/'.$toko_id.'/maps/'.$file_upload, file_get_contents($files));
			$foto->foto = $file_upload;
			$foto->no_foto = "3";
			$foto->save();
		}

		$hapus_jadwal = Jadwal_toko::where('toko_id', $toko_id)->delete();

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

		Kategorinya_toko::where('toko_id', $toko_id)->delete();
		$kategori_toko = explode('~', $request->get('input_id_kategori'));
		for ($i = 0; $i < count($kategori_toko); $i++){
			$db = new Kategorinya_toko;
			$db->toko_id = $toko_id;
			$db->kategori_toko_id = $kategori_toko[$i];
			$db->save();
		}
		return redirect('/akun/mitra/free/upgrade-premium/upload-ktp');

		
	}

	public function upgrade_atur_lokasi(){
		$toko = toko::where('users_id', Session::get('id_user'))->first();
		return view('users/user/m-mitra/free/pilih_lokasi_premium', ['toko'=>$toko]);
	}

	public function batalkan_upgrade(){
		$toko = toko::where('users_id', Session::get('id_user'))->first();
		Ktp_toko::where('toko_id', $toko->id)->delete();		
		Daftar_tunggu_toko::where('toko_id', $toko->id)->delete();
		$notification = array(
			'message' => 'Batal Upgrade',
			'jenis_mitra' => $toko->jenis_mitra
		);    
		return redirect('/akun')->with($notification);		
	}

	public function upgrade_kirim_lokasi(){
		$toko = toko::where('users_id', Session::get('id_user'))->first();
		$toko->latitude = 1;
		$toko->longitude = 1;
		$toko->save();  
		return redirect("https://api.whatsapp.com/send?phone=6285156100849&text=Saya%20Tidak%20Menemukan%20Lokasi%20Saya");     
	}

	public function kirim_lokasi(){
		$toko = toko::where('users_id', Session::get('id_user'))->first();
		$toko->latitude = 1;
		$toko->longitude = 1;
		$toko->save();  
		return redirect("https://api.whatsapp.com/send?phone=6285156100849&text=Saya%20Tidak%20Menemukan%20Lokasi%20Saya");     
	}

	public function upgrade_simpan_lokasi(Request $request){

		// dd($request->all());
		$toko = toko::where('users_id', Session::get('id_user'))->first();
		$toko->latitude = $request->latitude;
		$toko->longitude = $request->longitude;
		$toko->save();

		return redirect('/akun/mitra/free/upgrade-premium');
	}

	public function upgrade_upload_ktp(){

		return view('users/user/m-mitra/register/register_nik');

	}

	public function upgrade_simpan_ktp(Request $request){

        // dd($request->all());

		$this->validate($request,[
			'nama_ktp' => 'required',
			'no_nik' => 'required',
			'foto_toko' => 'required'
		]);

		$toko = Daftar_tunggu_toko::where('users_id', Session::get('id_user'))->first();

		$ktp = new Ktp_toko;
		$ktp->toko_id = $toko->toko_id;
		$ktp->nama = $request->nama_ktp;
		$ktp->nik = $request->no_nik;

		$files = $request->file("foto_toko");
		$type = $request->file("foto_toko")->getClientOriginalExtension();
		$file_upload = $this->autocode('KTP-').".".$type;
		\Storage::disk('public')->put('img/toko/'.$toko->toko_id.'/ktp/'.$file_upload, file_get_contents($files));
		$ktp->foto = $file_upload;

		$ktp->save();

		$notification = array(
			'message' => 'Belum Terverifikasi Upgrade',
			'jenis_mitra' => $toko->jenis_mitra
		);   

		return redirect('/akun')->with($notification);


	}
}
