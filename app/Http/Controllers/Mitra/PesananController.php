<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Toko;
use App\Models\Pesanan;
use Auth;
use Carbon\Carbon;

class PesananController extends Controller
{
    //
    public function pesanan(){
        // $pesanan = Pesanan::where('created_at', date('Y-m-d').'00:00:00')->get();
        // dd($pesanan);
        $toko = Toko::where('users_id', Auth()->user()->id)->first();
        $pesanan = Pesanan::where('toko_id', $toko->id)
                            ->whereDate('created_at', date('Y-m-d'))
                            ->get();
        $total_pesanan = 0;
        foreach($pesanan as $data){
            $total_pesanan += $data->harga_total;
        }
        return view('/users.user.m-mitra.premium.pesanan', compact('pesanan', 'total_pesanan'));
    }

    public function list_produk(){
        $toko = Toko::where('user_id', Auth()->user()->id)->first();
        $produk = Product::where('toko_id', $toko->id)->get();
        return view('/users.user.m-mitra.premium.list_produk', compact('produk'));
    }

    public function post_pesanan(Request $request){
        $toko = Toko::where('user_id', Auth()->user()->id)->first();
        $pesanan = new Pesanan;
        $pesanan->toko_id = $toko->id;
        $pesanan->product_id = $request->id_produk;
        $pesanan->jumlah = $request->jumlah_pesanan;
        $pesanan->harga_total = $request->jumlah_pesanan * $request->harga;
        $pesanan->save();

        return redirect('/akun/pengaturan_toko/pesanan');
    }

    public function riwayat_transaksi(){
        // for($i=0; $i<150; $i++){
        //     $tgl_mulai = strtotime('2020-11-01');
        //     $tgl_akhir = strtotime('2021-02-17');
        //     $rand_tgl = rand($tgl_mulai, $tgl_akhir);
        //     $tgl = date('Y-m-d', $rand_tgl);
        //     $pesanan = new Pesanan;
        //     $pesanan->toko_id = 'TK-021120210461';
        //     $pesanan->product_id = rand(1, 2);
        //     $pesanan->jumlah = rand(1, 1);
        //     $pesanan->harga_total = rand(20000, 60000);
        //     $pesanan->created_at = $tgl;
        //     $pesanan->save();
        // }
        $bulan = array();
        $toko = Toko::where('user_id', Auth()->user()->id)->first();
        $posts = Pesanan::whereTokoId($toko->id)->orderBy('created_at')->get()->groupBy(function($item) {
            return $item->created_at->format('Y-m');
        });
        foreach($posts as $key => $post){
            array_push($bulan, $key.'-01');
        }

        $total_penjualan = array();
        $index = 0;
        foreach($bulan as $data){
            $hari_awal = $data;
            for($i=0; $i<4; $i++){
                $hari_akhir = date_add(date_create($hari_awal), date_interval_create_from_date_string("7 days"));
                $hari_akhir = date_format($hari_akhir, "Y-m-d");
                $pesanan = Pesanan::whereBetween('created_at', [$hari_awal, $hari_akhir])->get();
                $total_mingguan = 0;
                foreach($pesanan as $pesanan){
                    $total_mingguan += $pesanan->harga_total;
                }
                $total_penjualan[$index]['keuntungan'] = number_format($total_mingguan, 0, ".", ".");
                $total_penjualan[$index]['hari_awal'] = $hari_awal;
                $total_penjualan[$index]['hari_akhir'] = $hari_akhir;

                $hari_awal = $hari_akhir;
                $index++;
            }
        }
        // $date = date_add(date_create($bulan[0]), date_interval_create_from_date_string("7 days"));
        // dd(date_format($date, "Y-m-d"));
        return view('users.user.m-mitra.premium.riwayat_transaksi', compact('total_penjualan'));
    }

    public function riwayat_transaksi_bulan(){
        $bulan = array();
        $array_hasil = array();
        $toko = Toko::where('user_id', Auth()->user()->id)->first();
        $posts = Pesanan::whereTokoId($toko->id)->orderBy('created_at')->get()->groupBy(function($item) {
            return $item->created_at->format('Y-m');
        });

        foreach($posts as $key => $post){
            array_push($bulan, $key);
        }
        // dd($posts[$bulan[0]][0]->harga_total);
        for($i=0; $i<count($bulan);$i++){
            $total = 0;
            foreach($posts[$bulan[$i]] as $data){
                $total += $data->harga_total;
            }
            $array_hasil[$i]['bulan'] = $bulan[$i];
            $array_hasil[$i]['total'] = number_format($total, 0, ".", ".");
        }
        return view('users.user.m-mitra.premium.riwayat_transaksi_bulan', ['hasil_bulanan'=>$array_hasil]);
    }

    public function hapus_pesanan($id){
        Pesanan::find($id)->delete();
        return redirect('/akun/pengaturan_toko/pesanan');
    }
}
