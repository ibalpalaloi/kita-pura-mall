<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video_landing_page;
use App\Models\Toko;
use App\Models\Product;
use App\Models\Landing_page_toko;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Kategorinya_toko;
use App\Models\kategori_toko;

class GetController extends Controller
{
    //
    function get_video_link(Request $request){
        $link = $request->link;
        $cek = substr($link, 0, 11);
        if(str_contains($link, 'youtu.be')){
            $link = trim(substr($link, strpos($link, '/')+2));
            $link = trim(substr($link, strpos($link, '/')+1));
        }
        else{
            $link = trim(substr($link, strpos($link, '=')+1));
        }
        // $link = substr($link, 0, strpos($link, '&'));
        echo $link;
    }

    function get_produk(Request $request){
        $cari = $request->produk;
        if($cari == ''){
            $produk = Product::where('toko_id', 'TK-031220211434')->get();
        }
        else{
            $produk = Product::where([
                                        ['nama', 'like', '%'.$cari.'%'],
                                        ['toko_id', $request->id_toko]
                                        ])->get();
        }
		$page = Landing_page_toko::where('toko_id', $request->id_toko)->first();
        $view = view('landing_page.data_daftar_menu', compact('produk', 'page'))->render();
        return response()->json(['html'=>$view]);
    }

    public function get_kecamatan(Request $request){
        $id_kota = $request->id_kota;
        $kecamatan = Kecamatan::where('kabupaten_kota_id', $id_kota)->get();
        $html = '<option value="" disabled selected>Pilih Kecamatan</option>';
        foreach($kecamatan as $data){
            $html .= '<option value="'.$data->id.'">'.$data->nama.'</option>';
        }
        return response()->json(['html' => $html]);
    }

    public function get_kelurahan(Request $request){
        $id_kecamatan = $request->id_kecamatan;
        $kelurahan = Kelurahan::where('kecamatan_id', $id_kecamatan)->get();
        $html = '<option value="" disabled selected>Pilih Kelurahan</option>';
        foreach($kelurahan as $data){
            $html .= '<option value="'.$data->id.'">'.$data->kelurahan.'</option>';
        }
        return response()->json(['html' => $html]);
    }

    public function hapus_kategorinya_toko(Request $request){
        Kategorinya_toko::find($request->id)->delete();
    }

    public function simpan_kategorinya_toko(Request $request){
        $kategori = Kategori_toko::find($request->id);

        $kategorinya_toko = new Kategorinya_toko;
        $kategorinya_toko->toko_id = $request->toko_id;
        $kategorinya_toko->kategori_toko_id = $request->id;
        $kategorinya_toko->save();

        $result = '<li id=kategori_"'.$kategorinya_toko->id.'">'.$kategori->kategori.'<i onclick="hapus_kategori_toko("{{'.$kategorinya_toko->id.'}}")" class="far fa-trash-alt remove-note"></i></li>';
        echo $result;
    }
}
