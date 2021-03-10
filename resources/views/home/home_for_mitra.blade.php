@extends('layouts.home_no_menu')

@section('title')
@endsection

@section('header-scripts')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">

<style type="text/css">
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
		border-radius: 1.5em;	
		margin-bottom: 1em;
	}

	.kategori {
		padding: 0.8em 0em 1em 0em;
		display: flex; 
		position: relative; 
		top: -3em; 
		margin-bottom: -2em;
		z-index: 1;   
		overflow-y: visible; 
		overflow-x: visible; 			

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

	.div-input-mall {
		border-radius: 1.5em;
		border: 1px solid white;
		display: flex;
		justify-content: center;
		flex-direction: column;
		align-items: flex-start;
		background: white;
		padding-top: 0.3em;
		padding-bottom: 0.3em;
	}

	.div-input-mall .label-mall {
		color: #b3b6bc;
		padding: 0em 0em 0em 1.5em;
		font-size: 0.75em;
		position: relative;
		top: 0.5em;
	}

	.div-input-mall div {
		display: flex;
		justify-content: flex-start;
		flex-direction: row;
		width: 90%;
	}



	.div-input-mall-square {
		border-radius: 0.5em;
		border: 1px solid white;
		color: #1c2645;
		font-weight: 600;
	}

	.form-control-mall-square {
		border-radius: 1.5em !important;
		padding-left: 1.5em;	
	}



	.input-group-text-mall {
		border: none;
		display: flex;
		justify-content: center;
		border-bottom-left-radius: 1.5em;
		border-top-left-radius: 1.5em;
		padding-left: 0.2em;
	}

	.form-control-mall {
		height: 3em; 
		border-left: none;	
		padding-left: 1em;	
		color: #1c2645;
		font-weight: 600;
	}

	.form-control-mall-modal {
		border-radius: 1.5em !important;
		padding-left: 1.5em;	
	}

	input:focus {
		border: none;
	}

	.form-control {
		border: none;
	}


	.animate-bottom {
		position: relative;
		animation: animatebottom 0.4s;
	}

	@keyframes animatebottom {
		from {
			bottom: -200px;
			opacity: 0;
		}

		to {
			bottom: 0;
			opacity: 1;
		}
	}

	input:focus {
		border: none;
	}

	.form-control {
		border: none;
	}


	.profile-picture {
		background: transparent;
		border-radius: 50%;
		display: flex;
		width: 100%;
		border: 2px dashed white;
	}


	.select2-container--default .select2-selection--multiple .select2-selection__choice {
		background-color: #007bff;
		border-color: #006fe6;
		color: #fff;
		padding: 0 10px;
		margin-top: .31rem;
	}

	.select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
		color: rgba(255, 255, 255, .7);
		float: right;
		margin-left: 5px;
		margin-right: -2px;
	}

	.select2-container--default .select2-selection--single .select2-selection__rendered {
		height: 25px !important;
	}

	.select2-container .select2-selection--single {
		height: auto !important;
	}

	select {
		-webkit-appearance: none;
		-moz-appearance: none;
		text-indent: 1px;
		text-overflow: '';
		border: none;
		width: 100%;
		margin-left: 0.4em;
	}

	input {
		border: none;
	}


	body {
		background: #eaf4ff;
	}

	.form-group label {
		color: #b3b6bc;
		font-weight: 600;
		margin-bottom: 0.4em;	
		font-size: 0.9em;	
	}

	input[type="text"]:disabled{background-color:white;}	
</style>
@endsection

@section('content')
<?php
$pemilik = "";
$no_hp = "";
$latitude = "";
$longitude = "";
$alamat = "";
$buka = "";
$tutup = "";
$hari = "";
if (!empty($_GET['pemilik'])){
	$pemilik = $_GET['pemilik'];
}
if (!empty($_GET['no_hp'])){
	$no_hp = $_GET['no_hp'];
}

