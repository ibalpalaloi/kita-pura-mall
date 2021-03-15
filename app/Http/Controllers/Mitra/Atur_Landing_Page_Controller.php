<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video_landing_page;
use App\Models\Landing_page_fasilitas_toko;
use App\Models\Toko;
use Session;

class Atur_Landing_Page_Controller extends Controller
{
    //
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
        $link = trim(substr($link, strpos($link, '=')+1));
        // $link = substr($link, 0, strpos($link, '&'));
        echo $link;
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

    public function simpan_cover(Request $request){
        $id = $request->nomor_foto;

		if($request->file("foto_cover")){
			$toko = toko::where('users_id', Session::get('id_user'))->first();
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
}
