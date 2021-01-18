<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; 

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

        $enkripsi = crypt($request->email, $request->password);
        dd($enkripsi);
    }
}
