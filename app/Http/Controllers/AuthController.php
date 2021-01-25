<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; 
use App\Models\User;
use App\Models\Otp;
use Illuminate\Support\Str;
use Auth;
use GuzzleHttp;

class AuthController extends Controller
{
    //
    public function login(){
        return view('auth.login');
    }

    public function post_login(Request $request){
        $no_telp = $request->nomor_hp;
        $no_telp = str_replace("-","", $no_telp);
        $no_telp = substr_replace($no_telp, "+62", 0, 0);
        $user = User::where('no_hp', $no_telp)->first();
        if(!empty($user)){
            return view('auth.verifikasi_password', ['no_telp'=>$no_telp]);
        }
        
        $kode_otp = rand();
        $kode_otp = substr($kode_otp, 0, 4);
        $json = [
            "token"=>"603b0d31a5502ba608ad0f56c9265c57",
            "source"=>6285696069326,
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
        // echo $response->getStatusCode.'<br/>';
        // echo $response->getBody(); 
        // echo json_encode($json);
        return view('auth.verifikasi_number', ['no_telp'=>$no_telp]);
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
        if(Auth::attempt(['no_hp' => $request->no_telp, 'password' => $request->password])){
            return redirect('/');
        }
        return back();
    }

    public function post_otp(Request $request){
        $otp = Otp::where([
            ['no_hp', $request->no_telp],
            ['kode_otp', $request->kode_otp]
        ])->first();
        if(!empty($otp)){
            return redirect('/');
        }
        return view('auth.verifikasi_number');
    }
}
