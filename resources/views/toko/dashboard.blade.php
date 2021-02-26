@extends('layouts.home')

@section('title')

@endsection

@section('header-scripts')
<style type="text/css">
	.banner {
		max-width: 480px;
		width: 100%;
		margin: 0px auto;
		padding: 4em 0em 4em 0em;

	}

	.class {
		
	}

	.header {
		background: #ff006e;
		position: fixed;
		width: 100%;
		top: 0px;
		left: 0px;
		right: 0px;
		z-index: 11;				
	}

	.card-mall {
		background: white;
		box-shadow: rgba(152, 152, 152, 0.5) 0px 2px 8px 1px;
		border-radius: 1.5em;	
		margin-bottom: 1em;
	}

	.row-mall {
		background: white;
		margin-bottom: 1em;
		width: 100%;	
	}

	.kategori {
		padding: 0.8em 0em 1em 0em;
		display: flex; 
		position: relative; 
		top: -6em; 
		margin-bottom: -2em;
		z-index: 2;   
		overflow-y: visible; 
		margin: 0px; 			
		overflow-x: scroll;
		scrollbar-width: none; /* Firefox */
		-ms-overflow-style: none;  /* Internet Explorer 10+ */
	}


}
.kategori::-webkit-scrollbar { /* WebKit */
	width: 0;
	height: 0;
}



.product {
	overflow-y: visible; 
	overflow-x: auto; 		
}

.nama-kategori {
	padding: 0.5em 0.5em 0.5em 0.5em;
	display: flex; 				
	justify-content: space-around;
}

