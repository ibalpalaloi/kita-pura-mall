@extends('layouts.home_no_menu')

@section('title')

@endsection

@section('header-scripts')
<!--  Social tags      -->
<meta name="description" content="{{$product->deskripsi}}">
<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="{{$product->nama}}">
<meta itemprop="description" content="{{$product->deskripsi}}">
<meta itemprop="image" content="<?=url('/')?>/public/img/toko/{{$toko->id}}/produk/{{$product->foto_produk}}">

<!-- Twitter Card data -->
<!--<meta name="twitter:card" content="product">-->
<!--<meta name="twitter:site" content="@creativetim">-->
<meta name="twitter:title" content="{{$product->nama}}">
<meta name="twitter:description" content="{{$product->deskripsi}}">
<!--<meta name="twitter:creator" content="@creativetim">-->
<meta name="twitter:image" content="<?=url('/')?>/public/img/toko/{{$toko->id}}/produk/{{$product->foto_produk}}">

<!-- Open Graph data -->
<meta property="fb:app_id" content="655968634437471">
<meta property="og:title" content="{{$product->nama}}" />
<meta property="og:type" content="article" />
<meta property="og:url" content="<?=url('/')?>/{{$toko->username}}"/>
<meta property="og:image" content="<?=url('/')?>/public/img/toko/{{$toko->id}}/produk/{{$product->foto_produk}}"/>
<meta property="og:description" content="{{$product->deskripsi}}"/>
<meta property="og:site_name" content="Kitapura Mall" />

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
<style type="text/css">
	.banner {
		max-width: 480px;
		width: 100%;
		margin: 0px auto;
		padding: 0em 0em 4em 0em;

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
	min-height: calc(100vh - 100vh);	
}


.star-rating {
	color: #F09000;
}

.star-no-rating {
	color: #F09000;
}


.star-rating-toko {
	color: #EFFF3B;	
}

.star-no-rating-toko {
	color: #EFFF3B;
}


.indicator-dots {
	display: flex; justify-content: center;
	align-items: center;
	margin-top: 1em;
}

.indicator-dots div {
	margin: 0px 0.5em 0px;
	background: #bdc5cd;
	height: 0.5em; 
	width: 0.5em;
	border-radius: 50%;
}

.active-dots {
	background: #333333 !important;

}

.slider {
	width: 100%;
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
	width: 9em;		
}

.slider-toko img {
	width: 9em;
	object-fit: cover;
	border-top-left-radius: 1em;
	border-top-right-radius: 1em;
}

.slider-toko > div {
	border-bottom-left-radius: 1em;
	border-bottom-right-radius: 1em;
}  

.swiper-container {
	width: 100%;
	height: 100%;
}

