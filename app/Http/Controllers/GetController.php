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
        $link = trim(substr($link, strpos($link, '=')+1));
        // $link = substr($link, 0, strpos($link, '&'));
        echo $link;
    }
}