.sosmed > img {
	margin: 0px 0.6em 0px 0.6em !important;
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



.homepage {
	padding: 0px;
}

.slider {
	display: flex; 
	overflow-y: visible; 
	margin: 0px; 			
	overflow-x: scroll;
	scrollbar-width: none; /* Firefox */
	-ms-overflow-style: none;  /* Internet Explorer 10+ */
}
.slider::-webkit-scrollbar { /* WebKit */
	width: 0;
	height: 0;
}

.slider-toko {
	display: flex; 
	justify-content: center; 
	flex-direction: column; 
	align-items: center; 
	margin: 0em 0em 0em 0.5em; 
	width: 8.5em;		
}

.slider-toko img {
	width: 8.5em;
	height: 7.5em;
	object-fit: cover;
	border-top-left-radius: 1em;
	border-top-right-radius: 1em;
}

.slider-toko > div {
	height: 6.3em;
	border-bottom-left-radius: 1em;
	border-bottom-right-radius: 1em;
}

.star-rating {
	color: #efff3b;
}

.star-no-rating {
	color: #c1c3be;
}

.form-control-mall {
	height: 2.5em; 
	border-bottom-right-radius: 0.5em; 
	border-top-right-radius: 0.5em; 
	border:  none;	
	background: #202020;
	font-weight: 600;
	padding: 0em 0em 0em 0.6em;	
	margin-left: 0px;
}


.div-input-mall {
	border-radius: 1.5em;		
	display: flex; justify-content: center; flex-direction: column; align-items: flex-start;
	padding-top: 0.3em;
}

.div-input-mall > span {
	color: #b3b6bc;
	padding: 0em 0em 0em 1.5em; 
	font-size: 0.75em;
	position: relative;
	top: 0.5em;
}

.div-input-mall div {
	display: flex; justify-content: center; flex-direction: row;
	width: 90%;
}



.div-input-mall-square {
	border-radius: 0.5em; border:1px solid white;	
	color: #1c2645;
	font-weight: 600;			
}

.footer {
	background: #eaf4ff;
}

</style>
@endsection

@section('content')
<header class="style__Container-sc-3fiysr-0 header" style="background: #EAF4FF;">
	<div class="container-mall">
		<h1 style="color: #FF006E; font-weight: 600; margin-top: 0.6em; margin-bottom: 0px; line-height: 0.8em;">Toko</h1>
		<h7 style="color: #B3B6BC; margin-top: 0px;">Temukan toko anda</h7>
		<div class="input-group mb-3 div-input-mall" id="div_no_hp" style="border-radius: 3em; margin-bottom: 0.5em;">

			<div style="width: 100%; margin-bottom: 0px;">
				<div class="div-input-mall-square" style="background: white; display: flex; align-items: center; margin-right: 0.5em;"> 
					<span class="input-group-text-mall" style="margin-left: 0.8em;">
						<img src="<?=url('/')?>/public/img/icon_svg/search_grey.svg">
					</span>
					<input type="text" class="form-control-mall" id="cari_produk" name="cari_produk" placeholder="Cari produk" aria-label="Cari produk" aria-describedby="basic-addon1" value=""style="width: 100%; height: 3em; margin-right: 1em; background: white; color: grey !important;" required>
				</div>
				<div style="width: 3.4em; height: 3em; background: #FF006E; border-radius: 0.5em; display: flex; justify-content: center;align-items: center;">
					<img src="<?=url('/')?>/public/img/icon_svg/filter_white.svg" style="width: 50%;">
				</div>
			</div>
		</div>

	</div>
</header>

<main id="homepage" class="homepage" style="background: #eaf4ff;">
	<div class="row-mall" style="padding: 0em 0em 5.5em 0em; margin-top: 10em; background: #eaf4ff;">
		@php
		$foto_product = array('product_6.png', 'product_7.png', 'product_8.png');
		$logo = array('free.svg', 'premium.svg', 'free.svg');
		$status = array('free', 'premium', 'free');
		@endphp 

		@for ($i = 0; $i < count($toko); $i++)
		<div class="input-group mb-3" style="margin-top: 1em; background:transparent; border: none; border-radius: 1.2em; display: flex; justify-content: center;">
			<div style="display: flex; justify-content: center; position:relative;width: 85%; margin: 0px; height: 13em;">
				<a href="<?=url('/')?>/{{Request::segment(1)}}/daftar-menu/alkflakf">
					<img src="<?=url('/')?>/public/img/product/TK-021220212313/product_6.png" style="width: 100%; object-fit: cover;height: 100%; border-radius: 1em;">
				</a>
				<div class="label-product" style="position: absolute; bottom: 0em; left: 0em; padding: 0.9em 0.5em 0.9em 1.2em; display: flex; width: 100%; background-color: rgba(0,0,0,0.3); justify-content: space-between;">
					<div class="keterangan-product" style="display: flex;">
						<div style="width: 2em; height: 2em;">
							<img src="<?=url('/')?>/public/img/mitra/logo/premium.svg" style="width: 100%;">
						</div>
						<div class="detail-keterangan-product" style="display: flex; flex-direction: column; justify-content: center; color: white; margin-left: 0.3em;">
							<div style="font-size: 0.7em; line-height: 1em;">{{$toko[$i]['kategori_toko']}}</div>
							<a href="<?=url('/')?>/{{Request::segment(1)}}/daftar-menu/alkflakf" style="font-size: 1em; line-height: 1.3em; color: white;">{{$toko[$i]['nama_toko']}}</a>
						</div>
					</div>
					@if ($toko[$i]['jenis_mitra'] == 'premium')
					<a href="<?=url('/')?>/{{$toko[$i]['username']}}"><div style="background: white; padding: 0.2em 1em; color: #ff006e; border-radius: 1.5em; font-size: 0.8em; display: flex; align-items: center;">Kunjungi Toko</div></a>
					@else
					<div style="background: #ff006e; padding: 0.2em 1.1em; color: white; border-radius: 1.5em; font-size: 0.8em; display: flex; align-items: center;">Hubungi Toko</div>
					@endif
				</div>

			</div>
		</div>
		@endfor
	</div>

</main>

@endsection

@section('footer-scripts')
@endsection
