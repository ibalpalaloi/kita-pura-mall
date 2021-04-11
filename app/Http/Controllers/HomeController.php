<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use DB;
use Session;
use Image;
use App\Models\Toko;
use App\Models\Penilaian_toko;
use App\Models\Product;
use App\Models\Daftar_tunggu_toko;
use App\Models\Biodata;
use Auth;

class HomeController extends Controller
{
    //
	public function index(){
		// $kategori_nama = ['makanan', 'kesehatan'];
		// $list_toko= array();
		// $kategori = [1,4];
		// for($j = 0; $j < count($kategori_nama); $j++){
		// 	$toko = Toko::where([
		// 								['jenis_mitra', 'premium'],
		// 								['kategori_toko_id', $kategori[$j]]
		// 								])->get();
		// 	$i=0;
		// 	foreach($toko as $data){
		// 		$penilaian = Penilaian_toko::where('toko_id', $data->id)->get();
		// 		$produk = Product::where('toko_id', $data->id)->get();
		// 		$produk = Product::where('toko_id', $data->id)->selectRaw('min(harga) as harga')->first();
		// 		$bintang = 0;
		// 		$rating = 0;
		// 		foreach($penilaian as $item){
		// 			$bintang += $item->bintang;
		// 		}
		// 		if(count($penilaian) != 0){
		// 			$rating = $bintang / count($penilaian);
		// 		}
		// 		$list_toko[$kategori_nama[$j]][$i]['nama_toko'] = $data->nama_toko;
		// 		$list_toko[$kategori_nama[$j]][$i]['kategori'] = $data->kategori_toko->kategori;
		// 		$list_toko[$kategori_nama[$j]][$i]['jumlah_penilaian'] = count($penilaian);
		// 		$list_toko[$kategori_nama[$j]][$i]['rating'] = $rating;
		// 		$list_toko[$kategori_nama[$j]][$i]['harga'] = $produk->harga;
		// 		$list_toko[$kategori_nama[$j]][$i]['foto'] = $data->logo_toko;
		// 		$list_toko[$kategori_nama[$j]][$i]['logo'] = $data->logo();
		// 		$i++;
		// 	}
		// }
		return $this->untuk_mitra();
		// return view('home/index', ['toko'=>$list_toko]);
		
	}

	public function untuk_mitra(){
		$biodata = Biodata::where('users_id', Auth()->user()->id)->first();
		if(is_null($biodata->nama) or $biodata->nama == ""){
			return redirect('/buat_akun_biodata');
		}
		elseif(is_null($biodata->jenis_kelamin) or $biodata->jenis_kelamin == ""){
			return redirect('/buat_akun_biodata');
		}
		else{
			return redirect('/akun');
		}
		return redirect('/akun');
	}

	public function home_mitra(){
		$daftar_tunggu = Daftar_tunggu_toko::where('users_id', Auth()->user()->id)->get();
		if(count($daftar_tunggu) != 0){
			return redirect('/akun');
		}
		return view('home.home_for_mitra', compact('daftar_tunggu'));
	}

	public function detail_produk($id_produk){
		$product = DB::table('product')->select('product.*', 'sub_kategori.nama as sub_kategori')->leftJoin('sub_kategori', 'sub_kategori.id', '=', 'product.sub_kategori_id')->where('product.id', $id_produk)->first();
		$toko = DB::table('toko')->select('toko.nama_toko', 'toko.logo_toko', 'toko.username', 'toko.no_hp', 'toko.deskripsi as deskripsi_toko', 'toko.id')->where('id', $product->toko_id)->first();
		$produk_lainnya = DB::table('product')->select('id')->where('toko_id', $product->toko_id)->get()->count();
		$produk_serupa = DB::table('product')->select('product.*', 'kategori.nama as kategori_product')->join('kategori', 'kategori.id', '=', 'product.kategori_id')->where('sub_kategori_id', $product->sub_kategori_id)->where('product.id', '!=', $product->id)->get();

		if(Auth::user()){
			$keranjang = DB::table('keranjang_belanja')->select('product.nama', 'jenis_harga', 'harga', 'harga_terendah', 'harga_tertinggi', 'diskon', 'foto_produk', 'toko.nama_toko')->join('product', 'product.id', '=', 'keranjang_belanja.product_id')->join('toko', 'toko.id', '=', 'keranjang_belanja.toko_id')->where('user_id', Auth()->user()->id)->get();		
		}
		else{
			$keranjang = 0;
		}

		// dd($produk_serupa);
		// dd($toko);
		return view('home/pencarian/detail_produk', compact('product', 'toko', 'produk_lainnya', 'produk_serupa', 'keranjang'));
	}

	public function pencarian(Request $request){
		$product = Product::whereHas('toko', function (Builder $q){
			$q->where('status', '=', 'Aktif');
		})->orderByRaw('RAND()')->paginate(54);
		// dd($produk);
		// $product = Product::orderByRaw('RAND()')->paginate(54);
		// dd(count($product));
		if($request->ajax()){
            $view = view('home.data_pencarian', compact('product'))->render();
            return response()->json(['html'=>$view]);
        }
        // dd();
        // echo "<pre>";
        // print_r($product);
		return view('home/pencarian', compact('product'));
	}

	public function input_password(){
		return view('auth/verifikasi_password');
	}

	public function verifikasi_number(){
		return view('auth/verifikasi_number');
	}

	public function rekomendasi(Request $request){
		$kategori = $request->get('kategori');
		// if($kategori == 'semua'){
		// 	$produk = Product::paginate(3);
		// }
		// else{
		// 	$produk = Product::where('kategori_id', $kategori)->paginate(3);
		// };

		$produk = Product::paginate(3);
		if($request->ajax()){
			$view = view('home.rekomendasi_produk', compact('produk'))->render();
            return response()->json(['html'=>$view]);
		}
		return view('home/rekomendasi', compact('produk'));
	}



	public function home(){
		return view('home/home');
	}

	public function maps(){
		$foto_maps = DB::table('toko')->select('toko.*', 'foto_maps.foto')->leftJoin('foto_maps', 'foto_maps.toko_id', '=', 'toko.id')->where('foto_maps.no_foto', '1')->get();
		// dd($foto_maps);		
		return view('home/maps', compact('foto_maps'));
	}

	public function get_jadwal(Request $request){
		$jadwal = DB::table('jadwal_toko')->select('hari', 'jam_buka', 'jam_tutup')->where('toko_id', $request->id_toko)->get();
		$fix_jadwal = "";
		foreach ($jadwal as $row) {
			$fix_jadwal .= "<div style='display: flex; width: 50%; margin-bottom: 0.5em;'><img src='".url('/')."/public/img/nilai_product/kalender.svg' style='width: 2.5em;'><div style='font-size: 0.9em; margin-left: 1em;'><div>$row->hari</div><div>$row->jam_buka WITA - $row->jam_tutup WITA</div></div></div>";
		}
		echo $fix_jadwal;
	}


}
