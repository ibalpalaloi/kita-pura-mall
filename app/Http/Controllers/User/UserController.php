<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Biodata;
use App\Models\User;
use App\Models\toko;
use Session;

class UserController extends Controller
{
    //
	public function index(){

		$progress = 2;

		$biodata = Biodata::where('users_id', Session::get('id_user'))->first();

		if(!empty($biodata->nama)){

			$progress = $progress+1;
			
		}
		if(!empty($biodata->jenis_kelamin)){

			$progress = $progress+1;
			
		}if(!empty($biodata->alamat)){

			$progress = $progress+1;

		}
		
		Session::put('progress_biodata', $progress);

		$toko = toko::where('users_id', Session::get('id_user'))->first();

		if($toko){

			$status_aktif_mitra = $toko->jenis_mitra;
			Session::put('status_mitra', $toko->jenis_mitra);
		}
		else {

			$status_aktif_mitra = "bukan_mitra";
			Session::put('status_mitra', "Belum jadi mitra");			
		}
		return view('users/user/m-profil/index', compact('status_aktif_mitra'));
	}

	public function biodata(){

		$biodata = Biodata::where('users_id', Session::get('id_user'))->first();

		return view('users/user/m-profil/biodata', ['biodata'=>$biodata]);
	}
	
	public function simpan_biodata(Request $request){
		// dd($request->all());

		$this->validate($request,[
			'nama_lengkap' => 'required',
			'jenis_kelamin' => 'required',
			'alamat' => 'required',
			'username' => 'required'
		]);
		
		$biodata = Biodata::where('users_id', Session::get('id_user'))->first();
		// dd($biodata);
		$biodata->nama = $request->nama_lengkap;
		$biodata->jenis_kelamin = $request->jenis_kelamin;
		$biodata->alamat = $request->alamat;
		$biodata->username = $request->username;
		
		if($request->file('foto')){
			$files = $request->file("foto");
			$type = $request->file("foto")->getClientOriginalExtension();
			$file_upload = Session::get('id_user').".".$type;
			\Storage::disk('public')->put('img/biodata/'.$file_upload, file_get_contents($files));
			$biodata->foto = $file_upload;
		}
		$biodata->save();
		
		$notification = array(
			'message' => 'Biodata Berhasil Diperbarui'
		);     

		return redirect()->back()->with($notification);
	}

	
	public function jenis_mitra($status_mitra){
		return view('users/user/m-mitra/jenis_mitra_free');
	}
}
