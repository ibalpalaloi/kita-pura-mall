<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori_toko;
use App\Models\Kategori;
use App\Models\Sub_kategori;


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

    public function kategori_produk(){
        $kategori = Kategori::all();
        return view('users.admin.m-kategori.kategori_produk', ['kategori'=>$kategori]);
    }

    public function get_sub_kategori(Request $request){
        $sub_kategori = Sub_kategori::where('kategori_id', $request->id)->get();
        $output = '';
        foreach($sub_kategori as $data){
            $output .= '<a onclick="hapus_sub_kategori('.$data->id.')" class="btn delete_sub_kategori" style="float: right;" data-id="'.$data->id.'"><i class="fa fa-trash"></i></a>';
            $output .= '<a onclick="edit_sub_kategori('.$data->id.', \''.$data->nama.'\')" class="btn edit_sub_kategori" style="float: right;" data-id="'.$data->id.'" data-kategori="'.$data->nama.'"><i class="fa fa-pencil"></i></a>';
            $output .= '<li class="nav-item"><a class="nav-link" href="#">'.$data->nama.'</a></li>';
        }
        echo $output;
    }

    public function ubah_kategori_produk(Request $request){
        $uppercase = strtoupper($request->kategori);
        $produk = Kategori::find($request->id);
        $produk->nama = $uppercase;
        $produk->save();

        return redirect('/admin/manajemen/kategori_produk');
    }

    public function hapus_kategori_produk($id){
        Kategori::find($id)->delete();

        return redirect('/admin/manajemen/kategori_produk');
    }

    public function ubah_sub_kategori_produk(Request $request){
        $uppercase = strtoupper($request->kategori);
        $kategori = Sub_kategori::find($request->id);
        $kategori->nama = $uppercase;
        $kategori->save();

        return redirect('/admin/manajemen/kategori_produk');
    }

    public function hapus_sub_kategori_produk($id){
        Sub_kategori::find($id)->delete();

        return redirect('/admin/manajemen/kategori_produk');
    }

    public function tambah_kategori_produk(Request $request){
        $uppercase = strtoupper($request->kategori);
        $kategori = new kategori;
        $kategori->nama = $uppercase;
        $kategori->save();

        return redirect('/admin/manajemen/kategori_produk');
    }

    public function tambah_sub_kategori_produk(Request $request){
        $uppercase = strtoupper($request->sub_kategori);
        $sub_kategori = new Sub_kategori;
        $sub_kategori->kategori_id = $request->kategori;
        $sub_kategori->nama = $uppercase;
        $sub_kategori->save();

        return redirect('/admin/manajemen/kategori_produk');

    }
}
