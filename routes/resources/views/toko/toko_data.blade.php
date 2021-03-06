@foreach($tokos as $toko)
<div class="input-group mb-3" style="margin-top: 1em; background:transparent; border: none; border-radius: 1.2em; display: flex; justify-content: center;" onclick="show_loader()">
    <div style="display: flex; justify-content: center; position:relative;width: 90%; margin: 0px; height: 13em;border-radius: 1em; ">
        <a href="<?=url('/')?>/{{$toko->username}}?previous=toko" style="background: #FB036B; width: 100%; border-radius: 1em;">
            @if ($toko->foto != '')
            <img src="<?=url('/')?>/public/img/toko/{{$toko->id}}/cover/{{$toko->foto_cover}}" style="width: 100%; object-fit: cover;height: 100%; border-radius: 1em;">
            @else
            <img src="<?=url('/')?>/public/img/maps/template_maps.svg" style="width: 100%; height: 100%; border-radius: 1em;">
            @endif
        </a>
        <div class="label-product" style="position: absolute; bottom: 0em; left: 0em; padding: 0.9em 0.5em 0.9em 1.2em; display: flex; width: 100%; background-color: rgba(0,0,0,0.3); justify-content: space-between; border-bottom-left-radius: 1em; border-bottom-right-radius: 1em;">
            <div class="keterangan-product" style="display: flex;">
                <div style="width: 2em; height: 2em; border-radius: 50%; border:1px solid white;">
                    <img src="{{$toko->logo()}}" style="width: 100%; height: 100%; border-radius: 50%; object-fit:cover; ">
                </div>
                <div class="detail-keterangan-product" style="display: flex; flex-direction: column; justify-content: center; color: white; margin-left: 0.3em;">
                    @if (count($toko->kategorinya_toko) != 0 )
                        <div style="font-size: 0.7em; line-height: 1em;">{{ucwords(strtolower($toko->kategorinya_toko[0]->kategori_toko->kategori))}}</div>
                    @endif
                    <a href="<?=url('/')?>/{{$toko->username}}?previous=toko" style="font-size: 1em; line-height: 1.3em; color: white;"><?=substr(strip_tags($toko->nama_toko), 0, 15)?>@if (strlen($toko->nama_toko) > 15)..@endif</a>
                    
                </div>
            </div>
            @if ($toko->jenis_mitra == 'premium')
            <a href="<?=url('/')?>/{{$toko->username}}?previous=toko" style="background: white; padding: 0.2em 1em; color: #ff006e; border-radius: 1.5em; font-size: 0.8em; display: flex; align-items: center;">Kunjungi Toko</a>
            @else
            <div style="background: #ff006e; padding: 0.2em 1.1em; color: white; border-radius: 1.5em; font-size: 0.8em; display: flex; align-items: center;">Hubungi Toko</div>
            @endif
        </div>

    </div>
</div>
@endforeach