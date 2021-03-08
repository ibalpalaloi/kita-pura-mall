@extends('layouts.home')

@section('title')
Rekomendasi |
@endsection

@section('header-scripts')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
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

	.carousel {
		background: white;
		margin-top: 5px;
	}

	.swiper-slide {
		width: 87%;
		margin: 0px auto;
		overflow: hidden;
		border-radius: 1em;
		margin-right: 0.6rem;
	}

	.swiper-slide:before{
		display: block;
		text-align: center;
		line-height: 200px;
		font-size: 80px;
		color: white;
	}


	.swiper-slide > img{
		object-fit: cover;
		width: 100%;
	}

	.flickity-button svg {
		display: none;
	}

	.flickity-prev-next-button {
		height: 0%;
		width: 0%;
		border-radius: 0px;
		background: transparent;
	}

	.flickity-button:hover {
		background: transparent;
	}

	.flickity-page-dots {
		display: none;			
	}			

	/*browser fathu*/
	@media screen and (min-height: 550px) { 
		.swiper-slide {
			height: 380px;
		}

		.swiper-slide > img {
			height: 380px;
		}
	}

	/*app fathul*/
	@media screen and (min-height: 600px) {
		.swiper-slide {
			height: 430px;
		}

		.swiper-slide > img {
			height: 430px;
		}
	}

	/*browser andipa andipa*/
	@media screen and (min-height: 650px) {
		.swiper-slide {
			height: 480px;
		}

		.swiper-slide > img {
			height: 480px;
		}
	}

	@media screen and (min-height: 680px) {
		.swiper-slide {
			height: 530px;
		}

		.swiper-slide > img {
			height: 530px;
		}
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

	.swiper-slide {
		text-align: center;
		font-size: 18px;
		background: #fff;
		margin-right: 6.5%;

		/*margin: 0px !important;*/

		/* Center slide text vertically */
		display: -webkit-box;
		display: -ms-flexbox;
		display: -webkit-flex;
		display: flex;
		-webkit-box-pack: center;
		-ms-flex-pack: center;
		-webkit-justify-content: center;
		justify-content: center;
		-webkit-box-align: center;
		-ms-flex-align: center;
		-webkit-align-items: center;
		align-items: center;
	}

	.swiper-container-v {
		background: #eaf4ff;
		display: flex;
	}	

	.swiper-wrapper {
		display: flex; justify-content: flex-start;    	
	}
</style>
@endsection

@section('content')
<header class="style__Container-sc-3fiysr-0 header" style="background: #eaf4ff;" >
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="background: #eaf4ff; display: flex; justify-content: center; flex-direction: column; height: 80px;">
		<div class="pencarian-tabs" style="display: flex; justify-content: center; background: white; padding: 8px; border-radius: 1.5em;">
			<a class="active-mall" href="<?=url('/')?>/pencarian/rekomendasi">
				Rekomendasi
			</a>
			<a href="<?=url('/')?>/pencarian/maps">
				Maps
			</a>
			<a href="<?=url('/')?>/pencarian/explore">
				Explore
			</a>
		</div>
		<div class="kategori-tabs" style="margin-top: 5px;">
			<a class="kategori-active-mall">Semua</a>
			<a class="">Makanan</a>
			<a class="">Minuman</a>
			<a class="">Pakaian Bayi</a>
			<a class="">Lainnya</a>
		</div>
	</div>
</header>


<main id="homepage" class="homepage" style="padding-top: 5.5em;  padding-left: 0px; padding-right: 0px; background: #eaf4ff;">
	<div class="swiper-container swiper-container-h">
		<div class="swiper-wrapper">
			<?php
			$kategori = array("Makanan", "Fashion", "Minuman");
			$produk["Makanan"] = array("product_17.jpg", "product_19.jpg", "product_18.jpg");
			$produk["Minuman"] = array("product_14.jpg", "product_16.jpg", "product_7.jpg");
			$produk["Fashion"] = array("product_5.jpg", "product_1.jpg", "product_3.jpg");
			?>
			@for ($i = 0; $i < count($kategori); $i++)
			<div class="swiper-slide">
				<div class="swiper-container swiper-container-v">
					<div class="swiper-wrapper">
						@for ($j = 0; $j < count($produk[$kategori[$i]]); $j++)
						<div class="swiper-slide">
							<div class="label-product" style="position: absolute; bottom: 0em; left: 0em; padding: 0.4em 0.5em 0.4em 0.5em; display: flex; width: 100%; background-color: rgba(0,0,0,0.3); justify-content: space-between;">
								<div class="keterangan-product" style="display: flex;">
									<div class="logo-toko-product" style="width: 3em;">
										<img src="<?=url('/')?>/public/img/toko/logo/premium.svg" style="width: 100%;">
									</div>
									<div class="detail-keterangan-product" style="display: flex; flex-direction: column; justify-content: center; color: white; margin-left: 0.3em;">
										<div style="font-size: 1em;">Ball Ball Cafe</div>
										<div style="font-size: 0.6em;">Jl. Setiabudi No. 9 Palu</div>
									</div>
								</div>
								<div class="" style="width: 3em">
									<img src="<?=url('/')?>/public/img/belanja.svg" style="width: 100%;">
								</div>
							</div>
							<img src="<?=url('/')?>/public/img/product/{{$produk[$kategori[$i]][$j]}}">
						</div>
						@endfor
					</div>
					<div class="swiper-pagination swiper-pagination-v"></div>
				</div>
			</div>
			@endfor
		</div>
		<!-- Add Pagination -->
		<div class="swiper-pagination swiper-pagination-h"></div>
	</div>
</main>
@endsection

@section('footer-scripts')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

</script>
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
	var swiperH = new Swiper('.swiper-container-h', {
		slidesPerView: 1,
		spaceBetween: 30,
		pagination: {
			el: '.swiper-pagination-h',
			clickable: true,
			dynamicBullets: true,
		},
	});
	var swiperV = new Swiper('.swiper-container-v', {
		direction: 'vertical',
		spaceBetween: 50,
		pagination: {
			el: '.swiper-pagination-v',
			clickable: true,
			dynamicBullets: true,
		},
	});
</script>
@endsection