.swiper-slide {
	text-align: center;
	font-size: 18px;
	background: #fff;

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



</style>
@endsection
@section('content')
<div class="modal fade" id="modal-cooming-soon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content" style="border-radius: 1.2em; background: transparent; display: flex; justify-content: center; align-items: center; margin: 0em 0em 0em 0em; color: white; border: none; box-shadow: none;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: 30%; right: 1em;">
				<img src="<?=url('/')?>/public/img/modal_assets/modal_cooming_soon.svg" style="width: 100%;">
				<div style="position: absolute; margin: 2.5em 1.5em 0em 1.5em; padding: 0em 1.5em 0em 1.5em; top: 60%;">
					<div style="font-size: 2em; font-weight: 600; text-align: center;">Sabar Yaa...</div>
					<div style="font-size: 1em; text-align: center; width: 100%; font-weight: 0; color: #ffe6f1; margin-bottom: 1.2em;">Untuk Sekarang Fitur ini masih belum bisa ditampilkan</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-open-image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content" style="border-radius: 1.2em; background: transparent; display: flex; justify-content: center; align-items: center; margin: 0em 0em 0em 0em; color: white; border: none; box-shadow: none;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/close_btn.svg" style="position: absolute; top: 2em; right: 2em;">
				<img id="modal-image" src="" style="width: 100%; border-radius: 1em;">
			</div>
		</div>
	</div>
</div>


<header class="style__Container-sc-3fiysr-0 header" style="background: transparent;">
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: space-between;">
		<a id="defaultheader_logo" style="margin-left: 20px; height:33px;margin-right:15px; position: relative; cursor: pointer;" href="javascript:history.back()">
			<img src="<?=url('/')?>/public/img/icon_svg/back_circle_transparent.svg">
		</a>


		<a id="defaultheader_logo" title="Kitabisa" style="margin-left: 20px; height:33px;margin-right:20px; position: relative;" href="<?=url('/')?>/user/keranjang">
			<img src="<?=url('/')?>/public/img/icon_svg/bag_circle_transparent.svg">
			<div style="width: 1.5em; height: 1.5em; background:#9d0208; position: absolute;border-radius: 50%; bottom: -20px; right: 0; background: #FF0000; color: white; text-align: center;" id="jumlah_keranjang">{{count($keranjang)}}</div>
		</a>

	</div>	
</header>


<div class="wrapper" style="background: transparent; position: relative; z-index: -1; border-bottom-right-radius: 7%; border-bottom-left-radius: 7%;">
	<?php 
	$product_bg = url('/')."/public/img/toko/".$toko->id."/produk/600x600/".$product->foto_produk;
	?>	
	<div class="banner">
		<img src="{{$product_bg}}" style="width: 100%;">
	</div>
</div>
<main id="homepage" class="homepage" style="padding-bottom: -1.5em;">
	<div class="kategori" style="background: #EAF4FF; border-top-left-radius: 1.5em; border-top-right-radius: 1.5em; padding: 2em 8% 3em 8%; display: flex; flex-direction: column;">
		<div class="info-toko" style="display: flex; justify-content: space-between; width: 100%;">
			<div class="nama-toko" style="width: 80%;">
				@php $hasil_diskon_string = ""; @endphp
				@if ($product->jenis_harga == 'Statis')
				@if($product->diskon != '0')
				<div style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 0.9em; line-height: 1em; vertical-align: center; margin-bottom: 0em;">
					<s>IDR. {{number_format($product->harga)}}</s>
				</div>
				@php
				$hasil_diskon = ($product->harga)-((($product->diskon)/100)*($product->harga));
				@endphp
				<div style="padding: 0; margin: 0.1em 0px 0px 0em; font-size: 1.3em; line-height: 1em; font-weight: 500;">IDR. {{number_format($hasil_diskon)}}</div>
				@php $hasil_diskon_string = number_format($hasil_diskon); @endphp
				@else
				<div style="padding: 0; margin: 0.5em 0px 0px 0em; font-size: 1.3em; line-height: 1em; font-weight: 500;">IDR. {{number_format($product->harga)}}</div>
				@endif	

				@else
				<div style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 0.9em; line-height: 1em; vertical-align: center; margin-bottom: 0em;">
					Harga Mulai
				</div>
				<div style="padding: 0; margin: 0.1em 0px 0px 0em; font-size: 1.3em; line-height: 1em; font-weight: 500;">IDR. {{number_format($product->harga_terendah)}}</div>

				@endif
			</div>


		</div>
		<div class="penilaian" style="margin-top: 0.5em;">
			<div style="padding: 0; margin: 0em 0px 0px 0px; font-size: 0.9em; line-height: 1em;">
				@php
				$bintang = 1;
				@endphp
				@for ($i = 0; $i < 4; $i++)
				<i class="fas fa-star star-rating"></i>
				@endfor
				@for ($i = 0; $i < $bintang; $i++)
				<i class="far fa-star star-rating"></i>
				@endfor
			</div>
			<div class="" style="font-size: 1.1em; margin-top: 0.2em;">{{$product->nama}}</div>
			<div class="" style="font-size: 1em;"><b>{{ucwords(strtolower($product->sub_kategori))}}</b></div>
			<div class="penilai" style="display: flex; justify-content: space-between; align-items: flex-end;" hidden>
				<div class="foto-penilai" style="display: flex; justify-content: flex-start; margin-top: 0.2em;">
				</div>
			</div>
			
			<div class="deskripsi" style=" margin-top: 0.8em;">
				<div><b>Detail</b></div>
				<div style="font-size: 0.9em;">{{$product->deskripsi}}</div>
			</div>
			<div style="background: linear-gradient(41.88deg, #EC7405 35.3%, #FFAA00 88.34%);border-radius: 35px; padding: 0.8em; width: 100%; margin-top: 0.5em; text-align: center; color: white; font-size: 1.1em;" onclick="masukan_keranjang('{{$toko->id}}', '{{$product->id}}')">
				Tambahkan ke keranjang&nbsp;<img src="<?=url('/')?>/public/img/button/landing_page/keranjang_icon.svg">
			</div>
		</div>

	</div>
	<?php $svg = url('/')."/public/img/home/bg-slider-toko.svg"; ?>	
	<div class="kategori" style="background-image: url('<?=$svg?>'); color: white; background-size: cover; border-top-left-radius: 1.5em; border-top-right-radius: 1.5em; padding: 2em 8% 3em 8%; display: flex; flex-direction: column; margin-top: -1em;">
		<div style="flex-direction: row; display: flex; justify-content: flex-start; align-items: center;">
			<div>
				<img src="<?=url('/')?>/public/img/toko/{{$toko->id}}/logo/200x200/{{$toko->logo_toko}}" style="border-radius: 50%; width: 5em; border: 3px solid white;">
			</div>
			<div style="margin-left: 0.8em;">
				<div class="info-toko" style="display: flex; justify-content: space-between; width: 100%;">
					<div class="nama-toko" style="width: 100%;">
						<div style="padding: 0; margin: 0.5em 0px 0px 0em; font-size: 1.3em; line-height: 1em; font-weight: 500;">{{$toko->nama_toko}}</div>
					</div>
				</div>
				<div class="penilaian" style="margin-top: 0.5em;">
					<div style="padding: 0; margin: 0em 0px 0px 0px; font-size: 0.9em; line-height: 1em;">
						@php
						$bintang = 1;
						@endphp
						@for ($i = 0; $i < 4; $i++)
						<i class="fas fa-star star-rating-toko"></i>
						@endfor
						@for ($i = 0; $i < $bintang; $i++)
						<i class="far fa-star star-rating-toko"></i>
						@endfor
					</div>
					<a href="<?=url('/')?>/{{$toko->username}}/daftar-menu" class="" style="font-size: 1.1em; margin-top: 0.2em;"><b style="text-decoration: underline; color: white;">{{$produk_lainnya}} Produk Lainnya</b></a>
					<div class="penilai" style="display: flex; justify-content: space-between; align-items: flex-end;" hidden>
						<div class="foto-penilai" style="display: flex; justify-content: flex-start; margin-top: 0.2em;">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="deskripsi" style=" margin-top: 0.8em;">
			<div style="font-size: 0.9em;">{{$toko->deskripsi_toko}}</div>
		</div>

		<a href="<?=url('/')?>/{{$toko->username}}" style="background: linear-gradient(180deg, #FF58BB 0%, #FF006E 100%);border-radius: 35px; padding: 0.8em; width: 100%; margin-top: 0.5em; text-align: center; color: white; font-size: 1.1em;">
			Kunjungi Toko<img src="<?=url('/')?>/public/img/icon_svg/toko_white.svg" style="position: absolute;right: 5em;">
		</a>
	</div>
	<div class="kategori" style="background:white; border-top-left-radius: 1.5em; border-top-right-radius: 1.5em; padding: 2em 0em 0em 0em; display: flex; flex-direction: column; margin-top: -1em; margin-bottom: -1em;">
		<div class="info-toko" style="display: flex; justify-content: center; flex-direction: column; width: 100%;">
			<h3 style="margin: 0em 8% 1em 8%; display: flex; justify-content: center;"><b>Produk Serupa</b></h3>
			<div class="slider">
				@php $i= 0; @endphp
				@foreach ($produk_serupa as $row)
				<a href="<?=url('/')?>/pencarian/explore/{{$row->id}}" class="slider-toko" style="@if ($i == 0) margin-left: 8%;@endif">
					@php $i++; @endphp
					<img src="<?=url('/')?>/public/img/toko/{{$row->toko_id}}/produk/240x200/{{$row->foto_produk}}">
					<div style='text-align: left; font-size: 0.75em; padding: 0.7em 0em 0.7em 0.5em; width: 100%; background-image: url("<?=$svg?>"); color: white; background-size: cover; padding: 1em; position: relative;'> 
						<div style="position: absolute; top: -1.8em; z-index: 0; width: 3.5em; height: 3.5em; background: linear-gradient(0deg, rgba(2,0,36,1) 0%, rgba(255,6,115,1) 0%, rgba(255,82,181,1) 100%); box-shadow: rgba(152, 152, 152, 0.5) 0px 2px 8px 1px; border-radius: 50%; right: 0.5em; display: flex; justify-content: center; align-items: center;">
							<img src="<?=url('/')?>/public/img/icon_svg/toko_white.svg" style="width: 60%;">
						</div>
						<div style="font-weight: 500;"><?=substr(strip_tags($row->nama), 0, 15)?>@if (strlen($row->nama) > 15)..@endif</div>
						<div style="font-size: 0.7em; line-height: 1em; font-weight: 0;">{{$row->kategori_product}}</div>
						<div style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 0.6em; line-height: 1em;">
							<i class="fas fa-star star-rating-toko"></i>
							<i class="fas fa-star star-rating-toko"></i>
							<i class="fas fa-star star-rating-toko"></i>
							<i class="fas fa-star star-rating-toko"></i>
							<i class="far fa-star star-rating-toko"></i>
							&nbsp;<span>0 Penilaian</span><br>
						</div>

						<span style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 0.6em; line-height: 1em; vertical-align: center;">
							Harga Mulai
						</span>
						<span style="padding: 0; margin: 0.5em 0px 0px 0.5em; font-size: 0.9em; line-height: 1em; font-weight: 500;">IDR. {{number_format($row->harga, 0, '.', '.')}}</span>
					</div>
				</a> 
				@if ($i == count($produk_serupa))
				<div style="padding: 1em; display: flex; justify-content: center; flex-direction: column; align-items: center;">
					<img src="<?=url('/')?>/public/img/icon_svg/vertikal_right.svg">
					<div style="color: gray; font-size: 0.7em; white-space: nowrap;">Lebih Banyak</div>
				</div>
				@endif
				@endforeach
			</div>

		</div>

	</div>
</main>


@endsection

@section('footer-scripts')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>

	function masukan_keranjang(toko_id, produk_id){
		$.ajax({
			url : "{{ route('tambah_keranjang_belanja') }}",
			method : 'post',
			data : {toko_id:toko_id, produk_id:produk_id, _token:'{{csrf_token()}}'},
			success:function()
			{
				var jumlah_keranjang = $("#jumlah_keranjang").html();
				jumlah_keranjang = parseInt(jumlah_keranjang)+1;
				$("#jumlah_keranjang").html(jumlah_keranjang);
			}
		})
		
	}

	function open_modal_image(img){
		$("#modal-image").attr('src', img);
		$("#modal-open-image").modal('show');
	}

	function gagal_masukan_keranjang(){
		$("#modal-cooming-soon").modal('show');
	}

	function cooming_soon(){
		$("#modal-cooming-soon").modal('show');		
	}

	function nilai_toko(index){
		$("#nilai_rating").val(index);
		index = parseInt(index)+1;
		for (var i = 1; i <= index; i++){
			$("#rating_"+i).removeClass("far");
			$("#rating_"+i).addClass("fas");
		}
		for (var j = index; j <= 5; j++){
			$("#rating_"+j).removeClass("fas");
			$("#rating_"+j).addClass("far");
		}

	}

	function menilai(){
		$('#modal-jadwal').modal('show');
	}

	function back_preivous(){
		// window.location.replace("<?=url('/')?>/toko");		
	}
</script>
@endsection
