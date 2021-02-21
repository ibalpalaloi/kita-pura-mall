@extends('layouts.home_no_menu')

@section('title')

@endsection

@section('header-scripts')
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
<header class="style__Container-sc-3fiysr-0 header" style="background: transparent;">
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: flex-end;">
		<a id="defaultheader_logo" title="Kitabisa" style="margin-left: 20px; height:33px;margin-right:20px; position: relative;" href="/">
			<img src="<?=url('/')?>/public/img/icon_svg/bag_transparent.svg">
			<div style="width: 1.5em; height: 1.5em; background:#9d0208; position: absolute;border-radius: 50%; bottom: -20px; right: 0; background: #FF0000; color: white; text-align: center;" id="jumlah_keranjang">0</div>
		</a>
	</div>	
</header>

<div class="wrapper" style="background: transparent; position: relative; z-index: -1; border-bottom-right-radius: 7%; border-bottom-left-radius: 7%;">
	@php $product_bg = url('/')."/public/img/product/TKO-1204012490124/product_5.jpg"; @endphp
	<div class="banner" style='padding: 7em 0.5em 12em 0.5em; display: flex; justify-content: center; align-items: center; background-image: url("<?=$product_bg?>"); background-size: cover;'>
		<img src="<?=url('/')?>/public/img/toko/logo/warung_mantap.png" style="width: 50%;">
	</div>
</div>

