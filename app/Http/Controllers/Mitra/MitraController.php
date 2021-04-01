<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Kategori_toko;
use App\Models\Foto_maps;
use App\Models\kelurahan;
use App\Models\Kategori;
use App\Models\Ktp_toko;
use App\Models\toko;
use App\Models\Daftar_tunggu_toko;
use App\Models\product;
use App\Models\Jadwal_toko;
use App\Models\Landing_page_toko;


class MitraController extends Controller
{
	//
	
	public function autocode($kode){
		$timestamp = time(); 
		$random = rand(10, 100);
		$current_date = date('mdYs'.$random, $timestamp); 
		return $kode.$current_date;
	}
	

	public function mitra(){
		$cek_status_mitra = $this->cek_status_mitra(Auth()->user()->id);
		if($cek_status_mitra == "false"){
			return redirect('/akun/jadi-mitra/premium');
		}
		elseif($cek_status_mitra == "daftar_tunggu"){
			$notification = array(
				'message' => 'Belum Terverifikasi'
			);
			return redirect('/akun')->with($notification);
		}
		elseif($cek_status_mitra == "premium" or $cek_status_mitra == "Premium"){
			return redirect('/akun/mitra/premium');
		}
		else{
			return back();
		}

	}

	public function cek_status_mitra($user_id){
		$toko = Toko::where('users_id', $user_id)->first();
		$daftar_tunggu = Daftar_tunggu_toko::where('users_id', $user_id)->first();
		if(!empty($toko)){
			return $toko->jenis_mitra;
		}
		elseif(!empty($daftar_tunggu)){
			return "daftar_tunggu";
		}
		else{
			return "false";
		}
	}

	public function uploadCropImage(Request $request)
	{
		$image = $request->image;

		list($type, $image) = explode(';', $image);
		list(, $image)      = explode(',', $image);
		$image = base64_decode($image);
		$image_name= time().'.png';
        // $path = public_path('upload/'.$image_name);

        // file_put_contents($path, $image);

		\Storage::disk('public')->put('img/user/profile_picture/'.$image_name, file_get_contents($request->image));
		return response()->json(['status'=>true]);
	}
}
