    @foreach($produk as $row)
    @php $go_link = url('/')."/".Request::segment(1)."/daftar-menu/$row->id"; @endphp
    <div class="slider-toko" style="margin-bottom: 1em; margin-left: 0px;">
        <?php $svg = "public/img/home/bg-slider-toko.svg"; ?>
        <img src="<?=url('/')?>/public/img/toko/{{$row->toko_id}}/produk/240x200/{{$row->foto_produk}}" onclick='go_link("<?=$go_link?>")'>
        <div style='text-align: left; font-size: 0.75em; padding: 0.6em 1em 0.7em 1em; width: 100%; color: white; background-size: cover; position: relative; background: {{$page->warna_header}};'> 
            @if (Auth::user())
            <div class="" style="width: 5em; position: absolute; height: 5em; bottom:3.5em; right:0.5em; z-index: 1000;">
                <img src="<?=url('/')?>/public/img/mitra/landing_page/keranjang.svg" style="width: 100%; height: 100%;" onclick="masukan_keranjang('{{$row->toko_id}}', '{{$row->id}}')">
            </div>              
            @else
            <a href="<?=url('/')?>" class="" style="width: 5em; position: absolute; height: 5em; bottom:3.5em; right:0.5em; z-index: 1000;">
                <img src="<?=url('/')?>/public/img/mitra/landing_page/keranjang.svg" style="width: 100%; height: 100%;" onclick="masukan_keranjang('{{$row->toko_id}}', '{{$row->id}}')">
            </a>              
            @endif
            <a href="<?=url('/')?>/{{Request::segment(1)}}/daftar-menu/{{$row->id}}" style="font-weight: 500; margin-top: 0em; color: white; font-size: 1.5em;"><?=ucwords(strtolower(substr(strip_tags($row->nama), 0, 10)))?>@if (strlen($row->nama) > 10)..@endif</a>
            <div style="font-size: 0.8em; line-height: 1.2em; font-weight: 0;">{{ucwords(strtolower($row->kategori->nama))}}</div>
            <div style="padding: 0; margin: 0.5em 0px 0.7em 0px; font-size: 0.8em; line-height: 1em;">
                <i class="fas fa-star star-rating"></i>
                <i class="fas fa-star star-rating"></i>
                <i class="fas fa-star star-rating"></i>
                <i class="fas fa-star star-rating"></i>
                <i class="far fa-star star-rating"></i>
            </div>
            @if ($row->jenis_harga == 'Statis')
            @if($row->diskon == '0')
            <span style="padding: 0; margin: 0.1em 0px 0px 0px; font-size: 1.2em; line-height: 0.6em; font-weight: 500;">IDR. {{number_format($row->harga,0,',','.')}}</span>
            @else
            <span style="padding: 0; margin: 0.1em 0px 0px 0px; font-size: 0.6em; line-height: 0.7em; vertical-align: center;">
                <s>IDR. {{number_format($row->harga,0,',','.')}}</s>
            </span>
            @php
            $hasil_diskon = ($row->harga)-((($row->diskon)/100)*($row->harga));
            @endphp

            <span style="padding: 0; margin: 0.1em 0px 0px 0.5em; font-size: 1.2em; line-height: 0.6em; font-weight: 500;">IDR. {{number_format($hasil_diskon,0,',','.')}}</span>
            @endif
            @else
            <span style="padding: 0; margin: 0.1em 0px 0px 0px; font-size: 1.2em; line-height: 0.6em; font-weight: 500;"><span style="font-size: 0.7em;">Harga Mulai</span> IDR. {{number_format($row->harga_terendah,0,',','.')}}</span>

            @endif

        </div>
    </div> 
    @endforeach