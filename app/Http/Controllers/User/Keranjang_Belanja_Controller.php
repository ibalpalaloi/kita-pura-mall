<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keranjang_belanja;
use App\Models\Toko;
use App\Models\Product;
use App\Models\User;
use DB;
use GuzzleHttp;
use App\Models\Landing_page_toko;
use App\Models\Daftar_tunggu_pesanan;
use App\Models\Keynota;
use App\Models\Pesanan;
use App\Models\Riwayat_keynota;
use App\Models\Riwayat_pesanan;

class Keranjang_Belanja_Controller extends Controller
{
    //
    public function autocode($kode){
        $timestamp = time(); 
        $random = rand(10, 100);
        $current_date = date('mdYs'.$random, $timestamp); 
        return $kode.$current_date;
    }

    public function otp_wapibot($no_hp, $daftar_pesanan, $total_bayar, $data_pemesan){
        $no_hp = substr($no_hp, 1);
        $json = [
            "apikey" => "ec523173987ec087571b5d96f91c182e9154cd97",
            "to" => $no_hp,
            "message" => "---- *Pesanan Baru* ----\n\n".
                         "*Daftar Pesanan:*\n".$daftar_pesanan.
                         "Dengan Total = Rp. *".$total_bayar."*".
                         "\n\n*Data Pembeli:*\n".
                         "Nama = ". $data_pemesan['nama'].
                         "\nMetode pengiriman = ". $data_pemesan['metode_pengiriman'].
                         "\nMetode Pembayaran = ". $data_pemesan['metode_pembayaran'].
                         "\nAlamat = ". $data_pemesan['alamat'],
                         "\nNo Telp = ". $data_pemesan['no_hp'] 
        ];
        $client = new GuzzleHttp\client();
        $response = $client->request('POST', 'https://app.wapibot.com/api/send/text',
        ['headers'=>['Content-Type'=>'application/json'],
        'json'=>$json
        ]);

        // echo $response->getBody();
    }

    public function tambah_keranjang_belanja(Request $request){
        $check_keranjang = DB::table('keranjang_belanja')->select('id', 'jumlah')->where('toko_id', $request->toko_id)->where('product_id', $request->produk_id)->first();
        $jumlah = 0;
        $keranjang = "";

        if ($check_keranjang){
            $keranjang = Keranjang_belanja::where('id', $check_keranjang->id)->first();
            $jumlah = $check_keranjang->jumlah+1;

        }
        else {
            $keranjang = new Keranjang_belanja;
            $jumlah = 1;
        }
        $keranjang->user_id = Auth()->user()->id;
        $keranjang->toko_id = $request->toko_id;
        $keranjang->product_id = $request->produk_id;
        $keranjang->jumlah = $jumlah;
        $keranjang->save();
        // echo $keranjang->user_id;
    }

