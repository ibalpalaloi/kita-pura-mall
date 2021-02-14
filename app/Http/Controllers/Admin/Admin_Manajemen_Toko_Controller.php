<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori_toko;
use App\Models\Daftar_tunggu_toko;
use App\Models\Toko;

class Admin_Manajemen_Toko_Controller extends Controller
{
    //
    public function index(){
        $toko = Toko::all();
        return view('users.admin.m-toko.index', ['toko'=> $toko]);
    }

    public function daftar_tunggu_toko(){
        $daftar_tunggu = Daftar_tunggu_toko::all();
        return view('users.admin.m-toko.daftar_tunggu', ['daftar_toko'=>$daftar_tunggu]);
    }

    public function daftar_tunggu_toko_detail($id){
        $toko = Daftar_tunggu_toko::find($id);
        return view('users.admin.m-toko.daftar_tunggu_detail', ['toko'=>$toko]);
    }
}
