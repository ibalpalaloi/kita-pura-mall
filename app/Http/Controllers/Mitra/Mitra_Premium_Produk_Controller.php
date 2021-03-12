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

class Mitra_Premium_Produk_Controller extends Controller
{
    //

	public function autocode($kode){
		$timestamp = time(); 
		$random = rand(10, 100);
		$current_date = date('mdYs'.$random, $timestamp); 
		return $kode.$current_date;
	}

	public function daftar_produk_premium(){
		$kategori_produk = Kategori::all();
		$toko = toko::where('users_id', Session::get('id_user'))->first();

		$produk = product::where('toko_id', $toko->id)->get();

		return view('users/user/m-mitra/premium/daftar_produk', compact('kategori_produk', 'produk'));
	}


	public function tambah_produk_premium(){
		$toko = toko::where('users_id', Session::get('id_user'))->first();
		$produk = product::where('toko_id', $toko->id)->get();
		$kategori_produk = Kategori::all();
		return view('users/user/m-mitra/premium/tambah_produk', compact('produk', 'kategori_produk'));
	}

	public function simpan_tambah_produk_premium(Request $request){

		// dd($request->all());

		$this->validate($request,[
			'nama_produk' => 'required',
			'kategori_produk' => 'required',
			'harga_produk' => 'required',
			'diskon_produk' => 'required',
			'deskripsi' => 'required',
			'foto_toko' => 'required',
		]);

		$produk_id = $this->autocode('PD-');

		$toko = toko::where('users_id', Session::get('id_user'))->first();

		// @Tambah Produk
		$produk = new product;
		$produk->id = $produk_id;
		$produk->toko_id = $toko->id;
		$produk->kategori_id = $request->kategori_produk;
		$produk->nama = $request->nama_produk;
		$produk->harga = $request->harga_produk;
		$produk->diskon = $request->diskon_produk;
		$produk->deskripsi = $request->deskripsi;
		if($request->stok == 'on'){
			$produk->stok = "Tersedia";
		}
		// @Tambah Foto
		// \Storage::disk('public')->put('img.$file_upload, file_get_contents($files));
		File::move(public_path('img/temp_produk/'.$request->nama_foto_temp), public_path('img/toko/'.$toko->id.'/produk/'.$request->nama_foto_temp));
		$produk->foto_produk = $request->nama_foto_temp;
		$produk->save();

		return redirect('/akun/mitra/premium/tambah-produk');

	}

	public function simpan_foto_maps(Request $request){
		$id = $request->nomor_foto;

		if($request->file("foto_toko_".$id)){
			$toko = toko::where('users_id', Session::get('id_user'))->first();
			$foto = Foto_maps::where('id', $request->id_foto_toko)->first();
			if(is_null($foto)){
				$foto = new Foto_maps;
				$foto->toko_id = $toko->id;
				echo "ada";
			}
			else{
				echo "t ada";

				\Storage::disk('public')->delete('img/toko/'.$toko->id.'/maps/'.$foto->foto);
			}
			$files = $request->file('foto_toko_'.$id);
			$type = $request->file('foto_toko_'.$id)->getClientOriginalExtension();
			$file_upload = $this->autocode('IMG').".".$type;
			\Storage::disk('public')->put('img/toko/'.$toko->id.'/maps/'.$file_upload, file_get_contents($files));
			$foto->foto = $file_upload;
			$foto->no_foto = $request->nomor_foto;
			$foto->save();
		}
		return redirect()->back();
	}

	public function produk_premium($id){

		$kategori_produk = Kategori::all();

		$toko = toko::where('users_id', Session::get('id_user'))->first();
		$produk = product::where('id', $id)->where('toko_id', $toko->id)->first();

		return view('users/user/m-mitra/premium/update_produk', compact('produk', 'kategori_produk'));

	}

	public function update_tambah_produk_premium($id ,Request $request){

        // dd($request->all());
		$this->validate($request,[
			'nama_produk' => 'required',
			'kategori_produk' => 'required',
			'harga_produk' => 'required',
			'diskon_produk' => 'required',
			'deskripsi' => 'required',
		]);

		$toko = toko::where('users_id', Session::get('id_user'))->first();
		$produk = product::where('id', $id)->where('toko_id', $toko->id)->first();
		$produk->kategori_id = $request->kategori_produk;
		$produk->nama = $request->nama_produk;
		$produk->harga = $request->harga_produk;
		$produk->diskon = $request->diskon_produk;
		$produk->deskripsi = $request->deskripsi;
		if($request->stok == 'on'){
			$produk->stok = "Tersedia";
		}
		else{
			$produk->stok = "Habis";
		}
		if($request->file("foto_toko")){
			File::move(public_path('img/temp_produk/'.$request->nama_foto_temp), public_path('img/toko/'.$toko->id.'/produk/'.$request->nama_foto_temp));
			$produk->foto_produk = $request->nama_foto_temp;
		}

		$produk->save();


		return redirect('/akun/mitra/premium/tambah-produk');
	}

