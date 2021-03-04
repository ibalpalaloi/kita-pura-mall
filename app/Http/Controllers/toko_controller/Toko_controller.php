<?php

namespace App\Http\Controllers\toko_controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Toko;
use App\Models\Foto_maps;

class Toko_controller extends Controller
{
    //
    public function index(Request $request){
        // $list_toko = array();
        // $toko = Toko::all();
        // $i = 0;
        // foreach($toko as $toko){
        //     $foto_maps = Foto_maps::where('toko_id', $toko->id)->first();
        //     if(!empty($foto_maps)){
        //         $list_toko[$i]['foto'] = $foto_maps->foto;
        //     }
        //     else{
        //         $list_toko[$i]['foto'] = '';
        //     }
        //     $list_toko[$i]['id_toko'] = $toko->id;
        //     $list_toko[$i]['username'] = $toko->username;
        //     $list_toko[$i]['nama_toko'] = $toko->nama_toko;
        //     $list_toko[$i]['kategori_toko'] = $toko->kategori_toko->kategori;
        //     $list_toko[$i]['jenis_mitra'] = $toko->jenis_mitra;
        //     $list_toko[$i]['logo'] = $toko->logo_toko;
        //     $i++;
        // }
        // return view('toko.dashboard', ['toko'=>$list_toko]);
        $cari = $request->get('cari');
        if ($cari == 'all'){
            $tokos = Toko::paginate(5);
        }
        else{
            $tokos = Toko::where('nama_toko', 'like', '%'.$cari.'%')->paginate(5);
        }
        $index = 0;
        for($i = 0; $i < count($tokos); $i++){
            $foto = Foto_maps::where([
                                        ['toko_id', $tokos[$i]->id],
                                        ['no_foto', 1]
                                    ])->first();
            if(!empty($foto)){
                $tokos[$i]->setAttribute('foto', $foto->foto);
            }
            else{
                $tokos[$i]->setAttribute('foto', '');
            }
        }
        
        if($request->ajax()){
            $view = view('toko.toko_data', compact('tokos'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('toko.dashboard', compact('tokos'));
    }

    public function informasi_toko(){
        return view('toko.informasi_dasar');
    }

    public function akun(){
        return view('toko.akun');
    }
}
