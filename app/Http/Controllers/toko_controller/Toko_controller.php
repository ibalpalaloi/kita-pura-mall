<?php

namespace App\Http\Controllers\toko_controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Toko;
use App\Models\Foto_maps;
use App\Models\Kategorinya_toko;
use App\Models\Kategori_toko;
use DB;

class Toko_controller extends Controller
{
    //
    public function index(Request $request){
        if($request->get('kategori') != "all" and $request->get('kategori') != null){
            $kategorinya_toko = Kategorinya_toko::where('kategori_toko_id', $request->kategori)->orderByRaw('RAND()')->paginate(10);
            $tokos = array();
            $i=0;
            foreach($kategorinya_toko as $data){
                $toko = Toko::where('id', $data->toko_id)->first();
                if(!empty($toko)){
                    $tokos[$i]['id'] = $toko->id;
                    $tokos[$i]['nama_toko'] = $toko->nama_toko;
                    $tokos[$i]['username'] = $toko->username;
                    $tokos[$i]['logo_toko'] = $toko->logo_toko;
                    $tokos[$i]['foto_cover'] = $toko->foto_cover;
                    $tokos[$i]['jenis_mitra'] =  $toko->jenis_mitra;
                    $tokos[$i]['jumlah_produk'] = $toko->product->count();
                    $i++;
                }
            }
            $jumlah_data = count($tokos);
            $view = view('toko.toko_data_kategori', compact('tokos'))->render();
            return response()->json(['html'=>$view, 'jumlah_data'=>$jumlah_data]);
        }
        $cari = $request->get('cari');
        if ($cari == 'all' or $cari==""){
            $tokos = DB::table('toko')->select('toko.id', 'nama_toko', 'username', 'logo_toko', 'foto_cover', 'jenis_mitra', DB::raw('count(product.id) as jumlah_produk'))->join('product', 'product.toko_id', '=', 'toko.id')->where('toko.status', 'Aktif')->orWhere('status', 'Libur')->groupBy('toko.id', 'nama_toko', 'logo_toko', 'foto_cover', 'username', 'jenis_mitra')->orderByRaw('RAND()')->paginate(10);
            // $tokos = Toko::where('status', 'Aktif')->orWhere('status', 'Libur')->orderByRaw('RAND()')->paginate(20);
        }
        else{
            // $tokos = DB::table('toko')->select('toko.id', 'nama_toko', 'username', 'logo_toko', 'foto_cover', 'jenis_mitra', DB::raw('count(product.id) as jumlah_produk'))->join('product', 'product.toko_id', '=', 'toko.id')->where('toko.status', 'Aktif')->orWhere('status', 'Libur')->groupBy('toko.id', 'nama_toko', 'logo_toko', 'foto_cover', 'username', 'jenis_mitra')->where('nama_toko', 'like', '%'.$cari.'%')->paginate(20);
             $tokos = Toko::where('nama_toko', 'like', '%'.$cari.'%')->where('status', 'Aktif')->orWhere('status', 'Libur')->paginate(10);

        }
        $kategori = Kategorinya_toko::groupBy('kategori_toko_id')->select('kategori_toko_id', DB::raw('count(*) as total'))->orderBy('total', 'desc')->get();
        $data_kategori = array();
        $kategori_lainnya = "";
        $id_kategori_lainnya = "";
        $j=0;
        for($i=0; $i<=5; $i++){
            $kategori_toko = Kategori_toko::find($kategori[$i]->kategori_toko_id);
            if($kategori_toko->kategori == "LAINNYA"){
                $kategori_lainnya = $kategori_toko->kategori;
                $id_kategori_lainnya = $kategori_toko->id;
                $j--;
            }
            else{
                $data_kategori[$j]['id'] = $kategori_toko->id;
                $data_kategori[$j]['kategori'] = $kategori_toko->kategori;
            }
            $j++;
        }
        if($kategori_lainnya != ""){
            $data_kategori[$j+1]['id'] = $id_kategori_lainnya;
            $data_kategori[$j+1]['kategori'] = $kategori_lainnya;
        }
        $jumlah_data = count($tokos);
        $index = 0;   
        if($request->ajax()){
            $view = view('toko.toko_data', compact('tokos'))->render();
            return response()->json(['html'=>$view, 'jumlah_data'=>$jumlah_data]);
        }
        return view('toko.dashboard', compact('tokos', 'data_kategori'));
    }

    public function data_toko_kategori($id){
        $kategorinya_toko = Kategorinya_toko::where('kategori_toko_id', $id)->paginate(10);
        $tokos = array();
        $i=0;
        foreach($kategorinya_toko as $data){
            $toko = Toko::where('id', $data->toko_id)->first();
            if(!empty($toko)){
                $tokos[$i]['id'] = $toko->id;
                $tokos[$i]['nama_toko'] = $toko->nama_toko;
                $tokos[$i]['username'] = $toko->username;
                $tokos[$i]['logo_toko'] = $toko->logo_toko;
                $tokos[$i]['foto_cover'] = $toko->foto_cover;
                $tokos[$i]['jenis_mitra'] =  $toko->jenis_mitra;
                $tokos[$i]['jumlah_produk'] = $toko->product->count();
                $i++;
            }
        }
        $jumlah_data = count($tokos);
        $view = view('toko.toko_data_kategori', compact('tokos'))->render();
        return response()->json(['html'=>$view, 'jumlah_data'=>$jumlah_data]);
    }

    public function informasi_toko(){
        return view('toko.informasi_dasar');
    }

    public function akun(){
        return view('toko.akun');
    }
}
