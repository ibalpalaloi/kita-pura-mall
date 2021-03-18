@extends('layouts.home_no_menu')

@section('title')

@endsection

@section('header-scripts')
<!--  Social tags      -->
<meta name="description" content="{{$toko->deskripsi}}">
<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="{{$toko->nama_toko}}">
<meta itemprop="description" content="{{$toko->deskripsi}}">
<meta itemprop="image" content="{{$toko->logo()}}">
<!-- Twitter Card data -->
<!--<meta name="twitter:card" content="product">-->
<!--<meta name="twitter:site" content="@creativetim">-->
<meta name="twitter:title" content="{{$toko->nama_toko}}">
<meta name="twitter:description" content="{{$toko->deskripsi}}">
<!--<meta name="twitter:creator" content="@creativetim">-->
<meta name="twitter:image" content="{{$toko->logo()}}">
<!-- Open Graph data -->
<meta property="fb:app_id" content="655968634437471">
<meta property="og:title" content="{{$toko->nama_toko}}" />
<meta property="og:type" content="article" />
<meta property="og:url" content="<?=url('/')?>/{{$toko->username}}"/>
<meta property="og:image" content="{{$toko->logo()}}" />
<meta property="og:description" content="{{$toko->deskripsi}}"/>
<meta property="og:site_name" content="Kitapura Mall" />

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
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
	width: 100%;		
}