if (!empty($_GET['x'])){
	$latitude = $_GET['x'];
}
if (!empty($_GET['y'])){
	$longitude = $_GET['y'];
}
if (!empty($_GET['alamat'])){
	$alamat = $_GET['alamat'];
}
if (!empty($_GET['buka'])){
	$buka= $_GET['buka'];
}
if (!empty($_GET['tutup'])){
	$tutup = $_GET['tutup'];
}
if (!empty($_GET['hari'])){
	$hari = $_GET['hari'];
}

?>

@if(!empty($daftar_tunggu))
<div class="modal fade" id="modal-verifikasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content" style="border-radius: 1.2em; background: #ff006e; display: flex; justify-content: center; align-items: center; margin: 8em 1em 0em 1em; color: white;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: -1em; right: 0;">
				<img src="<?=url('/')?>/public/img/mitra/modal_daftar_register.svg" style="width: 80%; position: absolute; top: -16em;">
				<div style="font-size: 2em; font-weight: 600; margin-top: 1em;">Mohon Tunggu...</div>
				<div style="font-size: 1.1em; text-align: center; width: 90%; font-weight: 0; color: #ffe6f1;">kitapuramall akan mengkonfirmasi permintaan anda. mohon tunggu konfirmasi</div>
				<a href="<?=url('/')?>/akun/pengaturan-profil" style="margin-bottom: 1em; font-size: 1.1em;margin-top: 0.5em; text-align: center; text-decoration: underline; color: white;">Konfirmasi lama? Klik disini
				</a>
			</div>
		</div>
	</div>
</div>
@endif

<header class="style__Container-sc-3fiysr-0 header" >
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: space-between;">
		<a href="<?=url('/')?>/akun" style="padding-left: 1em;">
			<img src="<?=url('/')?>/public/img/back_white.svg">
		</a>
		<a id="defaultheader_logo" title="Kitabisa" style="margin-left: 20px; height:33px;margin-right:20px" href="/">
			<img src="<?=url('/')?>/public/img/logo.svg">
			<img src="<?=url('/')?>/public/img/logo_text.svg">
		</a>
		<div style="margin-right: 2.5em;">
			<img src="<?=url('/')?>/public/img/back.svg" hidden>
		</div>
	</div>
</header>



<main id="homepage" class="homepage" style="padding: 0px; background: #eaf4ff !important;">
	<div class="card-mall kategori" style="display: flex; justify-content: center; position: relative; flex-direction: column; align-items: center; background: #eaf4ff;">

		<form action="<?=url('/')?>/akun/pengaturan-profil/simpan-biodata" method="post" style="width: 90%;">
			{{csrf_field()}}
			<input type="hidden" value="PUT" name="_method">
		</form>

	</div>


</main>
<footer>
    <a href="<?=url('/')?>/akun/jadi-mitra/premium">
    <div style="display: flex;justify-content: center;">
        <button type="submit" class="btn btn-primary" style="background: #fb036b; font-size: 1em; border: 1px solid #fb036b; border-radius: 1.5em;  width: 60%; display: flex; align-items: center; justify-content: center;"><img src="<?=url('/')?>/public/img/icon_svg/folder_white.svg" style="width: 1.2em;">&nbsp;&nbsp;&nbsp;Daftar
        </button>
    </div>
    </a>
</footer>


@if(Session::has('message'))
<div id="modal-pemberitahuan" class="modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false" style="width: 100%;">
	<div class="modal-dialog modal-sm modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body text-center font-weight-bold py-3">
				{{Session::get('message')}}
				<div class="row mt-2 p-2">
					<a href="<?=url('/')?>/akun" type="button" class="col-sm-12 btn waves-effect waves-light btn-outline-secondary">Tutup</a>

				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</div>
@endif

@endsection

@section('footer-scripts')
<script src="<?=url('/')?>/public/template/admin/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>

<script type="text/javascript">
@if($daftar_tunggu)
	$('#modal-verifikasi').modal('show');
@endif
</script>

@endsection
