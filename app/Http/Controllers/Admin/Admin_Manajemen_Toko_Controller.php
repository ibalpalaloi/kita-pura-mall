<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori_toko;
use App\Models\Daftar_tunggu_toko;
use App\Models\Toko;
use App\Models\Landing_page_toko;
use App\Models\Template_landing_page;
use App\Models\User;
use App\Models\Kategorinya_toko;
use App\Models\Provinsi;
use App\Models\Product;
use App\Models\Kategori;
use App\Models\Sub_kategori;
use App\Models\Video_landing_page;
use App\Models\Landing_page_fasilitas_toko;
use App\Models\Foto_maps;
use File;
use Image;
class Admin_Manajemen_Toko_Controller extends Controller
{
    //
    public function autocode($kode){
		$timestamp = time(); 
		$random = rand(10, 100);
		$current_date = date('mdYs'.$random, $timestamp); 
		return $kode.$current_date;
	}

    public function ganti_foto_logo(Request $request){
            $image = $request->image;
            $size = $request->size;

            list($type, $image) = explode(';', $image);
            list(, $image)      = explode(',', $image);
            $image = base64_decode($image);
            $image_name= $request->nama.'.png';
            \Storage::disk('public')->put("img/toko/".$request->id_toko."/logo/".$size."/".$image_name, file_get_contents($request->image));
            $image_path = url('/')."/public/img/toko/".$request->id_toko."/logo/".$size."/".$image_name;
            $toko = Toko::where('id', $request->id_toko)->first();
            $toko->logo_toko = $image_name;
            $toko->save();
            echo $image_path;
    }

    public function index(){
        $toko = Toko::all();
        $toko_non_aktif = Toko::where('status', 'non-aktif')->get();
        return view('users.admin.m-toko.index', ['toko'=> $toko, 'toko_non_aktif'=>$toko_non_aktif]);
    }

    public function daftar_tunggu_toko(){
        $daftar_tunggu = Daftar_tunggu_toko::all();
        
        return view('users.admin.m-toko.daftar_tunggu', ['daftar_toko'=>$daftar_tunggu]);
    }

    public function daftar_tunggu_toko_detail($id){
        $toko = Daftar_tunggu_toko::find($id);
        $user = User::where('id', $toko->users_id)->first();
        $kategorinya_toko = Kategorinya_toko::where('toko_id', $toko->toko_id)->get();
        $kategori_toko = Kategori_toko::all();
        return view('users.admin.m-toko.daftar_tunggu_detail', ['toko'=>$toko, 'kategori_toko'=>$kategori_toko, 'user'=>$user, 'kategori'=>$kategorinya_toko]);
    }

    public function post_daftar_tunggu_toko(Request $request){

        $toko = toko::where('id', $request->toko_id)->first();

        if($toko){

            $toko->users_id = $request->user_id;
            $toko->id = $request->toko_id;
            $toko->jenis_mitra = $request->jenis_mitra;
            $toko->kategori_toko_id = $request->kategori_toko;
            $toko->nama_toko = $request->nama_toko;
            $toko->nama_pemilik = $request->nama_pemilik;
            $toko->no_hp = $request->no_hp;
            $toko->alamat = $request->alamat;
            $toko->kelurahan_id = $request->kelurahan_id;
            $toko->latitude = $request->latitude;
            $toko->longitude = $request->longitude;
            $toko->status = 'aktif';
            $toko->logo_toko = $request->logo_toko;
            $toko->deskripsi = $request->deskripsi;
            $toko->save();

        }
        else{

            $toko = new Toko;
            $toko->users_id = $request->user_id;
            $toko->id = $request->toko_id;
            $toko->username = $request->username;
            $toko->jenis_mitra = $request->jenis_mitra;
            $toko->kategori_toko_id = $request->kategori_toko;
            $toko->nama_toko = $request->nama_toko;
            $toko->nama_pemilik = $request->nama_pemilik;
            $toko->no_hp = $request->no_hp;
            $toko->alamat = $request->alamat;
            $toko->kelurahan_id = $request->kelurahan_id;
            $toko->latitude = $request->latitude;
            $toko->longitude = $request->longitude;
            $toko->status = 'aktif';
            $toko->logo_toko = $request->logo_toko;
            $toko->deskripsi = $request->deskripsi;
            $toko->save();

        }
        $template = Template_landing_page::find(1);
		Landing_page_toko::where('toko_id', $toko->id)->delete();
        $page = new landing_page_toko;
        $page->toko_id = $request->toko_id;
		$page->warna_header = $template->warna_header;
		$page->warna_body = $template->warna_body;
		$page->warna_footer_1 = $template->warna_footer_1;
		$page->warna_footer_2 = $template->warna_footer_2;
		$page->warna_tulisan_header = $template->warna_tulisan_header;
		$page->warna_tulisan_body = $template->warna_tulisan_body;
		$page->warna_tulisan_footer = $template->warna_tulisan_footer;
		$page->save();

        Daftar_tunggu_toko::find($request->id)->delete();

        return redirect('/admin/manajemen/daftar_tunggu_toko');
    }

    public function detail_toko($id){
        $kabupaten = Provinsi::find(72)->kabupaten_kota;
        $toko = Toko::find($id);
        $kategori_toko = Kategori_toko::all();
        $kategorinya_toko = Kategorinya_toko::where('toko_id', $id)->get();
        return view('users.admin.m-toko.detail_toko', compact('toko', 'kategorinya_toko', 'kabupaten', 'kategori_toko'));
    }

