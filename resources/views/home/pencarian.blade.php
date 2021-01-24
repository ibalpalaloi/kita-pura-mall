	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="HandheldFriendly" content="true"/>		
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

			/*pencarian*/
			.pencarian-tabs > a {
				border: 2px solid #ff006e;
				padding: 0.5em 1.5em 0.5em 1.5em;
				color: #ff006e;
				border-radius: 1.5em;
				margin: 0em 0.5em 0em 0.5em;
			}

			.card-pencarian {
				/*padding-top: 0px;*/
				margin-bottom: 7.5em;
			}

			.active-mall {
				background: #ff006e;
				color: white !important;
			}
		</style>
	</head>
	<body style="margin: 0px;">
		<header class="style__Container-sc-3fiysr-0 header" style="background: white;" >
			<div class="style__Wrapper-sc-3fiysr-2 hBSxmh pencarian-tabs" style="display: flex; justify-content: center; background: white;">
				<a href="rekomendasi">
					Rekomendasi
				</a>
				<a href="maps">
					Maps
				</a>
				<a href="explore" class="active-mall">
					Explore
				</a>			
			</div>
		</header>


		<main id="homepage" class="homepage">
			<div class="card-pencarian">
				<div class="nama-kategori" style="padding-top: 0.6em; margin-top: 4em; display: flex; flex-direction: column; flex-wrap: wrap;">
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

		<div class="footer">
			<div class="container-mall footer-mall-menu" style="display: flex; justify-content: space-around;">
				@php
				$menu = array('beranda_color.svg', 'pencarian.svg', 'toko_color.svg', 'akun_color.svg');
				$nama_menu = array('Beranda', 'Pencarian', 'Toko', 'Akun');
				$link_menu = array('beranda', 'pencarian', 'toko', 'akun');
				@endphp 
				@for ($i = 0; $i < count($menu); $i++)  
				<div style="display: flex; justify-content: center; flex-direction: column; align-items: center; margin: 0em 0em 0em 0.8em;">
					<div style="height: 5em; width: 5em; display: flex; flex-direction: column; align-items: center; margin: 0.4em 0em 0.4em 0em; justify-content: center;">
						<a style="@if ($i == 1) background: #ff006e; @else background: white; border: 2px solid #ff006e; @endif width: 3em; height: 3em; border-radius: 1.5em; margin-bottom: 0.3em; display: flex;justify-content: center;" href="<?=url('/')?>/{{$link_menu[$i]}}">
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