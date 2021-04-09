@php

$rownya = count($product)/9;
$count_product = count($product);
$index = 0;
@endphp 
@for ($j = 0; $j < $rownya; $j++)
<div class="row" style="display: flex; flex-wrap: wrap; justify-content: space-around;">
    @for ($i = 0; $i < 6; $i++)
    <a style="display: flex; justify-content: center; flex-direction: column; width:30%; margin: 1.5%;" href="<?=url('/')?>/pencarian/explore/{{$product[$index]->id}}">
        <img src="<?=url('/')?>/public/img/toko/{{$product[$index]->toko_id}}/produk/240x240/{{$product[$index]->foto_produk}}" style="width: 100%; height: 100%;object-fit: cover; border-radius: 1em;">
    </a>
    @php $index++; @endphp
    <?php if ($index == $count_product){ break; } ?>
    @endfor
    <?php if ($index == $count_product){ break; } ?>
    @if ($j%2 == 0)
    <div style="display: flex; flex-direction: row;">
        <a style="display: flex; justify-content: center; flex-direction: column;  width:63.7%; margin: 1.5% 2.5% 1.5% 1.5%;" href="<?=url('/')?>/pencarian/explore/{{$product[$index]->id}}">
            <img src="<?=url('/')?>/public/img/toko/{{$product[$index]->toko_id}}/produk/600x600/{{$product[$index]->foto_produk}}" style="width: 100%; height: 100%;object-fit: cover; border-radius: 1em;">
        </a>
        @php $index++; @endphp
        <?php if ($index == $count_product){ break; } ?>
        <div style="width: 30%; display: flex; justify-content: space-around; flex-direction: column;">
            @for ($i = 0; $i < 2; $i++)
            <a style="display: flex; justify-content: center; flex-direction: column;  width:100%; margin: 1.5%;" href="<?=url('/')?>/pencarian/explore/{{$product[$index]->id}}">
                <img src="<?=url('/')?>/public/img/toko/{{$product[$index]->toko_id}}/produk/240x240/{{$product[$index]->foto_produk}}" style="width: 100%; height: 100%;object-fit: cover; border-radius: 1em;">
            </a>
            @php $index++; @endphp
            <?php if ($index == $count_product){ break; } ?>
            @endfor
        </div>
    </div>
    @else
    <div style="display: flex; flex-direction: row;">
        <div style="width: 30%; display: flex; justify-content: space-between; flex-direction: column; margin: 1.5% 1.5% 1.5% 1.5%;">
            @for ($i = 0; $i < 2; $i++)
            <a href="<?=url('/')?>/pencarian/explore/{{$product[$index]->id}}" style="display: flex; justify-content: center; flex-direction: column;  width:100%;">
                <img src="<?=url('/')?>/public/img/toko/{{$product[$index]->toko_id}}/produk/240x240/{{$product[$index]->foto_produk}}" style="width: 100%; height: 100%;object-fit: cover; border-radius: 1em;">
            </a>
            @php $index++; @endphp
            <?php if ($index == $count_product){ break; } ?>
            @endfor
        </div>
        <a style="display: flex; justify-content: center; flex-direction: column;  width:63.7%; margin: 1.5% 1.5% 1.5% 2.3%;" href="<?=url('/')?>/pencarian/explore/{{$product[$index]->id}}">
            <img src="<?=url('/')?>/public/img/toko/{{$product[$index]->toko_id}}/produk/600x600/{{$product[$index]->foto_produk}}" style="width: 100%; height: 100%;object-fit: cover; border-radius: 1em;">
        </a>
        @php $index++; @endphp
        <?php if ($index == $count_product){ break; } ?>
    </div>
    @endif

</div>
@endfor
