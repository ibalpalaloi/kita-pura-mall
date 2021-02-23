<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keranjang_belanja;
use App\Models\Toko;
use App\Models\Product;


class Keranjang_Belanja_Controller extends Controller
{
    //
    public function tambah_keranjang_belanja(Request $request){
        $keranjang = new Keranjang_belanja;
        $keranjang->user_id = Auth()->user()->id;
        $keranjang->toko_id = $request->toko_id;
        $keranjang->product_id = $request->produk_id;
        $keranjang->save();
    }

    public function keranjang(){
        $data_keranjang = array();
        $keranjang = Keranjang_belanja::where('user_id', Auth()->user()->id)->get()->groupBy('toko_id');
        // dd($keranjang);
        
        foreach($keranjang as $key => $data){
            $index = 0;
            $toko = Toko::where('id', $key)->select('nama_toko')->first();
            
            foreach($data as $item){
                $produk = Product::where('id', $item->product_id)->first();
                $data_keranjang[$toko->nama_toko]['nama_produk'][$index] = $produk->nama;
                $data_keranjang[$toko->nama_toko]['harga'][$index] = $produk->harga;
                $index++;
            }
        } 
        return view('users.user.m-keranjang.keranjang');
    }
}