.slider-toko img {
	width: 100%;
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


.slider {
	text-align: center;
	overflow: hidden;
	display: flex;
	justify-content: center;
	flex-direction: column;
	align-items: center;
}


.slides {
	display: flex;
	width: 75%;
	overflow-x: scroll;
	overflow-y: visible; 

	scroll-snap-type: x mandatory;


	scroll-behavior: smooth;
	-webkit-overflow-scrolling: touch;


}
.slides::-webkit-scrollbar { /* WebKit */
	width: 0;
	height: 0;
}

}
.slides::-webkit-scrollbar {
	width: 10px;
	height: 10px;
}
.slides::-webkit-scrollbar-thumb {
	background: black;
	border-radius: 10px;
}
.slides::-webkit-scrollbar-track {
	background: transparent;
}
.slides > div {
	scroll-snap-align: start;
	flex-shrink: 0;
	width: 100%;
	margin:5px 30px 0px 10px;
	border-radius: 10px;
	transform-origin: center center;
	transform: scale(1);
	transition: transform 0.5s;
	position: relative;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
}
.slides > div:target {
	/*   transform: scale(0.8); */
}
/*img {
  object-fit: cover;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  }*/

  .slider > a {
  	display: inline-flex;
  	width: 1.5rem;
  	height: 1.5rem;
  	background: white;
  	text-decoration: none;
  	align-items: center;
  	justify-content: center;
  	border-radius: 50%;
  	margin: 0 0 0 0;
  	position: relative;
  }
  .slider > a:active {
  	top: 1px;
  }
  .slider > a:focus {
  	background: #000;
  }

  /* Don't need button navigation */
  @supports (scroll-snap-type) {
  	.slider > a {
  		display: none;
  	}
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
<div class="modal fade" id="modal-jadwal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
style="padding: 1.5em; padding: 0px;">
<form action="<?=url('')?>/user/post_penilaian" method="post">
	{{ csrf_field() }}
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px;">
		<div class="modal-content" style="border-radius: 1.2em; background: #9d0208; display: flex; justify-content: center; align-items: center;">
			<div class="modal-body">
				<div class="nama-toko" style="font-weight: 600; font-size: 1em; line-height: 1.1em; font-size: 1.2em; color: white;">Penilaian</div>
			</div>
			<hr style="border-top: 1px solid white; width: 100%;">
			<input type="text" name="toko_id" value="{{$toko->id}}" hidden>
			<input type="text" name="nilai_rating" id="nilai_rating" value="" hidden>
			<div style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 2em; line-height: 1em;">
				<i class="far fa-star star-rating" id="rating_1" onclick="nilai_toko('1')"></i>
				<i class="far fa-star star-rating" id="rating_2" onclick="nilai_toko('2')"></i>
				<i class="far fa-star star-rating" id="rating_3" onclick="nilai_toko('3')"></i>
				<i class="far fa-star star-rating" id="rating_4" onclick="nilai_toko('4')"></i>
				<i class="far fa-star star-rating" id="rating_5" onclick="nilai_toko('5')"></i>
			</div>
			<div class="input-group mb-3 div-input-mall" id="div_no_hp" style="width: 80%; display: flex; flex-direction: column; color: white; font-size: 0.85em;">
				<label  style="margin-top: 1em;">Masukan Pesan</label>
				<textarea name="komentar" style="background: #860106; border: none; color: white;" rows="6"></textarea>
				<button type="submit" class="btn btn-primary" style="background: linear-gradient(41.88deg, #EC7405 35.3%, #FFAA00 88.34%);border: 1px solid #ff006e; border-radius: 1.5em; padding: 0.5em 2em 0.5em 2em; width: 100%; margin-bottom: 1em; margin-top: 1em; border: none;">Kirim
				</button>
			</div>
		</div>
	</div>
</form>
</div>

<header class="style__Container-sc-3fiysr-0 header" style="background: transparent;">
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: space-between;">
		<a id="defaultheader_logo" title="Kitabisa" style="margin-left: 20px; height:33px;margin-right:15px; position: relative;" href="<?=url('/')?>/">
			<img src="<?=url('/')?>/public/img/icon_svg/back_circle_transparent.svg">
		</a>
		@if(Auth()->user()->id == $toko->users_id)
		<a id="defaultheader_logo" title="Kitabisa" style="margin-left: 20px; height:33px;margin-right:15px; position: relative;" href="<?=url('/')?>/akun/mitra/premium">
			<img src="<?=url('/')?>/public/img/icon_svg/setting_circle_transparent.svg">
		</a>
		@else
		<a id="defaultheader_logo" title="Kitabisa" style="margin-left: 20px; height:33px;margin-right:20px; position: relative;" href="<?=url('/')?>/user/keranjang">
			<img src="<?=url('/')?>/public/img/icon_svg/bag_circle_transparent.svg">
			<div style="width: 1.5em; height: 1.5em; background:#9d0208; position: absolute;border-radius: 50%; bottom: -20px; right: 0; background: #FF0000; color: white; text-align: center;" id="jumlah_keranjang">{{count($keranjang)}}</div>
		</a>
		@endif
	</div>	
</header>

<div class="wrapper" style="background: transparent; position: relative; z-index: -1; border-bottom-right-radius: 7%; border-bottom-left-radius: 7%;">
	<?php 
	if ($toko->foto_cover != null){
		$product_bg = url('/')."/public/img/toko/".$toko->id."/cover/".$toko->foto_cover;
	}
	else {
		$product_bg = url('/')."/public/img/maps/template_maps.svg";
	}
	?>
	<div class="banner" style='padding: 7em 0.5em 12em 0.5em; display: flex; justify-content: center; align-items: center; @if ($toko->foto_cover != null) background-image: url("<?=$product_bg?>") @endif; background-size: contain;'>
		<img src="{{$toko->logo()}}" style="width: 50%;">
	</div>
</div>

<main id="homepage" class="homepage" style="background: #eaf4ff; padding-bottom: -1.5em;">
	<div class="kategori" style="background: {{$landing_page->warna_header}}; border-top-left-radius: 1.5em; border-top-right-radius: 1.5em; padding: 2em 8% 2em 8%; display: flex; flex-direction: column;">
		<div class="info-toko" style="display: flex; justify-content: space-between; width: 100%;">
			<div class="nama-toko" style="width: 80%;">
				<h3 style="color: {{$landing_page->warna_tulisan_header}}; font-weight: 500; word-wrap: break-word;">{{$toko->nama_toko}}</h3>
				<h6 style="color: {{$landing_page->warna_tulisan_header}}; line-height: 0.5em;">@<?=$toko->username?></h6>
			</div>
			@if (($toko->latitude == null) && ($toko->longitude == null))
			<div href="https://www.google.com/maps/search/?api=1&query={{$toko->latitude}},{{$toko->longitude}}" class="lokasi" style="display: flex; align-items: center; background: linear-gradient(41.88deg, #EC7405 35.3%, #FFAA00 88.34%); width: 3em; height: 3em; border-radius: 50%; justify-content: center; padding-top: 0.1em;">
				<img src="<?=url('/')?>/public/img/icon_svg/maps_landing_white.svg" style="width: 1.4em;"> 
			</div>
			@else
			<a href="https://www.google.com/maps/search/?api=1&query={{$toko->latitude}},{{$toko->longitude}}" class="lokasi" style="display: flex; align-items: center; background: linear-gradient(41.88deg, #EC7405 35.3%, #FFAA00 88.34%); width: 3em; height: 3em; border-radius: 50%; justify-content: center; padding-top: 0.1em;">
				<img src="<?=url('/')?>/public/img/icon_svg/maps_landing_white.svg" style="width: 1.4em;"> 
			</a>
			@endif
		</div>
		<div class="penilaian" style="margin-top: 0.5em;">
			<div style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 0.9em; line-height: 1em;">
				@php
				$bintang = 5-$rating;
				@endphp
				@for ($i = 0; $i < $rating; $i++)
				<i class="fas fa-star star-rating"></i>
				@endfor
				@for ($i = 0; $i < $bintang; $i++)
				<i class="far fa-star star-rating"></i>
				@endfor
				<span style="color: {{$landing_page->warna_tulisan_header}}; font-size: 0.8em;">&nbsp;({{count($penilaian)}} Penilaian)</span>
			</div>
			<div class="penilai" style="display: flex; justify-content: space-between; align-items: flex-end;">
				<div class="foto-penilai" style="display: flex; justify-content: flex-start; margin-top: 0.2em;">
					@foreach ($penilaian as $data)
					<div style="width: 1.2em; height: 1.2em; border-radius: 50%;">
						<img src="<?=url('/')?>/public/img/user/profile_picture/{{$data->user->biodata->foto}}" style="width: 100%; border-radius: 50%;">
					</div>
					@endforeach
				</div>

			</div>
			@if(Auth()->user()->id != $toko->user->id)
			<div style="color: {{$landing_page->warna_tulisan_header}}; font-size: 0.8em; margin-top: 1.2em;" onclick="menilai()">				
				<i class="far fa-star star-rating"></i>&nbsp;Saya ingin menilai
			</div>
			@endif
			
			<div class="deskripsi" style="color: {{$landing_page->warna_tulisan_header}}; font-size: 0.7em; margin-top: 0.8em;">{{$toko->deskripsi}}</div>
			<hr style="width: 2em; margin-top: 1.5em; border: 1.5px solid {{$landing_page->warna_tulisan_header}}; background: {{$landing_page->warna_tulisan_header}}; border-radius: 1.5em;">
		</div>

	</div>

	<div class="landing_page" style="position: relative; top: -1.5em; z-index: 3; border-top-left-radius: 1.5em;border-top-right-radius: 1.5em; background: {{$landing_page->warna_body}};">
		<div class="row-mall" style="padding: 0.7em 4% 1.2em 4%; margin-top: -6em; border-top-left-radius:1.5em; border-top-right-radius: 1.5em; padding: 2em 1em 1em 1em;">
			@if ($video)
			<div>
				<div style="font-size: 1.4em; font-weight: 1000; text-align: center;">Video</div>
			</div>
			<div class="swiper-container">
				<div class="swiper-wrapper">
					@foreach ($video as $video)
					<div class="swiper-slide" style="background: transparent; display: flex; justify-content: center; flex-direction: column;">
						<div style="width: 92%;">
							<div style='background: white; margin-top: 0.3em; position: relative; width: 100%; height: 12em; border-radius: 0.5em; background-size: cover; display: flex; justify-content: center; align-items: center;'>
								<iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{$video}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border-radius: 0.8em;"></iframe>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				<!-- Add Pagination -->
			</div>
			@endif
		</div>
		<div class="row-mall" style="padding: 0.7em 8% 1.2em 8%; margin-top: 0em; border-top-left-radius:1.5em; border-top-right-radius: 1.5em;">
			<div>
				<div style="font-size: 1.4em; font-weight: 1000; text-align: center;">Our Service</div>
			</div>
			@if(!empty($foto_map[1]))
			<div class="input-group mb-3" id="div_foto_maps_1" style="margin-top: 1em; background:transparent; border: none; border-radius: 1.2em;">
				<div style="display: flex; justify-content: center; width: 100%; margin: 0px; height: 12.5em;" id="div_pic_maps_1_privew">
					<img id="pic_maps_1_privew" src="<?=url('/')?>/public/img/toko/{{$toko->id}}/maps/{{$foto_map[1]}}" style="width: 100%; object-fit: cover;height: 100%; border-radius: 1em;">
				</div>

				<input hidden type="file" name="foto_maps_1" id="foto_maps_1" required>
			</div>
			@endif
			<div style="display: flex; justify-content: space-between;">
				@if(!empty($foto_map[2]))
				<div class="input-group mb-3 div-input-mall-square" id="div_foto_maps_2" style="background:transparent; border: none; border-radius: 1.2em; width: 40%;">
					<div style="display: flex; justify-content: center; width: 100%; margin: 0px; height: 12.5em;" id="div_pic_maps_2_privew">
						<img id="pic_maps_1_privew" src="<?=url('/')?>/public/img/toko/{{$toko->id}}/maps/{{$foto_map[2]}}" style="width: 100%; object-fit: cover;height: 100%; border-radius: 1em;">
					</div>

					<input hidden type="file" name="foto_maps_2" id="foto_maps_2" required>
				</div>
				@endif
				@if (!empty($foto_map[3]))
				<div class="input-group mb-3 div-input-mall-square" id="div_foto_maps_3" style="background:transparent; border: none; border-radius: 1.2em; width: 56%;">
					<div style="display: flex; justify-content: center; width: 100%; margin: 0px; height: 12.5em;" id="div_pic_maps_3_privew">
						<img id="pic_maps_1_privew" src="<?=url('/')?>/public/img/toko/{{$toko->id}}/maps/{{$foto_map[3]}}" style="width: 100%; object-fit: cover;height: 100%; border-radius: 1em;">
					</div>

				</div>
				@endif
				
			</div>
		</div>
		<div class="row-mall" style="padding: 0em 8% 1.2em 8%; margin-top: 0em; border-top-left-radius:1.5em; border-top-right-radius: 1.5em;">
			@foreach ($fasilitas as $data)
			<div class="service_1" style="display:  flex; flex-direction: column; margin-bottom: 2em;">
				<div style="display: flex; align-items: center;">
					<div style="width: 20%;">
					</div>
					<div style="width: 80%">
						<div style="word-wrap: break-word;">
							<div style="font-weight: 500; color: black; font-size: 1.2em; display: flex; align-items: center; text-align: justify;">{{$data->judul}}</div>
						</div>
					</div>
				</div>
				<div style="display: flex;">
					<div style="width: 20%;">
					</div>
					<div style="width: 80%">
						<div style="word-wrap: break-word;">
							<div style="font-size: 0.8em; text-align: justify;">{{$data->keterangan}}</div>	
						</div>
					</div>
				</div>
			</div>
			@endforeach
			
		</div>
		<div style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
			<div class="row-mall" style="border-radius: 1.5em; box-shadow: 4px 4px 28px #C9D2DA; width: 90%;">
				<div style="width: 100%; margin-top: 1.5em;">
					<div style="font-size: 1.4em; font-weight: 1000; text-align: center;">Menu</div>
				</div>
				@foreach ($produk as $item)
				<div class="input-group mb-3" style="margin-top: 1em; background:transparent; border: none; border-radius: 1.2em; display: flex; justify-content: center;">
					<div style="display: flex; justify-content: center; position:relative;width: 85%; margin: 0px;">
						<a href="<?=url('/')?>/{{Request::segment(1)}}/daftar-menu/{{$item->id}}" style="width: 100%;">
							<img src="<?=url('/')?>/public/img/toko/{{$item->toko_id}}/produk/{{$item->foto_produk}}" style="width: 100%; height: 100%;border-radius: 1em;">
						</a>
						<div class="label-product" style="position: absolute; bottom:0; padding: 0em; display: flex; width: 100%; height: 100%; justify-content: space-between; border-radius: 1em;">
							<div class="keterangan-product" style="display: flex; width: 100%;">
								<div class="detail-keterangan-product" style="display: flex; flex-direction: column; justify-content: flex-end; color: white; background: linear-gradient(180deg, rgba(255, 0, 7, 0) 32.25%, rgba(54, 1, 3, 0.53) 68.91%); width: 100%; border-radius: 1em; padding: 1em; ">
									<a href="<?=url('/')?>/{{Request::segment(1)}}/daftar-menu/{{$item->id}}" style="color:white;font-size: 2em; line-height: 1.3em; font-weight: 500;">{{$item->nama}}</a>
									<div style="font-size: 0.7em; line-height: 1em;">{{$item->kategori->nama}}</div>
									<div style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 0.8em; line-height: 1em;">
										<i class="fas fa-star star-rating"></i>
										<i class="fas fa-star star-rating"></i>
										<i class="fas fa-star star-rating"></i>
										<i class="fas fa-star star-rating"></i>
										<i class="far fa-star star-rating"></i>
									</div>


									@if ($item->jenis_harga == 'Statis')
									@if($item->diskon != '0')
									<div style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 0.9em; line-height: 1em; vertical-align: center; margin-bottom: 0em;">
										<s>IDR. {{number_format($item->harga)}}</s>
									</div>
									@php
									$hasil_diskon = ($item->harga)-((($item->diskon)/100)*($item->harga));
									@endphp
									<div style="padding: 0; margin: 0.1em 0px 0px 0em; font-size: 1.3em; line-height: 1em; font-weight: 500;">IDR. {{number_format($hasil_diskon)}}</div>
									@else
									<div style="padding: 0; margin: 0.5em 0px 0px 0em; font-size: 1.3em; line-height: 1em; font-weight: 500;">IDR. {{number_format($item->harga)}}</div>
									@endif	

									@else
									<div style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 0.9em; line-height: 1em; vertical-align: center; margin-bottom: 0em;">
										Harga Mulai
									</div>
									<div style="padding: 0; margin: 0.1em 0px 0px 0em; font-size: 1.3em; line-height: 1em; font-weight: 500;">IDR. {{number_format($hasil_diskon)}}</div>

									@endif


									
								</div>
							</div>
							<div class="">
								<img src="<?=url('/')?>/public/img/mitra/landing_page/keranjang.svg" style="position: absolute; bottom: -0.8em; right: -0.5em; width: 5em;" onclick="masukan_keranjang('{{$item->toko_id}}', '{{$item->id}}')">
							</div>
						</div>

					</div>
				</div>
				@endforeach
				
				<div style="width: 100%; display: flex; justify-content: center; margin-bottom: 1em;">
					<a href="<?=url('/')?>/{{Request::segment(1)}}/daftar-menu" style="color: #111111;">Lihat lebih banyak</a>
				</div>
			</div>
			<div style="background: {{$landing_page->warna_footer_1}}; border-top-left-radius: 1.5em; border-top-right-radius: 1.5em; padding: 2em 8% 2em 8%; display: flex; flex-direction: column; margin-top: 1em; width: 100%;">
				<div class="info-toko" style="display: flex; justify-content: space-between; width: 100%;">
					<div class="nama-toko" style="width: 100%;">
						<h3 style="color: white; font-weight: 500; word-wrap: break-word; text-align: center;">Testimoni</h3>
					</div>
				</div>
				<div class="penilaian" style="margin-top: 0.5em;">
					@foreach ($penilaian as $item)
					<div class="penilai mb-3" style="display: flex; justify-content: center; align-items: flex-start;">
						<div style="width: 20%; border-radius: 50%;">
							<img src="<?=url('/')?>/public/img/user/profile_picture/fathul.jpg" style="width: 100%; border-radius: 50%;">
						</div>
						<div style="color: {{$landing_page->warna_tulisan_footer}}; width: 80%; padding-left: 1em;">
							<div style="font-size: 1em; line-height: 1em; margin-bottom: 0.3em; font-weight: 500;">{{$item->user->biodata->nama}}</div>
							<div style="font-size: 0.75em; line-height: 1.4em; font-weight: 0; color: #f9f0f0;">{{$item->komentar}}</div>
						</div>
					</div>
					@endforeach
					
				</div>
			</div>
		</div>
	</div>
	<div style="background: {{$landing_page->warna_footer_2}}; margin-top: -2em; border: none; position: absolute; z-index: 5; width: 100%;">
		<div class="container-mall" style="padding-bottom: 1em;">
			<div style="padding-top: 1em; text-align: center; margin-bottom: 0em; color: {{$landing_page->warna_tulisan_footer}};">
				<img src="<?=url('/')?>/public/img/logo.svg" style="width: 2em;">&nbsp;&nbsp;&copy;&nbsp;<script>document.write(new Date().getFullYear());</script>&nbsp;Kitapuramall
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
</script>
@endsection