    public function ganti_foto_produk(Request $request){
            $image = $request->image;
            $size = $request->size;

            list($type, $image) = explode(';', $image);
            list(, $image)      = explode(',', $image);
            $image = base64_decode($image);
            $image_name= $request->nama.'.png';
            \Storage::disk('public')->put("img/toko/".$request->id_toko."/produk/".$size."/".$image_name, file_get_contents($request->image));
            $image_path = url('/')."/public/img/toko/".$request->id_toko."/produk/".$size."/".$image_name;
            $produk = product::where('id', $request->id_produk)->first();
            $produk->foto_produk = $image_name;
            $produk->save();

            if ($size == "240x240"){
                \Storage::disk('public')->put("img/toko/".$request->id_toko."/produk/240x200/".$image_name, file_get_contents($request->image));
                $image_path_240x240 = "img/toko/".$request->id_toko."/produk/240x240/$image_name";
                $image_path_240x200 = "img/toko/".$request->id_toko."/produk/240x200/$image_name";
                $image_resize = Image::make(file_get_contents(url('/')."/public/$image_path_240x240"));              
                $image_resize->crop(240, 200);
                $image_resize->save(public_path($image_path_240x200));  
                // echo $image_path_240x240;              
            }

            echo $image_path;

    }

    public function post_ubah_toko(Request $request, $id){
        $toko = Toko::find($id);
        $toko->nama_toko = $request->nama_toko;
        $toko->username = $request->username;
        $toko->jenis_mitra = $request->jenis_mitra;
        $toko->no_hp = $request->no_hp;
        $toko->deskripsi = $request->deskripsi;
        $toko->save();

        return back();
    }

    public function post_ubah_alamat_toko(Request $request, $id){
        $toko = Toko::find($id);
        $toko->alamat = $request->alamat;
        $toko->kelurahan_id = $request->kelurahan;
        $toko->latitude = $request->latitude;
        $toko->longitude = $request->longitude;
        $toko->save();

        return back();
    }

    public function ubah_logo(Request $request, $id){
        $toko = Toko::where('id', $id)->first();
        if($request->file("foto_logo")){
            $files = $request->file("foto_logo");
            $type = $request->file("foto_logo")->getClientOriginalExtension();
            $file_upload = time().$this->generateRandomString().".".$type;
            \Storage::disk('public')->put('img/toko/'.$toko->id.'/logo/'.$file_upload, file_get_contents($files));
            \File::delete("public/img/toko/".$toko->id."/logo/".$toko->logo_toko);		
            $toko->logo_toko = $file_upload;
        }
        $toko->save();
        return back();
    }

    function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

    public function hapus_toko(Request $request){
        Toko::where('id', $request->id_toko)->delete();;
        return back();
    }

    public function post_password_baru(Request $request){
        $toko = Toko::where('id', $request->id_toko)->first();
        $user = User::where('id', $toko->users_id)->first();
        $user->password = bcrypt($request->pass);
        $user->save();
        return back();
    }

    public function daftar_produk_toko($id){
        $kategori = Kategori::all();
        $toko = Toko::where('id', $id)->first();
        $produk = Product::where('toko_id', $toko->id)->get();
        return view('users.admin.m-toko.data_produk_toko', compact('toko', 'produk', 'kategori'));
    }

    public function post_ubah_produk(Request $request){
        $produk = Product::where('id', $request->id_produk)->first();
        $produk->nama = $request->nama_produk;
        $produk->kategori_id = $request->kategori;
        $produk->sub_kategori_id = $request->sub_kategori;
        $produk->harga = $request->harga;
        $produk->save();

        return back();
    }

    public function landing_page($id){
        $toko = toko::where('id', $id)->first();
        $video = array();
		$video_ = Video_landing_page::where('toko_id', $id)->get();
		if(!empty($video_)){
			foreach($video_ as $video_){
				$link = $video_->link_video;
				$link = trim(substr($link, strpos($link, '=')+1));
				$video[$video_->no_video] = $link;
			}
		}
		$fasilitas_toko = Landing_page_fasilitas_toko::where('toko_id', $toko->id)->get();
		
		$kategori_produk = Kategori::all();
		$produk = product::where('toko_id', $toko->id)->get();

		$foto_1 = Foto_maps::where('toko_id', $toko->id)->where('no_foto','1')->orderBy('created_at', 'desc')->first();
		$foto_2 = Foto_maps::where('toko_id', $toko->id)->where('no_foto','2')->orderBy('created_at', 'desc')->first();
		$foto_3 = Foto_maps::where('toko_id', $toko->id)->where('no_foto','3')->orderBy('created_at', 'desc')->first();
		// dd($foto_maps);

		return view('users/admin/m-toko/atur_landing_page', compact('kategori_produk','produk','foto_1','foto_2','foto_3', 'video', 'fasilitas_toko', 'toko'));
    }

    public function ubah_fasilitas_toko(Request $request){
		$post = Landing_page_fasilitas_toko::find($request->id);
		$post->judul = $request->judul;
		$post->keterangan = $request->keterangan;
		$post->save();

		return back();
	}

    public function hapus_fasilitas_toko($id){
		Landing_page_fasilitas_toko::find($id)->delete();

		return back();
	}
}
