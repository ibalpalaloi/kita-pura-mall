<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Toko;
use App\Models\Pesanan;
use App\Models\Keynota;
use App\Models\Riwayat_keynota;
use App\Models\Riwayat_pesanan;
use Auth;
use Carbon\Carbon;

class PesananController extends Controller
{
    //
    public function ubah_status($keynota, $status){
        $tb_keynota = Keynota::where('kode_nota', $keynota)->get();
        if(count($tb_keynota)>0){
            Keynota::where('kode_nota', $keynota)->update(['status' => $status]);
        }
        else{
            echo "Pelanggan Telah Membatalkan Pesanannya";
        }
        if($status == "selesai"){
            $this->pesanan_selesai($keynota);
        }
	}

    public function pesanan_selesai($kode_nota){
        $keynota = Keynota::where('kode_nota', $kode_nota)->first();
        $riwayat_keynota = new Riwayat_keynota;
        $riwayat_keynota->kode_nota = $keynota->kode_nota;
        $riwayat_keynota->toko_id = $keynota->toko_id;
        $riwayat_keynota->user_id = $keynota->user_id;
        $riwayat_keynota->metode_pengiriman = $keynota->metode_pengiriman;
        $riwayat_keynota->metode_pembayaran = $keynota->metode_pembayaran;
        $riwayat_keynota->waktu = $keynota->waktu;
        $riwayat_keynota->tanggal = $keynota->tanggal;
        $riwayat_keynota->save();

        $pesanan = Pesanan::where('keynota_id', $keynota->id)->get();
        foreach($pesanan as $data){
            $riwayat_pesanan = new Riwayat_pesanan;
            $riwayat_pesanan->kode_nota = $kode_nota;
            $riwayat_pesanan->product_id = $data->product->id;
            $riwayat_pesanan->toko_id = $data->keynota->toko_id;
            $riwayat_pesanan->kategori_id = $data->product->kategori_id;
            $riwayat_pesanan->sub_kategori_id = $data->product->sub_kategori_id;
            $riwayat_pesanan->nama_produk = $data->product->nama;
            $riwayat_pesanan->jenis_harga = $data->product->jenis_harga;
            $riwayat_pesanan->harga = $data->product->harga;
            $riwayat_pesanan->harga_terendah = $data->product->harga_terendah;
            $riwayat_pesanan->harga_tertinggi = $data->product->harga_tertinggi;
            $riwayat_pesanan->diskon = $data->product->diskon;
            $riwayat_pesanan->jumlah =$data->jumlah;
            if($riwayat_pesanan->diskon != 0){
                $harga_diskon = ($data->product->diskon/100) * $riwayat_pesanan->jumlah;
                $harga_total = $harga_diskon * $riwayat_pesanan->jumlah; 
                $riwayat_pesanan->total_harga = $harga_total;
            }
            else{
                $harga_total = $riwayat_pesanan->jumlah * $riwayat_pesanan->harga;
                $riwayat_pesanan->total_harga = $harga_total;
            }
            $riwayat_pesanan->save();
            
            
        }
        $pesanan = Pesanan::where('keynota_id', $keynota->id)->delete();
        $keynota = Keynota::where('kode_nota', $kode_nota)->delete();
    }
    public function pesanan(){
        // $pesanan = Pesanan::where('created_at', date('Y-m-d').'00:00:00')->get();
        // dd($pesanan);
        $toko = Toko::where('users_id', Auth()->user()->id)->first();
        $produk = Product::where('toko_id', $toko->id)->get()->count();
        if ($produk == 0){
            $notification = array(
                'message' => 'Silahkan Masukan Produk',
            );  
            return redirect('/akun/mitra/premium/')->with($notification);
        }
        else {

            $pesanan = Pesanan::where('toko_id', $toko->id)
            ->whereDate('tanggal', date('Y-m-d'))
            ->get();
            $total_pesanan = 0;
            foreach($pesanan as $data){
                $total_pesanan += $data->harga_total;
            }
            // dd($pesanan);
            return view('/users.user.m-mitra.premium.pesanan', compact('pesanan', 'total_pesanan'));
        }
    }

    public function list_produk(){
        $toko = Toko::where('users_id', Auth()->user()->id)->first();
        $produk = Product::where('toko_id', $toko->id)->get();
        return view('/users.user.m-mitra.premium.list_produk', compact('produk'));
    }

    public function ubah_jumlah_pesanan(Request $request){
        $pesanan = Pesanan::where('id', $request->id)->first();
        $harga_produk = Product::where('id', $pesanan->product->id)->first()->harga;
        $pesanan->harga_total = $harga_produk*$request->jumlah_pesanan;
        $pesanan->jumlah = $request->jumlah_pesanan;
        $pesanan->save();
        return redirect()->back();
    }

    public function hapus_pesanan(Request $request){
        $pesanan = Pesanan::where('id', $request->id)->delete();
        $notification = array(
            'message' => 'Pesanan Berhasil Dihapus',
        );  
        return redirect()->back()->with($notification);
    }

    public function post_pesanan(Request $request){
        $toko = Toko::where('users_id', Auth()->user()->id)->first();
        $pesanan = new Pesanan;
        $pesanan->toko_id = $toko->id;
        $pesanan->product_id = $request->id_produk;
        $pesanan->jumlah = $request->jumlah_pesanan;
        $pesanan->tanggal = $request->tanggal;
        $pesanan->waktu = $request->waktu;
        $pesanan->harga_total = $request->jumlah_pesanan * $request->harga;
        $pesanan->save();

        $notification = array(
            'message' => 'Pesanan Berhasil Ditambahkan',
        );  
        return redirect('/akun/mitra/premium/list-pesanan')->with($notification);
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
        $toko = Toko::where('users_id', Auth()->user()->id)->first();
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
        $toko = Toko::where('users_id', Auth()->user()->id)->first();
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
        // dd($array_hasil);
        return view('users.user.m-mitra.premium.riwayat_transaksi_bulan', ['hasil_bulanan'=>$array_hasil]);
    }

}
