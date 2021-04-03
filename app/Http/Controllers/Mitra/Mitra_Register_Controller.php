<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Kategori_toko;
use App\Models\Kategorinya_toko;
use App\Models\Foto_maps;
use App\Models\Provinsi;
use App\Models\Kabupaten_kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Kategori;
use App\Models\toko;
use App\Models\Daftar_tunggu_toko;
use App\Models\product;
use App\Models\Jadwal_toko;
use App\Models\Ktp_toko;
use File;
// use App\Models\PRovins


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

    public function register_redirect($mitra){
        return redirect('akun/jadi-mitra/'.$mitra."/tambah");
    }

	public function register($mitra){

		$kategori = Kategori_toko::all();
        $kota = Provinsi::find(72)->kabupaten_kota;
        // dd($kota);
		// $kelurahan = Kelurahan::all();

		if ($mitra == 'free'){

			return view('users/user/m-mitra/register/register_free', ['daftar_kategori'=>$kategori,'kelurahan'=>$kelurahan, 'kota'=>$kota]);
			
		}
		else {

			return view('users/user/m-mitra/register/register_premium', ['daftar_kategori'=>$kategori,'kota'=>$kota]);
			
		}
	}
	

    public function kirim_lokasi(){
        $toko = Daftar_tunggu_toko::where('users_id', Auth()->User()->id)->first();
        $toko->latitude = 1;
        $toko->longitude = 1;
        $toko->save();  
        return redirect("https://api.whatsapp.com/send?phone=6285156100849&text=Saya%20Tidak%20Menemukan%20Lokasi%20Saya");     
    }

	public function simpan_mitra(Request $request, $jenis_mitra){

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
        Daftar_tunggu_toko::where('users_id', Auth()->User()->id)->delete();

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
		$toko->users_id = Auth()->User()->id;
		$toko->jenis_mitra = $jenis_mitra;
		$toko->kategori_toko_id = $request->kategori_toko;
		$toko->nama_toko = $request->nama_toko;
            $no_telp = $request->no_hp;
            if ($no_telp[0] == 0){
                $no_telp = substr($no_telp, 1);
            }
            $no_telp = substr_replace($no_telp, "+62", 0, 0);
            $toko->no_hp = $no_telp;
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


                $image_path_ori = "img/toko/$toko_id/logo/original/$request->nama_foto_temp";
                $image_path_400x400 = "img/toko/$toko_id/logo/400x400/$request->nama_foto_temp";
                $image_path_200x200 = "img/toko/$toko_id/logo/200x200/$request->nama_foto_temp";

                \Storage::disk('public')->put($image_path_ori, file_get_contents($files));
                \Storage::disk('public')->put($image_path_400x400, file_get_contents($files));
                \Storage::disk('public')->put($image_path_200x200, file_get_contents($files));

                \File::delete("public/$image_path_400x400");            
                \File::delete("public/$image_path_200x200");            

                File::move(public_path('img/temp_produk/400x400/'.$request->nama_foto_temp), public_path($image_path_400x400));
                File::move(public_path('img/temp_produk/200x200/'.$request->nama_foto_temp), public_path($image_path_200x200));

                $toko->logo_toko = $request->nama_foto_temp;    

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
        $this->notif_telegram($request->nama_toko, $request->no_hp, Auth()->user()->no_hp);

		return redirect('/akun/jadi-mitra/'.$jenis_mitra.'/pilih-lokasi');
	}

    public function simpan_foto_register(Request $request){
        $image = $request->image;
        $size = $request->size;
        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name= $request->nama.'.png';
        $toko = toko::where('users_id', Session::get('id_user'))->first();
        \Storage::disk('public')->put("img/temp_produk/".$size."/".$image_name, file_get_contents($request->image));
        $image_path = url('/')."/public/img/temp_produk/".$size."/$image_name";
        echo $image_name;
    }

	public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    public function pilih_lokasi($jenis_mitra){
        $daftar_tunggu = Daftar_tunggu_toko::where('users_id', Auth()->User()->id)->first();
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

    public function notif_telegram($nama_toko, $nomor_hp, $nomor_login){
        $founder = [894149404, 508980088, 1766032289];
        for ($i = 0; $i < count($founder); $i++){
            $token = "1732361789:AAFvHgC5XYNODxYqLt-YTZK4x5XGE-VH9Vg";
            $user_id = $founder[$i];
            $mesg = "--- DAFTAR BARU ----<br>Halo admin kitapuramall!!, toko $nama_toko telah mendaftar loh, harap segara di konfirmasi, biar dia tidak meraju...Nomor HP tokonya adalah $nomor_hp.. Nomor Loginnya : $nomor_login";
            $request_params = [
                'chat_id' => $user_id,
                'text' => $mesg
            ];
            $request_url = 'https://api.telegram.org/bot'.$token.'/sendMessage?'.http_build_query($request_params);
            file_get_contents($request_url);    

        }
    }    

    public function simpan_lokasi($jenis_mitra, Request $request){

        // dd($request->all());
		$daftar_tunggu = Daftar_tunggu_toko::where('users_id', Auth()->User()->id)->first();
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
        $notification = array(
            'message' => 'Belum Terverifikasi',
            'jenis_mitra' => $jenis_mitra
        ); 

        if ($jenis_mitra == 'premium'){
            return redirect('/akun')->with($notification);
            // return redirect('/akun/jadi-mitra/'.$jenis_mitra.'/upload-ktp');
        }
        else{
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

		$toko = Daftar_tunggu_toko::where('users_id', Auth()->User()->id)->first();

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
