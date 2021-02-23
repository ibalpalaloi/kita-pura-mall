<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keranjang_belanja;

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
}
