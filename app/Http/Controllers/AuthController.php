<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; 
use App\Models\User;
use App\Models\Biodata;
use App\Models\Otp;
use Illuminate\Support\Str;
use Auth;
use GuzzleHttp;
use Session;


class AuthController extends Controller
{
    //
    public function login(){
        return view('auth.login');
    }

    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('/');
    }

    public function buat_kode_otp($no_telp){

        Otp::where('no_hp', $no_telp)->delete();
        $kode_otp = rand();
        $kode_otp = substr($kode_otp, 0, 6);

        $json = [
            "token"=>"fc7904f159b3b18696813a28319c049c",
            "source"=>628114588477,
            "destination"=>$no_telp,
            "type"=>"text",
            "body"=>[
                "text"=>"Kode OTP Login Anda ".$kode_otp
            ]
        ];
        $client = new GuzzleHttp\Client();
        $response = $client->request('POST', 'http://waping.es/api/send',
         ['header'=>['Content-Type'=>'application/json'],
         'json'=>$json
         ]
        );
        
        $otp = new Otp;
        $otp->no_hp = $no_telp;
        $otp->kode_otp = $kode_otp;
        $otp->save();

    }


    public function post_login(Request $request){
        // dd($request->all());
        $no_telp = $request->nomor_hp;
        $no_telp = str_replace("-","", $no_telp);
        $no_telp = substr_replace($no_telp, "+62", 0, 0);
        $user = User::where('no_hp', $no_telp)->first();

        if(!empty($user)){

            return redirect('/masuk/'.$no_telp);

        }

        $this->buat_kode_otp($no_telp);

        // echo $response->getStatusCode.'<br/>';
        // echo $response->getBody(); 
        // echo json_encode($json);

        return redirect('/verifikasi-otp/'.$no_telp);
    }

    public function refresh_otp($id){

        $no_telp = $id;

        $this->buat_kode_otp($no_telp);


        $notification = array(
            'message' => 'Kode OTP Telah Dikirim Kembali'
         );     

        return redirect()->back()->with($notification);
    }
  

    public function verifikasi_otp($id){

        $no_telp = $id;

        return view('auth.verifikasi_number', ['no_telp'=>$no_telp]);
    }

    public function post_otp(Request $request){
        
        $otp = Otp::where([
            ['no_hp', $request->no_telp],
            ['kode_otp', $request->kode_otp]
        ])->first();

        if(!empty($otp)){

            return redirect('/daftar/'.$request->no_telp);
        }

        $notification = array(
            'message' => 'Maaf Kode OTP Dimasukkan Salah, Silahkan Masukkan Kembali Kode OTP Yang Benar'
         );     

        return redirect()->back()->with($notification);
    }



    public function sign_up($id){
        return view('auth.sign_up', ['no_telp'=>$id]);
    }

    public function autocode($kode){
        $timestamp = time(); 
        $random = rand(10, 100);
        $current_date = date('mdYs'.$random, $timestamp); 
        return $kode.$current_date;
    }


    public function post_sign_up(Request $request){
        $this->validate($request,[
            'no_telp' => 'required',
            'password' => 'required',
            'konfirmasi_password' => Rule::in([$request->password])
        ]);

        $id_user = $this->autocode('USR-');

        $user = new User;
        $user->id = $id_user;
        $user->password = bcrypt($request->password);
        $user->no_hp = $request->no_telp;
        $user->remember_token = str::random(60);
        $user->level_akses = 'user';
        $user->status = "aktif";
        $user->save();

        $biodata = new Biodata;
        $biodata->user_id = $id_user;
        $biodata->username = $this->autocode('user');
        $biodata->save();

        if(Auth::attempt(['no_hp' => $request->no_telp, 'password' => $request->password])){

            Session::put('id_user', $id_user);
            Session::put('no_telp', $request->no_telp);
            
            // dd(Session::has('no_telp'));

            return redirect('/akun');
        }
    }

    public function password($id){
                
        return view('auth.verifikasi_password', ['no_telp'=>$id]);
        
        // return view('auth.password', ['no_telp'=>$id]);

    }

    public function post_password(Request $request){
        // dd($request->all());
        $this->validate($request,[
            'password' => 'required'
        ]);

        if(Auth::attempt(['no_hp' => $request->no_telp, 'password' => $request->password])){

            $user = User::where('no_hp', $request->no_telp)->first();

            // dd($user->id);
            Session::put('id_user', $user->id);
            Session::put('no_telp', $request->no_telp);

            return redirect('/home');
        }

        $notification = array(
            'message' => 'Maaf Password Salah'
         );     

        return redirect()->back()->with($notification);
    }
    
}
