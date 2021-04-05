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


class AuthController extends Controller
{
    //
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle(){
        $user = Socialite::driver('google')->stateless()->user();
        $find_user = User::where('google_id', $user->id)->first();
        if($find_user){
            Auth::login($find_user);
            return redirect('/home');
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
            return redirect('/buat_akun_biodata');
        }
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
        
        // return view('auth.daftar_mitra.daftar_mitra');
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
            "token"=>"3a5be6424cbf00451c8e3a91fe339437",
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
        }
        $no_telp = substr_replace($no_telp, "+62", 0, 0);

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
            'password' => 'required'
        ]);

        if(Auth::attempt(['no_hp' => $request->no_telp, 'password' => $request->password])){
            

            $user = User::where('no_hp', $request->no_telp)->first();
            
            // dd($user->id);
            Session::put('id_user', $user->id);
            Session::put('no_telp', $request->no_telp);
            Session::put('level_akes', 'user');
            Session::put('status_nomor', $user->status_nomor);
            return redirect('/home');
        }

        $notification = array(
            'message' => 'Maaf Password Salah'
        );     

        return redirect()->back()->with($notification);
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
