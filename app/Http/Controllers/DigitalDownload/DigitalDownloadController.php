<?php

namespace App\Http\Controllers\DigitalDownload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Band;
use App\Models\Dd_album_single;
use Session;
use DB;

class DigitalDownloadController extends Controller
{
    //
    public function index(){
        $album_cover = DB::table('dd_album_single')->select('dd_album_single.*', 'band.nama_band', 'band.deskripsi')->join('band', 'band.id', '=', 'dd_album_single.id_band')->inRandomOrder()->where('dd_album_single.status', 'album')->first();
        $lagu_cover = DB::table('dd_lagu')->select('dd_lagu.judul as judul_lagu', 'dd_album_single.judul as album', 'harga', 'status', 'foto_cover', 'id_band', 'id_album_single')->join('dd_album_single', 'dd_album_single.id', '=', 'dd_lagu.id_album_single')->where('dd_album_single.id', '=', $album_cover->id)->limit(6)->get();
        $lagu = DB::table('dd_lagu')->select('dd_lagu.id','dd_lagu.judul as judul_lagu', 'dd_album_single.judul as album', 'harga', 'status', 'foto_cover', 'id_band', 'id_album_single')->inRandomOrder()->join('dd_album_single', 'dd_album_single.id', '=', 'dd_lagu.id_album_single')->where('dd_album_single.id', '!=', $album_cover->id)->limit(6)->get();
        // dd($lagu);
        return view('users/user/m-digital-download/index', compact('album_cover', 'lagu', 'lagu_cover'));
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
