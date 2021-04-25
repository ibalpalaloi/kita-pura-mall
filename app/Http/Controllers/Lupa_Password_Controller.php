<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kode_lupa_password;
use Illuminate\Support\Facades\Mail;
use App\Mail\Send_Kode_Lupa_Password;
use Auth;
use GuzzleHttp;
use App\Models\Notice;
use Illuminate\Support\Facades\Config;
use Illuminate\Notification\Notifiable;
use App\Notifications\TelegramRegister;


class Lupa_Password_Controller extends Controller
{
    //
    public function otp_wapibot($no_hp, $otp){
        $json = [
            "apikey" => "ec523173987ec087571b5d96f91c182e9154cd97",
            "to" => $no_hp,
            "message" => "Kode Lupa Password Anda = ".$otp
        ];
        $client = new GuzzleHttp\Client();
        $response = $client->request('POST', 'https://app.wapibot.com/api/send/text',
        ['headers'=>['Content-Type'=>'application/json'],
        'json'=>$json
        ]);

        // echo $response->getBody();
    }

    public function view_cari_akun(){
        return view('auth.lupa_password_cari_akun');
    }

    public function post_no_hp(Request $request){
        $no_hp = $this->generate_no_telp($request->no_hp);
        $user = User::where('no_hp', $no_hp)->first();
        if($user){
            return view('auth.lupa_password_kirim_otp', compact('user'));
        }
        else{
            return redirect()->back()->with('error', 'Nomor Tidak Ditemukan');
        }
        
    }

    public function post_kirim_kode(Request $request){
        // dd($request);
        $tb_kode = Kode_lupa_password::where('user_id', $request->id_user)->first();
        $jenis = $request->radio;
        $kode = $this->buat_kode_otp();
        if(empty($tb_kode)){
            $user = User::where('id', $request->id_user)->first();
            if($jenis == 'email'){
                $akun = 'email';
            }
            if($jenis == 'whatsapp'){
                $akun = 'Whatsapp';
            }
            $tb_kode = new Kode_lupa_password;
            $tb_kode->user_id = $user->id;
            $tb_kode->jenis = $jenis;
            $tb_kode->kode = $kode;
            $tb_kode->save();
        }
        $user = User::where('id', $request->id_user)->first();

        if($jenis == 'email'){
            $akun = 'email';
            $this->kirim_email_kode($user->email, $tb_kode->kode);
        }
        if($jenis == 'whatsapp'){
            $akun = 'Whatsapp';
            $user = User::where('id', $request->id_user)->first();
            $no_hp = substr($user->no_hp, 1);
            $this->otp_wapibot($no_hp, $tb_kode->kode);

        }

        return redirect('/lupa_password/input_kode/'.$tb_kode->id);
    }

    public function view_input_kode($id){
        $kode = Kode_lupa_password::find($id);
        return view('auth.lupa_password_input_kode', compact('kode'));
    }

    public function post_kode_lupa_password(Request $request){
        $kode = Kode_lupa_password::where([
            ['user_id', $request->id_user],
            ['kode', $request->kode_otp]
        ])->first();
        if($kode){
            $user = User::where('id', $request->id_user)->first();
            return view('auth.lupa_password_input_baru', compact('user'));
        }
        else{
            return back()->with('error', 'Kode Salah');
        }
    }

    public function post_new_password(Request $request){
        $validated = $request->validate([
            'password' => 'required',
            'id_user' => 'required'
        ]);
        $user = User::where('id', $request->id_user)->first();
        $user->password = bcrypt($request->password);
        $user->save();
        $user = User::where('id', $request->id_user)->first();
        Kode_lupa_password::where('user_id', $request->id_user)->delete();
        Auth::login($user);
        return redirect('/');
    }

    public function kirim_email_kode($email, $kode){
        $data = [
            'title' => 'Kode Otp Akun Anda',
            'body' => '',
            'otp' => $kode
        ];

        Mail::to($email)->send(new Send_Kode_Lupa_Password($data));
    }

    public function generate_no_telp($no_hp){
        $no_telp = $no_hp;
        $no_telp = str_replace("-","", $no_telp);
        $no_telp = str_replace(" ","", $no_telp);
        if ($no_telp[0] == 0){
            $no_telp = substr($no_telp, 1);
            $no_telp = substr_replace($no_telp, "+62", 0, 0);
        }
        elseif($no_telp[0] == "+"){
            $no_telp = $no_telp;
        }
        

        return $no_telp;
    }

    public function buat_kode_otp(){
        $status = 0;
        while($status == 0){
            $kode_otp = rand();
            $kode_otp = substr($kode_otp, 0, 6);
            $cek_kode = Kode_lupa_password::where('kode', $kode_otp)->get();
            if(count($cek_kode) == 0){
                $status = 1;
            }
        }
        return $kode_otp;
    }
}
