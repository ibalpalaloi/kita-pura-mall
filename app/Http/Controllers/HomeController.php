<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Image;

class HomeController extends Controller
{
    //
	public function index(){
		return view('home/index');
	}

	public function pencarian(){
		$product = array('product_1.jpg', 'product_2.jpg', 'product_3.jpg', 'product_4.jpg','product_5.jpg', 'product_6.jpg','product_7.jpg', 'product_8.jpg','product_9.jpg', 'product_10.jpg','product_11.jpg', 'product_12.jpg','product_13.jpg', 'product_14.jpg', 'product_15.jpg', 'product_16.jpg', 'product_17.jpg', 'product_18.jpg', 'product_19.jpg');
		for ($i = 0; $i < count($product); $i++){
			$img = Image::make('public/img/product/thumbnail/'.$product[$i])->fit(400,400);
			$img->save();
		}

		return view('home/pencarian');
	}

	public function input_password(){
		return view('auth/verifikasi_password');
	}

	public function verifikasi_number(){
		return view('auth/verifikasi_number');
	}

	public function rekomendasi(){
		return view('home/rekomendasi');
	}

	public function home(){
		return view('home/home');
	}
}
