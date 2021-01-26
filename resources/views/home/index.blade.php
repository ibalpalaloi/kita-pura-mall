	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="HandheldFriendly" content="true" />		
		<link rel="stylesheet" type="text/css" href="<?=url('/')?>/public/template/admin/dist/css/style.min.css">
		<style type="text/css">

			.hBSxmh {
				max-width: 480px;
				width: 100%;
				display: flex;
				height: 60px;
				-webkit-box-align: center;
				align-items: center;
				-webkit-box-pack: justify;
				justify-content: space-between;
				margin: 0px auto;
			}

			a {
				text-decoration: none;
				color: #00aeef;
				transition: all .35s ease;
				background-color: transparent;
			}

			.sUjAJ {
				background: white;
				display: flex;
				-webkit-box-pack: justify;
				justify-content: space-between;
				-webkit-box-align: center;
				align-items: center;
				border: none;
				color: #dedede;
				padding: 0px 15px;
				font-size: 12px;
				height: 36px;
				width: 100%;
				border-radius: 5px;
				margin-right: 15px;
			}	
			
			.svg-inline--fa, svg:not(:root).svg-inline--fa {
				overflow: visible;
			}

			svg:not(:root).svg-inline--fa {
				overflow: visible;
			}
			.svg-inline--fa.fa-w-16 {
				width: 1em;
			}
			.svg-inline--fa.fa-w-16 {
				width: 1em;
			}
			.svg-inline--fa {
				display: inline-block;
				font-size: inherit;
				height: 1em;
				vertical-align: -.125em;
			}
			.svg-inline--fa {
				display: inline-block;
				font-size: inherit;
				height: 1em;
				overflow: visible;
				vertical-align: -0.125em;
			}
			.clPWcC {
				max-width: 1020px;
				margin: 0px auto;
				padding-top: 5px;
			}
			.iBqPAl {
				margin: 15px 0px 0px;
				font-weight: 600;
				font-size: 18px;
				line-height: 23px;
			}
			.kyUdEc {
				padding: 20px 0px;
			}

			.jEenUH {
				display: inline-block;
				border: 0px;
				font-weight: 700;
				line-height: normal;
				text-align: center;
				vertical-align: middle;
				cursor: pointer;
				transition: all 0.35s ease 0s;
				-webkit-tap-highlight-color: rgba(0, 0, 0, 0);
				text-decoration: none;
				width: 100%;
				padding: 11px 37.5px;
				font-size: 16px;
				border-radius: 20px;
				background-color: rgb(0, 174, 239);
				color: rgb(255, 255, 255);
			}

			.calMVq {
				display: flex;
				font-weight: 700;
				line-height: normal;
				text-align: center;
				-webkit-box-pack: center;
				justify-content: center;
				vertical-align: middle;
				cursor: pointer;
				transition: all 0.35s ease 0s;
				-webkit-tap-highlight-color: rgba(0, 0, 0, 0);
				text-decoration: none;
				width: 100%;
				padding: 11px 37.5px;
				font-size: 16px;
				border-radius: 20px;
				background-color: rgb(255, 255, 255);
				color: rgb(0, 174, 239);
				border: 1px solid rgb(0, 174, 239);
			}

			.dcmUJR {
				margin-right: 8px;
			}

			.homepage {
				background-color: white;
				position: relative;
				/*top: 60px;*/
				max-width: 480px;
				width: 100%;
				margin: 0px auto;
				padding: 0px 16px 1em;
				box-sizing: border-box;
				min-height: calc(100vh - 60px);	
				/*border: 2px solid red;						*/
			}	

			.container-mall {
				max-width: 480px;
				width: 100%;
				margin: 0px auto;
				padding: 0px 16px 0px;
				box-sizing: border-box;	
			}

			.banner {
				max-width: 480px;
				width: 100%;
				margin: 0px auto;
				padding: 4em 0em 4em 0em;
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
				/*border: 2px solid red;			*/
				margin-bottom: 1em;
				/*margin-top: 1em;*/
			}

			.kategori {
				padding: 0.8em 0em 1em 0em;
				display: flex; 
				position: relative; 
				top: -3em; 
				margin-bottom: -2em;
				z-index: 2;   
				overflow-y: visible; 
				overflow-x: auto; 			

			}

			.nama-kategori {
				padding: 0.5em 0.5em 0.5em 0.5em;
				display: flex; 				
				justify-content: space-around;
			}

			.footer {
				position: fixed;
				left: 0;
				bottom: 0;
				width: 100%;
				color: white;
				text-align: center;
				/*border: 2px solid red;*/
				padding-bottom: 0px;
				background-color: transparent;
			}

			.footer-mall-menu {
				background: white;
				box-shadow: rgba(152, 152, 152, 0.5) 0px 2px 8px 1px;
				border-radius: 3em;			
				margin-bottom: 1em;	

			}

			.sosmed > img {
				margin: 0px 0.6em 0px 0.6em !important;
			}
		</style>
	</head>
	<body style="margin: 0px;">
		<header class="style__Container-sc-3fiysr-0 header" >
			<div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: center;">
				<a id="defaultheader_logo" title="Kitabisa" style="margin-left: 20px; height:33px;margin-right:20px" href="/">
					<img src="<?=url('/')?>/public/img/logo.svg">
				</a>
				<div id="defaultheader_search" class="style__SearchInput-sc-3fiysr-3 sUjAJ">
					<span></span>
					<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="svg-inline--fa fa-search fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="color: #dedede;">
						<path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
					</svg>
				</div>
			</div>
		</header>

		<div class="wrapper" style="background: #ff006e; position: relative; z-index: -1">
			<div class="banner" >
				<img src="<?=url('/')?>/public/img/banner/banner.jpg" style="width: 100%;">
			</div>
		</div>

		<main id="homepage" class="homepage">
			<div class="card-mall kategori">
				@php
				$kategori = array('bayi.svg', 'elektronik.svg', 'fashion.svg', 'food.svg', 'industri.svg', 'kecantikan.svg', 'olahraga.svg', 'rumah_tangga.svg', 'bayi.svg', 'elektronik.svg', 'fashion.svg', 'food.svg', 'industri.svg', 'kecantikan.svg', 'olahraga.svg', 'rumah_tangga.svg');
				$nama_kategori = array('Perlengkapan Bayi', 'Rumah Tangga', 'Keperluan Pribadi', 'Makanan Minuman', 'Kantor Industri',  'Kecantikan', 'Olharaga', 'Jasa', 'Perlengkapan Bayi', 'Rumah Tangga', 'Keperluan Pribadi', 'Makanan Minuman', 'Kantor Industri',  'Kecantikan', 'Olharaga', 'Jasa');

				$setengah = count($kategori)/2;
				$k = 0;
				@endphp 
				@for ($i = 1; $i <= $setengah; $i++)  
				<div style="display: flex; justify-content: center; flex-direction: column; align-items: center; margin: 0em 0em 0em 0.8em;">
					@for ($j = $k; $j < $i*2; $j++)
					<div style="height: 5em; width: 5em; display: flex; flex-direction: column; align-items: center; margin: 0.4em 0em 0.4em 0em;">
						<div style="background: #ff006e; width: 3em; height: 3em; border-radius: 0.5em; margin-bottom: 0.3em;">
							<img src="<?=url('/')?>/public/img/home/kategori/{{$kategori[$j]}}" style="width: 100%;">
						</div>
						<div style="text-align: center; font-size: 0.7em;">{{$nama_kategori[$j]}}</div>
					</div>
					@php $k++; @endphp
					@endfor
				</div> 
				@endfor
			</div>
			<div class="card-mall">
				<div style="margin-left: 1em; font-size: 1.1em; font-weight: 800; padding-top: 0.8em;">Digital Download</div>
				<div class="nama-kategori">
					@php
					$digital = array('digital_1.svg', 'digital_2.svg', 'digital_3.svg', 'digital_4.svg');
					$nama_digital = array('Kaili The Movie', 'Enola Holmes', 'Noah Album', 'Yellow Claw');
					@endphp 
					@for ($i = 0; $i < count($digital); $i++)  
					<div style="display: flex; justify-content: center; flex-direction: column; width: 20%; border-radius: 0.5em;padding: 0px;">
						<img src="<?=url('/')?>/public/img/product/{{$digital[$i]}}" style="width: 100%;">
						<div style="text-align: left; font-size: 0.55em; position: relative; top: -3.1em; margin-bottom: -3.1em; padding: 0.7em 0em 0.7em 0.5em; border-bottom-left-radius: 0.5em; border-bottom-right-radius: 0.5em; background-image: linear-gradient(to top, #feeff6, #fcf9fc);"> <?=substr(strip_tags($nama_digital[$i]), 0, 12)?>@if (strlen($nama_digital[$i]) > 12)..@endif<br><span style="color: #ff006e; font-weight: 600;">Rp. {{number_format(5000,0,',','.')}}</span></div>
					</div> 
					@endfor
				</div>
				<div style="margin-right: 1.5em; font-size: 0.8em; font-weight: 800; text-align: right; padding-bottom: 1em; color: #bec0c6;">Lebih Banyak</div>
			</div>
			<div class="card-mall">
				<div style="margin-left: 1em; font-size: 1.1em; font-weight: 800; padding-top: 0.8em;">Makanan dan Minuman</div>
				<div class="nama-kategori">
					@php
					$digital = array('kfc.png', 'janji_jiwa.jpg', 'richese.png', 'starbucks.png');
					$nama_digital = array('KFC', 'Janji Jiwa', 'Richese Factory', 'Starbucks');
					@endphp 
					@for ($i = 0; $i < count($digital); $i++)  
					<div style="display: flex; justify-content: center; flex-direction: column; width: 20%; border-radius: 0.5em;padding: 0px;">
						<img src="<?=url('/')?>/public/img/toko/{{$digital[$i]}}" style="width: 100%;">
						<div style="text-align: left; font-size: 0.55em; position: relative; top: -3.1em; margin-bottom: -3.1em; padding: 0.7em 0em 0.7em 0.5em; border-bottom-left-radius: 0.5em; border-bottom-right-radius: 0.5em; background-image: linear-gradient(to top, #feeff6, #fcf9fc);"> <?=substr(strip_tags($nama_digital[$i]), 0, 12)?>@if (strlen($nama_digital[$i]) > 12)..@endif<br><span style="color: #ff006e; font-weight: 600;">5000+ Pengunjung</span></div>
					</div> 
					@endfor
				</div>
				<div style="margin-right: 1.5em; font-size: 0.8em; font-weight: 800; text-align: right; padding-bottom: 1em; color: #bec0c6;">Lebih Banyak</div>
			</div>
			<div class="card-mall">
				<div style="margin-left: 1em; font-size: 1.1em; font-weight: 800; padding-top: 0.8em;">Rumah Kos</div>
				<div class="nama-kategori">
					@php
					$digital = array('digital_1.svg', 'digital_2.svg', 'digital_3.svg', 'digital_4.svg');
					$nama_digital = array('Kaili The Movie', 'Enola Holmes', 'Noah Album', 'Yellow Claw');
					@endphp 
					@for ($i = 0; $i < count($digital); $i++)  
					<div style="display: flex; justify-content: center; flex-direction: column; width: 20%; border-radius: 0.5em;padding: 0px;">
						<img src="<?=url('/')?>/public/img/product/{{$digital[$i]}}" style="width: 100%;">
						<div style="text-align: left; font-size: 0.55em; position: relative; top: -3.1em; margin-bottom: -3.1em; padding: 0.7em 0em 0.7em 0.5em; border-bottom-left-radius: 0.5em; border-bottom-right-radius: 0.5em; background-image: linear-gradient(to top, #feeff6, #fcf9fc);"> <?=substr(strip_tags($nama_digital[$i]), 0, 12)?>@if (strlen($nama_digital[$i]) > 12)..@endif<br>Rp. 5000</div>
					</div> 
					@endfor
				</div>
				<div style="margin-right: 1.5em; font-size: 0.8em; font-weight: 800; text-align: right; padding-bottom: 1em; color: #bec0c6;">Lebih Banyak</div>
			</div>
			<div class="card-mall">
				<div style="margin-left: 1em; font-size: 1.1em; font-weight: 800; padding-top: 0.8em;">Kesehatan</div>
				<div class="nama-kategori">
					@php
					$digital = array('digital_1.svg', 'digital_2.svg', 'digital_3.svg', 'digital_4.svg');
					$nama_digital = array('Kaili The Movie', 'Enola Holmes', 'Noah Album', 'Yellow Claw');
					@endphp 
					@for ($i = 0; $i < count($digital); $i++)  
					<div style="display: flex; justify-content: center; flex-direction: column; width: 20%; border-radius: 0.5em;padding: 0px;">
						<img src="<?=url('/')?>/public/img/product/{{$digital[$i]}}" style="width: 100%;">
						<div style="text-align: left; font-size: 0.55em; position: relative; top: -3.1em; margin-bottom: -3.1em; padding: 0.7em 0em 0.7em 0.5em; border-bottom-left-radius: 0.5em; border-bottom-right-radius: 0.5em; background-image: linear-gradient(to top, #feeff6, #fcf9fc);"> <?=substr(strip_tags($nama_digital[$i]), 0, 12)?>@if (strlen($nama_digital[$i]) > 12)..@endif<br>Rp. 5000</div>
					</div> 
					@endfor
				</div>
				<div style="margin-right: 1.5em; font-size: 0.8em; font-weight: 800; text-align: right; padding-bottom: 1em; color: #bec0c6;">Lebih Banyak</div>
			</div>
			<div class="card-mall">
				<div style="margin-left: 1em; font-size: 1.1em; font-weight: 800; padding-top: 0.8em;">Kesehatan</div>
				<div class="nama-kategori">
					@php
					$digital = array('digital_1.svg', 'digital_2.svg', 'digital_3.svg', 'digital_4.svg');
					$nama_digital = array('Kaili The Movie', 'Enola Holmes', 'Noah Album', 'Yellow Claw');
					@endphp 
					@for ($i = 0; $i < count($digital); $i++)  
					<div style="display: flex; justify-content: center; flex-direction: column; width: 20%; border-radius: 0.5em;padding: 0px;">
						<img src="<?=url('/')?>/public/img/product/{{$digital[$i]}}" style="width: 100%;">
						<div style="text-align: left; font-size: 0.55em; position: relative; top: -3.1em; margin-bottom: -3.1em; padding: 0.7em 0em 0.7em 0.5em; border-bottom-left-radius: 0.5em; border-bottom-right-radius: 0.5em; background-image: linear-gradient(to top, #feeff6, #fcf9fc);"> <?=substr(strip_tags($nama_digital[$i]), 0, 12)?>@if (strlen($nama_digital[$i]) > 12)..@endif<br>Rp. 5000</div>
					</div> 
					@endfor
				</div>
				<div style="margin-right: 1.5em; font-size: 0.8em; font-weight: 800; text-align: right; padding-bottom: 1em; color: #bec0c6;">Lebih Banyak</div>
			</div>
			<div class="card-mall">
				<div style="text-align: center; color:  #ff006e; margin-left: 1em; font-size: 1.1em; font-weight: 800; padding-top: 2.2em;">KITAPURA MALL</div>
				<div style="padding: 0.7em 1.5em 0.7em 1.5em; text-align: justify;">adalah sebuah platform yang mewadahi UMKM daerah untuk mendigitasikan produk mereka agar mudah dijangkau khalayak umum. Aplikasi ini juga mempermudah konsumen untuk melihat produk-produk lokal.</div>
				<div>
					<div class="row" style="display: flex; padding-left: 22%;">
						<div style="width: 4em; height: 4em; display: flex; align-items: center; margin-right: 1em;">
							<img src="<?=url('/')?>/public/img/home/about/produk_lokal.png" style="width: 100%;">
						</div>
						<div style="display: flex; flex-direction: column; justify-content: center;">
							<div style="font-size: 2em; color:#ff006e; font-weight: 600;">50</div>
							<div>Produk lokal yang terdaftar</div>
						</div>
					</div>
					<div class="row" style="display: flex; padding-left: 22%;">
						<div style="width: 4em; height: 4em; display: flex; align-items: center; margin-right: 1em;">
							<img src="<?=url('/')?>/public/img/home/about/pengunjung.png" style="width: 4em;" style="width: 100%;">
						</div>
						<div style="display: flex; flex-direction: column; justify-content: center;">
							<div style="font-size: 2em; color:#ff006e; font-weight: 600;">15.000+</div>
							<div>Pengujung setiap hari</div>
						</div>
					</div>
					<div class="row" style="display: flex; padding-left: 22%;">
						<div style="width: 4em; height: 4em; display: flex; align-items: center; margin-right: 1em;">
							<img src="<?=url('/')?>/public/img/home/about/produk_terjual.png" style="width: 4em;">
						</div>
						<div style="display: flex; flex-direction: column; justify-content: center;">
							<div style="font-size: 2em; color:#ff006e; font-weight: 600;">30.000+</div>
							<div>Produk lokal yang terjual</div>
						</div>
					</div>					
				</div>
				<div style="margin-right: 1.5em; font-size: 0.8em; font-weight: 800; text-align: right; padding-bottom: 3em; color: #bec0c6;"></div>
			</div>
		</main>

		<div class="wrapper" style="background: #1c2645; position: relative; z-index: -1">
			<div class="container-mall" style="padding-bottom: 7.5em;">
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
		<div class="footer">
			<div class="container-mall footer-mall-menu" style="display: flex; justify-content: space-around;">
					@php
					$menu = array('beranda.svg', 'pencarian_color.svg', 'toko_color.svg', 'akun_color.svg');
					$nama_menu = array('Beranda', 'Pencarian', 'Toko', 'Akun');
					$link_menu = array('beranda', 'pencarian', 'toko', 'user');
					@endphp 
					@for ($i = 0; $i < count($menu); $i++)  
					<div style="display: flex; justify-content: center; flex-direction: column; align-items: center; margin: 0em 0em 0em 0.8em;">
						<div style="height: 5em; width: 5em; display: flex; flex-direction: column; align-items: center; margin: 0.4em 0em 0.4em 0em; justify-content: center;">
							<a style="@if ($i == 0) background: #ff006e; @else background: white; border: 2px solid #ff006e; @endif width: 3em; height: 3em; border-radius: 1.5em; margin-bottom: 0.3em; display: flex;justify-content: center;"  href="<?=url('/')?>/{{$link_menu[$i]}}">
								<img src="<?=url('/')?>/public/img/menu/{{$menu[$i]}}" style="width: 60%; ">
							</a>
							<div style="text-align: center; font-size: 0.7em; color: #5b5b5b;">{{$nama_menu[$i]}}</div>
						</div>
					</div> 
					@endfor
			</div>
		</div>
	</body>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
		(function($) {
			$.fn.nodoubletapzoom = function() {
				$(this).bind('touchstart', function preventZoom(e) {
					var t2 = e.timeStamp
					, t1 = $(this).data('lastTouch') || t2
					, dt = t2 - t1
					, fingers = e.originalEvent.touches.length;
					$(this).data('lastTouch', t2);
					if (!dt || dt > 500 || fingers > 1) return; 
					e.preventDefault();
					$(this).trigger('click').trigger('click');
				});
			};
		})(jQuery);		
	</script>
	</html>