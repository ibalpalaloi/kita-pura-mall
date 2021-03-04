@extends('layouts.home')

@section('title')
Rekomendasi |
@endsection

@section('header-scripts')
<link rel="stylesheet" type="text/css" href="<?=url('/')?>/public/plugins/flickity/css/flickity.css">
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

	.carousel-cell {
		width: 87%;
		margin: 0px auto;
		overflow: hidden;
		border-radius: 1em;
		margin-right: 0.6rem;
	}

	.carousel-cell:before{
		display: block;
		text-align: center;
		line-height: 200px;
		font-size: 80px;
		color: white;
	}


	.carousel-cell > img{
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
		.carousel-cell {
			height: 380px;
		}

		.carousel-cell > img {
			height: 380px;
		}
	}

	/*app fathul*/
	@media screen and (min-height: 600px) {
		.carousel-cell {
			height: 430px;
		}

		.carousel-cell > img {
			height: 430px;
		}
	}

	/*browser andipa andipa*/
	@media screen and (min-height: 650px) {
		.carousel-cell {
			height: 480px;
		}

		.carousel-cell > img {
			height: 480px;
		}
	}

	@media screen and (min-height: 680px) {
		.carousel-cell {
			height: 530px;
		}

		.carousel-cell > img {
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
	<div id="post-data" class="carousel" data-flickity style="background: #eaf4ff;">
		@php
		$product = array('product_1.jpg', 'product_2.jpg', 'product_3.jpg', 'product_4.jpg', 'product_5.jpg', 'product_6.jpg', 'product_7.jpg', 'product_8.jpg', 'product_9.jpg', 'product_10.jpg', 'product_11.jpg', 'product_12.jpg', 'product_13.jpg', 'product_14.jpg');

		$toko = array('lengkapi_berkas.png', 'lengkapi_berkas.png', 'lengkapi_berkas.png', 'lengkapi_berkas.png', 'lengkapi_berkas.png', 'lengkapi_berkas.png', 'lengkapi_berkas.png', 'lengkapi_berkas.png', 'lengkapi_berkas.png', 'lengkapi_berkas.png', 'lengkapi_berkas.png', 'lengkapi_berkas.png', 'lengkapi_berkas.png', 'lengkapi_berkas.png', 'lengkapi_berkas.png');

		$alamat = array('Jl. Setia Budi No.9 Palu', 'Jl. Setia Budi No.9 Palu', 'Jl. Setia Budi No.9 Palu', 'Jl. Setia Budi No.9 Palu', 'Jl. Setia Budi No.9 Palu', 'Jl. Setia Budi No.9 Palu', 'Jl. Setia Budi No.9 Palu', 'Jl. Setia Budi No.9 Palu', 'Jl. Setia Budi No.9 Palu', 'Jl. Setia Budi No.9 Palu', 'Jl. Setia Budi No.9 Palu', 'Jl. Setia Budi No.9 Palu', 'Jl. Setia Budi No.9 Palu', 'Jl. Setia Budi No.9 Palu');

		$nama_product = array('Ball Ball Food', 'Ball Ball Food', 'Ball Ball Food', 'Ball Ball Food', 'Ball Ball Food', 'Ball Ball Food', 'Ball Ball Food', 'Ball Ball Food', 'Ball Ball Food', 'Ball Ball Food', 'Ball Ball Food', 'Ball Ball 
		Food', 'Ball Ball Food', 'Ball Ball Food');
		@endphp 
		@for ($i = 0; $i < 10; $i++) 
		<div class="carousel-cell">
			<div class="like-product" style="position: absolute; top: 0; right: 0; padding: 0.4em 0.5em 0.4em 0.5em;">
				<div class="stroke-like-product" style="background: #fafafa; padding: 0.3em; border-radius: 1.5em;">
					<div class="border-like-product" style="border: 2px solid #ff006e; border-radius: 1.5em; padding: 0.3em;color: #ff006e; font-size: 0.8em;">
						<img src="<?=url('/')?>/public/img/like.svg" style="width: 1.5em;">&nbsp;1000+
					</div>
				</div>
			</div>
			<div class="label-product" style="position: absolute; bottom: 0em; left: 0em; padding: 0.4em 0.5em 0.4em 0.5em; display: flex; width: 100%; background-color: rgba(0,0,0,0.3); justify-content: space-between;">
				<div class="keterangan-product" style="display: flex;">
					<div class="logo-toko-product" style="width: 3em;">
						<img src="<?=url('/')?>/public/img/user/{{$toko[$i]}}" style="width: 100%;">
					</div>
					<div class="detail-keterangan-product" style="display: flex; flex-direction: column; justify-content: center; color: white; margin-left: 0.3em;">
						<div style="font-size: 1em;">{{$nama_product[$i]}}</div>
						<div style="font-size: 0.6em;">{{$alamat[$i]}}</div>
					</div>
				</div>
				<div class="" style="width: 3em">
					<img src="<?=url('/')?>/public/img/belanja.svg" style="width: 100%;">
				</div>
			</div>
			<img src="<?=url('/')?>/public/img/product/{{$product[$i]}}">
		</div>
		@endfor
	</div>
</main>
@endsection

@section('footer-scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.2/flickity.pkgd.min.js"></script>
<script type="text/javascript">
	var transformProperty = ( function () {
		var style = document.documentElement.style;
		if ( typeof style.transform == 'string' ) {
			return 'transform';
		}
		return 'WebkitTransform';
	})();

	Flickity.prototype.positionSlider = function() {
		var x = this.x;
  // wrap position around
  if ( this.options.wrapAround && this.cells.length > 1 ) {
  	x = utils.modulo( x, this.slideableWidth );
  	x = x - this.slideableWidth;
  	this.shiftWrapCells( x );
  }

  x = x + this.cursorPosition;
  // reverse if right-to-left and using transform
  x = this.options.rightToLeft && transformProperty ? -x : x;
  var value = this.getPositionValue( x );
  // only use 2d rendering
  this.slider.style[ transformProperty ] = 'translateX(' + value + ')';

  // scroll event
  var firstSlide = this.slides[0];
  if ( firstSlide ) {
  	var positionX = -this.x - firstSlide.target;
  	var progress = positionX / this.slidesWidth;
  	this.dispatchEvent( 'scroll', null, [ progress, positionX ] );
  }
};	
</script>
{{-- <script>
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
</script> --}}
@endsection