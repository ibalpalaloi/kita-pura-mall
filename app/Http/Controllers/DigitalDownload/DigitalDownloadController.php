<?php

namespace App\Http\Controllers\DigitalDownload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provinsi;

class DigitalDownloadController extends Controller
{
    //
    public function index()
    {
    	return redirect('digital-download/daftar');
    }

    public function register(){
        $kota = Provinsi::find(72)->kabupaten_kota;
        // dd($kota);
    	return view('users/user/m-digital-download/register', compact('kota'));
    }
}
