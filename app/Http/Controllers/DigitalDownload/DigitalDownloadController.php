<?php

namespace App\Http\Controllers\DigitalDownload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Band;
use Session;

class DigitalDownloadController extends Controller
{
    //
    public function index()
    {
        $band = Band::where('users_id', Session::get('id_user'))->first();
        if ($band){
            return redirect('digital-download/akun');
        }
    	return redirect('digital-download/daftar');
    }

    public function register(){
        $band = Band::where('users_id', Session::get('id_user'))->first();
        if ($band){
            return redirect('digital-download/akun');
        }
        $kota = Provinsi::find(72)->kabupaten_kota;
        // dd($kota);
    	return view('users/user/m-digital-download/register', compact('kota'));
    }
}
