<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Toko;
use App\Models\Transaksi;
use Auth;
use Carbon\Carbon;
use DB;

class TransaksiController extends Controller
{
	public function index(){
        // $pesanan = Pesanan::where('created_at', date('Y-m-d').'00:00:00')->get();
        // dd($pesanan);
		$toko = Toko::where('users_id', Auth()->user()->id)->first();
		$produk = Product::where('toko_id', $toko->id)->get()->count();
		if ($produk == 0){
			$notification = array(
				'message' => 'Silahkan Masukan Produk',
			);  
			return redirect('/akun/mitra/premium/')->with($notification);
		}
		else {

			$pesanan = Transaksi::where('toko_id', $toko->id)
			->whereDate('tanggal', date('Y-m-d'))
			->get();
			$total_pesanan = 0;
			foreach($pesanan as $data){
				$total_pesanan += $data->harga_total;
			}
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
				$jumlah_transaksi = Transaksi::where('toko_id', $toko->id)->where('tanggal', date('Y-m-d', strtotime($hari_senin."+$i days")))->count();
				$data_pekanan_transaksi[$i] = $jumlah_transaksi;
			}

			$data_bulanan_bulan = array("", "01", "02", '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
			$data_bulanan_transaksi = array(0);
			for ($i = 1; $i < count($data_bulanan_bulan); $i++){
				$jumlah_transaksi = Transaksi::where('toko_id', $toko->id)->where(DB::raw('month(tanggal)'), $data_bulanan_bulan[$i])->count();
				$data_bulanan_transaksi[$i] = $jumlah_transaksi;
			}

            // dd($pesanan);
			return view('/users/user/m-mitra/premium/transaksi/index', compact('toko', 'data_pekanan_hari', 'data_pekanan_transaksi', 'data_bulanan_bulan', 'data_bulanan_transaksi','pesanan', 'total_pesanan'));
		}
	}

	public function tambah_transaksi(){
		$toko = Toko::where('users_id', Auth()->user()->id)->first();
		$produk = Product::where('toko_id', $toko->id)->get();
		return view('/users/user/m-mitra/premium/transaksi/tambah_transaksi', compact('toko', 'produk'));
	}

	public function pilih_rentan_tanggal(Request $request){
		$toko = Toko::where('users_id', Auth()->user()->id)->first();
		date_default_timezone_set('Asia/Makassar');
		$request->rentan = '7 Hari Terakhir';
		$transaksi = "";
		if ($request->rentan == 'Semua'){
			$transaksi = Transaksi::where('toko_id', $toko->id)->orderBy('tanggal', 'asc')->get();			
		}
		else if ($request->rentan == 'Hari ini'){
			$tanggal = date('Y-m-d');
			$transaksi = Transaksi::where('toko_id', $toko->id)->where('tanggal', $tanggal)->orderBy('tanggal', 'asc')->get();			
		}
		else if ($request->rentan == '7 Hari Terakhir'){
			$tanggal_terakhir = date('Y-m-d');
			$tanggal_mulai = date('Y-m-d', strtotime($tanggal_terakhir."-7 days")); 
			$transaksi = Transaksi::where('toko_id', $toko->id)->where('tanggal', '>', $tanggal_mulai)->where('tanggal', '<', $tanggal_terakhir)->orderBy('tanggal', 'asc')->get();
		}
		else if ($request->rentan == '30 Hari Terakhir'){

		}
		else {

		}
		$result = "";
		foreach ($transaksi as $row){
			$result .= "<tr><td><div style='line-height: 0.5em; padding-top: 0.5em;'>$row->kategori</div>
			<small style='font-size: 0.65em;'>".$this->tgl_indo(date('Y-m-d', strtotime($row->tanggal)))."</small>
			</td>";
			if ($row->jenis == 'Pemasukan'){
				$result .= "<td style='text-align: right;'>".number_format($row->harga_total,0,',','.')."</td><td style='text-align: right; padding-right: 3em;'>-</td></tr>";
			}
			else {
				$result .= "<td style='text-align: right; padding-right: 2em;'>-</td><td style='text-align: right; padding-right: 1.2em;'>".number_format($row->harga_total,0,',','.')."</td></tr>";

			}
		}
		echo $result;

	}

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

	public function laporan_keuangan(){
		$toko = Toko::where('users_id', Auth()->user()->id)->first();
		$tanggal = date('Y-m-d');
		$transaksi = Transaksi::where('toko_id', $toko->id)->where('tanggal', $tanggal)->orderBy('tanggal', 'asc')->get();	
		return view('/users/user/m-mitra/premium/transaksi/laporan_keuangan', compact('transaksi'));
	}

	public function simpan_transaksi(Request $request){
		$toko = Toko::where('users_id', Auth()->user()->id)->first();
		$transaksi = new Transaksi;
		$transaksi->jenis = $request->jenis_transaksi;
		if ($request->jenis_transaksi == 'Pemasukan'){
			$transaksi->kategori = $request->kategori_pemasukan;
			if ($request->kategori_pemasukan == 'Penjualan'){
				$transaksi->harga_total = $request->harga_total_penjualan;
				$produk = Product::where('id', $request->id_produk)->first();
				if($request->stok == 'on'){
					$produk->stok = "Tersedia";
				}
				else {
					$produk->stok = "Habis";
				}
				$produk->save();
			}
			else {
				$transaksi->harga_total = $request->harga_total_non_penjualan;
			}

		}
		else {
			$transaksi->kategori = $request->kategori_pengeluaran;
			$transaksi->harga_total = $request->harga_total_non_penjualan;

		}
		$transaksi->toko_id = $toko->id;
		$transaksi->product_id = $request->id_produk;
		$transaksi->jumlah = $request->input_jumlah_pesanan;
		$transaksi->tanggal = $request->tanggal;
		$transaksi->waktu = $request->waktu;
		$transaksi->save();
		$notification = array(
			'message' => 'Pesanan Berhasil Ditambahkan',
		);  
		return redirect('/akun/mitra/premium/transaksi')->with($notification);


	}
}
