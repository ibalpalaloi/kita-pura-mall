<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; 
use App\Models\User;
use App\Models\Biodata;
use App\Models\Otp;
use App\Models\Toko;
use App\Models\Daftar_tunggu_toko;
use Illuminate\Support\Str;
use Auth;
use GuzzleHttp;
use Session;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Mail;
use App\Mail\Gmail;
use App\Models\Notice;
use Illuminate\Support\Facades\Config;
use Illuminate\Notification\Notifiable;
use App\Notifications\TelegramRegister;

class AuthController extends Controller
{
    //
    public function otp_wapibot($no_hp, $otp){
        $no_hp = substr($no_hp, 1);
        $json = [
            "apikey" => "ec523173987ec087571b5d96f91c182e9154cd97",
            "to" => $no_hp,
            "message" => "Kode OTP Anda = ".$otp
        ];
        $client = new GuzzleHttp\Client();
        $response = $client->request('POST', 'https://app.wapibot.com/api/send/text',
        ['headers'=>['Content-Type'=>'application/json'],
        'json'=>$json
        ]);

        // echo $response->getBody();
    }

    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle(){
        $user = Socialite::driver('google')->stateless()->user();
        $find_user = User::where('google_id', $user->id)->first();
        if($find_user){
            if(Auth::attempt(['email' => $find_user->email, 'password' => "kitapuramall18091997"])){
                Session::put('id_user', $find_user->id);
                Session::put('level_akes', $find_user->level_akses);
                Session::put('no_telp', $find_user->no_hp);
                Session::put('email', $find_user->email);
                Session::put('status_nomor', "Belum Terverifikasi");
            }
        }else{
            $id_user = $this->autocode('USR-');
            $new_user = User::create([
                'id' => $id_user,
                'level_akses' => 'user',
                'password' => bcrypt("kitapuramall18091997"),
                'status' => 'aktif',
                'google_id' => $user->id,
                'email' => $user->email,
                'remember_token' => str::random(60)
            ]);
            $biodata = new Biodata;
            $biodata->users_id = $id_user;
            $biodata->username = $this->autocode('user');
            $biodata->save();
            Auth::login($new_user);
        }
        if(Auth()->user()){
            return redirect('/home');
        }
        return redirect()->back();
    }

    public function register(){
        return view('auth.register');
    }

    public function register_api(){
        return view('auth.register_api');
    }