<main id="homepage" class="homepage" style="background: #eaf4ff; padding-bottom: -1.5em;">
	<div class="kategori" style="background: #9d0208; border-top-left-radius: 1.5em; border-top-right-radius: 1.5em; padding: 2em 8% 2em 8%; display: flex; flex-direction: column;">
		<div class="info-toko" style="display: flex; justify-content: space-between; width: 100%;">
			<div class="nama-toko" style="width: 80%;">
				<h3 style="color: white; font-weight: 500; word-wrap: break-word;">Warung Mantap</h3>
				<h6 style="color: white; line-height: 0.5em;">@warungmantapmantap</h6>
			</div>
			<div class="lokasi" style="display: flex; align-items: center;">
				<img src="<?=url('/')?>/public/img/icon_svg/location_circle_yellow.svg" style="width: 3em;"> 
			</div>
		</div>
		<div class="penilaian" style="margin-top: 0.5em;">
			<div style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 0.9em; line-height: 1em;">
				<i class="fas fa-star star-rating"></i>
				<i class="fas fa-star star-rating"></i>
				<i class="fas fa-star star-rating"></i>
				<i class="fas fa-star star-rating"></i>
				<i class="far fa-star star-rating"></i>
			</div>
			<div class="penilai" style="display: flex; justify-content: space-between; align-items: flex-end;">
				<div class="foto-penilai" style="display: flex; justify-content: flex-start; margin-top: 0.7em;">
					<div style="width: 1.2em; height: 1.2em; border-radius: 50%;">
						<img src="<?=url('/')?>/public/img/user/profile_picture/fathul.jpg" style="width: 100%; border-radius: 50%;">
					</div>
					<div style="width: 1.2em; height: 1.2em; border-radius: 50%;">
						<img src="<?=url('/')?>/public/img/user/profile_picture/user.png" style="width: 100%; border-radius: 50%;">
					</div>
					<div style="width: 1.2em; height: 1.2em; border-radius: 50%;">
						<img src="<?=url('/')?>/public/img/user/profile_picture/fathul.jpg" style="width: 100%; border-radius: 50%;">
					</div>
					<div style="width: 1.2em; height: 1.2em; border-radius: 50%;">
						<img src="<?=url('/')?>/public/img/user/profile_picture/fathul.jpg" style="width: 100%; border-radius: 50%;">
					</div>
				</div>
				<div>
					<div style="color: white; font-size: 0.8em;">50 Penilaian</div>
				</div>
			</div>
			<div class="deskripsi" style="color: white; font-size: 0.7em; margin-top: 1.5em;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Viverra pretium enim ac laoreet in habitant ipsum cum. Nunc purus, diam vitae tincidunt bibendum malesuada. </div>
			<hr style="width: 2em; margin-top: 1.5em; border: 1.5px solid white; background: white; border-radius: 1.5em;">
		</div>

	</div>

	<div class="landing_page" style="position: relative; top: -1.5em; z-index: 3; border-top-left-radius: 1.5em;border-top-right-radius: 1.5em; background: white;">
		<div class="row-mall" style="padding: 0.7em 4% 1.2em 4%; margin-top: -6em; border-top-left-radius:1.5em; border-top-right-radius: 1.5em; padding: 2em 1em 1em 1em;">
			<div>
				<div style="font-size: 1.4em; font-weight: 1000; text-align: center;">Video</div>
			</div>
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<div class="swiper-slide" style="background: transparent; display: flex; justify-content: center; flex-direction: column;">
						<div style="width: 92%;">
							@php $image = url('/')."/public/img/mitra/video_thumbnail/video_1.jpg"; @endphp
							<div style='background: white; margin-top: 0.3em; position: relative; width: 100%; height: 10em; background-image: url("<?=$image?>"); border-radius: 0.5em; background-size: cover; display: flex; justify-content: center; align-items: center;'>
								<img src="<?=url('/')?>/public/img/icon_svg/play_button_white.svg">
							</div>
						</div>
					</div>
					<div class="swiper-slide" style="background: transparent; display: flex; justify-content: center; flex-direction: column;">
						<div style="width: 92%;">
							@php $image = url('/')."/public/img/mitra/video_thumbnail/video_4.jpg"; @endphp
							<div style='background: white; margin-top: 0.3em; border-radius: 0.5em;position: relative; width: 100%; height: 10em; background-image: url("<?=$image?>"); background-size: cover; display: flex; justify-content: center; align-items: center;'>
								<img src="<?=url('/')?>/public/img/icon_svg/play_button_white.svg">
							</div>
						</div>
					</div>
				</div>
				<!-- Add Pagination -->
				<div class="swiper-pagination"></div>
			</div>
		</div>
		<div class="row-mall" style="padding: 0.7em 8% 1.2em 8%; margin-top: 0em; border-top-left-radius:1.5em; border-top-right-radius: 1.5em;">
			<div>
				<div style="font-size: 1.4em; font-weight: 1000; text-align: center;">Our Service</div>
				<div style="font-size: 0.8em; text-align: center;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
			</div>
			<div class="input-group mb-3" id="div_foto_maps_1" style="margin-top: 1em; background:transparent; border: none; border-radius: 1.2em;">
				<div style="display: flex; justify-content: center; width: 100%; margin: 0px; height: 12.5em;" id="div_pic_maps_1_privew">
					<img id="pic_maps_1_privew" src="<?=url('/')?>/public/img/mitra/foto_maps/maps_2.jpg" style="width: 100%; object-fit: cover;height: 100%; border-radius: 1em;">
				</div>

				<input hidden type="file" name="foto_maps_1" id="foto_maps_1" required>
			</div>
			<div style="display: flex; justify-content: space-between;">
				<div class="input-group mb-3 div-input-mall-square" id="div_foto_maps_2" style="background:transparent; border: none; border-radius: 1.2em; width: 40%;">
					<div style="display: flex; justify-content: center; width: 100%; margin: 0px; height: 12.5em;" id="div_pic_maps_2_privew">
						<img id="pic_maps_1_privew" src="<?=url('/')?>/public/img/mitra/foto_maps/maps_1.jpg" style="width: 100%; object-fit: cover;height: 100%; border-radius: 1em;">
					</div>

					<input hidden type="file" name="foto_maps_2" id="foto_maps_2" required>
				</div>
				<div class="input-group mb-3 div-input-mall-square" id="div_foto_maps_3" style="background:transparent; border: none; border-radius: 1.2em; width: 56%;">
					<div style="display: flex; justify-content: center; width: 100%; margin: 0px; height: 12.5em;" id="div_pic_maps_3_privew">
						<img id="pic_maps_1_privew" src="<?=url('/')?>/public/img/mitra/foto_maps/maps_3.jpg" style="width: 100%; object-fit: cover;height: 100%; border-radius: 1em;">
					</div>

				</div>
			</div>
		</div>
		<div class="row-mall" style="padding: 0em 8% 1.2em 8%; margin-top: 0em; border-top-left-radius:1.5em; border-top-right-radius: 1.5em;">
			<div class="service_1" style="display:  flex; flex-direction: column; margin-bottom: 2em;">
				<div style="display: flex; align-items: center;">
					<div style="width: 20%;">
						<div style="width: 3em; height: 3em; border-radius: 50%; background: #9d0208; display: flex; justify-content: center;align-items: center;">
							<img src="<?=url('/')?>/public/img/icon_service/tempat_nyaman.svg">
						</div>
					</div>
					<div style="width: 80%">
						<div style="word-wrap: break-word;">
							<div style="font-weight: 500; color: black; font-size: 1.2em; display: flex; align-items: center; text-align: justify;">Tempat Nyaman</div>
						</div>
					</div>
				</div>
				<div style="display: flex;">
					<div style="width: 20%;">
					</div>
					<div style="width: 80%">
						<div style="word-wrap: break-word;">
							<div style="font-size: 0.8em; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Faucibus lacinia tristique suscipit netus imperdiet. Scelerisque turpis non posuere integer sed ipsum. Viverra pretium urna non tempor magnis consectetur iaculis scelerisque. A vestibulum consequat, nunc sagittis. Lectus id sit libero felis tempor sodales feugiat arcu id. Sed urna sed iaculis sagittis. Sed nibh ut tortor.</div>	
						</div>
					</div>
				</div>
			</div>
			<div class="service_2" style="display:  flex; flex-direction: column; margin-bottom: 2em;">
				<div style="display: flex; align-items: center;">
					<div style="width: 20%;">
						<div style="width: 3em; height: 3em; border-radius: 50%; background: #9d0208; display: flex; justify-content: center;align-items: center;">
							<img src="<?=url('/')?>/public/img/icon_service/wifi.svg">
						</div>
					</div>
					<div style="width: 80%">
						<div style="word-wrap: break-word;">
							<div style="font-weight: 500; color: black; font-size: 1.2em; display: flex; align-items: center; text-align: justify;">Wifi</div>
						</div>
					</div>
				</div>
				<div style="display: flex;">
					<div style="width: 20%;">
					</div>
					<div style="width: 80%">
						<div style="word-wrap: break-word;">
							<div style="font-size: 0.8em; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Faucibus lacinia tristique suscipit netus imperdiet. Scelerisque turpis non posuere integer sed ipsum. Viverra pretium urna non tempor magnis consectetur iaculis scelerisque. A vestibulum consequat, nunc sagittis. Lectus id sit libero felis tempor sodales feugiat arcu id. Sed urna sed iaculis sagittis. Sed nibh ut tortor.</div>	
						</div>
					</div>
				</div>
			</div>
			<div class="service_3" style="display:  flex; flex-direction: column; margin-bottom: 2em;">
				<div style="display: flex; align-items: center;">
					<div style="width: 20%;">
						<div style="width: 3em; height: 3em; border-radius: 50%; background: #9d0208; display: flex; justify-content: center;align-items: center;">
							<img src="<?=url('/')?>/public/img/icon_service/diantarkan.svg">
						</div>
					</div>
					<div style="width: 80%">
						<div style="word-wrap: break-word;">
							<div style="font-weight: 500; color: black; font-size: 1.2em; display: flex; align-items: center; text-align: justify;">Pengantaran</div>
						</div>
					</div>
				</div>
				<div style="display: flex;">
					<div style="width: 20%;">
					</div>
					<div style="width: 80%">
						<div style="word-wrap: break-word;">
							<div style="font-size: 0.8em; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Faucibus lacinia tristique suscipit netus imperdiet. Scelerisque turpis non posuere integer sed ipsum. Viverra pretium urna non tempor magnis consectetur iaculis scelerisque. A vestibulum consequat, nunc sagittis. Lectus id sit libero felis tempor sodales feugiat arcu id. Sed urna sed iaculis sagittis. Sed nibh ut tortor.</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
		<div style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
			<div class="row-mall" style="border-radius: 1.5em; box-shadow: 4px 4px 28px #C9D2DA; width: 90%;">
				<div style="width: 100%; margin-top: 1.5em;">
					<div style="font-size: 1.4em; font-weight: 1000; text-align: center;">Menu</div>
				</div>
				@php
				$foto_product = array('product_6.png', 'product_7.png', 'product_8.png');
				@endphp 

				@for ($i = 0; $i < count($foto_product); $i++)
				<div class="input-group mb-3" style="margin-top: 1em; background:transparent; border: none; border-radius: 1.2em; display: flex; justify-content: center;">
					<div style="display: flex; justify-content: center; position:relative;width: 85%; margin: 0px; height: 13em;">
						<a href="<?=url('/')?>/{{Request::segment(1)}}/daftar-menu/alkflakf">
							<img src="<?=url('/')?>/public/img/product/TKO-1204012490124/{{$foto_product[$i]}}" style="width: 100%; object-fit: cover;height: 100%; border-radius: 1em;">
						</a>
						<div class="label-product" style="position: absolute; bottom: 0em; left: 0em; padding: 0.4em 0.5em 0.9em 1.2em; display: flex; width: 100%; background-color: rgba(0,0,0,0.3); justify-content: space-between;">
							<div class="keterangan-product" style="display: flex;">
								<div class="detail-keterangan-product" style="display: flex; flex-direction: column; justify-content: center; color: white; margin-left: 0.3em;">
									<a href="<?=url('/')?>/{{Request::segment(1)}}/daftar-menu/alkflakf" style="font-size: 1em; line-height: 1.3em;">Ayam Bakar</a>
									<div style="font-size: 0.7em; line-height: 1em;">makanan</div>
									<div style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 0.8em; line-height: 1em;">
										<i class="fas fa-star star-rating"></i>
										<i class="fas fa-star star-rating"></i>
										<i class="fas fa-star star-rating"></i>
										<i class="fas fa-star star-rating"></i>
										<i class="far fa-star star-rating"></i>
									</div>
									<div style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 0.6em; line-height: 1em; vertical-align: center; margin-bottom: 0em;">
										<s>IDR. 25.000</s>
									</div>
									<div style="padding: 0; margin: 0.1em 0px 0px 0em; font-size: 1em; line-height: 1em; font-weight: 500;">IDR. 5.000</div>
								</div>
							</div>
							<div class="">
								<img src="<?=url('/')?>/public/img/mitra/landing_page/keranjang.svg" style="position: absolute; bottom: -0.8em; right: -0.5em; width: 5em;" onclick="masukan_keranjang()">
							</div>
						</div>

					</div>
				</div>
				@endfor
				<div style="width: 100%; display: flex; justify-content: center; margin-bottom: 1em;">
					<a href="<?=url('/')?>/{{Request::segment(1)}}/daftar-menu" style="color: #111111;">Lihat lebih banyak</a>
				</div>
			</div>
			<div style="background: #9d0208; border-top-left-radius: 1.5em; border-top-right-radius: 1.5em; padding: 2em 8% 2em 8%; display: flex; flex-direction: column; margin-top: 1em; width: 100%;">
				<div class="info-toko" style="display: flex; justify-content: space-between; width: 100%;">
					<div class="nama-toko" style="width: 100%;">
						<h3 style="color: white; font-weight: 500; word-wrap: break-word; text-align: center;">Testimoni</h3>
					</div>
				</div>
				<div class="penilaian" style="margin-top: 0.5em;">
					<div class="penilai mb-3" style="display: flex; justify-content: center; align-items: flex-start;">
						<div style="width: 20%; border-radius: 50%;">
							<img src="<?=url('/')?>/public/img/user/profile_picture/fathul.jpg" style="width: 100%; border-radius: 50%;">
						</div>
						<div style="color: white; width: 80%; padding-left: 1em;">
							<div style="font-size: 1em; line-height: 1em; margin-bottom: 0.3em; font-weight: 500;">User1</div>
							<div style="font-size: 0.75em; line-height: 1.4em; font-weight: 0; color: #f9f0f0;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Faucibus non eu ultrices nisl platea egestas.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Faucibus non eu ultrices nisl platea egestas.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Faucibus non eu ultrices nisl platea egestas.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Faucibus non eu ultrices nisl platea egestas.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Faucibus non eu ultrices nisl platea egestas.</div>
						</div>
					</div>
					<div class="penilai mb-3" style="display: flex; justify-content: center; align-items: flex-start;">
						<div style="width: 20%; border-radius: 50%;">
							<img src="<?=url('/')?>/public/img/user/profile_picture/fathul.jpg" style="width: 100%; border-radius: 50%;">
						</div>
						<div style="color: white; width: 80%; padding-left: 1em;">
							<div style="font-size: 1em; line-height: 1em; margin-bottom: 0.3em; font-weight: 500;">User1</div>
							<div style="font-size: 0.75em; line-height: 1.4em; font-weight: 0; color: #f9f0f0;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Faucibus non eu ultrices nisl platea egestas.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Faucibus non eu ultrices nisl platea egestas.</div>
						</div>
					</div>
					<div class="penilai mb-3" style="display: flex; justify-content: center; align-items: flex-start;">
						<div style="width: 20%; border-radius: 50%;">
							<img src="<?=url('/')?>/public/img/user/profile_picture/fathul.jpg" style="width: 100%; border-radius: 50%;">
						</div>
						<div style="color: white; width: 80%; padding-left: 1em;">
							<div style="font-size: 1em; line-height: 1em; margin-bottom: 0.3em; font-weight: 500;">User1</div>
							<div style="font-size: 0.75em; line-height: 1.4em; font-weight: 0; color: #f9f0f0;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Faucibus non eu ultrices nisl platea egestas.</div>

						</div>
					</div>
					<div class="penilai mb-3" style="display: flex; justify-content: center; align-items: flex-start;">
						<div style="width: 20%; border-radius: 50%;">
							<img src="<?=url('/')?>/public/img/user/profile_picture/fathul.jpg" style="width: 100%; border-radius: 50%;">
						</div>
						<div style="color: white; width: 80%; padding-left: 1em;">
							<textarea placeholder="Masukan komentar" style="background: #720004; color: white; font-size: 0.8em; padding: 0.8em; border: none; width: 98%;" rows="4"></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div style="background: #720004; margin-top: -2em; border: none; position: absolute; z-index: 5;">
		<div class="container-mall" style="padding-bottom: 3em;">
			<div style="padding-top: 2em; text-align: center; color: white;">
				<p style="font-weight: 700;">Alamat</p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Semper vitae proin fames vulputate integer nulla amet. Donec turpis.
			</div>
			<div style="padding-top: 2em; text-align: center; color: white;">
				<p style="font-weight: 700;">Connect with us on social media</p>
				<div class="sosmed">
					<img src="<?=url('/')?>/public/img/home/about/facebook.svg" style="width: 2.2em;">
					<img src="<?=url('/')?>/public/img/home/about/youtube.svg" style="width: 2.2em;">
					<img src="<?=url('/')?>/public/img/home/about/instagram.svg" style="width: 2.2em;">
					<img src="<?=url('/')?>/public/img/home/about/twitter.svg" style="width: 2.2em;">
				</div>
				<div><br>
					<a href="<?=url('/')?>" style="margin: 0em 0.3em 0em 0.3em;">About Us</a>
					<a href="<?=url('/')?>" style="margin: 0em 0.3em 0em 0.3em;">Privacy & Policy</a>
				</div>
				<div>
					Copyright&nbsp;&copy;&nbsp;<script>document.write(new Date().getFullYear());</script>&nbsp;CV. Kaili Nusantara Production
				</div>
			</div>
		</div>
	</div>
</main>


@endsection

@section('footer-scripts')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
	var swiper = new Swiper('.swiper-container', {
		pagination: {
			el: '.swiper-pagination',
		},
	});

	function masukan_keranjang(){
		var jumlah_keranjang = $("#jumlah_keranjang").html();
		jumlah_keranjang = parseInt(jumlah_keranjang)+1;
		$("#jumlah_keranjang").html(jumlah_keranjang);
	}
</script>
@endsection
