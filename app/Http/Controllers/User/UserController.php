<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Biodata;
use App\Models\User;
use App\Models\Daftar_tunggu_toko;
use App\Models\toko;
use App\Models\Ktp_toko;
use Auth;
use Session;

class UserController extends Controller
{
    //
	public function index(){
		// dd(Session::get('id_user'));
		// return redirect('/akun/mitra/premium');
		$progress = 2;
		$cek_ktp = "";
		$biodata = Biodata::where('users_id', Auth()->User()->id)->first();

		if(!empty($biodata->nama)){

			$progress = $progress+1;
			
		}
		if(!empty($biodata->jenis_kelamin)){

			$progress = $progress+1;
			
		}if(!empty($biodata->alamat)){

			$progress = $progress+1;

		}
		
		Session::put('progress_biodata', $progress);

		$toko = toko::where('users_id', Auth()->user()->id)->first();

		if($toko){
			

			$toko_id = $toko->id;
			$status_aktif_mitra = $toko->jenis_mitra;
			Session::put('status_mitra', $toko->jenis_mitra);

		}
		else {
			$daftar_tunggu = Daftar_tunggu_toko::where('users_id', Auth()->user()->id)->first();
			
			if ($daftar_tunggu){
				if($toko){
					$toko_id = $toko->id;
					$status_aktif_mitra = $toko->jenis_mitra;
					Session::put('status_mitra', $toko->jenis_mitra);	
				}
				else{
					$toko_id = $daftar_tunggu->toko_id;
					$status_aktif_mitra = $daftar_tunggu->jenis_mitra;
					Session::put('status_mitra', $daftar_tunggu->jenis_mitra);	
				}
			}
			else{
				$status_aktif_mitra = "bukan_mitra";
				Session::put('status_mitra', "Belum jadi mitra");	
			}
			
			// return redirect('/home');

		}

		// if($status_aktif_mitra == 'premium'){

		// 	$ktp = Ktp_toko::where('toko_id', $toko_id)->first();

		// 	if(is_null($ktp)){
		// 		$cek_ktp = "KTP Belum Lengkap";
		// 	}
		// }
		
		$biodata = Biodata::where('users_id', Auth()->user()->id)->first();
		$toko = toko::where('users_id', Auth()->user()->id)->first();
		// dd($toko);
		return view('users/user/m-profil/index', 
			['status_aktif_mitra' => $status_aktif_mitra, 'cek_ktp' => $cek_ktp, 'biodata' => $biodata, 'toko'=>$toko]
		);
	}

	public function biodata(){
		$biodata = Biodata::where('users_id', Auth()->user()->id)->first();
		return view('users/user/m-profil/biodata', ['biodata'=>$biodata]);
	}



	public function ubah_password(Request $request){
		// dd($request->all());

		$validation = \Validator::make($request->all(),[
			'password_old' => 'required',
			'password' => 'required',
			'konfirmasi_password' => 'required'
		])->validate();    

		
		$password_old = Auth::user()->password;

		if (\Hash::check($request->password_old , $password_old )) {

			if($request->password == $request->konfirmasi_password){

				if (!\Hash::check($request->password , $password_old)) {

					$user = User::find(Auth()->User()->id);
					$user->password = bcrypt($request->get('password'));
					$user->save();

					$notification = array(
						'pass_message' => 'Password Berhasil Diperbarui',
						'status_password' => 'sukses'
					);     

					return redirect()->back()->with($notification);

				}
				else{

					$notification = array(
						'pass_message' => 'Password Baru Sama Dengan Password Lama',
						'status_password' => 'gagal'
					);     

					return redirect()->back()->with($notification);
				}

			}
			else{

				$notification = array(
					'pass_message' => 'Konfirmasi Password Tidak Cocok',
					'status_password' => 'gagal'
				);     

				return redirect()->back()->with($notification);
			}

		}
		else{

			$notification = array(
				'pass_message' => 'Password Lama Tidak Cocok',
				'status_password' => 'gagal'

			);     

			return redirect()->back()->with($notification);
		}


	}
	
	public function simpan_biodata(Request $request){
		// dd($request->all());

		$this->validate($request,[
			'nama_lengkap' => 'required',
			'jenis_kelamin' => 'required',
			'alamat' => 'required',
			'username' => 'required'
		]);
		
		$biodata = Biodata::where('users_id', Auth()->User()->id)->first();
		// dd($biodata);
		$biodata->nama = $request->nama_lengkap;
		$biodata->jenis_kelamin = $request->jenis_kelamin;
		$biodata->alamat = $request->alamat;
		$biodata->username = $request->username;
		
		if($request->file('foto')){
			$files = $request->file("foto");
			$type = $request->file("foto")->getClientOriginalExtension();
			$file_upload = Auth()->User()->id.".".$type;
			\Storage::disk('public')->put('img/biodata/'.$file_upload, file_get_contents($files));
			$biodata->foto = $file_upload;
		}
		if ($biodata->notif == 0){
			$biodata->notif = 1;
		}
		$biodata->save();
		
		$notification = array(
			'message' => 'Biodata Berhasil Diperbarui'
		);     

		return redirect('/akun')->with($notification);
	}

	
	public function jenis_mitra($status_mitra){
		return view('users/user/m-mitra/jenis_mitra_free');
	}

	public function simpan_foto(Request $request)
	{
		$image = $request->image;

		list($type, $image) = explode(';', $image);
		list(, $image)      = explode(',', $image);
		$image = base64_decode($image);
		$image_name= time().'.png';
        // $path = public_path('upload/'.$image_name);

        // file_put_contents($path, $image);

		\Storage::disk('public')->put('img/user/profile_picture/'.$image_name, file_get_contents($request->image));
		$biodata = Biodata::where('users_id', Auth()->User()->id)->first();
		$image_path = "public/img/user/profile_picture/".$biodata->foto;
		if(\File::exists($image_path)) {
			\File::delete($image_path);
		}

		$biodata->foto = $image_name;
		$biodata->save();

		return response()->json(['status'=>$image_name]);
	}

}
