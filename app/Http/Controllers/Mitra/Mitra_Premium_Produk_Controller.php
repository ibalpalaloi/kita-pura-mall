<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Kategori;
use App\Models\toko;
use App\Models\product;
use App\Models\Foto_maps;
use App\Models\Perubahan_product;
use App\Models\Video_landing_page;
use App\Models\Landing_page_fasilitas_toko;
use File;
use Image;

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
		$toko = toko::where('users_id', Auth()->User()->id)->first();

		$produk = product::where('toko_id', $toko->id)->get();

		return view('users/user/m-mitra/premium/atur_produk', compact('kategori_produk', 'produk'));
	}


	public function tambah_produk_premium(){
		$toko = toko::where('users_id', Auth()->User()->id)->first();
		$produk = product::where('toko_id', $toko->id)->get();
		$kategori_produk = Kategori::where('nama', '!=', 'LAINNYA')->get();
		$sub_kategori = array();
		$index_ = 0;
		foreach($kategori_produk as $data){
			$index =0;
			foreach($data->sub_kategori as $item){
				$sub_kategori[$index_][$index]['id_kategori'] = $data->id;
				$sub_kategori[$index_][$index]['id_sub_kategori'] = $item->id;
				$sub_kategori[$index_][$index]['sub_kategori'] = $item->nama;
				$index++;
			}
			$index_++;
		}
		return view('users/user/m-mitra/premium/tambah_produk', compact('produk', 'kategori_produk', 'sub_kategori'));
	}

	public function simpan_tambah_produk_premium(Request $request){

		// dd($request->all());
		$this->validate($request,[
			'nama_produk' => 'required',
			'kategori_produk' => 'required',
			'deskripsi' => 'required',
			'foto_toko' => 'required',
		]);

		$produk_id = $this->autocode('PD-');

		$toko = toko::where('users_id', Auth()->User()->id)->first();
		// @Tambah Produk
		if($request->kategori_lain != ''){
			$kategori = "20";
		}
		else{
			$kategori = $request->kategori_produk;
		}

		$produk = new product;
		$produk->id = $produk_id;
		$produk->toko_id = $toko->id;
		$produk->kategori_id = $kategori;
		$produk->nama = $request->nama_produk;
		$produk->jenis_harga = $request->jenis_harga;
		if ($produk->jenis_harga == 'Statis'){
			$produk->harga = str_replace(',', '', $request->harga_produk);
			$produk->diskon = $request->diskon_produk;			
			$produk->harga_terendah = 0;
		}
		else {
			$produk->harga = 0;
			$produk->diskon = 0;			
			$produk->harga_terendah = str_replace(',', '', $request->harga_terendah);
		}
		$produk->deskripsi = $request->deskripsi;
		$produk->sub_kategori_id = $request->sub_kategori_produk;
		if($request->stok == 'on'){
			$produk->stok = "Tersedia";
		}
		// @Tambah Foto
		$files = $request->file("foto_toko");
		// $files = $request->file("foto_toko");
		// $files = $request->file("foto_toko");

		// echo $request->nama_foto_temp;
		// echo $files;
		$image_path_ori = "img/toko/$toko->id/produk/original/$request->nama_foto_temp";
		$image_path_600x600 = "img/toko/$toko->id/produk/600x600/$request->nama_foto_temp";
		$image_path_240x240 = "img/toko/$toko->id/produk/240x240/$request->nama_foto_temp";
		$image_path_240x200 = "img/toko/$toko->id/produk/240x200/$request->nama_foto_temp";

		\Storage::disk('public')->put($image_path_ori, file_get_contents($files));
		\Storage::disk('public')->put($image_path_600x600, file_get_contents($files));
		\Storage::disk('public')->put($image_path_240x240, file_get_contents($files));
		\Storage::disk('public')->put($image_path_240x200, file_get_contents($files));		

		\File::delete("public/$image_path_600x600");			
		\File::delete("public/$image_path_240x240");			
		// \File::delete("public/$image_path_240x200");			

		// echo "berhasil";
		File::move(public_path('img/temp_produk/600x600/'.$request->nama_foto_temp), public_path($image_path_600x600));
		File::move(public_path('img/temp_produk/240x240/'.$request->nama_foto_temp), public_path($image_path_240x240));
		$image_resize = Image::make(file_get_contents(url('/')."/public/$image_path_240x240"));              
		$image_resize->crop(240, 200);
		$image_resize->save(public_path($image_path_240x200));

		// File::move(public_path('img/temp_produk/240x200/'.$request->nama_foto_temp), public_path($image_path_240x200));

		$produk->foto_produk = $request->nama_foto_temp;
		$produk->save();
		$perubahan_produk = new Perubahan_product;
		$perubahan_produk->id = $produk_id;
		$perubahan_produk->save();

		return redirect('/akun/mitra/premium/atur-produk');

	}


	public function produk_premium($id){
		$kategori_produk = Kategori::all();
		$toko = toko::where('users_id', Auth()->User()->id)->first();
		$produk = product::where('id', $id)->where('toko_id', $toko->id)->first();

		return view('users/user/m-mitra/premium/update_produk', compact('produk', 'kategori_produk'));

	}

	public function update_tambah_produk_premium($id ,Request $request){

		$this->validate($request,[
			'nama_produk' => 'required',
			'kategori_produk' => 'required',
			'deskripsi' => 'required',
		]);

		$toko = toko::where('users_id', Auth()->User()->id)->first();
		$produk = product::where('id', $id)->where('toko_id', $toko->id)->first();
		$produk->kategori_id = $request->kategori_produk;
		$produk->nama = $request->nama_produk;
		$produk->jenis_harga = $request->jenis_harga;
		if ($produk->jenis_harga == 'Statis'){
			$produk->harga = str_replace(',', '', $request->harga_produk);
			$produk->diskon = $request->diskon_produk;			
			$produk->harga_terendah = 0;
		}
		else {
			$produk->harga = 0;
			$produk->diskon = 0;			
			$produk->harga_terendah = str_replace(',', '', $request->harga_terendah);
		}
		$produk->deskripsi = $request->deskripsi;
		if($request->stok == 'on'){
			$produk->stok = "Tersedia";
		}
		else{
			$produk->stok = "Habis";
		}
		if($request->file("foto_toko")){
			$files = $request->file("foto_toko");

			$image_path_ori = "img/toko/$toko->id/produk/original/$request->nama_foto_temp";
			$image_path_600x600 = "img/toko/$toko->id/produk/600x600/$request->nama_foto_temp";
			$image_path_240x240 = "img/toko/$toko->id/produk/240x240/$request->nama_foto_temp";
			$image_path_240x200 = "img/toko/$toko->id/produk/240x200/$request->nama_foto_temp";

			\Storage::disk('public')->put($image_path_ori, file_get_contents($files));
			\Storage::disk('public')->put($image_path_600x600, file_get_contents($files));
			\Storage::disk('public')->put($image_path_240x240, file_get_contents($files));
			\Storage::disk('public')->put($image_path_240x200, file_get_contents($files));		

			\File::delete("public/$image_path_600x600");			
			\File::delete("public/$image_path_240x240");			

			File::move(public_path('img/temp_produk/600x600/'.$request->nama_foto_temp), public_path($image_path_600x600));
			File::move(public_path('img/temp_produk/240x240/'.$request->nama_foto_temp), public_path($image_path_240x240));
			$image_resize = Image::make(file_get_contents(url('/')."/public/$image_path_240x240"));              
			$image_resize->crop(240, 200);
			$image_resize->save(public_path($image_path_240x200));


			$produk->foto_produk = $request->nama_foto_temp;		
		}

		$produk->save();
		$perubahan_produk = Perubahan_product::where('id', $produk->id);
		if ($perubahan_produk){
			Perubahan_product::where('id', $produk->id)->delete();
		}
		$perubahan_produk = new Perubahan_product;
		$perubahan_produk->id = $produk->id;
		$perubahan_produk->save();
		return redirect('/akun/mitra/premium/atur-produk');
	}

	public function hapus_tambah_produk_premium($id){

		$toko = toko::where('users_id', Auth()->User()->id)->first();

		product::where('id', $id)->where('toko_id', $toko->id)->delete();

		\Storage::disk('public')->delete('img/toko/'.$toko->id.'/produk/'.$id);

		return redirect('/akun/mitra/premium/atur-produk');

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

	public function simpan_foto_produk(Request $request){
		$image = $request->image;
		$size = $request->size;

		list($type, $image) = explode(';', $image);
		list(, $image)      = explode(',', $image);
		$image = base64_decode($image);
		$image_name= $request->nama.'.png';
        // $path = public_path('upload/'.$image_name);

        // file_put_contents($path, $image);
		$toko = toko::where('users_id', Auth()->User()->id)->first();
		\Storage::disk('public')->put("img/temp_produk/".$size."/".$image_name, file_get_contents($request->image));
		$image_path = url('/')."/public/img/temp_produk/".$size."/$image_name";

		// }
		// else {
		// 	$image_name = $request->nama;
		// 	\Storage::disk('public')->put("img/temp_produk/".$size."/".$image_name, file_get_contents($request->image));
		// 	$image_path = url('/')."/public/img/temp_produk/".$size."/$image_name";
		// }


		// $biodata->foto = $image_name;
		// $biodata->save();
		echo $image_name;
		// return response()->json(['status'=>$image_path]);		
	}


	// public function simpan_atur_produk_premium(Request $request){

	// 	$toko = toko::where('users_id', Auth()->User()->id)->first();

	// 	if($request->file("foto_maps_1")){
	// 		$foto = Foto_maps::where('id', $request->id_foto_maps_1)->first();
	// 		if(is_null($foto)){

	// 			$foto = new Foto_maps;
	// 			$foto->toko_id = $toko->id;
	// 		}
	// 		else{
	// 			\Storage::disk('public')->delete('img/toko/'.$toko->id.'/maps/'.$foto->foto);
	// 		}
	// 		$files = $request->file("foto_maps_1");
	// 		$type = $request->file("foto_maps_1")->getClientOriginalExtension();
	// 		$file_upload = $this->autocode('IMG').".".$type;
	// 		\Storage::disk('public')->put('img/toko/'.$toko->id.'/maps/'.$file_upload, file_get_contents($files));
	// 		$foto->foto = $file_upload;
	// 		$foto->no_foto = "1";
	// 		$foto->save();
	// 	}


	// 	if($request->file("foto_maps_2")){
	// 		$foto = Foto_maps::where('id', $request->id_foto_maps_2)->first();
	// 		if(is_null($foto)){
	// 			$foto = new Foto_maps;
	// 			$foto->toko_id = $toko->id;
	// 		}
	// 		else{
	// 			\Storage::disk('public')->delete('img/toko/'.$toko->id.'/maps/'.$foto->foto);
	// 		}
	// 		$files = $request->file("foto_maps_2");
	// 		$type = $request->file("foto_maps_2")->getClientOriginalExtension();
	// 		$file_upload = $this->autocode('IMG').".".$type;
	// 		\Storage::disk('public')->put('img/toko/'.$toko->id.'/maps/'.$file_upload, file_get_contents($files));
	// 		$foto->foto = $file_upload;
	// 		$foto->no_foto = "2";
	// 		$foto->save();
	// 	}
	// 	if($request->file("foto_maps_3")){
	// 		$foto = Foto_maps::where('id', $request->id_foto_maps_3)->first();
	// 		if(is_null($foto)){
	// 			$foto = new Foto_maps;
	// 			$foto->toko_id = $toko->id;
	// 		}
	// 		else{
	// 			\Storage::disk('public')->delete('img/toko/'.$toko->id.'/maps/'.$foto->foto);
	// 		}
	// 		$files = $request->file("foto_maps_3");
	// 		$type = $request->file("foto_maps_3")->getClientOriginalExtension();
	// 		$file_upload = $this->autocode('IMG').".".$type;
	// 		\Storage::disk('public')->put('img/toko/'.$toko->id.'/maps/'.$file_upload, file_get_contents($files));
	// 		$foto->foto = $file_upload;
	// 		$foto->no_foto = "3";
	// 		$foto->save();
	// 	}

	// 	return redirect()->back();

	// }





	// atur landing_page



		// return redirect()->back();
}
