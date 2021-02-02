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

		$biodata = Biodata::where('id', Session::get('id_user'))->first();

		//  

		return view('users/user/m-profil/biodata', ['biodata'=>$biodata]);
	}
	
	public function simpan_biodata(Request $request){
		// dd($request->all());

		$this->validate($request,[
			'nama_lengkap' => 'required',
            'alamat' => 'required',
			'username' => 'required'
		]);
		
		$biodata = Biodata::find(Session::get('id_user'));

		// dd($biodata);
		$biodata->nama = $request->nama_lengkap;
		$biodata->alamat = $request->alamat;
		$biodata->username = $request->username;
		$biodata->save();
		
		$notification = array(
            'message' => 'Biodata Berhasil Diperbarui'
         );     

        return redirect()->back()->with($notification);
	}
}
