<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penilaian_toko;

class PenilaianController extends Controller
{
    //
    public function post_penilaian(Request $request){
        $penilaian = new Penilaian_toko;
        $penilaian->user_id = Auth()->user()->id;
        $penilaian->toko_id = $request->toko_id;
        $penilaian->bintang = $request->nilai_rating;
        $penilaian->komentar = $request->komentar;
        $penilaian->save();

        return redirect()->back();
    }
}
