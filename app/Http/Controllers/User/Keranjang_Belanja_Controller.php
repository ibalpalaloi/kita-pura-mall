<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keranjang_belanja;
use App\Models\Toko;
use App\Models\Product;
<<<<<<< HEAD
use DB;
=======

>>>>>>> 08ddb32d41cb796e8b9e7c5db954b58d1cf466f5

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
<<<<<<< HEAD
        $i = 0;
        $toko = DB::table('keranjang_belanja')->select('toko_id', 'nama_toko')->where('user_id', Auth()->user()->id)->distinct()->join('toko', 'toko_id', '=' , '')->get();
        // dd($toko);
        foreach ($toko as $row){
            $data_keranjang[$i]["id_toko"] = $toko->toko_id;
            $data_keranjang[$i]["nama_toko"] = $toko->nama_toko;
            $data_keranjang[$i]["product"] = DB::table('keranjang_belanja')->select('jenis_harga', 'harga', 'harga_terendah', 'harga_tertinggi', 'diskon', 'foto_produk')->join('product', 'product.id', '=', 'keranjang_belanja.product_id')->where('toko_id', $toko->toko_id)->get();
            $i++;
        }
        // $keranjang = Keranjang_belanja::where('user_id', Auth()->user()->id)->get()->groupBy('toko_id');
        dd($data_keranjang);
    
=======
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
>>>>>>> 08ddb32d41cb796e8b9e7c5db954b58d1cf466f5
        // dd($keranjang['TK-021120210461'][0]->toko->nama_toko);
        return view('users.user.m-keranjang.keranjang', ['data_keranjang'=>$keranjang]);
    }
}
