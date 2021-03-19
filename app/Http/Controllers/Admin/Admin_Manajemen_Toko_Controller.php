<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori_toko;
use App\Models\Daftar_tunggu_toko;
use App\Models\Toko;
use App\Models\Landing_page_toko;

class Admin_Manajemen_Toko_Controller extends Controller
{
    //
    public function autocode($kode){
		$timestamp = time(); 
		$random = rand(10, 100);
		$current_date = date('mdYs'.$random, $timestamp); 
		return $kode.$current_date;
	}

    public function index(){
        $toko = Toko::all();
        return view('users.admin.m-toko.index', ['toko'=> $toko]);
    }

    public function daftar_tunggu_toko(){
        $daftar_tunggu = Daftar_tunggu_toko::all();
        return view('users.admin.m-toko.daftar_tunggu', ['daftar_toko'=>$daftar_tunggu]);
    }

    public function daftar_tunggu_toko_detail($id){
        $toko = Daftar_tunggu_toko::find($id);
        $kategori_toko = Kategori_toko::all();
        return view('users.admin.m-toko.daftar_tunggu_detail', ['toko'=>$toko, 'kategori_toko'=>$kategori_toko]);
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
}
