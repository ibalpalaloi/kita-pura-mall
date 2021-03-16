<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video_landing_page;
use App\Models\Toko;

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
}
