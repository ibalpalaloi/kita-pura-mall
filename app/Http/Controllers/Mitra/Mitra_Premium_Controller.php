<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Kategori_toko;
use App\Models\Foto_maps;
use App\Models\kelurahan;
use App\Models\Kabupaten_kota;
use App\Models\Kategori;
use App\Models\Kategorinya_toko;
use App\Models\toko;
use App\Models\Daftar_tunggu_toko;
use App\Models\product;
use App\Models\Pesanan;
use App\Models\Provinsi;
use App\Models\Jadwal_toko;
use App\Models\Ktp_toko;
use App\Models\Template_landing_page;
use App\Models\Landing_page_toko;
use App\Models\Transaksi;
use App\Models\Daftar_tunggu_pesanan;
use DB;
use File;


class Mitra_Premium_Controller extends Controller
{
    //

	public function tgl_indo($tanggal){
		$bulan = array (
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$pecahkan = explode('-', $tanggal);     
		return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	}

	public function autocode($kode){
		$timestamp = time(); 
		$random = rand(10, 100);
		$current_date = date('mdYs'.$random, $timestamp); 
		return $kode.$current_date;
	}

	public function ganti_landing_page(){
		$template = Template_landing_page::all();
		$toko = toko::where('users_id', Auth()->User()->id)->first();
		return view('users/user/m-mitra/premium/ganti_landing_page', compact('toko', 'template'));
	}

	public function post_template($id){
		$template = Template_landing_page::find($id);
		$page = Landing_page_toko::where('toko_id', Auth()->user()->toko->id)->first();
		if(!empty($page)){
			$page->warna_header = $template->warna_header;
			$page->warna_body = $template->warna_body;
			$page->warna_footer_1 = $template->warna_footer_1;
			$page->warna_footer_2 = $template->warna_footer_2;
			$page->warna_tulisan_header = $template->warna_tulisan_header;
			$page->warna_tulisan_body = $template->warna_tulisan_body;
			$page->warna_tulisan_footer = $template->warna_tulisan_footer;
			$page->save();
		}
		else{
			$page = new Landing_page_toko;
			$page->toko_id = Auth()->user()->toko->id;
			$page->warna_header = $template->warna_header;
			$page->warna_body = $template->warna_body;
			$page->warna_footer_1 = $template->warna_footer_1;
			$page->warna_footer_2 = $template->warna_footer_2;
			$page->warna_tulisan_header = $template->warna_tulisan_header;
			$page->warna_tulisan_body = $template->warna_tulisan_body;
			$page->warna_tulisan_footer = $template->warna_tulisan_footer;
			$page->save();
		}
		$toko = Toko::where('id', Auth()->user()->toko->id)->first();

		return redirect(url('/')."/$toko->username");
	}

	public function index_premium(){
		return $this->untuk_mitra();
		$toko = toko::where('users_id', Auth()->User()->id)->first();
		
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
					$j = $i-1;
					$jumlah_transaksi = Transaksi::where('toko_id', $toko->id)->where('tanggal', date('Y-m-d', strtotime($hari_senin."+$j days")))->count();
					$data_pekanan_transaksi[$i] = $jumlah_transaksi;
				// echo $hari_
				}

				$data_bulanan_bulan = array("", "01", "02", '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
				$data_bulanan_transaksi = array(0);
				for ($i = 1; $i < count($data_bulanan_bulan); $i++){
					$jumlah_transaksi = Transaksi::where('toko_id', $toko->id)->where(DB::raw('month(tanggal)'), $data_bulanan_bulan[$i])->count();
					$data_bulanan_transaksi[$i] = $jumlah_transaksi;
				}
				// dd($data_pekanan_transaksi);
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
			$toko = Daftar_tunggu_toko::where('users_id', Auth()->User()->id)->first();

			$jadwal = Jadwal_toko::where('toko_id', $toko->toko_id)->get();
			$foto_1 = Foto_maps::where('toko_id', $toko->toko_id)->where('no_foto','1')->first();
			$foto_2 = Foto_maps::where('toko_id', $toko->toko_id)->where('no_foto','2')->first();
			$foto_3 = Foto_maps::where('toko_id', $toko->toko_id)->where('no_foto','3')->first();

			return view('users/user/m-mitra/free/upgrade_premium', compact('daftar_kategori','kelurahan','toko','jadwal','foto_1','foto_2','foto_3'));
		}

	}

