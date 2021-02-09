<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori_toko;

class Admin_Manajemen_Kategori_Controller extends Controller
{
    //
    public function kategori_toko(){
        $kategori_toko = Kategori_toko::all();

        return view('users.admin.m-kategori.kategori_toko', ['kategori_toko'=>$kategori_toko]);
    }

    public function hapus_kategori_toko($id){
        Kategori_toko::find($id)->delete();
        return redirect('/admin/manajemen/kategori_toko');
    }

    public function tambah_kategori_toko(Request $request){
        $uppercase = strtoupper($request->kategori);
        $kategori = new Kategori_toko;
        $kategori->kategori = $uppercase;
        $kategori->save();

        return redirect('/admin/manajemen/kategori_toko');
    }

    public function ubah_kategori_toko(Request $request){
        $uppercase = strtoupper($request->kategori);
        $kategori = Kategori_toko::find($request->id);
        $kategori->kategori = $uppercase;
        $kategori->save();

        return redirect('/admin/manajemen/kategori_toko');
    }
}
