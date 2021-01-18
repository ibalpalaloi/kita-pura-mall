	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="HandheldFriendly" content="true" />		
		<link rel="stylesheet" type="text/css" href="<?=url('/')?>/public/template/admin/bootstrap/dist/css/bootstrap.css">
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
				padding: 0px 16px 80px;
				box-sizing: border-box;
				min-height: calc(100vh - 60px);							
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

			.kategori {
				background: white;
				/*border: 2px solid red;*/
				box-shadow: rgba(152, 152, 152, 0.5) 0px 2px 8px 1px;
				border-radius: 1.5em;
				padding: 0.8em 0em 1em 0em;
				display: flex; 
				/*justify-content: space-around; */
				position: relative; top: -3em; 
				z-index: 2;   
				overflow-y: visible; 
				overflow-x: auto; 
				/*white-space: nowrap;*/
			}

		</style>
	</head>
	<body>
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
			<div class="kategori">
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
			<div class="style__Container-juttkj-1 clPWcC">
				<h3 class="style__Text-juttkj-3 iBqPAl">Ingin Menggalang Dana?</h3>
				<div class="style__ButtonWrapper-juttkj-4 kyUdEc">
					<button id="home_button_galang-dana" color="blue" class="style__ButtonWrapper-sc-1dpwvg2-0 jEenUH" style="margin-bottom: 1em;">Galang Dana Sekarang</button>
					<button id="home_button_galang-dana" color="blue" class="style__ButtonWrapper-sc-1dpwvg2-0 jEenUH">Galang Dana Sekarang</button>
				</div>
			</div>
		</main>
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