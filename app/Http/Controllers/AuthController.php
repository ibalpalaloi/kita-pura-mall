<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; 
use App\Models\User;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    //
    public function login(){
        return view('auth.login');
    }

    public function sign_up(){
        return view('auth.sign_up');
    }

    public function post_sign_up(Request $request){
        $this->validate($request,[
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'konfir_password' => Rule::in([$request->password])
        ]);

        // $enkripsi = crypt($request->email, $request->password);

        // $user = new User;
        // $user->username = $request->nama;
        // $user->password = bcrypt($request->password);
        // $user->email = $request->email;
        // $user->remember_token = str::random(60);
        // $user->level_akses = 'toko';
        // $user->save();
        return redirect('toko');
    }
}
