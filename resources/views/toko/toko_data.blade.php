@php $index = 0; @endphp
@foreach($tokos as $toko)
@php $index++; @endphp
@if ($index%5 != 0)
<div class="input-group mb-3" style="margin-top: 0em; background:transparent; border: none; border-radius: 1.2em; display: flex; justify-content: center; width: 50%;">
    <div style="display: flex; justify-content: center; position:relative;width: 92%; margin: 0px; height: 100%; border-radius: 1em; background: linear-gradient(180deg, rgba(0, 0, 0, 0) 66.15%, #000000 100%);">
        <a style="background: #FB036B; width: 100%; border-radius: 1em;">
            @if ($toko->foto_cover != '')
            <img src="<?=url('/')?>/public/img/toko/{{$toko->id}}/cover/240x240/{{$toko->foto_cover}}" style="width: 100%;height: 100%; border-radius: 1em;">
            @else
            <img src="<?=url('/')?>/public/img/toko/toko_default.svg" style="width: 100%; height: 100%; border-radius: 1em;">
            @endif
        </a>
        <a class="overlay" onclick="show_loader()"  href="<?=url('/')?>/{{$toko->username}}"></a>
        <div class="label-product" style="position: absolute; bottom: 0em; left: 0em; padding: 0.5em 0.5em 0.5em 0.7em; display: flex; width: 100%; background: linear-gradient(180deg, rgba(0, 0, 0, 0) 66.15%, #000000 100%);  justify-content: space-between; border-bottom-left-radius: 1em; border-bottom-right-radius: 1em;">
            <div class="keterangan-product" style="display: flex;">
                <div style="border-radius: 50%; width: 1.8em; height: 1.8em; border:1px solid white;">
                    @if (file_exists(public_path("img/toko/$toko->id/cover/240x240/$toko->foto_cover")))
                    <img src="<?=url('/')?>/public/img/toko/{{$toko->id}}/logo/200x200/{{$toko->logo_toko}}" style="width: 100%; border-radius: 50%;">
                    @else
                    <img src="<?=url('/')?>/public/img/toko/premium.svg" style="width: 100%; border-radius: 50%;">

                    @endif
                </div>
                <div class="detail-keterangan-product" style="display: flex; flex-direction: column; justify-content: center; color: white; margin-left: 0.3em;">
                    @if ($toko->jumlah_produk != 0 )
                    <div style="font-size: 0.7em; line-height: 1em;">{{$toko->jumlah_produk}} Produk</div>
                    @endif
                    <a href="<?=url('/')?>/{{$toko->username}}?previous=toko" style="font-size: 0.8em; line-height: 1.3em; color: white;"><?=substr(strip_tags($toko->nama_toko), 0, 12)?>@if (strlen($toko->nama_toko) > 12)..@endif</a>
                </div>
                <div style="background: #FF006E; position: absolute; right: 0.5em; bottom: 1em; font-size: 0.7em; padding:0.2em 0.7em; color: white;border-radius: 1em;">
                    Lihat toko
                </div>
            </div>
            @if ($toko->jenis_mitra == 'premium')
            <a href="<?=url('/')?>/{{$toko->username}}?previous=toko" style="background: white; padding: 0.2em 1em; color: #ff006e; border-radius: 1.5em; font-size: 0.8em; display: flex; align-items: center;" hidden>Kunjungi Toko</a>
            @else
            <div style="background: #ff006e; padding: 0.2em 1.1em; color: white; border-radius: 1.5em; font-size: 0.8em; display: flex; align-items: center;">Hubungi Toko</div>
            @endif
        </div>

    </div>
</div>
@else
<div class="input-group mb-3" style="margin-top: 0em; background:transparent; border: none; border-radius: 1.2em; display: flex; justify-content: center; width: 100%;" onclick="show_loader()">
    <div style="display: flex; justify-content: center; position:relative;width: 96%; margin: 0px; height: 100%; border-radius: 1em; background: linear-gradient(180deg, rgba(0, 0, 0, 0) 66.15%, #000000 100%);">
        <a href="<?=url('/')?>/{{$toko->username}}?previous=toko" style="background: #FB036B; width: 100%; border-radius: 1em;">
            @if ($toko->foto_cover != '')
            <img src="<?=url('/')?>/public/img/toko/{{$toko->id}}/cover/240x240/{{$toko->foto_cover}}" style="width: 100%;height: 100%; border-radius: 1em;">
            @else
            <img src="<?=url('/')?>/public/img/toko/toko_default.svg" style="width: 100%; height: 100%; border-radius: 1em;">
            @endif
        </a>
        <a onclick="show_loader()" href="<?=url('/')?>/{{$toko->username}}" class="overlay"></a>
        <div class="label-product" style="position: absolute; bottom: 0em; left: 0em; padding: 0.5em 0.5em 1em 1em; display: flex; width: 100%; background: linear-gradient(180deg, rgba(0, 0, 0, 0) 66.15%, #000000 100%);  justify-content: space-between; border-bottom-left-radius: 1em; border-bottom-right-radius: 1em;">
            <div class="keterangan-product" style="display: flex;">
                <div style="border-radius: 50%; width: 2.8em; height: 2.8em; border:1px solid white;">
                    @if (file_exists(public_path("img/toko/$toko->id/cover/240x240/$toko->foto_cover")))
                    <img src="<?=url('/')?>/public/img/toko/{{$toko->id}}/logo/200x200/{{$toko->logo_toko}}" style="width: 100%; border-radius: 50%;">
                    @else
                    <img src="<?=url('/')?>/public/img/toko/premium.svg" style="width: 100%; border-radius: 50%;">

                    @endif
                </div>
                <div class="detail-keterangan-product" style="display: flex; flex-direction: column; justify-content: center; color: white; margin-left: 0.3em;">
                    @if ($toko->jumlah_produk != 0 )
                    <div style="font-size: 1em; line-height: 1em;">{{$toko->jumlah_produk}} Produk</div>
                    @endif
                    <a href="<?=url('/')?>/{{$toko->username}}?previous=toko" style="font-size: 1.2em; line-height: 1.3em; color: white;"><?=substr(strip_tags($toko->nama_toko), 0, 16)?>@if (strlen($toko->nama_toko) > 16)..@endif</a>
                </div>
                <div style="background: #FF006E; position: absolute; right: 0.5em; bottom: 1.1em; font-size: 1.1em; padding:0.2em 0.7em; color: white;border-radius: 1em;">
                    Lihat toko
                </div>
            </div>
            @if ($toko->jenis_mitra == 'premium')
            <a href="<?=url('/')?>/{{$toko->username}}?previous=toko" style="background: white; padding: 0.2em 1em; color: #ff006e; border-radius: 1.5em; font-size: 0.8em; display: flex; align-items: center;" hidden>Kunjungi Toko</a>
            @else
            <div style="background: #ff006e; padding: 0.2em 1.1em; color: white; border-radius: 1.5em; font-size: 0.8em; display: flex; align-items: center;">Hubungi Toko</div>
            @endif
        </div>

    </div>
</div>
@endif

@endforeach