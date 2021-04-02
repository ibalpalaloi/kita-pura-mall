<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Kategori;
use App\Models\toko;
use App\Models\product;
use App\Models\Foto_maps;
use App\Models\Video_landing_page;
use App\Models\Landing_page_fasilitas_toko;
use File;

class Mitra_Premium_Landingpage_Controller extends Controller
{

	public function atur_landing_page(){
		$video = array();
		$video_ = Video_landing_page::where('toko_id', Auth()->user()->toko->id)->get();
		if(!empty($video_)){
			foreach($video_ as $video_){
				$link = $video_->link_video;
				$link = trim(substr($link, strpos($link, '=')+1));
				$video[$video_->no_video] = $link;
			}
		}
		$fasilitas_toko = Landing_page_fasilitas_toko::where('toko_id', Auth()->user()->toko->id)->get();
		
		$kategori_produk = Kategori::all();

		$toko = toko::where('users_id', Auth()->User()->id)->first();

		$produk = product::where('toko_id', $toko->id)->get();

		$foto_1 = Foto_maps::where('toko_id', $toko->id)->where('no_foto','1')->orderBy('created_at', 'desc')->first();
		$foto_2 = Foto_maps::where('toko_id', $toko->id)->where('no_foto','2')->orderBy('created_at', 'desc')->first();
		$foto_3 = Foto_maps::where('toko_id', $toko->id)->where('no_foto','3')->orderBy('created_at', 'desc')->first();
		// dd($foto_maps);

		return view('users/user/m-mitra/premium/atur_landing_page', compact('kategori_produk','produk','foto_1','foto_2','foto_3', 'video', 'fasilitas_toko', 'toko'));

	}

	public function hapus_video(Request $request){
		$toko = toko::where('users_id', Auth()->User()->id)->first();
		Video_landing_page::where('toko_id', $toko->id)->where('no_video', $request->nomor_div_hapus)->delete();
		$notification = array(
			'message' => 'Video landing page berhasil'
		);     
		return redirect()->back()->with($notification);
	}

	public function hapus_foto_maps(Request $request){
		$foto_maps = Foto_maps::where('id', $request->id_foto_maps)->first();
		$image_path = "img/toko/$foto_maps->toko_id/maps/";
		\File::delete("public/".$image_path."/$foto_maps->foto");
		Foto_maps::where('id', $request->id_foto_maps)->delete();
		$notification = array(
			'message' => 'Foto Maps berhasil dihapus'
		);     
		return redirect()->back()->with($notification);

	}

	public function hapus_foto_cover(){
		$toko = Toko::where('users_id', Auth()->User()->id)->first();
		if ($toko->foto_cover){
			$image_path = "img/toko/$toko->id/cover/";
			\File::delete("public/".$image_path."/$toko->foto_cover");
			$toko->foto_cover = null;
			$toko->save();
		}
		$notification = array(
			'message' => 'Foto Cover berhasil dihapus'
		);     
		return redirect()->back()->with($notification);

	}

	public function simpan_foto_cover(Request $request){
		$image = $request->image;

		list($type, $image) = explode(';', $image);
		list(, $image)      = explode(',', $image);
		$image = base64_decode($image);
		$image_name= time().$this->generateRandomString().'.png';
        // $path = public_path('upload/'.$image_name);

        // file_put_contents($path, $image);
		$toko = toko::where('users_id', Auth()->User()->id)->first();
		$image_path = "img/toko/$toko->id/cover/";
		\Storage::disk('public')->put($image_path."/$image_name", file_get_contents($request->image));
		\File::delete("public/".$image_path."/$toko->foto_cover");
		$toko->foto_cover = $image_name;
		$toko->save();
		echo $image_path."$image_name";
	}

	public function simpan_foto_maps(Request $request){
		$id = $request->jenis;

		$toko = toko::where('users_id', Auth()->User()->id)->first();
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


	public function ubah_status_produk_premium(Request $request){
		$id = $request->id;
		$toko = toko::where('users_id', Auth()->User()->id)->first();

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


	public function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	public function simpan_video(Request $request){
		$cek_video = Video_landing_page::where([
			['toko_id', Auth()->user()->toko->id],
			['no_video', $request->no]
		])->get();
		if(!empty($cek_video)){
			Video_landing_page::where([
				['toko_id', Auth()->user()->toko->id],
				['no_video', $request->no]
			])->delete();
		}

		$video = new Video_landing_page;
		$video->toko_id = Auth()->user()->toko->id;
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


	public function simpan_cover(Request $request){
		$id = $request->nomor_foto;

		if($request->file("foto_cover")){
			$toko = toko::where('users_id', Auth()->User()->id)->first();
			\Storage::disk('public')->delete('img/toko/'.$toko->id.'/cover/'.$toko->foto_cover);
			$files = $request->file('foto_cover');
			$type = $request->file("foto_cover")->getClientOriginalExtension();
			$file_upload = $toko->id.".".$type;
			\Storage::disk('public')->put('img/toko/'.$toko->id.'/cover/'.$file_upload, file_get_contents($files));
			$toko->foto_cover = $file_upload;
			$toko->save();
		}
		$iqbal = 'iqbal';
		echo $iqbal;
	} 

	function post_fasilitas_toko(Request $request){
		$fasilitas = Landing_page_fasilitas_toko::find($request->id);
		$fasilitas->judul = $request->judul;
		$fasilitas->keterangan = $request->keterangan;
		$fasilitas->save();
	}

	function post_fasilitas_baru(Request $request){
		$post = new Landing_page_fasilitas_toko;
		$post->judul = $request->judul;
		$post->keterangan = $request->keterangan;
		$post->toko_id = Auth()->user()->toko->id;
		$post->save();

		return back();
	}

	public function ubah_fasilitas(Request $request){
		$post = Landing_page_fasilitas_toko::find($request->id);
		$post->judul = $request->judul;
		$post->keterangan = $request->keterangan;
		$post->save();

		return back();
	}

	public function hapus_fasilitas($id){
		Landing_page_fasilitas_toko::find($id)->delete();

		return back();
	}

}
