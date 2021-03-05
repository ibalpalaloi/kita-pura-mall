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

		$notification = array();

		if(Session::get('progress_biodata') != '5'){

				$notification = array(
					'message' => 'Biodata Belum Lengkap'
				 );     
		
				return redirect()->back()->with($notification);
		}
		else{

			if(Session::get('status_mitra') == "Belum jadi mitra"){

				return redirect('/akun/jadi-mitra');

			}
			else{

				$toko = toko::where('users_id', Session::get('id_user'))->first();

				// dd($toko->jenis_mitra);

				if($toko){


					if(is_null($toko->longitude) && is_null($toko->latitude)){
						$notification = array(
							'message' => 'Lokasi Maps Belum Ditentukan'
						);     
					}

					// dd($toko);

				
					return redirect('/akun/mitra/'.$toko->jenis_mitra)->with($notification);

				}
				else{

					$daftar_tunggu = Daftar_tunggu_toko::where('users_id', Session::get('id_user'))->first();

					$notification = array(
						'message' => 'Belum Terverifikasi',
						'jenis_mitra' => $daftar_tunggu->jenis_mitra
					);     
			
					return redirect()->back()->with($notification);
					
				}

			}

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
