@extends('layouts.home_no_menu')

@section('title')
Biodata |
@endsection

@section('header-scripts')
<link rel="stylesheet" href="<?=url('/')?>/public/plugins/font-awesome/css/all.css">
<link rel="stylesheet" type="text/css" href="<?=url('/')?>/public/plugins/flickity/css/flickity.css">
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
		width: 80%; 
		padding: 0.3em 0.3em 0.3em 1.2em; 
		border-radius: 1.5em;
		margin: 0.6em;
		font-size: 1em;
	}

	.feature-premium {
		background: #d9e1eb; 
		width: 80%; 
		padding: 0.3em 0.3em 0.3em 1.2em; 
		border-radius: 1.5em;
		margin: 0.3em;
		font-size: 1em;
	}

	.carousel-cell {
		width: 100%; /* full width */
		margin-right: 10px;
		display: flex;
		flex-direction: column; 
		align-items: center;
	}	


	.flickity-button {
		display: none;
	}

	body {
		background: #eaf4ff;
	}
	/*browser fathu*/

</style>
@endsection

@section('content')
<header class="style__Container-sc-3fiysr-0 header" style="position: static; background: #eaf4ff;">
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: space-between;">
		<a href="<?=url('/')?>/user" style="padding-left: 1em;">
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



<main id="homepage" class="homepage" style="background: #eaf4ff;">
	<div class="carousel" data-flickity>
		<div class="carousel-cell" style="margin-top: 1.5em;">
			<div style="text-align: center;font-size: 1.2em; font-weight: 500; line-height: 1.2em; margin-top: 0.3em;">Daftar usaha anda<br><span style="color: #fb036b;">Gratis</span> di kitapura Mall</div>
			<div style="display: flex; justify-content: center; background: white; width: 80%; margin-top: 4em;">
				<img src="<?=url('/')?>/public/img/mitra/free_user.png" style="width: 80%; position: absolute; top: 4em;">
			</div>
			<div class="div-feature" style=" background: white; width: 80%; padding-top: 14em; padding-bottom: 2em; border-bottom-right-radius: 1.5em; border-bottom-left-radius: 1.5em;">
				<div class="feature">
					<i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;Lokasi
				</div>
				<div class="feature">
					<i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;Deskripsi
				</div>
				<div class="feature">
					<i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;Jadwal Buka Tutup
				</div>
				<a href="<?=url('/')?>/user/jadi-mitra/free" class="btn btn-primary" style="background: #fb036b; margin-top: 0.5em;border: 1px solid #fb036b; border-radius: 1.5em; padding: 0.5em 2em 0.5em 2em;">Daftar
				</a>
			</div>
		</div>
		<div class="carousel-cell" style="margin-top: 1.5em;">
			<div style="text-align: center;font-size: 1.2em; font-weight: 500; line-height: 1.2em; margin-top: 0.3em;">Tingkatkan Usaha Anda, Dengan<br>Fitur&nbsp;<span style="color: #e18f00;">Premium</span> di kitapura Mall</div>
			<div style="display: flex; justify-content: center; background: white; width: 80%; margin-top: 5em;">
				<img src="<?=url('/')?>/public/img/mitra/premium_user.png" style="width: 80%; position: absolute; top: 4em;">
			</div>
			<div class="div-feature" style=" background: white; width: 80%; padding-top: 14em; padding-bottom: 2em; border-bottom-right-radius: 1.5em; border-bottom-left-radius: 1.5em;">
				<div class="feature-premium">
					<i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;Lokasi
				</div>
				<div class="feature-premium">
					<i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;Landing Page
				</div>
				<div class="feature-premium">
					<i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;Deskripsi
				</div>
				<div class="feature-premium">
					<i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;Pre-Order
				</div>
				<div class="feature-premium">
					<i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;Jadwal Buka Tutup
				</div>
				<a href="<?=url('/')?>/user/jadi-mitra/premium/register" class="btn btn-primary" style="background: #e18f00; margin-top: 0.5em;border: 1px solid #e18f00; border-radius: 1.5em; padding: 0.5em 2em 0.5em 2em;">Daftar
				</a>
			</div>
		</div>
	</div>

</main>

@endsection

@section('footer-scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.2/flickity.pkgd.min.js"></script>
<script type="text/javascript">
	function input_focus(id){
		$("#div_"+id).css('border', '1px solid #525f7f');

	}

	function input_blur(id){
		$("#div_"+id).css('border', '1px solid #d1d2d4');		
	}
</script>
@endsection
