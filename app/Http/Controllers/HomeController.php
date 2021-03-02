<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Image;
use App\Models\Toko;
use App\Models\Penilaian_toko;
use App\Models\Product;

class HomeController extends Controller
{
    //
	public function index(){
		$kategori_nama = ['makanan', 'kesehatan'];
		$list_toko= array();
		$kategori = [1,4];
		for($j = 0; $j < count($kategori_nama); $j++){
			$toko = Toko::where([
										['jenis_mitra', 'premium'],
										['kategori_toko_id', $kategori[$j]]
										])->get();
			$i=0;
			foreach($toko as $data){
				$penilaian = Penilaian_toko::where('toko_id', $data->id)->get();
				$produk = Product::where('toko_id', $data->id)->get();
				$produk = Product::where('toko_id', $data->id)->selectRaw('min(harga) as harga')->first();
				$bintang = 0;
				$rating = 0;
				foreach($penilaian as $item){
					$bintang += $item->bintang;
				}
				if(count($penilaian) != 0){
					$rating = $bintang / count($penilaian);
				}
				$list_toko[$kategori_nama[$j]][$i]['nama_toko'] = $data->nama_toko;
				$list_toko[$kategori_nama[$j]][$i]['kategori'] = $data->kategori_toko->kategori;
				$list_toko[$kategori_nama[$j]][$i]['jumlah_penilaian'] = count($penilaian);
				$list_toko[$kategori_nama[$j]][$i]['rating'] = $rating;
				$list_toko[$kategori_nama[$j]][$i]['harga'] = $produk->harga;
				$list_toko[$kategori_nama[$j]][$i]['foto'] = $data->logo_toko;
				$i++;
			}
		}
		return view('home/index', ['toko'=>$list_toko]);
	}

	public function pencarian(){
		// $product = array('product_1.jpg', 'product_2.jpg', 'product_3.jpg', 'product_4.jpg','product_5.jpg', 'product_6.jpg','product_7.jpg', 'product_8.jpg','product_9.jpg', 'product_10.jpg','product_11.jpg', 'product_12.jpg','product_13.jpg', 'product_14.jpg', 'product_15.jpg', 'product_16.jpg', 'product_17.jpg', 'product_18.jpg', 'product_19.jpg');
		// for ($i = 0; $i < count($product); $i++){
		// 	$img = Image::make('public/img/product/thumbnail/'.$product[$i])->fit(400,400);
		// 	$img->save();
		// }

		return view('home/pencarian');
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
		return view('home/maps');
	}


}
