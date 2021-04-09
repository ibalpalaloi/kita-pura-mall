<?php

namespace App\Http\Controllers\toko_controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Toko;
use App\Models\Foto_maps;
use DB;

class Toko_controller extends Controller
{
    //
    public function index(Request $request){
        $cari = $request->get('cari');
        if ($cari == 'all' or $cari==""){
            $tokos = DB::table('toko')->select('toko.id', 'nama_toko', 'username', 'logo_toko', 'foto_cover', 'jenis_mitra', DB::raw('count(product.id) as jumlah_produk'))->join('product', 'product.toko_id', '=', 'toko.id')->where('toko.status', 'Aktif')->orWhere('status', 'Libur')->groupBy('toko.id', 'nama_toko', 'logo_toko', 'foto_cover', 'username', 'jenis_mitra')->orderByRaw('RAND()')->paginate(20);
            // $tokos = Toko::where('status', 'Aktif')->orWhere('status', 'Libur')->orderByRaw('RAND()')->paginate(20);
        }
        else{
            // $tokos = DB::table('toko')->select('toko.id', 'nama_toko', 'username', 'logo_toko', 'foto_cover', 'jenis_mitra', DB::raw('count(product.id) as jumlah_produk'))->join('product', 'product.toko_id', '=', 'toko.id')->where('toko.status', 'Aktif')->orWhere('status', 'Libur')->groupBy('toko.id', 'nama_toko', 'logo_toko', 'foto_cover', 'username', 'jenis_mitra')->where('nama_toko', 'like', '%'.$cari.'%')->paginate(20);
             $tokos = Toko::where('nama_toko', 'like', '%'.$cari.'%')->where('status', 'Aktif')->orWhere('status', 'Libur')->paginate(20);

        }
        $index = 0;        
        if($request->ajax()){
            $view = view('toko.toko_data', compact('tokos'))->render();
            return response()->json(['html'=>$view]);
        }
        // dd($tokos);
        return view('toko.dashboard', compact('tokos'));
    }

    public function informasi_toko(){
        return view('toko.informasi_dasar');
    }

    public function akun(){
        return view('toko.akun');
    }
}
