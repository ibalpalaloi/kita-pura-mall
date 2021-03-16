@extends('layouts.home_premium')

@section('title')
Rekomendasi |
@endsection

@section('header-scripts')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<style type="text/css">
	body {
		background: #020202;
		height: 100%;
	}

	html {
		background: #020202;
	}

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

	.carousel {
		background: white;
		margin-top: 5px;
	}

	.swiper-slide {
		/*width: 85%;*/
		/*margin: 0px auto;*/
		overflow: hidden;
		border-radius: 1em;
	}

	.swiper-slide:before{
		display: block;
		text-align: center;
		line-height: 200px;
		font-size: 80px;
		color: white;
	}


	.swiper-slide > img{
		/*object-fit: cover;*/
		/*width: 100%;*/
	}



	.kategori-tabs > a {
		margin: 0em 0.6em 0em 0.6em;
		font-size: 0.8em;
	}

	.kategori-active-mall {
		font-weight: 600;
	}	

	.homepage {
		background-color: white;
		position: relative;
		max-width: 480px;
		width: 100%;
		margin: 0px auto;
		padding: 0px 16px 1em;
		box-sizing: border-box;
		min-height: calc(100vh - 60px);	
	}		


	.swiper-container {
		width: 100%;
		height: 100%;
	}

</style>
@endsection

@section('content')
<header class="style__Container-sc-3fiysr-0 header" style="background:#353535; padding-top: 0.3em;">
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh">
		<a href="<?=url('/')?>/akun/mitra/premium" style=" width: 15%; height: 100%; display: flex; justify-content: center; align-items: center; padding-bottom: 0.3em; padding-right: 0.7em;">
			<img src="<?=url('/')?>/public/img/back_white.svg">
		</a>
		<a id="defaultheader_logo" title="Kitabisa" style="height: 100%; width: 70%; display: flex; justify-content: center; align-items: center;">
			<img src="<?=url('/')?>/public/img/logo_premium.svg" style="height: 80%;">
		</a>
		<a href="<?=url('/')?>/{{Auth()->user()->toko->username}}" style="width: 15%; height: 100%; display: flex; justify-content: center; align-items: center;">
			<img src="<?=url('/')?>/public/img/icon_svg/landing_page.svg" style="width: 100%;">
		</a>
	</div>
</header>



<main id="homepage" class="homepage" style="padding-top: 5.5em;  padding-left: 0px; padding-right: 0px; background: #020202;">
	<div class="swiper-container swiper-container-h">
		<div class="swiper-wrapper">
			<?php
			$kategori = array("Makanan", "Fashion", "Minuman");
			$produk["Makanan"] = array("template_1.png", "template_2.png");
			$produk["Minuman"] = array("product_14.jpg", "product_16.jpg", "product_7.jpg");
			$produk["Fashion"] = array("product_5.jpg", "product_1.jpg", "product_3.jpg");
			?>
			@for ($i = 0; $i < count($template); $i++)
			<div class="swiper-slide" style="@if ($i == 0) margin-left: 1.5em; @endif position: relative; padding-bottom: 6em; z-index: 0;">
				<img src="<?=url('/')?>/public/img/landing_page/template/{{$template[$i]->foto}}" style="height: 90%; width: 100%;">
				<a href="<?=url('/')?>/akun/mitra/premium/post_template/{{$template[$i]->id}}"><div style="background: #1D1D1D; color: white; text-align: center; padding: 0.8em; bottom: -5; position: absolute; z-index: 5; font-size: 1.2em; width: 100%; border-radius: 0.5em; margin-top: 1em;">Pilih</div></a>
			</div>
			@endfor
		</div>
	</div>
</main>
@endsection

@section('footer-scripts')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
	var page = 1;
	$(document).ready(function(){
		var kategori = 'semua';
		page = 1;
		loadMoreData(page, kategori);
	})

	function loadMoreData(page, kategori){
		$.ajax({
			url: '?page=' + page + '&kategori=' + kategori,
			type: 'get'
		})
		.done(function(data){
			if(page == 1){
				$('#post-data').empty();
			}
			$('#post-data').append(data.html);
			
		})
		.fail(function(jqXHR, ajaxOptions, thrownError){
			alert("server errror");
		}); 
	}
</script> 
<script>
	var swiper = new Swiper('.swiper-container', {
		slidesPerView: 1.5,
		spaceBetween: 30,
		freeMode: true,
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		},
	});
</script>
@endsection