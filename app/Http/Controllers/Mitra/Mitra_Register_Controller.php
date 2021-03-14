<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Kategori_toko;
use App\Models\Kategorinya_toko;
use App\Models\Foto_maps;
use App\Models\kelurahan;
use App\Models\Kategori;
use App\Models\toko;
use App\Models\Daftar_tunggu_toko;
use App\Models\product;
use App\Models\Jadwal_toko;
use App\Models\Ktp_toko;


class Mitra_Register_Controller extends Controller
{
    public function autocode($kode){
		$timestamp = time(); 
		$random = rand(10, 100);
		$current_date = date('mdYs'.$random, $timestamp); 
		return $kode.$current_date;
	}
    //
    public function jadi_mitra(){

		return view('users/user/m-mitra/register/jadi_mitra');
		
	}

	public function register($mitra){

		$kategori = Kategori_toko::all();

		$kelurahan = kelurahan::all();
		// dd($kategori);

		if ($mitra == 'free'){

			return view('users/user/m-mitra/register/register_free', ['daftar_kategori'=>$kategori,'kelurahan'=>$kelurahan]);
			
		}
		else {

			return view('users/user/m-mitra/register/register_premium', ['daftar_kategori'=>$kategori,'kelurahan'=>$kelurahan]);
			
		}
	}
	

    public function kirim_lokasi(){
        $toko = Daftar_tunggu_toko::where('users_id', Session::get('id_user'))->first();
        $toko->latitude = 1;
        $toko->longitude = 1;
        $toko->save();  
        return redirect("https://api.whatsapp.com/send?phone=6285156100849&text=Saya%20Tidak%20Menemukan%20Lokasi%20Saya");     
    }

	public function simpan_mitra(Request $request, $jenis_mitra){

		// dd($request->all());

		$this->validate($request,[
			'nama_toko' => 'required',
			// 'username' => 'required',
			'no_hp' => 'required',
			'jadwal_hari' => 'required',
			'jadwal_buka' => 'required',
			'jadwal_tutup' => 'required',
			'alamat' => 'required'
		]);
		
		if ($jenis_mitra == 'premium'){
			$this->validate($request,[
                'deskripsi' => 'required',
				'username' => 'required|unique:toko'
			]);
		};
        Daftar_tunggu_toko::where('users_id', Session::get('id_user'))->delete();

		$toko_id = $this->autocode('TK-');
		// @Tambah Toko
		if ($request->username == ''){
            $username = $this->autocode('MITRA_');
        }
        else {
            $username = $request->username;
        }
        $toko = new Daftar_tunggu_toko;
		$toko->toko_id = $toko_id;
        $toko->username = $username;
		$toko->users_id = Session::get('id_user');
		$toko->jenis_mitra = $jenis_mitra;
		$toko->kategori_toko_id = $request->kategori_toko;
		$toko->nama_toko = $request->nama_toko;
		$toko->no_hp = $request->no_hp;
		$toko->alamat = $request->alamat;
		$toko->kelurahan_id = $request->kelurahan;
        // @Tambah Foto
        if($jenis_mitra == 'free'){

            if($request->file("foto_toko_1")){
			
                $foto = new Foto_maps;
                $files = $request->file("foto_toko_1");
                $type = $request->file("foto_toko_1")->getClientOriginalExtension();
                $file_upload = $this->autocode('IMG').".".$type;
                \Storage::disk('public')->put('img/toko/'.$toko_id.'/maps/'.$file_upload, file_get_contents($files));
                $foto->toko_id = $toko_id;
                $foto->foto = $file_upload;
                $foto->no_foto = "1";
                $foto->save();
            }
            if($request->file("foto_toko_2")){
                
                $foto = new Foto_maps;
                $files = $request->file("foto_toko_2");
                $type = $request->file("foto_toko_2")->getClientOriginalExtension();
                $file_upload = $this->autocode('IMG').".".$type;
                \Storage::disk('public')->put('img/toko/'.$toko_id.'/maps/'.$file_upload, file_get_contents($files));
    
                $foto->toko_id = $toko_id;
                $foto->foto = $file_upload;
                $foto->no_foto = "2";
                $foto->save();
            }
            if($request->file("foto_toko_3")){
                
                $foto = new Foto_maps;
                $files = $request->file("foto_toko_3");
                $type = $request->file("foto_toko_3")->getClientOriginalExtension();
                $file_upload = $this->autocode('IMG').".".$type;
                \Storage::disk('public')->put('img/toko/'.$toko_id.'/maps/'.$file_upload, file_get_contents($files));
                $foto->toko_id = $toko_id;
                $foto->foto = $file_upload;
                $foto->no_foto = "3";
                $foto->save();
            }

        }
        else{

            $toko->deskripsi = $request->deskripsi;

            if($request->file("foto_toko")){

                $files = $request->file("foto_toko");
                $type = $request->file("foto_toko")->getClientOriginalExtension();
                $file_upload = $this->autocode('Logo').".".$type;
                \Storage::disk('public')->put('img/toko/'.$toko_id.'/logo/'.$file_upload, file_get_contents($files));

                $toko->logo_toko = $file_upload;
            }
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
        // @Tambah Kategornya toko
        $kategori_toko = explode('~', $request->get('input_id_kategori'));
        for ($i = 0; $i < count($kategori_toko); $i++){
            $db = new Kategorinya_toko;
            $db->toko_id = $toko_id;
            $db->kategori_toko_id = $kategori_toko[$i];
            $db->save();
        }

		return redirect('/akun/jadi-mitra/'.$jenis_mitra.'/pilih-lokasi');
	}

	public function pilih_lokasi($jenis_mitra){
        $daftar_tunggu = Daftar_tunggu_toko::where('users_id', Session::get('id_user'))->first();
        if (($daftar_tunggu->latitude == null) && ($daftar_tunggu->longitude == null)){
            if ($jenis_mitra == 'free'){
                return view('users/user/m-mitra/register/pilih_lokasi_free');

            }
            else {
                return view('users/user/m-mitra/register/pilih_lokasi_premium');            
            }
        }     
        $notification = array(
            'message' => 'Belum Terverifikasi',
            'jenis_mitra' => $jenis_mitra
        );     
        return redirect('akun')->with($notification);

	}

    public function simpan_lokasi($jenis_mitra, Request $request){

        // dd($request->all());
		$daftar_tunggu = Daftar_tunggu_toko::where('users_id', Session::get('id_user'))->first();
        $daftar_tunggu->latitude = $request->latitude;
        $daftar_tunggu->longitude = $request->longitude;
        $daftar_tunggu->save();

        $notification = array(
            'message' => 'Belum Terverifikasi',
            'jenis_mitra' => $jenis_mitra
        );     

        return redirect('/akun')->with($notification);
    }

    public function selesai($jenis_mitra){

        if ($jenis_mitra == 'premium'){
            return redirect('/home/halaman_tunggu');
            // return redirect('/akun/jadi-mitra/'.$jenis_mitra.'/upload-ktp');
        }
        else{

            $notification = array(
                'message' => 'Belum Terverifikasi',
                'jenis_mitra' => $jenis_mitra
            );     
    
            return redirect('/akun')->with($notification);
        }
    }

    public function upload_ktp(){

		return view('users/user/m-mitra/register/register_nik');

    }

    public function simpan_ktp($jenis_mitra, Request $request){

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
            'message' => 'Belum Terverifikasi',
            'jenis_mitra' => $jenis_mitra
        );     

        return redirect('/akun')->with($notification);


    }
}
