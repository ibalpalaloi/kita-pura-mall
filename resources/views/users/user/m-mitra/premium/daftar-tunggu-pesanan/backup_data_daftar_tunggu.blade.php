<script type="text/javascript">
    var product = [];
    var total_harga = [];
    var index_product = 0;		

</script>
<?php 
$i=0; 
$tanggal = 0;
?>
@for ($i = 0; $i < count($data_keranjang); $i++)
@if ($tanggal != $data_keranjang[$i]['tanggal'])
@php $tanggal = $data_keranjang[$i]['tanggal']; @endphp
<div style=" display: flex; justify-content: space-between; align-items: center;">
    <div style="font-size: 1em; line-height: 1.2em; color: #a1a4a8;">{{tgl_indo(date('Y-m-d', strtotime($data_keranjang[$i]['tanggal'])))}}</div>
</div>
@endif

<div class="st0" style="width: 100%; border-radius: 0.5em; margin-bottom: 0.5em; position: relative;">
    <div style="margin: 1em;">{{$data_keranjang[$i]['nama']}}</div>
    <script type="text/javascript">
        product[index_product] = "";
        total_harga[index_product] = 0;
    </script>
    @php
    $harga_sub_total = 0;
    @endphp
    @foreach ($data_keranjang[$i]['product'] as $row)
    <div class="product" style="display: flex; justify-content: space-between; margin-bottom: 1em;">
        <a  href="<?=url('/')?>/{{$toko->username}}/daftar-menu/{{$row->product->id}}" class="foto-product" style="width: 30%; padding-left: 1em;">
            <img src="<?=url('/')?>/public/img/toko/{{$toko->id}}/produk/240x240/{{$row->product->foto_produk}}" style="width: 100%; border-radius: 1em;">
        </a>
        <div class="deskripsi-product" style="width: 60%; padding-left: 1em;"> 
            <div class="nama" id="nama_{{$row->id}}" style="font-size: 1em; color: white; font-weight: 500;"><?=ucwords(strtolower(substr(strip_tags($row->product->nama), 0, 35)))?>@if (strlen($row->product->nama) > 35)..@endif</div>
            @if ($row->product->jenis_harga == 'Statis')
            @if($row->product->diskon != '0')
            <div style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 0.9em; line-height: 1em; vertical-align: center; margin-bottom: 0em;">
                <s>IDR. {{number_format($row->product->harga)}}</s>
            </div>
            @php
            $hasil_diskon = ($row->product->harga)-((($row->product->diskon)/100)*($row->product->harga));
            @endphp
            <div style="padding: 0; margin: 0.1em 0px 0px 0em; font-size: 1.1em; line-height: 1em; font-weight: 500;">IDR. {{number_format($hasil_diskon)}}</div>
            @php $hasil_diskon_string = number_format($hasil_diskon); @endphp
            @else
            <div class="harga" style="color: white;">IDR. {{number_format($row->product->harga,0,',','.')}}</div>
            @endif	

            @else
            <div style="padding: 0;margin: 0.5em 0px 0px 0px; font-size: 0.9em; line-height: 1em; vertical-align: center; margin-bottom: 0em;">
                Harga Mulai
            </div>
            <div style="padding: 0;margin: 0.1em 0px 0px 0em; font-size: 1.3em; line-height: 1em; font-weight: 500;">IDR. {{number_format($row->product->harga_terendah)}}</div>

            @endif
            <div class="button-detail" style="margin-top: 1em; display: flex; align-items: center;">
                <span>Jumlah</span>&nbsp;
                <span style="width: 3em; height: 2em; background: white; border-radius: 2em; color: #292929; display: flex; justify-content: center; align-items: center; margin-right: 0.2em; font-size: 0.7em; font-weight: 700;" id="jumlah_pesanan_<?=$row->id?>">{{$row->jumlah}}</span>
            </div>									
        </div>
        <?php 
        if ($row->product->jenis_harga == 'Statis'){
            if($row->product->diskon != '0'){
                $hasil_diskon = ($row->product->harga)-((($row->product->diskon)/100)*($row->product->harga));
                $hasil_diskon_string = number_format($hasil_diskon);				
                $harga_sub_total += $row->jumlah*$hasil_diskon;
            }
            else{
                $harga_sub_total += $row->jumlah*$row->product->harga;
            }
        }
        ?>
        <script type="text/javascript">
            product[index_product] += "<?=$row->jumlah?> <?=$row->nama?>\n";
        </script>
    </div>				
    @endforeach
    <script type="text/javascript">
        total_harga[index_product] = "<?=number_format($harga_sub_total,0,',','.')?>"; 
    </script>
    <?php $keynota = $data_keranjang[$i]['keynota']; ?>
    <div style="width: 10%;display: flex; justify-content: center; position: absolute; right: 0; top: 0; height: 100%; border-top-right-radius: 0.5em; border-bottom-right-radius: 0.5em;"  onclick='hapus_daftar_tunggu("<?=$keynota?>")' class="st0">
        <img src="<?=url('/')?>/public/img/icon_svg/trash_white.svg" style="width: 60%;">
    </div>

</div>
<div onclick='Whatsapp_pesan("<?=$data_keranjang[$i]['no_hp']?>", "<?=$data_keranjang[$i]['nama']?>", "<?=$i?>")' style="background:linear-gradient(41.88deg, #4AAE20 35.3%, #5EE825 88.34%); box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.82);border-radius: 11px; width: 100%; padding: 0.4em; text-align: center; margin-bottom: 0.5em;">Hubungi via Whatsapp</div>
@if ($data_keranjang[$i]['status'] == "tunggu konfirmasi")
    <div id="berhasil_dikirim_{{$i}}" style="background: linear-gradient(41.88deg, #EC7405 35.3%, #FFAA00 88.34%); box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.82);border-radius: 11px; width: 100%; padding: 0.4em; text-align: center; margin-bottom: 1em;" onclick="konfirmasi_pesanan('{{$keynota}}')">Berhasil Dikirim? IDR. </div>
    <script type="text/javascript">
        document.getElementById("berhasil_dikirim_{{$i}}").innerHTML = "Terima Pesanan? IDR. "+total_harga[index_product];
        index_product++;
    </script>
@else
    <div id="berhasil_dikirim_{{$i}}" style="background: linear-gradient(41.88deg, #EC7405 35.3%, #FFAA00 88.34%); box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.82);border-radius: 11px; width: 100%; padding: 0.4em; text-align: center; margin-bottom: 1em;" onclick="konfirmasi_pesanan('{{$keynota}}')">Berhasil Dikirim? IDR. </div>
    <script type="text/javascript">
        document.getElementById("berhasil_dikirim_{{$i}}").innerHTML = "Selesai";
        index_product++;
    </script>
@endif
{{-- <div id="berhasil_dikirim_{{$i}}" style="background: linear-gradient(41.88deg, #EC7405 35.3%, #FFAA00 88.34%); box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.82);border-radius: 11px; width: 100%; padding: 0.4em; text-align: center; margin-bottom: 1em;">Dalam Proses</div> --}}
@endfor