	public function hapus_tambah_produk_premium($id){

		$toko = toko::where('users_id', Session::get('id_user'))->first();

		product::where('id', $id)->where('toko_id', $toko->id)->delete();

		\Storage::disk('public')->delete('img/toko/'.$toko->id.'/produk/'.$id);

		return redirect('/akun/mitra/premium/tambah-produk');

	}

	public function atur_produk_premium(){
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

		$toko = toko::where('users_id', Session::get('id_user'))->first();

		$produk = product::where('toko_id', $toko->id)->get();

		$foto_1 = Foto_maps::where('toko_id', $toko->id)->where('no_foto','1')->first();
		$foto_2 = Foto_maps::where('toko_id', $toko->id)->where('no_foto','2')->first();
		$foto_3 = Foto_maps::where('toko_id', $toko->id)->where('no_foto','3')->first();
		// dd($foto_maps);

		return view('users/user/m-mitra/premium/atur_produk', compact('kategori_produk','produk','foto_1','foto_2','foto_3', 'video', 'fasilitas_toko', 'toko'));

	}

	public function simpan_atur_produk_premium(Request $request){
		
		$toko = toko::where('users_id', Session::get('id_user'))->first();
		
		if($request->file("foto_maps_1")){
			$foto = Foto_maps::where('id', $request->id_foto_maps_1)->first();
			if(is_null($foto)){

				$foto = new Foto_maps;
				$foto->toko_id = $toko->id;
			}
			else{
				\Storage::disk('public')->delete('img/toko/'.$toko->id.'/maps/'.$foto->foto);
			}
			$files = $request->file("foto_maps_1");
			$type = $request->file("foto_maps_1")->getClientOriginalExtension();
			$file_upload = $this->autocode('IMG').".".$type;
			\Storage::disk('public')->put('img/toko/'.$toko->id.'/maps/'.$file_upload, file_get_contents($files));
			$foto->foto = $file_upload;
			$foto->no_foto = "1";
			$foto->save();
		}

		
		if($request->file("foto_maps_2")){
			$foto = Foto_maps::where('id', $request->id_foto_maps_2)->first();
			if(is_null($foto)){
				$foto = new Foto_maps;
				$foto->toko_id = $toko->id;
			}
			else{
				\Storage::disk('public')->delete('img/toko/'.$toko->id.'/maps/'.$foto->foto);
			}
			$files = $request->file("foto_maps_2");
			$type = $request->file("foto_maps_2")->getClientOriginalExtension();
			$file_upload = $this->autocode('IMG').".".$type;
			\Storage::disk('public')->put('img/toko/'.$toko->id.'/maps/'.$file_upload, file_get_contents($files));
			$foto->foto = $file_upload;
			$foto->no_foto = "2";
			$foto->save();
		}
		if($request->file("foto_maps_3")){
			$foto = Foto_maps::where('id', $request->id_foto_maps_3)->first();
			if(is_null($foto)){
				$foto = new Foto_maps;
				$foto->toko_id = $toko->id;
			}
			else{
				\Storage::disk('public')->delete('img/toko/'.$toko->id.'/maps/'.$foto->foto);
			}
			$files = $request->file("foto_maps_3");
			$type = $request->file("foto_maps_3")->getClientOriginalExtension();
			$file_upload = $this->autocode('IMG').".".$type;
			\Storage::disk('public')->put('img/toko/'.$toko->id.'/maps/'.$file_upload, file_get_contents($files));
			$foto->foto = $file_upload;
			$foto->no_foto = "3";
			$foto->save();
		}

		return redirect()->back();

	}

	public function ubah_status_produk_premium($id){

		$toko = toko::where('users_id', Session::get('id_user'))->first();

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

		return redirect()->back();
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

	public function simpan_foto_produk(Request $request){
		$image = $request->image;

		list($type, $image) = explode(';', $image);
		list(, $image)      = explode(',', $image);
		$image = base64_decode($image);
		$image_name= time().$this->generateRandomString().'.png';
        // $path = public_path('upload/'.$image_name);

        // file_put_contents($path, $image);
		$toko = toko::where('users_id', Session::get('id_user'))->first();
		\Storage::disk('public')->put('img/temp_produk/'.$image_name, file_get_contents($request->image));
		$image_path = url('/')."/public/img/temp_produk/$image_name";
		// $biodata->foto = $image_name;
		// $biodata->save();
		echo $image_name;
		// return response()->json(['status'=>$image_path]);		
	}


}
