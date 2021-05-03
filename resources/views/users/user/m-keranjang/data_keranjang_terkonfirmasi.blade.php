<script type="text/javascript">
    var sub_keranjang_current = {};
    var sub_keranjang = {};
    var sub_total = [];
    var sub_total_current = [];
    // var keynota_current = [];
</script>
<div class="kategori-tabs" style="margin-top: 5px; font-size: 0.85em;">
    <button onclick="pindah_halaman('keranjang')">Keranjang</button>
    <button onclick="pindah_halaman('terkonfirmasi')">Dalam Proses</button>
    <button onclick="pindah_halaman('riwayat')">Riwayat</button>
</div>

@for ($i = 0; $i < count($daftar_tunggu_konfirmasi); $i++)
<div class="toko" style="background: white; width: 100%; padding: 0% 5%; margin-bottom: 0.5em; padding-top: 1em;">
    <a class="nama-toko" href="<?=url('/')?>/<?=$daftar_tunggu_konfirmasi[$i]['username']?>" style="margin: 1em 0em; font-size: 1.15em;font-weight: 600; color: {{$page->warna_header}}">
    {{$daftar_tunggu_konfirmasi[$i]['nama_toko']}}</a>
    <script type="text/javascript">
        sub_total_current["<?=$daftar_tunggu_konfirmasi[$i]['id_toko']?>"] = 0;
        sub_keranjang_current["<?=$daftar_tunggu_konfirmasi[$i]['id_toko']?>"] = "";
    </script>

    <div class="daftar-product" style="margin-top: 1em;">
        @foreach ($daftar_tunggu_konfirmasi[$i]['product'] as $row)
        <div class="product" style="display: flex; justify-content: space-between; margin-bottom: 1em;">
            <div class="" style="width: 5%;">
                
            </div>
            <div class="deskripsi-product" style="width: 47%;"> 
                <div class="nama" id="nama_{{$row->id}}" style="font-size: 1em; color: {{$page->warna_header}}; font-weight: 500;"><?=ucwords(strtolower(substr(strip_tags($row->product->nama), 0, 35)))?>@if (strlen($row->product->nama) > 35)..@endif</div>

                @php $hasil_diskon_string = ""; @endphp
                @if ($row->product->jenis_harga == 'Statis')
                @if($row->product->diskon != '0')
                <div style="padding: 0; color: {{$page->warna_header}}; margin: 0.5em 0px 0px 0px; font-size: 0.9em; line-height: 1em; vertical-align: center; margin-bottom: 0em;">
                    <s>IDR. {{number_format($row->product->harga)}}</s>
                </div>
                @php
                $hasil_diskon = ($row->product->harga)-((($row->product->diskon)/100)*($row->product->harga));
                @endphp
                <div style="color: {{$page->warna_header}}; padding: 0; margin: 0.1em 0px 0px 0em; font-size: 1.1em; line-height: 1em; font-weight: 500;">IDR. {{number_format($hasil_diskon)}}</div>
                @php $hasil_diskon_string = number_format($hasil_diskon); @endphp
                @else
                <div class="harga" style="color: {{$page->warna_header}};">IDR. {{number_format($row->product->harga,0,',','.')}}</div>
                @endif	

                @else
                <div style="padding: 0; color: {{$page->warna_header}}; margin: 0.5em 0px 0px 0px; font-size: 0.9em; line-height: 1em; vertical-align: center; margin-bottom: 0em;">
                    Harga Mulai
                </div>
                <div style="padding: 0;color: {{$page->warna_header}}; margin: 0.1em 0px 0px 0em; font-size: 1.3em; line-height: 1em; font-weight: 500;">IDR. {{number_format($row->toko->harga_terendah)}}</div>

                @endif
                <div class="button-detail" style="margin-top: 1em; display: flex;">
                    <div id="kurang_{{$row->id}}" style="width: 2em; height: 2em; background: white; border-radius: 50%; background: {{$page->warna_header}}; color: {{$page->warna_body}};text-align: center; font-size: 0.7em; padding-top: 0.3em; margin-right: 0.2em;" ><i class="fa fa-minus"></i></div>
                    <div style="width: 3em; height: 2em; background: white; border-radius: 2em; background: {{$page->warna_header}}; color: {{$page->warna_body}}; display: flex; justify-content: center; align-items: center; margin-right: 0.2em; font-size: 0.7em; font-weight: 700;" id="jumlah_pesanan_<?=$row->id?>">{{$row->jumlah}}</div>
                    <div id="tambah_{{$row->id}}" style="width: 2.1em; height: 2em; background: white; border-radius: 50%; background:  {{$page->warna_header}};color: {{$page->warna_body}};text-align: center; font-size: 0.7em; padding-top: 0.3em;" ><i class="fa fa-plus"></i></div>
                </div>									
            </div>
            <a  href="<?=url('/')?>/{{$daftar_tunggu_konfirmasi[$i]['username']}}/daftar-menu/{{$row->product_id}}" class="foto-product" style="width: 30%;">
                <img src="<?=url('/')?>/public/img/toko/{{$daftar_tunggu_konfirmasi[$i]['id_toko']}}/produk/240x240/{{$row->product->foto_produk}}" style="width: 100%; border-radius: 1em;">
            </a>
            <div class="" style="display: flex; justify-content: center; align-items: center; width: 8%;" onclick="hapus_keranjang('<?=$row->id?>')">
                                            
                </div>
            </div>
            <script type="text/javascript">
                @if ($row->product->jenis_harga == 'Statis')
                @if($row->product->diskon != '0')
                @php
                $hasil_diskon = ($row->product->harga)-((($row->product->diskon)/100)*($row->product->harga));
                $hasil_diskon_string = number_format($hasil_diskon);				
                @endphp
                sub_total_current["<?=$daftar_tunggu_konfirmasi[$i]['id_toko']?>"] += <?=$hasil_diskon?>*<?=$row->jumlah?>;
                @else
                sub_total_current["<?=$daftar_tunggu_konfirmasi[$i]['id_toko']?>"] += <?=$row->product->harga?>*<?=$row->jumlah?>;
                @endif	
                @endif


                sub_keranjang_current["<?=$daftar_tunggu_konfirmasi[$i]['id_toko']?>"] += "<?=$row->id?>"+"~";
            // id_product_current[] = 
        </script>					
        @endforeach
    </div>
</div>
<div style="width: 100%; display: flex; justify-content: center;">
    <div class="" style="width: 90%; background: linear-gradient(41.88deg, #FFA500 35.3%, #FF4500 88.34%); border-radius: 35px; padding: 0.5em; color: white; text-align: center; margin-bottom: 1em; position: relative;">
        <img style="width: 1.2em; position: absolute; left: 3.8em;top: 0.6em;"><span>Mununggu konfirmasi</span>
    </div>
</div>
<div style="width: 100%; display: flex; justify-content: center;">
    <div class="" style="width: 90%; background: linear-gradient(41.88deg, #FFA500 35.3%, #FF4500 88.34%); border-radius: 35px; padding: 0.5em; color: white; text-align: center; margin-bottom: 1em; position: relative;">
        <img style="width: 1.2em; position: absolute; left: 3.8em;top: 0.6em;"><span>Batalkan Pesanan</span>
    </div>
</div>
<script type="text/javascript">
    
</script>

@endfor