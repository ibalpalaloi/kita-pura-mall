<?php

namespace App\Http\Controllers\DigitalDownload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Band;
use App\Models\Transaksi;
use Session;
use DB;


class DigitalAkunController extends Controller
{
	public function index(){
		$band = Band::where('users_id', Auth()->User()->id)->first();
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
			$jumlah_transaksi = Transaksi::where('toko_id', $band->id)->where('tanggal', date('Y-m-d', strtotime($hari_senin."+$j days")))->count();
			$data_pekanan_transaksi[$i] = $jumlah_transaksi;
				// echo $hari_
		}

		$data_bulanan_bulan = array("", "01", "02", '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
		$data_bulanan_transaksi = array(0);
		for ($i = 1; $i < count($data_bulanan_bulan); $i++){
			$jumlah_transaksi = Transaksi::where('toko_id', $band->id)->where(DB::raw('month(tanggal)'), $data_bulanan_bulan[$i])->count();
			$data_bulanan_transaksi[$i] = $jumlah_transaksi;
		}


		return view('users/user/m-digital-download/akun/index', compact('band', 'data_pekanan_hari', 'data_pekanan_transaksi', 'data_bulanan_bulan', 'data_bulanan_transaksi'));
	}
}
