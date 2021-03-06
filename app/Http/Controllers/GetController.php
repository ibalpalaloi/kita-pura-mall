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
use App\Models\Landing_page_fasilitas_toko;
use App\Models\User;
use App\Models\Daftar_tunggu_pesanan;
use App\Models\Keynota;
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
            $produk = Product::where('toko_id', $request->id_toko)->get();
        }
        else{
            $produk = Product::where([
                                        ['nama', 'like', '%'.$cari.'%'],
                                        ['toko_id', $request->id_toko]
                                        ])->get();
        }
		$toko = Toko::where('id', $request->id_toko)->first();
		$page = Landing_page_toko::where('toko_id', $request->id_toko)->first();
        $view = view('landing_page.data_daftar_menu', compact('produk', 'page', 'toko'))->render();
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

        // $path = public_path('upload/'.$image_name);

        // file_put_contents($path, $image);

		$image = $request->image;
		$size = $request->size;
		list($type, $image) = explode(';', $image);
		list(, $image)      = explode(',', $image);
		$image = base64_decode($image);
		$image_name= $request->nama.".png";

		$toko = toko::where('id', $id)->first();
		\Storage::disk('public')->put("img/toko/$toko->id/cover/".$size."/".$image_name, file_get_contents($request->image));
		$image_path = "img/toko/$toko->id/cover/".$size."/$image_name";
		\File::delete("public/".$image_path."/$toko->foto_cover");
		if ($size == '600x600'){
			$toko->foto_cover = $image_name;
			$toko->save();			
		}
		echo $image_path;
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
		$image = $request->image;
		$size = $request->size;
		list($type, $image) = explode(';', $image);
		list(, $image)      = explode(',', $image);
		$image = base64_decode($image);
		$image_name= $request->nama.".png";

		$toko = toko::where('id', $id_toko)->first();
		$foto = Foto_maps::where('toko_id', $toko->id)->where('no_foto', $id)->first();
		if($foto){
			\Storage::disk('public')->delete('img/toko/'.$toko->id.'/maps/$id/'.$size.'/'.$foto->foto);
		}
		else{
			$foto = new Foto_maps;
			$foto->toko_id = $toko->id;
		}
		$image_path = "img/toko/$toko->id/maps/$id/".$size;
		\Storage::disk('public')->put($image_path."/$image_name", file_get_contents($request->image));
		$foto->foto = $image_name;
		$foto->no_foto = $id;
		$foto->save();
		echo $image_path."/$image_name";
    }

    public function ubah_status_produk_premium(Request $request, $id_toko){
		$id = $request->id;
		$toko = toko::where('id', $id_toko)->first();

		$produk = product::where('toko_id', $toko->id)->where('id', $id)->first();

		if($produk->tampil == 'Ya'){

			$new_produk = product::where('toko_id', $toko->id)->where('id', $id)->first();
			$new_produk->tampil = "Tidak";
			$new_produk->save();
		}
		else{

			$cek_produk = product::where('toko_id', $toko->id)->where('tampil','Ya')->get()->count();

			if($cek_produk == '3'){

				
				$notification = array(
					'message' => 'Maaf, Produk Untuk Tampil Landing Page Telah Maksimal'
				);     

				//  dd($notification);
				return redirect()->back()->with($notification);

			}
			else{
				$new_produk = product::where('toko_id', $toko->id)->where('id', $id)->first();
				$new_produk->tampil = "Ya";
				$new_produk->save();
			}
		}

		echo "menu favorit";
	}

    function post_fasilitas_baru(Request $request, $id_toko){
		$post = new Landing_page_fasilitas_toko;
		$post->judul = $request->judul;
		$post->keterangan = $request->keterangan;
		$post->toko_id =$id_toko;
		$post->save();

        return back();
	}

	function ubah_status_toko($id){
		$toko = Toko::where('id', $id)->first();
		if($toko->status == 'Aktif'){
			$status = "non-aktif";
		}
		else{
			$status = "Aktif";
		}
		$toko = Toko::where('id', $id)->first();
		$toko->status = $status;
		$toko->save();
		echo $status;
	}

	public function cek_email(Request $request){
		$user = User::where('email', $request->email)->get();
		if(count($user) > 0){
			$data = [
						"status" => "false"
			];
			return response()->json(['data'=>$data]);
		}
		else{
			$data = [
				"status" => "true"
			];
			return response()->json(['data'=>$data]);
		}
	}

	public function cek_no_hp(Request $request){
		$no_hp = $this->generate_no_telp($request->no_hp);
		$user = User::where('no_hp', $no_hp)->get();
		if(count($user) > 0){
			$data = [
						"status" => "false",
						"no_hp" => $request->no_hp
			];
			return response()->json(['data'=>$data]);
		}
		else{
			$data = [
				"status" => "true",
				"no_hp" => $request->no_hp
			];
			return response()->json(['data'=>$data]);
		}
	}

	public function generate_no_telp($no_hp){
        $no_telp = $no_hp;
        $no_telp = str_replace("-","", $no_telp);
        $no_telp = str_replace(" ","", $no_telp);
        if ($no_telp[0] == 0){
            $no_telp = substr($no_telp, 1);
        }
        $no_telp = substr_replace($no_telp, "+62", 0, 0);

        return $no_telp;
    }

	public function konfirmasi_pesanan($keynota, $status){
		Keynota::where('kode_nota', $keynota)->update(['status' => $status]);
	}
}
