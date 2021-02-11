<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Biodata;
use App\Models\User;
use Session;

class UserController extends Controller
{
    //
	public function index(){
		return view('users/user/m-profil/index');
	}

	public function biodata(){

		$biodata = Biodata::where('user_id', Session::get('id_user'))->first();

		//  

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
		
		$biodata = Biodata::where('user_id', Session::get('id_user'))->first();
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

	public function jadi_mitra(){
		return view('users/user/m-mitra/jadi_mitra');
	}

	public function jenis_mitra($status_mitra){
		return view('users/user/m-mitra/jenis_mitra_free');
	}
}
