	@extends('layouts.home_no_menu')

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
	width: 47.5%;		
}

.slider-toko img {
	width: 100%;
	border-top-left-radius: 1em;
	border-top-right-radius: 1em;
}

.slider-toko > div {
	border-bottom-left-radius: 1em;
	border-bottom-right-radius: 1em;
}


.star-rating {
	color: #efff3b;
}

.star-no-rating {
	color: #c1c3be;
}

.kategori-tabs {
	display: flex; 
	justify-content: center;
	width: 90%;
}

.kategori-tabs > a {
	margin: 0em 0.5em 0em 0.5em;
	font-size: 1em;
	border-radius: 0.3em;
	color: #ADADAD;
}

.active-kategori {
	background: {{$page->warna_header}};
	color: white !important;
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
	border-radius: 1.5em; border:1px solid white;		
	display: flex; justify-content: center; flex-direction: column; align-items: flex-start;
	background: white;
	padding-top: 0.3em;
	padding-bottom: 0.3em;
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

.svg_color{
	fill: #efff3b;
}
</style>
@endsection

@section('content')
<header class="style__Container-sc-3fiysr-0 header" style="background: white; padding-top: 0.3em;">
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh">
		<a class="svg_color" href="<?=url('/')?>/{{Request::segment(1)}}" style=" width: 15%; height: 100%; display: flex; justify-content: center; align-items: center; margin-right: ">
			<img src="<?=url('/')?>/public/img/icon_svg/back_red.svg" style="width: 28%;">
		</a>
		<a style="height: 100%; width: 80%; display: flex; justify-content: center; align-items: center;">
			<img src="<?=url('/')?>/public/img/toko/logo/warung_mantap.png" style="width: 20%;">
		</a>
		<a style="width: 15%; height: 100%; display: flex; justify-content: center; align-items: center; ">
			<img src="<?=url('/')?>/public/img/icon_svg/keranjang_polos_red.svg" style="width: 50%;">
			<div style="width: 1.5em; height: 1.5em; background:#9d0208; position: absolute;border-radius: 50%; bottom: 7px; right: 7px; background: #FF0000; color: white; text-align: center;" id="jumlah_keranjang">0</div>
		</a>
	</div>
</header>



<main id="homepage" class="homepage" style="background:white;">

	<div class="row-mall" style="padding: 5em 0em 1.2em 0em;">
		<h2 style="color: {{$page->warna_header}}; font-weight: 600; margin-bottom: 0px; margin-top: 1em;">Produk Kami</h2>
		<div class="input-group mb-3 div-input-mall" id="div_no_hp" style="border-radius: 3em;">
			<div style="width: 100%;">

				<div class="div-input-mall-square" style="background: #eaf4ff; display: flex; align-items: center; margin-right: 0.5em;"> 
					<span class="input-group-text-mall" style="margin-left: 0.8em;">
						<img src="<?=url('/')?>/public/img/icon_svg/search_grey.svg">
					</span>
					<input type="text" class="form-control-mall" id="cari_produk" name="cari_produk" placeholder="Cari produk" aria-label="Cari produk" aria-describedby="basic-addon1" value=""style="width: 100%; height: 3em; margin-right: 1em; background: #EAF4FF; color: grey !important;" required>
				</div>
				<div style="width: 3.4em; height: 3em; background: {{$page->warna_header}}; border-radius: 0.5em; display: flex; justify-content: center;align-items: center;">
					<img src="<?=url('/')?>/public/img/icon_svg/filter_white.svg" style="width: 50%;">
				</div>
			</div>
		</div>
		<div style="width: 100%; display: flex; justify-content: center; margin-bottom: 1em;">
			<div class="kategori-tabs" style="margin-top: 5px; font-size: 0.85em;">
				<a class="" style="background: #EAF4FF; padding: 0.3em 0.7em;">General</a>
				<a class="" style="background: #EAF4FF; padding: 0.3em 0.7em;">terbaru</a>
				<a class="active-kategori" style="padding: 0.3em 0.7em;">paling dicari</a>
			</div>
		</div>
		<div style="width: 100%; display: flex; flex-wrap: wrap; justify-content: space-between; padding-left: 0em;">
			@foreach($produk as $row)
			<div class="slider-toko" style="margin-bottom: 1em; margin-left: 0px;">
				<?php $svg = "public/img/home/bg-slider-toko.svg"; ?>
				<img src="<?=url('/')?>/public/img/toko/{{$row->toko_id}}/produk/{{$row->foto_produk}}">
				<div style='text-align: left; font-size: 0.75em; padding: 0.6em 1em 0.7em 1em; width: 100%; color: white; background-size: cover; position: relative; background: {{$page->warna_header}};'> 
					<div class="" style="width: 5em; position: absolute; height: 5em; bottom:3.5em; right:0.5em;">
						<img src="<?=url('/')?>/public/img/mitra/landing_page/keranjang.svg" style="width: 100%; height: 100%;" onclick="masukan_keranjang('{{$row->toko_id}}', '{{$row->id}}')">
					</div>					
					<div style="font-weight: 500; margin-top: 0em; font-size: 1.5em;"><?=substr(strip_tags($row->nama), 0, 15)?>@if (strlen($row->nama) > 15)..@endif</div>
					<div style="font-size: 0.8em; line-height: 1.2em; font-weight: 0;">{{$row->kategori->nama}}</div>
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
		</div>
	</div>
</main>

@endsection

@section('footer-scripts')
<script type="text/javascript">
	function masukan_keranjang(){
		var jumlah_keranjang = $("#jumlah_keranjang").html();
		jumlah_keranjang = parseInt(jumlah_keranjang)+1;
		$("#jumlah_keranjang").html(jumlah_keranjang);
	}
</script>

@endsection