	public function untuk_mitra(){
		$toko = toko::where('users_id', Auth()->User()->id)->first();
		$ktp = Ktp_toko::where('toko_id', $toko->id)->first();
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
			$j = $i-1;
			$jumlah_transaksi = Transaksi::where('toko_id', $toko->id)->where('tanggal', date('Y-m-d', strtotime($hari_senin."+$j days")))->count();
			$data_pekanan_transaksi[$i] = $jumlah_transaksi;
				// echo $hari_
		}

		$data_bulanan_bulan = array("", "01", "02", '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
		$data_bulanan_transaksi = array(0);
		for ($i = 1; $i < count($data_bulanan_bulan); $i++){
			$jumlah_transaksi = Transaksi::where('toko_id', $toko->id)->where(DB::raw('month(tanggal)'), $data_bulanan_bulan[$i])->count();
			$data_bulanan_transaksi[$i] = $jumlah_transaksi;
		}

		return view('users/user/m-mitra/premium/index_premium', compact('toko', 'data_pekanan_hari', 'data_pekanan_transaksi', 'data_bulanan_bulan', 'data_bulanan_transaksi'));

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

		$toko = Toko::where('users_id', Auth()->User()->id)->first();
		if($toko){
			$toko_id = $toko->id;
		}
		else{
			$toko = Daftar_tunggu_toko::where('users_id', Auth()->User()->id)->first();
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

		$toko = toko::where('users_id', Auth()->User()->id)->first();

		if($toko){

			$toko->nama_toko = $request->nama_toko;
			$toko->username = $request->username_toko;
			$toko->kategori_toko_id = $request->kategori_toko;
			$no_telp = $request->no_hp;
			if ($no_telp[0] == 0){
				$no_telp = substr($no_telp, 1);
			}
			$no_telp = substr_replace($no_telp, "+62", 0, 0);
			$toko->no_hp = $no_telp;
			$toko->alamat = $request->alamat;
			$toko->kelurahan_id = $request->kelurahan;
			$toko->deskripsi = $request->deskripsi;
			if($request->file("foto_toko")){
				$files = $request->file("foto_toko");
				$image_path_ori = "img/toko/$toko->id/logo/original/$request->nama_foto_temp";
				$image_path_400x400 = "img/toko/$toko->id/logo/400x400/$request->nama_foto_temp";
				$image_path_200x200 = "img/toko/$toko->id/logo/200x200/$request->nama_foto_temp";

				\Storage::disk('public')->put($image_path_ori, file_get_contents($files));
				\Storage::disk('public')->put($image_path_400x400, file_get_contents($files));
				\Storage::disk('public')->put($image_path_200x200, file_get_contents($files));

				\File::delete("public/$image_path_400x400");            
				\File::delete("public/$image_path_200x200");            

				File::move(public_path('img/temp_produk/400x400/'.$request->nama_foto_temp), public_path($image_path_400x400));
				File::move(public_path('img/temp_produk/200x200/'.$request->nama_foto_temp), public_path($image_path_200x200));

				$toko->logo_toko = $request->nama_foto_temp;   
			}
			$toko->save();


			$toko_id = $toko->id;

		}
		else{

			$toko = Daftar_tunggu_toko::where('users_id', Auth()->User()->id)->first();
			$toko->nama_toko = $request->nama_toko;
			$toko->username = $request->username_toko;
			$toko->kategori_toko_id = $request->kategori_toko;
			$toko->no_hp = $request->no_hp;
			$toko->alamat = $request->alamat;
			$toko->kelurahan_id = $request->kelurahan;
			$toko->deskripsi = $request->deskripsi;
			if($request->file("foto_toko")){
				$files = $request->file("foto_toko");
				$image_path_ori = "img/toko/$toko->toko_id/logo/original/$request->nama_foto_temp";
				$image_path_400x400 = "img/toko/$toko->toko_id/logo/400x400/$request->nama_foto_temp";
				$image_path_200x200 = "img/toko/$toko->toko_id/logo/200x200/$request->nama_foto_temp";

				\Storage::disk('public')->put($image_path_ori, file_get_contents($files));
				\Storage::disk('public')->put($image_path_400x400, file_get_contents($files));
				\Storage::disk('public')->put($image_path_200x200, file_get_contents($files));

				\File::delete("public/$image_path_400x400");            
				\File::delete("public/$image_path_200x200");            

				File::move(public_path('img/temp_produk/400x400/'.$request->nama_foto_temp), public_path($image_path_400x400));
				File::move(public_path('img/temp_produk/200x200/'.$request->nama_foto_temp), public_path($image_path_200x200));

				$toko->logo_toko = $request->nama_foto_temp;    


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

		return redirect('/akun/mitra/premium?cantBack')->with($notification);
	}

	public function simpan_foto_toko(Request $request){
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


	public function atur_toko_premium(){

		$kategori = Kategori_toko::all();
		$toko = toko::where('users_id', Auth()->User()->id)->first();
		$jadwal = Jadwal_toko::where('toko_id', $toko->id)->get();
		$kategorinya_toko = Kategorinya_toko::where('toko_id', $toko->id)->get();
		// dd($kategorinya_toko);
		$kota = Provinsi::find(72)->kabupaten_kota;
		$kota_selected = $toko->kelurahan->kecamatan->kabupaten_kota->id;
        // dd($kota_selected);
		$kelurahan = DB::table('kelurahan')->select('kelurahan.id', 'kelurahan.kelurahan')->leftJoin('kecamatan', 'kecamatan.id', '=', 'kelurahan.kecamatan_id')->where('kecamatan.kabupaten_kota_id', $kota_selected)->get();

		return view('users/user/m-mitra/premium/atur-toko/index', ['daftar_kategori'=>$kategori,'kelurahan'=>$kelurahan ,'toko'=>$toko,'jadwal'=>$jadwal, 'kategorinya_toko'=>$kategorinya_toko, 'kota'=>$kota, 'kelurahan'=>$kelurahan, 'kota_selected'=>$kota_selected]);
	}

	public function atur_lokasi(){
		$toko = toko::where('users_id', Auth()->User()->id)->first();
		return view('users/user/m-mitra/premium/pilih_lokasi_premium', ['toko'=>$toko]);
	}

	public function daftar_tunggu_pesanan(){
		$toko = Toko::where('users_id', Auth()->User()->id)->first();
		$data_keranjang = array();
		$i = 0;
		$toko_loop = DB::table('daftar_tunggu_pesanan')->select('keynota', 'users.no_hp', 'biodata.nama', 'tanggal', 'waktu')->distinct()->join('biodata', 'biodata.users_id', '=' , 'daftar_tunggu_pesanan.id_user')->join('users', 'users.id', '=', 'biodata.users_id')->where('id_toko', '=', $toko->id)->orderBy('tanggal', 'asc')->orderBy('waktu', 'asc')->get();
 		// dd($toko_loop);
		foreach ($toko_loop as $row){
			$data_keranjang[$i]['no_hp'] = $row->no_hp;
			$data_keranjang[$i]['keynota'] = $row->keynota;
			$data_keranjang[$i]['nama'] = $row->nama;
			$data_keranjang[$i]['tanggal'] = $row->tanggal;
			$data_keranjang[$i]['waktu'] = $row->waktu;
			$data_keranjang[$i]["product"] = DB::table('daftar_tunggu_pesanan')->select('keranjang_belanja.id', 'keranjang_belanja.jumlah', 'product.id as product_id', 'nama', 'jenis_harga', 'harga', 'harga_terendah', 'harga_tertinggi', 'diskon', 'foto_produk')->join('keranjang_belanja', 'keranjang_belanja.id', '=', 'daftar_tunggu_pesanan.id_product')->join('product', 'product.id', '=', 'keranjang_belanja.product_id')->where('keynota', $row->keynota)->get();
			$i++;
		}
		// dd($data_keranjang);
		$toko = Toko::where('users_id', Auth()->User()->id)->first();

        // dd($data_keranjang);
		return view('users/user/m-mitra/premium/daftar-tunggu-pesanan/index', compact('data_keranjang', 'toko'));
	}

	public function hapus_daftar_tunggu_pesanan(Request $request)
	{
		Daftar_tunggu_pesanan::where('keynota', $request->id_keranjang)->delete();
		return redirect()->back();
	}

	public function konfirmasi_daftar_tunggu_pesanan(Request $request)
	{
		$daftar_tunggu_pesanan = DB::table('daftar_tunggu_pesanan')->select('daftar_tunggu_pesanan.*', 'keranjang_belanja.product_id', 'keranjang_belanja.jumlah', 'product.harga', 'product.diskon')->join('keranjang_belanja', 'keranjang_belanja.id', '=', 'daftar_tunggu_pesanan.id_product')->join('product', 'product.id', '=', 'keranjang_belanja.product_id')->where('keynota', $request->id_keranjang)->get();
		foreach ($daftar_tunggu_pesanan as $row){
			$transaksi = new Transaksi;
			$transaksi->toko_id = $row->id_toko;
			$transaksi->product_id = $row->product_id;
			$transaksi->tanggal =$row->tanggal;
			$transaksi->waktu = $row->waktu;
			$transaksi->jenis = "Pemasukan";
			$transaksi->kategori = "Penjualan";
			$transaksi->jumlah = $row->jumlah;
			$harga_diskon = $row->harga-$row->harga*$row->diskon/100;
			$transaksi->harga_total = $row->jumlah*$harga_diskon;
			$transaksi->save();
			DB::table('keranjang_belanja')->where('toko_id', $row->id_toko)->where('user_id', $row->id_user)->where('id', $row->id_product)->delete();
		}
		Daftar_tunggu_pesanan::where('keynota', $request->id_keranjang)->delete();
		return redirect()->back();
	}

	public function kirim_lokasi(){
		$toko = toko::where('users_id', Auth()->User()->id)->first();
		$toko->latitude = 1;
		$toko->longitude = 1;
		$toko->save();	
		return redirect("https://api.whatsapp.com/send?phone=6285156100849&text=Saya%20Tidak%20Menemukan%20Lokasi%20Saya");		
	}

	function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	

	public function simpan_lokasi(Request $request){

		// dd($request->all());

		$toko = toko::where('users_id', Auth()->User()->id)->first();
		$toko->latitude = $request->latitude;
		$toko->longitude = $request->longitude;
		$toko->save();


		$notification = array(
			'message' => 'Lokasi Berhasil Diperbarui'
		);     

		return redirect('/akun/mitra/premium/ubah-toko')->with($notification);
	}

	public function notif_telegram(){
		$token = "1732361789:AAFvHgC5XYNODxYqLt-YTZK4x5XGE-VH9Vg";
		$user_id = 1732361789;
		$mesg = "--- DAFTAR BARU ---   Hai Admin Kitapuramall, telah bergabung menjadi agen kebaikan di bersamakami.com sebagai ";
		$request_params = [
			'chat_id' => $user_id,
			'text' => $mesg
		];
		$request_url = 'https://api.telegram.org/bot'.$token.'/sendMessage?'.http_build_query($request_params);
		file_get_contents($request_url);	
	}


}
