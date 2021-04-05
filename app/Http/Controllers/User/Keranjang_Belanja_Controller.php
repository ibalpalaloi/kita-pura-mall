<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keranjang_belanja;
use App\Models\Toko;
use App\Models\Product;
use DB;
use App\Models\Landing_page_toko;

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
        $i = 0;
        $toko = DB::table('keranjang_belanja')->select('toko_id', 'nama_toko')->where('user_id', Auth()->user()->id)->distinct()->join('toko', 'toko.id', '=' , 'keranjang_belanja.toko_id')->get();
        // dd($toko);
        foreach ($toko as $row){
            $data_keranjang[$i]["id_toko"] = $row->toko_id;
            $data_keranjang[$i]["nama_toko"] = $row->nama_toko;
            $data_keranjang[$i]["product"] = DB::table('keranjang_belanja')->select('nama', 'jenis_harga', 'harga', 'harga_terendah', 'harga_tertinggi', 'diskon', 'foto_produk')->join('product', 'product.id', '=', 'keranjang_belanja.product_id')->where('keranjang_belanja.toko_id', $row->toko_id)->get();
            if ($data_keranjang[$i]["product"]->count() == 0){
                DB::table('keranjang_belanja')->where('toko_id', $row->toko_id)->where("user_id", Auth()->user()->id)->delete();
            }
            $i++;
        }
        return view('users.user.m-keranjang.keranjang', compact('data_keranjang'));
    }
}
