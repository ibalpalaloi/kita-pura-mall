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
    public function index_premium(){

		$toko = toko::where('users_id', Session::get('id_user'))->first();

		if($toko){

			$ktp = Ktp_toko::where('toko_id', $toko->id)->first();
			if($ktp){

				return view('users/user/m-mitra/index_premium');
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
			$jadwal = Jadwal_toko::where('toko_id', $toko->id)->get();
			$foto_toko = Foto_maps::where('toko_id', $toko->toko_id)->get();

			return view('users/user/m-mitra/free/upgrade_premium', compact('daftar_kategori','kelurahan','toko','jadwal','foto_toko'));
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

		$toko = toko::where('users_id', Session::get('id_user'))->first();
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
		$toko = toko::where('users_id', Session::get('id_user'))->first();
		$jadwal = Jadwal_toko::where('toko_id', $toko->id)->get();

		return view('users/user/m-mitra/premium/atur_toko', ['daftar_kategori'=>$kategori,'toko'=>$toko,'jadwal'=>$jadwal]);
	}

	public function atur_produk_premium(){

		$kategori_produk = Kategori::all();

		$toko = toko::where('users_id', Session::get('id_user'))->first();
		$produk = product::where('toko_id', $toko->id)->get();

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

		$toko = toko::where('users_id', Session::get('id_user'))->first();
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

		$toko = toko::where('users_id', Session::get('id_user'))->first();
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
            'jenis_mitra' => $toko->jenis_mitra
        );     

        return redirect('/akun')->with($notification);


    }


	public function register_nik(){
		return view('users/user/m-mitra/register_nik');
	}

	public function upload_foto(){
		return view('users/user/m-mitra/upload_foto');
	} 

}
