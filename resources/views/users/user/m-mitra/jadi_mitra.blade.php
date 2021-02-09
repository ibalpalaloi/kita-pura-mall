@extends('layouts.home_no_menu')

@section('title')
Biodata |
@endsection

@section('header-scripts')
<link rel="stylesheet" href="<?=url('/')?>/public/plugins/font-awesome/css/all.css">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />


<style type="text/css">
	.banner {
		max-width: 480px;
		width: 100%;
		margin: 0px auto;
		padding: 5em 0em 5em 0em;
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


	.profile-picture {
		background: white;
		box-shadow: rgba(152, 152, 152, 0.5) 0px 2px 8px 1px;
		border-radius: 50%;	
		margin-bottom: 1em;
		display: flex; 
		width: 30%;
		position: relative; 
		top: -4em; 
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



	input:focus {
		border: none;
	}

	.form-control {
		border: none;
	}

	.div-input-mall {
		border-radius: 1.5em; border:1px solid #d1d2d4;		
	}

	.input-group-text-mall {
		border: none;
		display: flex;justify-content: center;
		width: 3em; 
		height: 3em; 
		border-bottom-left-radius: 1.5em; 
		border-top-left-radius: 1.5em; 
		background:white;		
	}

	.form-control-mall {
		height: 3em; 
		border-bottom-right-radius: 1.5em; 
		border-top-right-radius: 1.5em; 
		border-left: none;	
		padding-left: 0.2em;	
	}

	.homepage {
		min-height: calc(80vh - 60px); 
	}

	.div-feature {
		display: flex; justify-content: center; flex-direction: column; align-items: center;
	}

	.feature {
		background: #d9e1eb; 
		width: 75%; 
		padding: 0.3em 0.3em 0.3em 1.2em; 
		border-radius: 1.5em;
		margin: 0.25em;
		font-size: 0.7em;
		text-align: left;
	}

	.feature-premium {
		background: #d9e1eb; 
		width: 75%; 
		padding: 0.3em 0.3em 0.3em 1.2em; 
		border-radius: 1.5em;
		margin: 0.25em;
		font-size: 0.7em;
	}



	body {
		background: #eaf4ff;
	}
	/*browser fathu*/
	* {
		box-sizing: border-box;
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
<header class="style__Container-sc-3fiysr-0 header" style="position: static; background: #eaf4ff;">
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: space-between;">
		<a href="<?=url('/')?>/akun" style="padding-left: 1em;">
			<img src="<?=url('/')?>/public/img/back.svg">
		</a>
		<a id="defaultheader_logo" title="Kitabisa" style="margin-left: 20px; height:33px;margin-right:20px" href="/">
			<img src="<?=url('/')?>/public/img/logo_color.svg">
			<img src="<?=url('/')?>/public/img/logo_text_color.svg">
		</a>
		<div style="margin-right: 2.5em;">
			<img src="<?=url('/')?>/public/img/back.svg" hidden>
		</div>
	</div>
</header>



<main id="homepage" class="homepage" style="background: #eaf4ff; display: flex; align-items: center; justify-content: center; flex-direction: column;">
	<div class="swiper-container">
		<div class="swiper-wrapper">
			<div class="swiper-slide" style="background: transparent; display: flex; justify-content: center; flex-direction: column;">
				<div style="width: 80%;">
					<div style="text-align: center;font-size: 0.8em; font-weight: 500; line-height: 1.2em;">Daftar usaha anda<span style="color: #fb036b;"> Gratis</span><br>Mudah hanya di kitapura Mall</div>
					<div style="background: white; margin-top: 4.5em; border-radius: 1.5em; position: relative;">
						<div style="display: flex; justify-content: center; width: 100%; position: absolute; top: -3.5em;">
							<img src="<?=url('/')?>/public/img/mitra/free_user_img.png" style="width: 100%; ">
						</div>
						<img src="<?=url('/')?>/public/img/mitra/free_user_bg.png" style="width: 100%;">
						<div class="div-feature" style=" background: white; width: 100%; padding-top: 1.5em; padding-bottom: 2em; border-bottom-right-radius: 1.5em; border-bottom-left-radius: 1.5em;">
							<div class="feature">
								<i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;Lokasi
							</div>
							<div class="feature">
								<i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;Jadwal Buka Tutup
							</div>
							<div class="feature" style="color: #b3b6bc;">
								<i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;Deskripsi
							</div>
							<div class="feature" style="color: #b3b6bc;">
								<i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;Landing Page
							</div>
							<div class="feature" style="color: #b3b6bc;">
								<i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;Preorder
							</div>
							<a href="<?=url('/')?>/user/jadi-mitra/free" class="btn btn-primary" style="background: #fb036b; font-size: 0.7em; margin-top: 0.5em;border: 1px solid #fb036b; border-radius: 1.5em; padding: 0.5em 2em 0.5em 2em; width: 40%;">Daftar
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="swiper-slide" style="background: transparent; display: flex; justify-content: center; flex-direction: column;">
				<div style="width: 80%;">
					<div style="text-align: center;font-size: 0.8em; font-weight: 500; line-height: 1.2em;">Mau punya <span style="color: #e18f00;">Landing Page</span> gratis?<br>Daftar mitra Premium di kitapuramall</div>
					<div style="background: white; margin-top: 4.5em; border-radius: 1.5em; position: relative;">
						<div style="display: flex; justify-content: center; width: 100%; position: absolute; top: -3.5em;">
							<img src="<?=url('/')?>/public/img/mitra/premium_user_img.png" style="width: 100%; ">
						</div>
						<img src="<?=url('/')?>/public/img/mitra/premium_user_bg.png" style="width: 100%;">
						<div class="div-feature" style=" background: white; width: 100%; padding-top: 1.5em; padding-bottom: 2em; border-bottom-right-radius: 1.5em; border-bottom-left-radius: 1.5em;">
							<div class="feature">
								<i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;Lokasi
							</div>
							<div class="feature">
								<i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;Jadwal Buka Tutup
							</div>
							<div class="feature">
								<i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;Deskripsi
							</div>
							<div class="feature">
								<i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;Landing Page
							</div>
							<div class="feature">
								<i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;Preorder
							</div>
							<a href="<?=url('/')?>/user/jadi-mitra/premium" class="btn btn-primary" style="background: #e18f00; font-size: 0.7em; margin-top: 0.5em;border: 1px solid #e18f00; border-radius: 1.5em; padding: 0.5em 2em 0.5em 2em; width: 40%;">Daftar
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Add Pagination -->
		<div class="swiper-pagination"></div>
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

	function input_focus(id){
		$("#div_"+id).css('border', '1px solid #525f7f');

	}

	function input_blur(id){
		$("#div_"+id).css('border', '1px solid #d1d2d4');		
	}


</script>
@endsection
