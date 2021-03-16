@php
// $product = array('product_1.jpg', 'product_2.jpg', 'product_3.jpg', 'product_4.jpg','product_5.jpg', 'product_6.jpg','product_7.jpg', 'product_8.jpg','product_9.jpg', 'product_10.jpg','product_11.jpg', 'product_12.jpg','product_13.jpg', 'product_14.jpg', 'product_15.jpg', 'product_16.jpg', 'product_17.jpg', 'product_18.jpg', 'product_19.jpg');
$rownya = count($product)/9;
$count_product = count($product);
$index = 0;
@endphp 
@for ($j = 0; $j < $rownya; $j++)
<div class="row" style="display: flex; flex-wrap: wrap; justify-content: space-around;" onclick='tampil_gambar("{{$product[$j]}}")'>
    @for ($i = 0; $i < 6; $i++)
    <div style="display: flex; justify-content1: center; flex-direction: column;  width:30%; margin: 1.5%;">
        <img src="<?=url('/')?>/public/img/toko/{{$product[$index]->toko->id}}/produk/{{$product[$index]->foto_produk}}" style="width: 100%; height: 100%;object-fit: cover; border-radius: 1em;">
    </div>
    @php $index++; @endphp
    <?php if ($index == $count_product){ break; } ?>
    @endfor
    <?php if ($index == $count_product){ break; } ?>
    @if ($j%2 == 0)
    <div style="display: flex; flex-direction: row;">
        <div style="display: flex; justify-content: center; flex-direction: column;  width:63.7%; margin: 1.5% 2.5% 1.5% 1.5%;">
            <img src="<?=url('/')?>/public/img/toko/{{$product[$index]->toko->id}}/produk/{{$product[$index]->foto_produk}}" style="width: 100%; height: 100%;object-fit: cover; border-radius: 1em;">
        </div>
        @php $index++; @endphp
        <?php if ($index == $count_product){ break; } ?>
        <div style="width: 30%; display: flex; justify-content: space-around; flex-direction: column;">
            @for ($i = 0; $i < 2; $i++)
            <div style="display: flex; justify-content: center; flex-direction: column;  width:100%; margin: 1.5%;">
                <img src="<?=url('/')?>/public/img/toko/{{$product[$index]->toko->id}}/produk/{{$product[$index]->foto_produk}}" style="width: 100%; height: 100%;object-fit: cover; border-radius: 1em;">
            </div>
            @php $index++; @endphp
            <?php if ($index == $count_product){ break; } ?>
            @endfor
        </div>
    </div>
    @else
    <div style="display: flex; flex-direction: row;">
        <div style="width: 30%; display: flex; justify-content: space-between; flex-direction: column; margin: 1.5% 1.5% 1.5% 1.5%;">
            @for ($i = 0; $i < 2; $i++)
            <div style="display: flex; justify-content: center; flex-direction: column;  width:100%;">
                <img src="<?=url('/')?>/public/img/toko/{{$product[$index]->toko->id}}/produk/{{$product[$index]->foto_produk}}" style="width: 100%; height: 100%;object-fit: cover; border-radius: 1em;">
            </div>
            @php $index++; @endphp
            <?php if ($index == $count_product){ break; } ?>
            @endfor
        </div>
        <div style="display: flex; justify-content: center; flex-direction: column;  width:63.7%; margin: 1.5% 1.5% 1.5% 2.3%;">
            <img src="<?=url('/')?>/public/img/toko/{{$product[$index]->toko->id}}/produk/{{$product[$index]->foto_produk}}" style="width: 100%; height: 100%;object-fit: cover; border-radius: 1em;">
        </div>
        @php $index++; @endphp
        <?php if ($index == $count_product){ break; } ?>
    </div>
    @endif

</div>
@endfor
