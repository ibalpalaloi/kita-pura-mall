@foreach($produk as $row)
<div class="slider-toko" style="margin-bottom: 1em; margin-left: 0px;">
    <?php $svg = "public/img/home/bg-slider-toko.svg"; ?>
    <img src="<?=url('/')?>/public/img/toko/{{$row->toko_id}}/produk/{{$row->foto_produk}}">
    <div style='text-align: left; font-size: 0.75em; padding: 0.6em 1em 0.7em 1em; width: 100%; color: white; background-size: cover; position: relative; background: {{$page->warna_header}};'> 


        <a href="<?=url('/')?>/{{Request::segment(1)}}/daftar-menu/{{$row->id}}" style="font-weight: 500; margin-top: 0em; color: white; font-size: 1.5em;"><?=ucwords(strtolower(substr(strip_tags($row->nama), 0, 10)))?>@if (strlen($row->nama) > 10)..@endif</a>
        <div style="font-size: 0.8em; line-height: 1.2em; font-weight: 0;">{{ucwords(strtolower($row->kategori->nama))}}</div>
        <div style="padding: 0; margin: 0.5em 0px 0.7em 0px; font-size: 0.8em; line-height: 1em;">
            <i class="fas fa-star star-rating"></i>
            <i class="fas fa-star star-rating"></i>
            <i class="fas fa-star star-rating"></i>
            <i class="fas fa-star star-rating"></i>
            <i class="far fa-star star-rating"></i>
        </div>

        @php $hasil_diskon_string = ""; @endphp
        @if ($row->jenis_harga == 'Statis')
        @if($row->diskon != '0')
        <div style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 0.9em; line-height: 1em; vertical-align: center; margin-bottom: 0em;">
            <s>IDR. {{number_format($row->harga)}}</s>
        </div>
        @php
        $hasil_diskon = ($row->harga)-((($row->diskon)/100)*($row->harga));
        @endphp
        <div style="padding: 0; margin: 0.1em 0px 0px 0em; font-size: 1.3em; line-height: 1em; font-weight: 500;">IDR. {{number_format($hasil_diskon)}}</div>
        @php $hasil_diskon_string = number_format($hasil_diskon); @endphp
        @else
        <div style="padding: 0; margin: 0.5em 0px 0px 0em; font-size: 1.3em; line-height: 1em; font-weight: 500;">IDR. {{number_format($row->harga)}}</div>
        @endif  

        @else
        <div style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 0.9em; line-height: 1em; vertical-align: center; margin-bottom: 0em;">
            Harga Mulai
        </div>
        <div style="padding: 0; margin: 0.1em 0px 0px 0em; font-size: 1.3em; line-height: 1em; font-weight: 500;">IDR. {{number_format($row->harga_terendah)}}</div>

        @endif
        @if (Auth::user())
        @if ($penjual == 'no')
        @if ($row->jenis_harga == 'Statis')
        @if($row->diskon != '0')

        <a href="https://api.whatsapp.com/send?phone={{$toko->no_hp}}&text=[Order Masuk Dari Kitapura Mall]%20Halo%20{{$toko->nama_toko}},%20Saya%20ingin%20memesan%20{{ucwords(strtolower($row->nama))}}%20Rp.%20{{$hasil_diskon_string}}">
            <img src="<?=url('/')?>/public/img/icon_svg/whatsapp_ori_circle.svg" style="position: absolute; top: -2em; right: 0.5em; width: 5em;" onclick="masukan_keranjang('{{$row->toko_id}}', '{{$row->id}}')">
        </a>

        @php $hasil_diskon_string = number_format($hasil_diskon); @endphp
        @else
        <a href="https://api.whatsapp.com/send?phone={{$toko->no_hp}}&text=[Order Masuk Dari Kitapura Mall]%20Halo%20{{$toko->nama_toko}},%20Saya%20ingin%20memesan%20{{ucwords(strtolower($row->nama))}}%20Rp.%20{{$row->harga}}">
            <img src="<?=url('/')?>/public/img/icon_svg/whatsapp_ori_circle.svg" style="position: absolute; top: -2em; right: 0.5em; width: 5em;" onclick="masukan_keranjang('{{$row->toko_id}}', '{{$row->id}}')">
        </a>
        @endif  

        @else
        <a href="https://api.whatsapp.com/send?phone={{$toko->no_hp}}&text=[Order Masuk Dari Kitapura Mall]%20Halo%20{{$toko->nama_toko}},%20Saya%20ingin%20memesan%20{{ucwords(strtolower($row->nama))}}%20Rp.%20{{$row->harga_terendah}}">
            <img src="<?=url('/')?>/public/img/icon_svg/whatsapp_ori_circle.svg" style="position: absolute; top: -2em; right: 0.5em; width: 5em;" onclick="masukan_keranjang('{{$row->toko_id}}', '{{$row->id}}')">
        </a>

        @endif

        @else
        <a href="https://api.whatsapp.com/send?phone={{$toko->no_hp}}&text=[Order Masuk Dari Kitapura Mall]%20Halo%20{{$toko->nama_toko}},%20Saya%20ingin%20memesan%20{{ucwords(strtolower($toko->nama))}}%20Rp.%20{{$hasil_diskon_string}}">
            <img src="<?=url('/')?>/public/img/icon_svg/whatsapp_ori_circle.svg" style="position: absolute; top: -2em; right: 0.5em; width: 5em;" onclick="gagal_masukan_keranjang()">
        </a>
        @endif
        @else
        <a href="https://api.whatsapp.com/send?phone={{$toko->no_hp}}&text=Halo%20{{$toko->nama_toko}},%20Saya%20ingin%20memesan%20{{ucwords(strtolower($row->nama))}}">
            <img src="<?=url('/')?>/public/img/icon_svg/whatsapp_ori_circle.svg" style="position: absolute; top: -2em; right: 0.5em; width: 5em;">
        </a>
        @endif  
    </div>
</div> 
@endforeach