<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; 
use App\Models\User;
use Illuminate\Support\Str;
use Auth;
use Session;

class Admin_Auth_Controller extends Controller
{
    //
    public function login(){

        return view('auth/admin/login');
    }

    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('/admin');
    }

    public function post_login(Request $request)
    {

        $this->validate($request,[
            'username' => 'required',
            'password' => 'required'
        ]);

        // dd($request->all());

        if(Auth::attempt(['no_hp' => $request->username, 'password' => $request->password])){

            $user = User::where('no_hp', $request->username)->first();

            if($user->level_akses != 'admin'){

                Auth::logout();

                $notification = array(
                    'message' => 'Maaf Username & Password Salah'
                );     

                return redirect()->back()->with($notification);
            }

            // dd($user->id);
            Session::put('level_akses', $user->level_akses);
            Session::put('users_id', $user->id);
            Session::put('username', $user->no_hp);

            return redirect('/admin/beranda');
        }
        
        $notification = array(
            'message' => 'Maaf Username & Password Salah'
         );     

        return redirect()->back()->with($notification);
    }
}