    public function buat_akun(Request $request){
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
            'no_hp' => 'required|min:8'
        ]);

        $id_user = $this->autocode('USR-');

        $user = new User;
        $user->id = $id_user;
        $user->password = bcrypt($request->password);
        $user->no_hp = $this->generate_no_telp($request->no_hp);
        $user->email = $request->email;
        $user->remember_token = str::random(60);
        $user->level_akses = 'user';
        $user->status = "aktif";
        $user->save();
        
        $biodata = new Biodata;
        $biodata->users_id = $id_user;
        $biodata->username = $this->autocode('user');
        $biodata->save();

        if(Auth::attempt(['no_hp' => $request->no_hp, 'password' => $request->password])){

            Session::put('id_user', $id_user);
            Session::put('level_akes', 'user');
            Session::put('no_telp', $request->no_hp);
            Session::put('email', $request->email);
            Session::put('status_nomor', "Belum Terverifikasi");
            
            // dd(Session::has('no_telp'));

            
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){

            Session::put('id_user', $id_user);
            Session::put('level_akes', 'user');
            Session::put('no_telp', $request->no_hp);
            Session::put('email', $request->email);
            Session::put('status_nomor', "Belum Terverifikasi");
            
            // dd(Session::has('no_telp'));
        }   

        return redirect('/buat_akun_biodata');
        
    }

    public function buat_akun_biodata(){
        $biodata = Biodata::where('users_id', Auth()->user()->id)->first();
        return view('auth.buat_akun', compact('biodata'));
    }

    public function simpan_foto(){
        
    }

    public function login(){
        // return redirect('home');
        // return view('auth.daftar_mitra.daftar_mitra');
        return view('auth.login');
    }

    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('/');
    }

    public function buat_kode_otp(){
        $status = 0;
        while($status == 0){
            $kode_otp = rand();
            $kode_otp = substr($kode_otp, 0, 6);
            $cek_kode = Otp::where('kode_otp', $kode_otp)->get();
            if(count($cek_kode) == 0){
                $status = 1;
            }
        }
        return $kode_otp;
    }

    public function input_otp(Request $request){
        
        $validated = $request->validate([
            'no_hp' => 'required',
            'email' => 'required',
        ]);
        Otp::where('no_hp', $this->generate_no_telp($request->no_hp))->delete();
        Otp::where('email', $request->email)->delete();

        $cek_email = User::where('email', $request->email)->get();
        if(count($cek_email)>0){
            return redirect('/register')->with('error', 'Email Sudah Tersedia');
        }

        $cek_no_hp = User::where('no_hp', $this->generate_no_telp($request->no_hp))->get();
        if(count($cek_no_hp)>0){
            return redirect('/');
            return redirect('/register')->with('error', 'Nomor Telah Tersedia');
        }

        $otp = new Otp;
        $otp->no_hp = $this->generate_no_telp($request->no_hp);
        $otp->email = $request->email;
        $otp->kode_otp = $this->buat_kode_otp();
        $otp->status = "belum dikirim";
        $otp->save();
            
        
        $this->otp_wapibot($otp->no_hp, $otp->kode_otp);
        $this->send_email_otp($otp->email, $otp->kode_otp);
        return redirect('/input_otp/'.$otp->email.'/'.$otp->no_hp);
    }


    public function send_email_otp($email, $otp){
        $data = [
            'title' => 'Kode Otp Akun Anda',
            'body' => '',
            'otp' => $otp
        ];

        Mail::to($email)->send(new Gmail($data));
    }

    public function view_input_otp($email, $no_hp){
        $otp = Otp::where([
            ['email', $email],
            ['no_hp', $no_hp]
        ])->get();
        if(count($otp)>0){
            return view('auth.input_otp', ['email'=>$email, 'no_hp'=>$no_hp]);
        }
        return redirect('/');
        
    }

    public function view_input_password($email, $no_hp){
        $otp = Otp::where([
            ['email', $email],
            ['no_hp', $no_hp]
        ])->get();
        if(count($otp)>0){
            return view('auth.input_password', ['email'=>$email, 'no_hp'=>$no_hp]);
        }
        return redirect('/');
        
    }


    public function post_login(Request $request){
        $no_telp = $request->nomor_hp;
        $no_telp = str_replace("-","", $no_telp);
        if ($no_telp[0] == 0){
            $no_telp = substr($no_telp, 1);
        }
        $no_telp = substr_replace($no_telp, "+62", 0, 0);
        $user = User::where('no_hp', $no_telp)->first();

        if(!empty($user)){
            // $toko = Daftar_tunggu_toko::where('users_id', $user->id)->first();
            // if ($toko){
            //     $notification = array(
            //         'message' => 'Masih Menunggu'
            //     );     
            //     return redirect()->back()->with($notification);
            // }
            return redirect('/masuk/'.$no_telp);

        }

        // $this->buat_kode_otp($no_telp);

        // echo $response->getStatusCode.'<br/>';
        // echo $response->getBody(); 
        // echo json_encode($json);

        return redirect('daftar/'.$no_telp);
    }

    public function post_login_v2(Request $request){
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if(str_contains($request->email, '@')){
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            

                $user = User::where('email', $request->email)->first();
                
                // dd($user->id);
                Session::put('id_user', $user->id);
                Session::put('no_telp', $request->no_telp);
                Session::put('level_akes', 'user');
                Session::put('status_nomor', $user->status_nomor);
            }
        }
        else{
            $no_hp = $this->generate_no_telp($request->email);
            if(Auth::attempt(['no_hp' => $no_hp, 'password' => $request->password])){
            

                $user = User::where('no_hp', $no_hp)->first();
                
                // dd($user->id);
                Session::put('id_user', $user->id);
                Session::put('no_telp', $request->no_telp);
                Session::put('level_akes', 'user');
                Session::put('status_nomor', $user->status_nomor);
                Session::get('id_user');
                
            }
        }
        
        if(Auth()->user()){
            return redirect('/home');
        }
        return redirect()->back();

    }

    public function post_biodata_awal(Request $request){
        $biodata = Biodata::where('users_id', Auth()->user()->id)->first();
        $biodata->nama = $request->nama_lengkap;
        $biodata->jenis_kelamin = $request->jenis_kelamin;
        $biodata->save();
        return redirect('/home');
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
                            ['email', $request->email],
                            ['no_hp', $request->no_hp],
                            ['kode_otp', $request->kode_otp]
        ])->get();
        if(count($otp)>0){
            return redirect('/input_password/'.$request->email.'/'.$request->no_hp);
        }
        return redirect('/input_otp/'.$request->email.'/'.$request->no_hp);
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
        $biodata->users_id = $id_user;
        $biodata->username = $this->autocode('user');
        $biodata->save();

        if(Auth::attempt(['no_hp' => $request->no_telp, 'password' => $request->password])){

            Session::put('id_user', $id_user);
            Session::put('level_akes', 'user');
            Session::put('no_telp', $request->no_telp);
            Session::put('status_nomor', "Belum Terverifikasi");
            
            // dd(Session::has('no_telp'));

            return redirect('/home');
        }
    }

    public function password($id){

        return view('auth.verifikasi_password', ['no_telp'=>$id]);
        
        // return view('auth.password', ['no_telp'=>$id]);

    }

    public function post_password(Request $request){
        // dd($request->all());
        $this->validate($request,[
            'password' => 'required',
            'email' => 'required',
            'no_hp' => 'required'
        ]);
        

        $id_user = $this->autocode('USR-');
        $user = new User;
        $user->id = $id_user;
        $user->password = bcrypt($request->password);
        $user->no_hp = $request->no_hp;
        $user->email = $request->email;
        $user->remember_token = str::random(60);
        $user->level_akses = 'user';
        $user->status = "aktif";
        $user->save();

        $biodata = new Biodata;
        $biodata->users_id = $id_user;
        $biodata->nama = "";
        $biodata->jenis_kelamin = "";
        $biodata->alamat = "$request->alamat";
        $biodata->username = $this->autocode('user');
        $biodata->save();

        $otp = Otp::where([
            ['email', $request->email],
            ['no_hp', $request->no_hp]
        ])->delete();
        
        Auth::login($user);
        return redirect('/');

    }

    // public function untuk_mitra(){
    //     $data = Daftar_tunggu_toko::where('users_id', Auth()->user()->id)->get();
    //     if(count($data) == 0){
    //         return redirect('/akun/jadi-mitra/premium');
    //     }
    //     return redirect('/home');   
    // }

    public function ganti_nomor_hp(Request $request){
        $user = User::where('id', Auth()->User()->id)->first();
        $user->no_hp = $request->nomor;
        $user->save();
        Session::put('no_telp', $request->nomor);
    }

    public function kirim_ulang_otp(){
        // kode ganti OTP disini

        // sampai sini
        date_default_timezone_set('Asia/Makassar');
        $waktu = date('Y-m-d H:i:s');
        $user = User::where('id', Auth()->User()->id)->first();
        if ($user->waktu_validasi == null){
            $user->waktu_validasi = $waktu;
            $user->save();
            $newtimestamp = strtotime("$waktu + 1 minute");
            $deadline = date('Y-m-d H:i:s', $newtimestamp);
            $diff  = strtotime($deadline) - strtotime($waktu);
            if ($diff > 0){
                echo $diff;
            }
            else {
                $user->waktu_validasi = null;
                $user->save();
            }

        }
        else {
            $newtimestamp = strtotime("$user->waktu_validasi + 1 minute");
            $deadline = date('Y-m-d H:i:s', $newtimestamp);
            $diff  = strtotime($deadline) - strtotime($waktu);
            if ($diff > 0){
                echo $diff;
            }
            else {
                $user->waktu_validasi = null;
                $user->save();
            }
        }
    }

    public function set_null(){
        $user = User::where('id', Auth()->User()->id)->first();
        $user->waktu_validasi = null;
        $user->save();
    }

    public function notif_biodata_lengkap(Request $request){
        $biodata = Biodata::where('users_id', Auth()->User()->id)->first();
        $biodata->notif = 2;
        $biodata->save();

    }

    public function notif_toko_lengkap(Request $request){
        $toko = Toko::where('users_id', Auth()->User()->id)->first();
        $toko->notif = 2;
        $toko->save();

    }

    public function post_biodata(Request $request){
        dd($request);
        $no_telp = $request->no_hp;
        $no_telp = str_replace("-","", $no_telp);
        if ($no_telp[0] == 0){
            $no_telp = substr($no_telp, 1);
        }
        $no_telp = substr_replace($no_telp, "+62", 0, 0);

        $id_user = $this->autocode('USR-');

        $user = new User;
        $user->id = $id_user;
        $user->password = bcrypt($request->password);
        $user->no_hp = $no_telp;
        $user->remember_token = str::random(60);
        $user->level_akses = 'user';
        $user->status = "aktif";
        $user->save();

        $biodata = new Biodata;
        $biodata->users_id = $id_user;
        $biodata->nama = $request->nama_lengkap;
        $biodata->jenis_kelamin = $request->jenis_kelamin;
        $biodata->alamat = $request->alamat;
        $biodata->
        $biodata->username = $this->autocode('user');
        $biodata->save();
    }
}
