<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; 
use App\Models\User;
use Illuminate\Support\Str;
use Auth;

class AuthController extends Controller
{
    //
    public function login(){
        return view('auth.login');
    }

    public function post_login(Request $request){
        $user = User::where('no_hp', $request->no_telp)->first();
        if(!empty($user)){
            return redirect('/login/password/'.$user->no_hp);
        }
        return redirect()->back()->with('error', 'belum terdaftar');
    }

    public function sign_up(){
        return view('auth.sign_up');
    }

    public function post_sign_up(Request $request){
        $this->validate($request,[
            'nama' => 'required',
            'no_hp' => 'required',
            'password' => 'required',
            'konfir_password' => Rule::in([$request->password])
        ]);

        $user = new User;
        $user->password = bcrypt($request->password);
        $user->no_hp = $request->no_hp;
        $user->remember_token = str::random(60);
        $user->level_akses = 'toko';
        $user->status = "aktif";
        $user->save();
        return redirect('toko');
    }

    public function password($id){
        return view('auth.password', ['no_telp'=>$id]);
    }

    public function post_password(Request $request){
        if(Auth::attempt(['no_hp' => $request->no_hp, 'password' => $request->password])){
            return redirect('/');
        }
        return back();
    }
}
