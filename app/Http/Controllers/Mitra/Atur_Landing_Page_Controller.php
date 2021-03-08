<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video_landing_page;
use App\Models\Landing_page_fasilitas_toko;

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
}
