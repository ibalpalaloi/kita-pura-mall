
	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="HandheldFriendly" content="true" />		
		<link rel="stylesheet" type="text/css" href="<?=url('/')?>/public/template/admin/dist/css/style.min.css">
		<link rel="stylesheet" type="text/css" href="<?=url('/')?>/public/template/material-design/css/material-dashboard.css?v=2.1.2">
		<style type="text/css">
			body {
				background: #ff006e;
			}

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
				background: transparent;
				position: relative;
				/*top: 60px;*/
				max-width: 480px;
				width: 100%;
				margin: 0px auto;
				padding: 0px 16px 1em;
				box-sizing: border-box;
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
				/*margin-top: 1em;*/
			}

			.login {
				padding: 0.8em 0em 1em 0em;
				display: flex; 
				position: relative; 
				top: -20em; 
				margin-bottom: -20em;
				z-index: 2;   
				overflow-y: visible; 
				overflow-x: auto; 			

				display: flex;
				flex-direction: column;
				align-content: center;
				align-items: center;


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

			.pencarian-tabs {
				display: flex; 
				justify-content: center;
			}

			.pencarian-tabs > a {
				border: 2px solid #ff006e;
				padding: 0.5em 1.5em 0.5em 1.5em;
				color: #ff006e;
				border-radius: 1.5em;
				margin: 0em 0.5em 0em 0.5em;
			}

			.pencarian-tabs {			}

			.sosmed > img {
				margin: 0px 0.6em 0px 0.6em !important;
			}


			.active-mall {
				background: #ff006e;
				color: white !important;
			}			

			.btn-mall {
				background-color: #ff006e;
				border-radius: 2em;

			}

			.btn:hover {
				background-color: #d80f67 !important;				
			}
		</style>
	</head>
	<body style="margin: 0px;">

		<div class="wrapper" style="background: #ff006e; position: relative; z-index: -1;">
			<div class="banner" style="display: flex; justify-content: flex-end; padding: 0px;">
				<img src="<?=url('/')?>/public/img/auth/img_login.png" style="width: 100%;">
			</div>
		</div>

		<main id="homepage" class="homepage">
			<div class="card-mall login">
				<form class="form-horizontal mt-3" action="<?=url('post_sign_up')?>" method="post" style="width: 75%; display: flex; flex-direction: column;">
					{{csrf_field()}}
					<div class="form-group bmd-form-group">
						<label class="bmd-label-floating">Nama</label>
						<input type="text" class="form-control">
					</div>
					<div class="form-group">
						<label class="bmd-label-floating">Email</label>
						<input type="text" class="form-control">
					</div>
					<div class="form-group">
						<label class="bmd-label-floating">Password</label>
						<input type="text" class="form-control">
					</div>
					<div style="display: flex; justify-content: center;">
						<button type="submit" class="btn btn-mall" style="width: 20em;">Daftar</button>
					</div>
				</form>
			</div>
		</main>

	</body>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="<?=url('/')?>/public/template/material-design/js/core/popper.min.js"></script>

	<script src="<?=url('/')?>/public/template/material-design/js/core/bootstrap-material-design.min.js"></script>

	<script src="<?=url('/')?>/public/template/material-design/js/plugins/perfect-scrollbar.jquery.min.js"></script>

	<script src="<?=url('/')?>/public/template/material-design/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
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
