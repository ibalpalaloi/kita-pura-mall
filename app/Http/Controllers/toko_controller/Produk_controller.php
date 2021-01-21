<?php

namespace App\Http\Controllers\toko_controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Sub_kategori;

class Produk_controller extends Controller
{
    //
    public function semua_produk(){
        return view('toko.semua_produk');
    }

    public function tambah_produk(){
        $kategori = Kategori::all();
        return view('toko.tambah_produk', ['kategori'=>$kategori]);
    }

    public function get_sub_kategori(Request $request){
        $sub_kategori = Sub_kategori::where('kategori_id', $request->value)->get();
        $output = '<option value=" "></option>';
        foreach($sub_kategori as $data){
            $output .= '<option value="'.$data->id.'">'.$data->nama.'</option>';
        }
        echo $output;

    }
}
