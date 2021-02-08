<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class Admin_Manajemen_Pengguna_Controller extends Controller
{
    //
    public function index(){
        $user = User::where('level_akses', 'user')->get();
        return view('users/admin/m-pengguna/index', ['user'=>$user]);
    }

    public function ubah_password(Request $request){
        $user = User::where('no_hp', $request->no_hp)->first();
        $user->password = bcrypt($request->password_baru);
        $user->save();

        return redirect('/admin/manajemen/pengguna');
    }

    public function hapus_pengguna($id){
        User::where('id', $id)->delete();
        return redirect('/admin/manajemen/pengguna');
    }
}
