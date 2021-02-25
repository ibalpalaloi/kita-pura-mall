<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Kategori;
use App\Models\toko;
use App\Models\product;

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
		$files = $request->file("foto_toko");
		$type = $request->file("foto_toko")->getClientOriginalExtension();
		$file_upload = $produk_id.".".$type;
		\Storage::disk('public')->put('img/toko/'.$toko->id.'/produk/'.$file_upload, file_get_contents($files));
		$produk->foto_produk = $file_upload;
		$produk->save();

		return redirect('/akun/mitra/premium/tambah-produk');

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
            $files = $request->file("foto_toko");
            $type = $request->file("foto_toko")->getClientOriginalExtension();
            $file_upload = $produk->id.".".$type;
            \Storage::disk('public')->put('img/toko/'.$toko->id.'/produk/'.$file_upload, file_get_contents($files));
            $produk->foto_produk = $file_upload;
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

		$kategori_produk = Kategori::all();

		$toko = toko::where('users_id', Session::get('id_user'))->first();
		$produk = product::where('toko_id', $toko->id)->get();

		return view('users/user/m-mitra/premium/atur_produk', compact('kategori_produk','produk'));

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
    

}
