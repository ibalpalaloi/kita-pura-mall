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
use App\Models\product;
use App\Models\Pesanan;
use App\Models\Jadwal_toko;
use App\Models\Ktp_toko;
use DB;


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
		// echo "tes";

		$toko = toko::where('users_id', Session::get('id_user'))->first();

		if($toko){
			$ktp = Ktp_toko::where('toko_id', $toko->id)->first();
			if($ktp){
				$hari = array("Mon"=>0, "Tue"=>1, "Wed"=>2, "Thu"=>3, "Fri"=>4, "Sat"=>5, "Sun"=>6);
				date_default_timezone_set('Asia/Makassar');
				$tanggal_sekarang = date('D, Y-m-d');
				$ambil_hari = substr($tanggal_sekarang, 0, 3);
				$angka_hari = $hari[$ambil_hari];
				$hari_senin = date('Y-m-d', strtotime($tanggal_sekarang."-$angka_hari days"));
				$hari_ahad = date('Y-m-d', strtotime($hari_senin."+6 days"));
				$data_pekanan_hari = array("", "Senin", "Selasa", "Rabu", "Kamis","Jumat", "Sabtu", "Minggu");
				$data_pekanan_transaksi = array(0);

				for ($i = 1; $i < count($data_pekanan_hari); $i++){
					$jumlah_transaksi = Pesanan::where('toko_id', $toko->id)->where('tanggal', date('Y-m-d', strtotime($hari_senin."+$i days")))->count();
					$data_pekanan_transaksi[$i] = $jumlah_transaksi;
				}

				$data_bulanan_bulan = array("", "01", "02", '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
				$data_bulanan_transaksi = array(0);
				for ($i = 1; $i < count($data_bulanan_bulan); $i++){
					$jumlah_transaksi = Pesanan::where('toko_id', $toko->id)->where(DB::raw('month(tanggal)'), $data_bulanan_bulan[$i])->count();
					$data_bulanan_transaksi[$i] = $jumlah_transaksi;
				}
				return view('users/user/m-mitra/premium/index_premium', compact('toko', 'data_pekanan_hari', 'data_pekanan_transaksi', 'data_bulanan_bulan', 'data_bulanan_transaksi'));
			}
			else{
				// echo "tes";
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
			$foto_1 = Foto_maps::where('toko_id', $toko->toko_id)->where('no_foto','1')->first();
			$foto_2 = Foto_maps::where('toko_id', $toko->toko_id)->where('no_foto','2')->first();
			$foto_3 = Foto_maps::where('toko_id', $toko->toko_id)->where('no_foto','3')->first();

			return view('users/user/m-mitra/free/upgrade_premium', compact('daftar_kategori','kelurahan','toko','jadwal','foto_1','foto_2','foto_3'));
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
			// 'kategori_toko' => 'required',
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
			$toko->username = $request->username_toko;
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
				$toko->logo_toko = $file_upload;
			}
			$toko->save();


			$toko_id = $toko->id;

		}
		else{

			$toko = Daftar_tunggu_toko::where('users_id', Session::get('id_user'))->first();
			$toko->nama_toko = $request->nama_toko;
			$toko->username = $request->username_toko;
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
				$toko->logo_toko = $file_upload;
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

        // @Tambah Kategornya toko
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

		if($toko->status == "Aktif"){

			return redirect('/akun/mitra/premium')->with($notification);
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
		$kategorinya_toko = Kategorinya_toko::where('toko_id', $toko->id)->get();
		// dd($kategorinya_toko);

		return view('users/user/m-mitra/premium/atur_toko', ['daftar_kategori'=>$kategori,'kelurahan'=>$kelurahan ,'toko'=>$toko,'jadwal'=>$jadwal, 'kategorinya_toko'=>$kategorinya_toko]);
	}

	public function atur_lokasi(){
		$toko = toko::where('users_id', Session::get('id_user'))->first();
		return view('users/user/m-mitra/premium/pilih_lokasi_premium', ['toko'=>$toko]);
	}

	public function kirim_lokasi(){
		$toko = toko::where('users_id', Session::get('id_user'))->first();
		$toko->latitude = 0;
		$toko->longitude = 0;
		$toko->save();	
		return redirect("https://api.whatsapp.com/send?phone=6285156100849&text=Saya%20Tidak%20Menemukan%20Lokasi%20Saya");		
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
