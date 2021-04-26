<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Toko;
use App\Models\Kategori_toko;
use App\Models\Kategori;
use Carbon\Carbon;

class Diagram_Controller extends Controller
{
    //
    public function user(){
        // digaram user
        $user = User::latest()->first();
        $array_date = [];
        $array_count_user = [];
        $array_count_toko = [];
        for($i=30; $i>0; $i--){
            $date = date('y-m-d', strtotime('-'. $i+1 .' days'));
            $user = User::where('created_at','like', '%'.$date.'%')->count(); 
            $toko = Toko::where('created_at','like', '%'.$date.'%')->count(); 
            $array_count_user[] = $user;
            $array_count_toko[] = $toko;
            $array_date[] = $date;
        }
        $data = [' ', ' '];

        // diagram kategori toko
        $kategori = Kategori_toko::all();
        $kategori_toko = [];
        $jumlah_toko = [];
        foreach($kategori as $data){
            $kategori_toko[] = $data->kategori;
            $jumlah_toko[] = $data->kategorinya_toko->count();
        }

        // diagram kategori produk
        $kategori_produk_ = Kategori::all();
        $kategori_produk = [];
        $jumlah_kategori_produk;
        foreach($kategori_produk_ as $data){
            $kategori_produk[] = $data->nama;
            $jumlah_kategori_produk[] = $data->product->count();
        }


        return view('users.admin.diagram.user', compact('array_date', 'array_count_user', 'array_count_toko', 'data',
                                                        'kategori_toko', 'jumlah_toko',
                                                        'kategori_produk', 'jumlah_kategori_produk'
                                                        ));
    }

    public function diagram_user_pilih(Request $request){
        $validated = $request->validate([
            'bulan' => 'required',
            'tahun' => 'required',
        ]);
        $date = $request->tahun.'-'.$request->bulan.'-19';
        $array_date = [];
        $array_count_user = [];
        $array_count_toko = [];
        for($i=1; $i<=30; $i++){
            $date = $request->tahun.'-'.$request->bulan.'-'.$i;
            if($i<10){
                $date = $request->tahun.'-'.$request->bulan.'-0'.$i;
            }
            $user = User::where('created_at','like', '%'.$date.'%')->count(); 
            $toko = Toko::where('created_at','like', '%'.$date.'%')->count(); 
            $array_count_user[] = $user;
            $array_count_toko[] = $toko;
            $array_date[] = $date;
        }
        $data = [$request->bulan, $request->tahun];
        
        $kategori = Kategori_toko::all();
        $kategori_toko = [];
        $jumlah_toko = [];
        foreach($kategori as $data){
            $kategori_toko[] = $data->kategori;
            $jumlah_toko[] = $data->kategorinya_toko->count();
        }
        return view('users.admin.diagram.user', compact('array_date', 'array_count_user', 'array_count_toko', 'data',
                                                        'kategori_toko', 'jumlah_toko'
                                                        ));
    }


}
