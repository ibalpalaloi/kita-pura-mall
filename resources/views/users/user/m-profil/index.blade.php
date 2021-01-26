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
				min-height: calc(80vh - 60px);	
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
				padding: 0.7em 0em 0.3em 0em;
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
		<div class="wrapper" style="background: #ff006e; position: relative; z-index: -1">
			<div class="banner" style="display: flex; justify-content: flex-end;">
				<div class="" style="width: 30%; display: flex; align-items: flex-start; flex-direction: column; padding-top: 4em; padding-left: 2em;">
					<img src="<?=url('/')?>/public/img/logo.svg" style="width: 30%; width: 60%;">
					<img src="<?=url('/')?>/public/img/logo_text_vertical.svg" style="width: 30%; width: 90%; margin-top: 0.7em;">
				</div>
				<img src="<?=url('/')?>/public/img/user/img_user.png" style="width: 70%;">
			</div>
		</div>


		<main id="homepage" class="homepage">
			<div class="card-mall kategori" style="padding: 5px;">
				<div style="display: flex; justify-content: center; flex-direction: row; align-items: center;">
					<div style="width: 25%; display: flex; flex-direction: column; align-items: center; margin: 0.4em 0em 0.4em 0em; ">
						<img src="<?=url('/')?>/public/img/user/lengkapi_berkas.png" style="width: 100%;">
					</div>
					<div style="width: 63%; display: flex; flex-direction: column; align-items: center; margin: 0.4em 0em 0.4em 2%;">
						<div class="container">
							<div>Lengkapi akun anda!</div>
							<div style="display: flex; justify-content: center; align-items: center;">
								<div class="progress" style="border-radius: 1.5em; width: 90%; height: 1rem;">
									<div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%; border-radius: 1.5em; background: #ff006e;">
									</div>
								</div>
								<div style="width: 5%; margin-left: 0.5em;"><b>2/5</b></div>
							</div>
							<div style="font-size: 0.60em; text-align: center; width: 90%;"><b>Lengkapi akun </b>anda, Untuk bisa melakukan transaksi pada aplikasi ini</div>
						</div>

					</div>
				</div> 
			</div>
			<div class="card-mall">
				<div style="padding: 1.5em 2em 1.5em 2em;">
					<span><img src="<?=url('/')?>/public/img/user/setting.svg"></span>
					<span>&nbsp;&nbsp;&nbsp;Pengaturan Profil</span>
				</div>
			</div>
			<div class="card-mall">
				<div style="padding: 1.5em 2em 1.5em 2em;">
					<span><img src="<?=url('/')?>/public/img/user/mitra.svg"></span>
					<span>&nbsp;&nbsp;&nbsp;Mitra Kitapura</span>
				</div>
			</div>
			<div class="card-mall">
				<div style="padding: 1.5em 2em 1.5em 2em;">
					<span>&nbsp;&nbsp;<img src="<?=url('/')?>/public/img/user/logout.svg"></span>
					<span>&nbsp;&nbsp;&nbsp;Keluar</span>
				</div>
			</div>
		</main>
		<div class="footer">
			<div class="container-mall footer-mall-menu" style="display: flex; justify-content: space-around;">
					@php
					$menu = array('beranda_color.svg', 'pencarian_color.svg', 'toko_color.svg', 'akun.svg');
					$nama_menu = array('Beranda', 'Pencarian', 'Toko', 'Akun');
					$link_menu = array('beranda', 'pencarian', 'toko', 'user');
					@endphp 
					@for ($i = 0; $i < count($menu); $i++)  
					<div style="display: flex; justify-content: center; flex-direction: column; align-items: center; margin: 0em 0em 0em 0.8em;">
						<div style="height: 5em; width: 5em; display: flex; flex-direction: column; align-items: center; margin: 0.4em 0em 0.4em 0em; justify-content: center;">
							<a style="@if ($i == 3) background: #ff006e; @else background: white; border: 2px solid #ff006e; @endif width: 3em; height: 3em; border-radius: 1.5em; margin-bottom: 0.3em; display: flex;justify-content: center;"  href="<?=url('/')?>/{{$link_menu[$i]}}">
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