    public function keranjang($username, Request $request){
        $data_keranjang = array();
        $data_keranjang_current = array();
        $i = 0;

        $toko_loop = DB::table('keranjang_belanja')->select('no_hp', 'toko_id', 'nama_toko', 'username')->where('user_id', Auth()->user()->id)->distinct()->join('toko', 'toko.id', '=' , 'keranjang_belanja.toko_id')->where('username', '!=', $username)->get();
        // dd($toko_loop);
        $toko_loop_current = DB::table('toko')->select('no_hp', 'toko.id as toko_id', 'nama_toko', 'username')->where('username', '=', $username)->get();
        // dd($toko_loop_current);

        foreach ($toko_loop as $row){
            $data_keranjang[$i]["id_toko"] = $row->toko_id;
            $data_keranjang[$i]["nama_toko"] = $row->nama_toko;
            $data_keranjang[$i]['username'] = $row->username;
            $data_keranjang[$i]['no_hp'] = $row->no_hp;
            $data_keranjang[$i]["product"] = DB::table('keranjang_belanja')->select('keranjang_belanja.id', 'keranjang_belanja.jumlah', 'product.id as product_id', 'nama', 'jenis_harga', 'harga', 'harga_terendah', 'harga_tertinggi', 'diskon', 'foto_produk')->join('product', 'product.id', '=', 'keranjang_belanja.product_id')->where('keranjang_belanja.toko_id', $row->toko_id)->get();
            if ($data_keranjang[$i]["product"]->count() == 0){
                DB::table('keranjang_belanja')->where('toko_id', $row->toko_id)->where("user_id", Auth()->user()->id)->delete();
            }
            $i++;
        }
        $i=0;
        foreach ($toko_loop_current as $row){
            $data_keranjang_current[$i]["id_toko"] = $row->toko_id;
            $data_keranjang_current[$i]["nama_toko"] = $row->nama_toko;
            $data_keranjang_current[$i]['username'] = $row->username;
            $data_keranjang_current[$i]['no_hp'] = $row->no_hp;
            $data_keranjang_current[$i]["product"] = DB::table('keranjang_belanja')->select('keranjang_belanja.id', 'keranjang_belanja.jumlah', 'product.id as product_id', 'nama', 'jenis_harga', 'harga', 'harga_terendah', 'harga_tertinggi', 'diskon', 'foto_produk')->join('product', 'product.id', '=', 'keranjang_belanja.product_id')->where('keranjang_belanja.toko_id', $row->toko_id)->get();
            if ($data_keranjang_current[$i]["product"]->count() == 0){
                DB::table('keranjang_belanja')->where('toko_id', $row->toko_id)->where("user_id", Auth()->user()->id)->delete();
            }
            $i++;
        }

        $toko = Toko::where('username', $username)->first();
        $page = Landing_page_toko::where('toko_id', $toko->id)->first();
        
        $tunggu_konfirmasi = Keynota::where([
            ['status', 'tunggu konfirmasi'],
            ['user_id', Auth()->user()->id]
        ])->get();
        $daftar_tunggu_konfirmasi = array();
        $i=0;
        foreach($tunggu_konfirmasi as $data){
            $cek_toko = Toko::where('id', $data->toko_id)->first();
            $daftar_tunggu_konfirmasi[$i]["id_toko"] = $cek_toko->id;
            $daftar_tunggu_konfirmasi[$i]['nama_toko'] = $cek_toko->nama_toko;
            $daftar_tunggu_konfirmasi[$i]['username'] = $cek_toko->username;
            $daftar_tunggu_konfirmasi[$i]['no_hp'] = $cek_toko->no_hp;
            $daftar_tunggu_konfirmasi[$i]['product'] = Pesanan::where('keynota_id', $data->id)->get();
            $i++;
        }

        if($request->get('halaman') == 'terkonfirmasi'){
            $tunggu_konfirmasi = Keynota::where([
                ['status', 'terkonfirmasi'],
                ['user_id', Auth()->user()->id]
            ])->get();
            $daftar_tunggu_konfirmasi = array();
            $i=0;
            foreach($tunggu_konfirmasi as $data){
                $cek_toko = Toko::where('id', $data->toko_id)->first();
                $daftar_tunggu_konfirmasi[$i]["id_toko"] = $cek_toko->id;
                $daftar_tunggu_konfirmasi[$i]['nama_toko'] = $cek_toko->nama_toko;
                $daftar_tunggu_konfirmasi[$i]['username'] = $cek_toko->username;
                $daftar_tunggu_konfirmasi[$i]['no_hp'] = $cek_toko->no_hp;
                $daftar_tunggu_konfirmasi[$i]['product'] = Pesanan::where('keynota_id', $data->id)->get();
                $i++;
            }
            $view = view('users.user.m-keranjang.data_keranjang_terkonfirmasi', compact('data_keranjang', 'data_keranjang_current', 'page', 'toko', 'daftar_tunggu_konfirmasi'))->render();
            return response()->json(['html'=>$view]);
        }
        
        if($request->get('halaman') == 'keranjang'){
            $view = view('users.user.m-keranjang.data_keranjang', compact('data_keranjang', 'data_keranjang_current', 'page', 'toko', 'daftar_tunggu_konfirmasi'))->render();
            return response()->json(['html'=>$view]);
        }

        if($request->get('halaman') == 'riwayat'){
            $riwayat_keynota = Riwayat_keynota::where('user_id', Auth()->user()->id)->get();
            $daftar_tunggu_konfirmasi = array();
            $i=0;
            foreach($riwayat_keynota as $data){
                $cek_toko = Toko::where('id', $data->toko_id)->first();
                $daftar_tunggu_konfirmasi[$i]["id_toko"] = $cek_toko->id;
                $daftar_tunggu_konfirmasi[$i]['nama_toko'] = $cek_toko->nama_toko;
                $daftar_tunggu_konfirmasi[$i]['username'] = $cek_toko->username;
                $daftar_tunggu_konfirmasi[$i]['no_hp'] = $cek_toko->no_hp;
                $daftar_tunggu_konfirmasi[$i]['product'] = Riwayat_pesanan::where('kode_nota', $data->kode_nota)->get();
                $i++;
            }
            $view = view('users.user.m-keranjang.data_riwayat_pesanan', compact('data_keranjang', 'data_keranjang_current', 'page', 'toko', 'daftar_tunggu_konfirmasi'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('users.user.m-keranjang.keranjang', compact('data_keranjang', 'data_keranjang_current', 'page', 'toko', 'daftar_tunggu_konfirmasi'));
    }

    

    public function keranjang_user(){
        $data_keranjang = array();
        $i = 0;
        $toko_loop = DB::table('keranjang_belanja')->select('no_hp', 'toko_id', 'nama_toko', 'username')->where('user_id', Auth()->user()->id)->distinct()->join('toko', 'toko.id', '=' , 'keranjang_belanja.toko_id')->get();

        foreach ($toko_loop as $row){
            $data_keranjang[$i]["id_toko"] = $row->toko_id;
            $data_keranjang[$i]["nama_toko"] = $row->nama_toko;
            $data_keranjang[$i]['username'] = $row->username;
            $data_keranjang[$i]['no_hp'] = $row->no_hp;
            $data_keranjang[$i]["product"] = DB::table('keranjang_belanja')->select('keranjang_belanja.id', 'keranjang_belanja.jumlah', 'product.id as product_id', 'nama', 'jenis_harga', 'harga', 'harga_terendah', 'harga_tertinggi', 'diskon', 'foto_produk')->join('product', 'product.id', '=', 'keranjang_belanja.product_id')->where('keranjang_belanja.toko_id', $row->toko_id)->get();
            if ($data_keranjang[$i]["product"]->count() == 0){
                DB::table('keranjang_belanja')->where('toko_id', $row->toko_id)->where("user_id", Auth()->user()->id)->delete();
            }
            $i++;
        }
        // dd($data_keranjang_current);
        // dd($data_keranjang);
        return view('users.user.m-keranjang.keranjang_user', compact('data_keranjang'));

    }

    public function hapus_keranjang(Request $request){
        Keranjang_belanja::where('id', $request->id_keranjang)->delete();
        return redirect()->back();
    }


    public function ubah_jumlah(Request $request){
        // echo $request->jumlah_pesanan;
        $keranjang = Keranjang_belanja::where('id', $request->id)->first();
        $jumlah = 0;
        if ($request->operasi == 'kurang'){
            $jumlah = $request->jumlah_pesanan-1;            

        }
        else { 
            $jumlah = $request->jumlah_pesanan+1;            
        }
        $keranjang->jumlah = $jumlah;
        $keranjang->save();
        echo $jumlah;
    }

    public function tambah_daftar_tunggu(Request $request){
        $kode_nota = $this->autocode($request->id_toko."_");
        $keynota = new Keynota;
        $keynota->kode_nota = $kode_nota;
        $keynota->user_id = Auth()->user()->id;
        $keynota->status = "tunggu konfirmasi";
        $keynota->toko_id = $request->id_toko;
        $keynota->metode_pengiriman = $request->metode_pengiriman;
        $keynota->metode_pembayaran = $request->metode_pembayaran;
        $keynota->alamat = $request->alamat;
        $keynota->save();
        for($i=0; $i<count($request->id_keranjang); $i++){
           $keranjang = Keranjang_belanja::find($request->id_keranjang[$i]);
           $pesanan = new Pesanan;
           $pesanan->keynota_id = $keynota->id;
           $pesanan->product_id = $keranjang->product_id;
           $pesanan->jumlah = $keranjang->jumlah;
           if($keranjang->product->diskon != 0){
               $diskon = $keranjang->product->diskon;
               $harga_diskon = ($diskon / 100) * $keranjang->product->harga;
               $pesanan->harga = $harga_diskon * $keranjang->jumlah;
           }
           else{
              $pesanan->harga = $keranjang->jumlah * $keranjang->product->harga;
           }
           $pesanan->save();
           $keranjang = Keranjang_belanja::find($request->id_keranjang[$i])->delete();
        }
        $this->kirim_pesanan($kode_nota);
    }

    public function kirim_pesanan($kode_nota){
        $data_pesanan = '';
        $total_bayar_pesanan = 0;
        $data_pemesana;
        $keynota = Keynota::where('kode_nota', $kode_nota)->first();
        $pesanan = Pesanan::where('keynota_id', $keynota->id)->get();
        if(count($pesanan)>0){
            foreach($pesanan as $data){
                $data_pesanan .= "-".$data->product->nama." (".$data->jumlah.")\n";
                $total_bayar_pesanan = $total_bayar_pesanan + $data->harga;
            }
            $user = User::where('id', $keynota->user_id)->first();
            $data_pemesan['nama'] = $user->biodata->nama;
            $data_pemesan['metode_pembayaran'] = $keynota->metode_pembayaran;
            $data_pemesan['metode_pengiriman'] = $keynota->metode_pengiriman;
            if($data_pemesan['metode_pembayaran'] == "COD"){
                $data_pemesan['alamat'] = "-";
            }else{
                $data_pemesan['alamat'] = $keynota->alamat;
            }
            $data_pemesan['no_hp'] = $user->no_hp;
            $toko = Toko::where('id', $keynota->toko_id)->first();
            $no_hp = $this->generate_no_telp($toko->no_hp);

            $this->otp_wapibot($no_hp, $data_pesanan, $total_bayar_pesanan, $data_pemesan);
        }
        
    }

    public function generate_no_telp($no_hp){
        $no_telp = $no_hp;
        $no_telp = str_replace("-","", $no_telp);
        $no_telp = str_replace(" ","", $no_telp);
        if ($no_telp[0] == 0){
            $no_telp = substr($no_telp, 1);
            $no_telp = substr_replace($no_telp, "+62", 0, 0);
        }
        elseif($no_telp[0] == "+"){
            $no_telp = $no_telp;
        }
        

        return $no_telp;
    }
}
