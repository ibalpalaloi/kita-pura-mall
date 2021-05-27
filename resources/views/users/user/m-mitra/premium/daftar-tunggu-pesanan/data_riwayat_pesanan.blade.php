RIWAYAT PESANAN
@foreach ($riwayat_pesanan as $riwayat)

<div onclick="detail_riwayat_pesanan('{{$riwayat['kode_nota']}}')" style="background: #353535; width: 100%; border-radius: 0.5em; margin-bottom: 0.5em; position: relative;">
    <div style="margin: 1em;">
        Waktu Pesanan : {{$riwayat['waktu']}}
        <br>
        Nama pemesan : {{$riwayat['nama_pemesan']}}
    </div>
    {{-- @foreach ($riwayat['pesanan'] as $riwayat_pesanan)
    <div class="product" style="display: flex; justify-content: space-between; margin-bottom: 1em;">
        <a href="http://localhost/kita-pura-mall/Zifferent/daftar-menu/PD-04042021909" class="foto-product" style="width: 30%; padding-left: 1em;">
            <img src="<?=url('/')?>/public/img/toko/{{$riwayat_pesanan->toko->id}}/produk/240x240/{{$riwayat_pesanan->product->foto_produk}}" style="width: 100%; border-radius: 1em;">
        </a>
        <div class="deskripsi-product" style="width: 60%; padding-left: 1em;"> 
            <div class="nama" id="nama_242" style="font-size: 1em; color: white; font-weight: 500;">{{$riwayat_pesanan->nama_produk}}</div>
            <div class="harga" style="color: white;">{{$riwayat_pesanan->harga}}</div>
                                            

            <div class="button-detail" style="margin-top: 1em; display: flex; align-items: center;">
                <span>Jumlah</span>&nbsp;
                <span style="width: 3em; height: 2em; background: white; border-radius: 2em; color: #292929; display: flex; justify-content: center; align-items: center; margin-right: 0.2em; font-size: 0.7em; font-weight: 700;" id="jumlah_pesanan_242">{{$riwayat_pesanan->jumlah}}</span>
            </div>									
        </div>
    </div>	
    @endforeach		 --}}
    {{-- <div style="width: 10%;display: flex; justify-content: center; position: absolute; right: 0; top: 0; height: 100%; border-top-right-radius: 0.5em; border-bottom-right-radius: 0.5em;" onclick="hapus_daftar_tunggu('TK-031920215436_052320212248')" class="st0"></div> --}}
</div>

@endforeach
