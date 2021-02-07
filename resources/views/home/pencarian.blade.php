@extends('layouts.home')

@section('title')
Explore |
@endsection

@section('header-scripts')
<style type="text/css">
	.pencarian-tabs > a {
		padding: 0.5em 1.5em 0.5em 1.5em;
		color: #ff006e;
		border-radius: 1.5em;
		margin: 0em 0.5em 0em 0.5em;
		font-size: 0.7em;
	}

	.active-mall {
		background: #ff006e;
		color: white !important;
	}

	#mapid {
		height: 100vh;
		z-index: 0;
	}

	.detail-product > img {
		object-fit: cover;
		width: 100%;
		height: 18em;	
		border-radius: 0.2em;
	}

	.star-rating {
		color: #ff006e;
	}

	.star-no-rating {
		color: #c4c4c4;
	}

	.nilai-product {
		margin-right: 0.8em;
	}

	.nilai-product > img{
		width: 2.2em;
	}

	.footer {
		position: fixed;
		left: 0;
		bottom: 0;
		width: 100%;
		color: white;
		text-align: center;
		padding-bottom: 0px;
		background-color: transparent;
	}

	.footer-mall-menu {
		background: white;
		border-radius: 3em;         
		margin-bottom: 0.5em;  
	}
</style>
@endsection

@section('content')
<header class="style__Container-sc-3fiysr-0 header" style="background: #eaf4ff;">
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: center; flex-direction: column; height: 55px;">
		<div class="pencarian-tabs" style="display: flex; justify-content: center; background: white; padding: 8px; border-radius: 1.5em;">
			<a href="<?=url('/')?>/pencarian/rekomendasi">
				Rekomendasi
			</a>
			<a href="<?=url('/')?>/pencarian/maps">
				Maps
			</a>
			<a class="active-mall" href="<?=url('/')?>/pencarian/explore">
				Explore
			</a>
		</div>
	</div>
</header>


<main id="homepage" class="homepage" style="background: #eaf4ff;">
	<div class="card-pencarian" style="background: #eaf4ff;">
		<div class="nama-kategori" style="background: #eaf4ff; padding-top: 0.6em; margin-top: 4em; display: flex; flex-direction: column; flex-wrap: wrap;">
			@php
			$product = array('product_1.jpg', 'product_2.jpg', 'product_3.jpg', 'product_4.jpg','product_5.jpg', 'product_6.jpg','product_7.jpg', 'product_8.jpg','product_9.jpg', 'product_10.jpg','product_11.jpg', 'product_12.jpg','product_13.jpg', 'product_14.jpg', 'product_15.jpg', 'product_16.jpg', 'product_17.jpg', 'product_18.jpg', 'product_19.jpg');
			$rownya = count($product)/9;
			$count_product = count($product);
			$index = 0;
			@endphp 
			@for ($j = 0; $j < $rownya; $j++)
			<div class="row" style="display: flex; flex-wrap: wrap; justify-content: space-around;">
				@for ($i = 0; $i < 6; $i++)
				<div style="display: flex; justify-content: center; flex-direction: column;  width:30%; margin: 1.5%;">
					<img src="<?=url('/')?>/public/img/product/thumbnail/{{$product[$index]}}" style="width: 100%; height: 100%;object-fit: cover; border-radius: 1em;">
				</div>
				@php $index++; @endphp
				<?php if ($index == $count_product){ break; } ?>
				@endfor
				<?php if ($index == $count_product){ break; } ?>
				@if ($j%2 == 0)
				<div style="display: flex; flex-direction: row;">
					<div style="display: flex; justify-content: center; flex-direction: column;  width:63.7%; margin: 1.5% 2.5% 1.5% 1.5%;">
						<img src="<?=url('/')?>/public/img/product/thumbnail/{{$product[$index]}}" style="width: 100%; height: 100%;object-fit: cover; border-radius: 1em;">
					</div>
					@php $index++; @endphp
					<?php if ($index == $count_product){ break; } ?>
					<div style="width: 30%; display: flex; justify-content: space-around; flex-direction: column;">
						@for ($i = 0; $i < 2; $i++)
						<div style="display: flex; justify-content: center; flex-direction: column;  width:100%; margin: 1.5%;">
							<img src="<?=url('/')?>/public/img/product/thumbnail/{{$product[$index]}}" style="width: 100%; height: 100%;object-fit: cover; border-radius: 1em;">
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
							<img src="<?=url('/')?>/public/img/product/thumbnail/{{$product[$index]}}" style="width: 100%; height: 100%;object-fit: cover; border-radius: 1em;">
						</div>
						@php $index++; @endphp
						<?php if ($index == $count_product){ break; } ?>
						@endfor
					</div>
					<div style="display: flex; justify-content: center; flex-direction: column;  width:63.7%; margin: 1.5% 1.5% 1.5% 2.3%;">
						<img src="<?=url('/')?>/public/img/product/thumbnail/{{$product[$index]}}" style="width: 100%; height: 100%;object-fit: cover; border-radius: 1em;">
					</div>
					@php $index++; @endphp
					<?php if ($index == $count_product){ break; } ?>
				</div>
				@endif

			</div>
			@endfor

		</div> 
	</div>
</main>
@endsection

@section('footer-scripts')

@endsection
