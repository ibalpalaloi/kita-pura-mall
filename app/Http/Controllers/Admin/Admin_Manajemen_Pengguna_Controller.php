<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kategori_toko;
use App\Models\Provinsi;
use App\Models\Toko;
use App\Models\Daftar_tunggu_toko;
use App\Models\Jadwal_toko;
use App\Models\Kategorinya_toko;

class Admin_Manajemen_Pengguna_Controller extends Controller
{
    //
    public function autocode($kode){
		$timestamp = time(); 
		$random = rand(10, 100);
		$current_date = date('mdYs'.$random, $timestamp); 
		return $kode.$current_date;
	}

    public function index(){
        $user = User::where('level_akses', 'user')->get();
        return view('users/admin/m-pengguna/index', ['user'=>$user]);
    }

    public function ubah_password(Request $request){
        $user = User::where('no_hp', $request->no_hp)->first();
        $user->password = bcrypt($request->password_baru);
        $user->save();

        return redirect('/admin/manajemen/pengguna');
    }

    public function hapus_pengguna($id){
        User::where('id', $id)->delete();
        return redirect('/admin/manajemen/pengguna');
    }

    public function detail_pengguna($id){
        $user = User::where('id', $id)->first();
        return view('users/admin/m-pengguna/detail_user', ['user'=>$user]);
    }

    public function buat_toko($id){
        // $toko = Toko::where('users_id', $id)->first();
        // $daftar_tunggu_toko = Daftar_tunggu_toko::where('users_id', $id)->first();
        // if($toko){
        //     return redirect()->back();
        // }
        // if($daftar_tunggu_toko){
        //     return redirect()->back();
        // }
        $kategori = Kategori_toko::all();
        $kota = Provinsi::find(72)->kabupaten_kota;
        return view('users.admin.m-pengguna.buat_toko', ['daftar_kategori'=>$kategori,'kota'=>$kota, 'id'=>$id]);
    }

    public function post_buat_toko(Request $request, $id){
        $this->validate($request,[
			'nama_toko' => 'required',
			// 'username' => 'required',
			'no_hp' => 'required',
			'jadwal_hari' => 'required',
			'jadwal_buka' => 'required',
			'jadwal_tutup' => 'required',
			'alamat' => 'required'
		]);
        Toko::where('users_id', $id)->delete();
        $username = $this->get_username($request->nama_toko);
        $toko_id = $this->autocode('TK-');
        $toko = new Toko;
        $toko->id = $toko_id;
        $toko->nama_toko = $request->nama_toko;
        $toko->username = $username;
        $toko->users_id = $id;
        $toko->jenis_mitra = "premium";
        $toko->nama_pemilik = "";
        $toko->no_hp = $this->generate_no_telp($request->no_hp);
        $toko->alamat = $request->alamat;
        $toko->kelurahan_id = $request->kelurahan;
        $toko->latitude = $request->latitude;
        $toko->longitude = $request->longitude;
        $toko->status = "Aktif";
        $toko->deskripsi = $request->deskripsi;
        $toko->notif = "0";
        $toko->save();

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

        return redirect('/admin/manajemen/detail_pengguna/'.$id);
    }

    public function get_username($nama_toko){
        $jumlah_kata = str_word_count($nama_toko);
        // 1
        if($jumlah_kata == 1){
            $username = $nama_toko;
            $toko = Toko::where('username', $username)->get();
            if(count($toko)==0){
                return $username;
            }
            $angka = 1;
            $bool = "false";
            while($bool == "false"){
                $username = $nama_toko.$angka;
                $toko = Toko::where('username', $username)->get();
                if(count($toko)==0){
                    return $username;
                    $bool = "true";
                }
                else{
                    $angka++;
                }
            }
        }
        // 2
        $username = str_replace(' ', '_', $nama_toko);
        $toko = Toko::where('username', $username)->get();
        if(count($toko)==0){
            return $username;
        }
        $username = str_replace(' ', '', $nama_toko);
        $toko = Toko::where('username', $username)->get();
        if(count($toko)==0){
            return $username;
        }

        $angka = 1;
        $bool = "false";
        while($bool == "false"){
            $username = $username.$angka;
            $toko = Toko::where('username', $username)->get();
            if(count($toko)==0){
                return $username;
                $bool = "true";
            }
            else{
                $angka++;
            }
        }
    }

    public function generate_no_telp($no_hp){
        $no_telp = $no_hp;
        $no_telp = str_replace("-","", $no_telp);
        $no_telp = str_replace(" ","", $no_telp);
        if ($no_telp[0] == 0){
            $no_telp = substr($no_telp, 1);
        }
        $no_telp = substr_replace($no_telp, "+62", 0, 0);

        return $no_telp;
    }

}
