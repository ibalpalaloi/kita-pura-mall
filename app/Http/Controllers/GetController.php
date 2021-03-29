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
use App\Models\Foto_maps;
use DB;

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

    public function get_kelurahan_from_kota(Request $request){
        $id_kota = $request->id_kota;
        $kelurahan = DB::table('kelurahan')->select('kelurahan.id', 'kelurahan.kelurahan')->leftJoin('kecamatan', 'kecamatan.id', '=', 'kelurahan.kecamatan_id')->where('kecamatan.kabupaten_kota_id', $id_kota)->get();
        $html = '<option value="" disabled selected>Pilih Kelurahan</option>';
        foreach($kelurahan as $data){
            $html .= '<option value="'.$data->id.'">'.$data->kelurahan.'</option>';
        }
        return response()->json(['html' => $html]);
    }


    public function hapus_kategorinya_toko(Request $request){
        $cek = Kategorinya_toko::where('toko_id', $request->id_toko)->get();
        if(count($cek) == 1){
            echo 'false';
        }
        else{
            Kategorinya_toko::find($request->id)->delete();
        }
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

    public function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

    public function input_cover(Request $request, $id){
        $image = $request->image;

		list($type, $image) = explode(';', $image);
		list(, $image)      = explode(',', $image);
		$image = base64_decode($image);
		$image_name= time().$this->generateRandomString().'.png';
        // $path = public_path('upload/'.$image_name);

        // file_put_contents($path, $image);
		$toko = toko::where('id', $id)->first();
		$image_path = "img/toko/$toko->id/cover/";
		\Storage::disk('public')->put($image_path."/$image_name", file_get_contents($request->image));
		\File::delete("public/".$image_path."/$toko->foto_cover");
		$toko->foto_cover = $image_name;
		$toko->save();
		echo $image_path."$image_name";
    }

    public function input_video(Request $request, $id){
        $cek_video = Video_landing_page::where([
			['toko_id', $id],
			['no_video', $request->no]
		])->get();
		if(!empty($cek_video)){
			Video_landing_page::where([
				['toko_id', $id],
				['no_video', $request->no]
			])->delete();
		}

		$video = new Video_landing_page;
		$video->toko_id = $id;
		$video->link_video = $request->link;
		$video->no_video = $request->no;
		$video->save();

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

    public function input_foto_maps(Request $request, $id_toko){
        $id = $request->jenis;

		$toko = toko::where('id', $id_toko)->first();
		$foto = Foto_maps::where('toko_id', $toko->id)->where('no_foto', $id)->first();
		if($foto){
			\Storage::disk('public')->delete('img/toko/'.$toko->id.'/maps/'.$foto->foto);
		}
		else{
			$foto = new Foto_maps;
			$foto->toko_id = $toko->id;
		}
		$image = $request->image;

		list($type, $image) = explode(';', $image);
		list(, $image)      = explode(',', $image);
		$image = base64_decode($image);
		$image_name= time().$this->generateRandomString().'.png';

		$image_path = "img/toko/$toko->id/maps/";
		\Storage::disk('public')->put($image_path."/$image_name", file_get_contents($request->image));
		$foto->foto = $image_name;
		$foto->no_foto = $id;
		$foto->save();
		echo $image_path."$image_name";
    }
}
