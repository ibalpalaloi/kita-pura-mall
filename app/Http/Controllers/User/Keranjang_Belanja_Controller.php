<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keranjang_belanja;
use App\Models\Toko;
use App\Models\Product;
use DB;
use App\Models\Landing_page_toko;
use App\Models\Daftar_tunggu_pesanan;

class Keranjang_Belanja_Controller extends Controller
{
    //
    public function tambah_keranjang_belanja(Request $request){
        $check_keranjang = DB::table('keranjang_belanja')->select('id', 'jumlah')->where('toko_id', $request->toko_id)->where('product_id', $request->produk_id)->first();
        $jumlah = 0;
        $keranjang = "";

        if ($check_keranjang){
            $keranjang = Keranjang_belanja::where('id', $check_keranjang->id)->first();
            $jumlah = $check_keranjang->jumlah+1;

        }
        else {
            $keranjang = new Keranjang_belanja;
            $jumlah = 1;
        }
        $keranjang->user_id = Auth()->user()->id;
        $keranjang->toko_id = $request->toko_id;
        $keranjang->product_id = $request->produk_id;
        $keranjang->jumlah = $jumlah;
        $keranjang->save();
        // echo $keranjang->user_id;
    }

    public function keranjang($username, Request $request){
        $data_keranjang = array();
        $data_keranjang_current = array();
        $i = 0;

        $toko_loop = DB::table('keranjang_belanja')->select('no_hp', 'toko_id', 'nama_toko', 'username')->where('user_id', Auth()->user()->id)->distinct()->join('toko', 'toko.id', '=' , 'keranjang_belanja.toko_id')->where('username', '!=', $username)->get();
        // dd($toko_loop);
        $toko_loop_current = DB::table('toko')->select('no_hp', 'toko.id as toko_id', 'nama_toko', 'username')->where('username', '=', $username)->get();
        // dd($toko_loop_current);

        foreach ($toko_loop as $row){
            $data_keranjang[$i]["id_toko"] = $row->toko_id;
            $data_keranjang[$i]["nama_toko"] = $row->nama_toko;
            $data_keranjang[$i]['username'] = $row->username;
            $data_keranjang[$i]['no_hp'] = $row->no_hp;
            $data_keranjang[$i]["product"] = DB::table('keranjang_belanja')->select('keranjang_belanja.id', 'keranjang_belanja.jumlah', 'product.id as product_id', 'nama', 'jenis_harga', 'harga', 'harga_terendah', 'harga_tertinggi', 'diskon', 'foto_produk')->join('product', 'product.id', '=', 'keranjang_belanja.product_id')->where('keranjang_belanja.toko_id', $row->toko_id)->get();
            if ($data_keranjang[$i]["product"]->count() == 0){
                DB::table('keranjang_belanja')->where('toko_id', $row->toko_id)->where("user_id", Auth()->user()->id)->delete();
            }
            $i++;
        }
        $i=0;
        foreach ($toko_loop_current as $row){
            $data_keranjang_current[$i]["id_toko"] = $row->toko_id;
            $data_keranjang_current[$i]["nama_toko"] = $row->nama_toko;
            $data_keranjang_current[$i]['username'] = $row->username;
            $data_keranjang_current[$i]['no_hp'] = $row->no_hp;
            $data_keranjang_current[$i]["product"] = DB::table('keranjang_belanja')->select('keranjang_belanja.id', 'keranjang_belanja.jumlah', 'product.id as product_id', 'nama', 'jenis_harga', 'harga', 'harga_terendah', 'harga_tertinggi', 'diskon', 'foto_produk')->join('product', 'product.id', '=', 'keranjang_belanja.product_id')->where('keranjang_belanja.toko_id', $row->toko_id)->get();
            if ($data_keranjang_current[$i]["product"]->count() == 0){
                DB::table('keranjang_belanja')->where('toko_id', $row->toko_id)->where("user_id", Auth()->user()->id)->delete();
            }
            $i++;
        }

        $toko = Toko::where('username', $username)->first();
        $page = Landing_page_toko::where('toko_id', $toko->id)->first();
        // dd($data_keranjang_current);
        // dd($data_keranjang);
        return view('users.user.m-keranjang.keranjang', compact('data_keranjang', 'data_keranjang_current', 'page', 'toko'));
    }

    public function keranjang_user(){
        $data_keranjang = array();
        $i = 0;
        $toko_loop = DB::table('keranjang_belanja')->select('no_hp', 'toko_id', 'nama_toko', 'username')->where('user_id', Auth()->user()->id)->distinct()->join('toko', 'toko.id', '=' , 'keranjang_belanja.toko_id')->get();

        foreach ($toko_loop as $row){
            $data_keranjang[$i]["id_toko"] = $row->toko_id;
            $data_keranjang[$i]["nama_toko"] = $row->nama_toko;
            $data_keranjang[$i]['username'] = $row->username;
            $data_keranjang[$i]['no_hp'] = $row->no_hp;
            $data_keranjang[$i]["product"] = DB::table('keranjang_belanja')->select('keranjang_belanja.id', 'keranjang_belanja.jumlah', 'product.id as product_id', 'nama', 'jenis_harga', 'harga', 'harga_terendah', 'harga_tertinggi', 'diskon', 'foto_produk')->join('product', 'product.id', '=', 'keranjang_belanja.product_id')->where('keranjang_belanja.toko_id', $row->toko_id)->get();
            if ($data_keranjang[$i]["product"]->count() == 0){
            DB::table('keranjang_belanja')->where('toko_id', $row->toko_id)->where("user_id", Auth()->user()->id)->delete();
            }
            $i++;
        }
        // dd($data_keranjang_current);
        // dd($data_keranjang);
        return view('users.user.m-keranjang.keranjang_user', compact('data_keranjang'));


    }

    public function ubah_jumlah(Request $request){
        // echo $request->jumlah_pesanan;
        $keranjang = Keranjang_belanja::where('id', $request->id)->first();
        $jumlah = 0;
        if ($request->operasi == 'kurang'){
            $jumlah = $request->jumlah_pesanan-1;            
        
        }
        else {
            $jumlah = $request->jumlah_pesanan+1;            
        }
        $keranjang->jumlah = $jumlah;
        $keranjang->save();
        echo $jumlah;
    }

    public function tambah_daftar_tunggu(Request $request){
        $pesanan = new Daftar_tunggu_pesanan;
        $pesanan->id_user = Auth()->user()->id;
        $pesanan->id_toko = $request->id_toko;
        $pesanan->id_product = $request->id_product;
        $pesanan->keynota= $request->keynota;
        $pesanan->save();
    }
}
