<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Kategori_toko;
use App\Models\Foto_maps;
use App\Models\kelurahan;
use App\Models\Kategori;
use App\Models\toko;
use App\Models\Daftar_tunggu_toko;
use App\Models\product;
use App\Models\Jadwal_toko;
use App\Models\Ktp_toko;



class Mitra_Premium_Controller extends Controller
{
    //


	public function autocode($kode){
		$timestamp = time(); 
		$random = rand(10, 100);
		$current_date = date('mdYs'.$random, $timestamp); 
		return $kode.$current_date;
	}


	public function index_premium(){

		$toko = toko::where('users_id', Session::get('id_user'))->first();

		if($toko){

			$ktp = Ktp_toko::where('toko_id', $toko->id)->first();
			if($ktp){

				return view('users/user/m-mitra/premium/index_premium');
			}
			else{

				$notification = array(
					'message' => 'KTP Belum Lengkap'
				 );     
		
				return redirect('/akun/')->with($notification);
			}

		}

		else{

			$daftar_kategori = Kategori_toko::all();
			$kelurahan = kelurahan::all();
			$toko = Daftar_tunggu_toko::where('users_id', Session::get('id_user'))->first();
			$jadwal = Jadwal_toko::where('toko_id', $toko->toko_id)->get();
			$foto_toko = Foto_maps::where('toko_id', $toko->toko_id)->get();

			return view('users/user/m-mitra/free/upgrade_premium', compact('daftar_kategori','kelurahan','toko','jadwal','foto_toko'));
		}

	}

	
	public function upload_ktp(){

		return view('users/user/m-mitra/premium/register_nik');

    }

    public function simpan_ktp(Request $request){

        // dd($request->all());

        $this->validate($request,[
			'nama_ktp' => 'required',
			'no_nik' => 'required',
			'foto_toko' => 'required'
		]);

		$toko = Toko::where('users_id', Session::get('id_user'))->first();
		if($toko){
			$toko_id = $toko->id;
		}
		else{
			$toko = Daftar_tunggu_toko::where('users_id', Session::get('id_user'))->first();
			$toko_id = $toko->toko_id;
		}

        $ktp = new Ktp_toko;
		$ktp->toko_id = $toko_id;
		$ktp->nama = $request->nama_ktp;
		$ktp->nik = $request->no_nik;
        $files = $request->file("foto_toko");
        $type = $request->file("foto_toko")->getClientOriginalExtension();
        $file_upload = $this->autocode('KTP-').".".$type;
        \Storage::disk('public')->put('img/toko/'.$toko_id.'/ktp/'.$file_upload, file_get_contents($files));
        $ktp->foto = $file_upload;
		
        $ktp->save();

        $notification = array(
            'message' => 'Belum Terverifikasi',
            'jenis_mitra' => $toko->jenis_mitra
        );     

        return redirect('/akun')->with($notification);
    }

	public function simpan_data_premium(Request $request){

		// dd($request->all());

		$this->validate($request,[
			'nama_toko' => 'required',
			'kategori_toko' => 'required',
			'no_hp' => 'required',
			'jadwal_hari' => 'required',
			'jadwal_buka' => 'required',
			'jadwal_tutup' => 'required',
			'alamat' => 'required',
			'kelurahan' => 'required',
			'deskripsi' => 'required'
		]);

		$toko = toko::where('users_id', Session::get('id_user'))->first();

		if($toko){

			$toko->nama_toko = $request->nama_toko;
			$toko->kategori_toko_id = $request->kategori_toko;
			$toko->no_hp = $request->no_hp;
			$toko->alamat = $request->alamat;
			$toko->kelurahan_id = $request->kelurahan;
			$toko->deskripsi = $request->deskripsi;
			if($request->file("foto_toko")){
				$files = $request->file("foto_toko");
				$type = $request->file("foto_toko")->getClientOriginalExtension();
				$file_upload = $toko->id.".".$type;
				\Storage::disk('public')->put('img/toko/'.$toko->id.'/logo/'.$file_upload, file_get_contents($files));
			}
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
			$toko->deskripsi = $request->deskripsi;
			if($request->file("foto_toko")){
				$files = $request->file("foto_toko");
				$type = $request->file("foto_toko")->getClientOriginalExtension();
				$file_upload = $toko->id.".".$type;
				\Storage::disk('public')->put('img/toko/'.$toko->toko_id.'/logo/'.$file_upload, file_get_contents($files));
			}
			$toko->save();


			$toko_id = $toko->toko_id;
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
		$kelurahan = kelurahan::all();
		$toko = toko::where('users_id', Session::get('id_user'))->first();
		$jadwal = Jadwal_toko::where('toko_id', $toko->id)->get();

		return view('users/user/m-mitra/premium/atur_toko', ['daftar_kategori'=>$kategori,'kelurahan'=>$kelurahan ,'toko'=>$toko,'jadwal'=>$jadwal]);
	}

	public function atur_lokasi(){

		return view('users/user/m-mitra/premium/pilih_lokasi_premium');
	}

	public function simpan_lokasi(Request $request){

		// dd($request->all());

		$toko = toko::where('users_id', Session::get('id_user'))->first();
        $toko->latitude = $request->latitude;
        $toko->longitude = $request->longitude;
        $toko->save();

	
		$notification = array(
			'message' => 'Lokasi Berhasil Diperbarui'
		);     

		return redirect('/akun/mitra/premium/atur-toko')->with($notification);
	}

}
