<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Toko;
use Carbon\Carbon;

class Diagram_Controller extends Controller
{
    //
    public function user(){
        $user = User::latest()->first();
        // $from = date('2021-04-01');
        // $to = date('2021-04-31');
        // $user = User::whereBetween('created_at', [$from, $to])->get();
        // ;
        $array_date = [];
        $array_count_user = [];
        $array_count_toko = [];
        for($i=30; $i>0; $i--){
            $date = date('y-m-d', strtotime('-'. $i .' days'));
            $user = User::where('created_at','like', '%'.$date.'%')->count(); 
            $toko = Toko::where('created_at','like', '%'.$date.'%')->count(); 
            $array_count_user[] = $user;
            $array_count_toko[] = $toko;
            $array_date[] = $date;
        }
        $data = [' ', ' '];
        // dd(json_encode($array_count_user));
        return view('users.admin.diagram.user', compact('array_date', 'array_count_user', 'array_count_toko', 'data'));
    }

    public function diagram_user_pilih(Request $request){
        $validated = $request->validate([
            'bulan' => 'required',
            'tahun' => 'required',
        ]);
        $date = $request->tahun.'-'.$request->bulan.'-19';
        $array_date = [];
        $array_count_user = [];
        $array_count_toko = [];
        for($i=1; $i<=30; $i++){
            $date = $request->tahun.'-'.$request->bulan.'-'.$i;
            if($i<10){
                $date = $request->tahun.'-'.$request->bulan.'-0'.$i;
            }
            $user = User::where('created_at','like', '%'.$date.'%')->count(); 
            $toko = Toko::where('created_at','like', '%'.$date.'%')->count(); 
            $array_count_user[] = $user;
            $array_count_toko[] = $toko;
            $array_date[] = $date;
        }
        $data = [$request->bulan, $request->tahun];
        return view('users.admin.diagram.user', compact('array_date', 'array_count_user', 'array_count_toko', 'data'));
    }
}
