@extends('layouts.home_no_menu')

@section('title')

@endsection

@section('header-scripts')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<style type="text/css">
	.banner {
		max-width: 480px;
		width: 100%;
		margin: 0px auto;
		padding: 4em 0em 4em 0em;
	}

	.header {
		background: #ffaa00;
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
		border-radius: 1.5em; border:1px solid white;		
		display: flex; justify-content: center; flex-direction: column; align-items: flex-start;
		background: white;
		padding-top: 0.3em;
		padding-bottom: 0.3em;
	}

	.div-input-mall > span {
		color: #b3b6bc;
		padding: 0em 0em 0em 1.5em; 
		font-size: 0.75em;
		position: relative;
		top: 0.5em;
	}

	.div-input-mall div {
		display: flex; justify-content: center; flex-direction: row;
		width: 90%;
	}



	.div-input-mall-square {
		border-radius: 0.5em; border:1px solid white;	
		color: #1c2645;
		font-weight: 600;			
	}

	.form-control-mall-square {
		border-radius: 1.5em !important;
		padding-left: 1.5em;
	}


	.input-group-text-mall {
		border: none;
		display: flex;justify-content: center;
		border-bottom-left-radius: 1.5em; 
		border-top-left-radius: 1.5em; 
		padding-left: 1.2em;
	}


	.form-control-mall {
		height: 2.5em; 
		border-bottom-right-radius: 1.5em; 
		border-top-right-radius: 1.5em; 
		border:  none;	
		color: #1c2645;
		font-weight: 600;
		padding: 0em 0em 0em 0.6em;	

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
		animation: animatebottom 0.4s;
	}

	@keyframes animatebottom {
		from {
			bottom: -300px;
			opacity: 0;
		}

		to {
			bottom: 0;
			opacity: 1;
		}
	}

	.modal-dialog-bottom{
		margin: 0;
		display: flex;
		align-items: flex-end;
		height: 100%;

	}  




	.select2-container--default .select2-selection--multiple .select2-selection__choice {
		background-color: #007bff;
		border-color: #006fe6;
		color: #fff;
		padding: 0 10px;
		margin-top: .31rem;        
	}

	.select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
		color: rgba(255,255,255,.7);
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

	.btn-menu-analitik {
		color: #a1a4a8; 
		margin: 0em 0.3em 0em 0.3em; 
		background: white; 
		padding: 0.3em 1.3em 0.3em 1.3em; 
		border-radius: 2em;		
	}

	.analitik-active {
		color: white;
		background: #ffaa00;
	}

	.card-menu-premium {
		background: white; 
		display: flex; 
		justify-content: center; 
		margin-top: .5em; 
		flex-direction: column; 
		align-items: center;		
		border-radius: 1.5em;
	}

	.modal .close {
		right: -1.3em !important;
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
		width: 47.5%;		
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

	.modal .fade:not(.in).bottom .modal-dialog {
		-webkit-transform: translate3d(0, 25%, 0);
		transform: translate3d(0, 25%, 0);
	}


</style>
@endsection



@section('content')
<?php
$pemilik = "";
$no_hp = "";
$kategori="";
$latitude = "";
$longitude = "";
$alamat = "";
$buka = "";
$tutup = "";
$hari = "";
$deskripsi = "";
if (!empty($_GET['pemilik'])){
	$pemilik = $_GET['pemilik'];
}
if (!empty($_GET['no_hp'])){
	$no_hp = $_GET['no_hp'];
}
if (!empty($_GET['kategori'])){
	$kategori = $_GET['kategori'];
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
if (!empty($_GET['deskripsi'])){
	$hari = $_GET['deskripsi'];
}
?>


<div class="modal fade" id="modal-trigger-location" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-bottom" role="document" style="padding: 0px;">
		<div class="modal-content" style="border-radius: 1.2em; background: #eaf4ff; display: flex; justify-content: center; align-items: center; border-bottom-left-radius: 0em; border-bottom-right-radius: 0em;">
			<div class="modal-body">
				<div>
					<div class="nama-toko" style="font-weight: 600; font-size: 1em; line-height: 1.1em; font-size: 1.2em;">Silahkan Masukan Jadwal<br>Buka/Tutup Usaha Anda</div>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>

				</div>
			</div>
			<div id="jadwal_fix" style="width: 100%; display: flex; justify-content: center; flex-direction: column; align-items: center;">
				@php
				$var_value = array("SH", "SS", "SJ", "S", "S", "R", "K", "J", "S", "M");
				$var_text = array("Setiap-Hari", "Senin-Sabtu", "Senin-Jumat", "Senin", "Selasa", "Rabu", "Kamis","Jumat", "Sabtu", "Minggu");
				@endphp
				<?php 
				$loop_hari = explode("~", $hari);
				$loop_buka = explode("~", $buka);
				$loop_tutup = explode("~", $tutup);
				for ($i = 0; $i < count($loop_hari); $i++){
					?>
					@if ($loop_hari[0] != "")
					<div class="input-group mb-3 div-input-mall-square" id="{{str_replace(' ', '_', $loop_hari[$i])}}" style="width: 90%; background: white; border: 1px solid white;">
						<div style="width: 20%; display: flex; justify-content: center; margin-left: 3%;">
							<div style="width: 2.5em; height: 2.5em; background:#ffaa00; margin: 0.5em; border-radius: 50%; vertical-align: middle; color: white; padding: 0;line-height: 2.3em;">
								@for ($j = 0; $j < count($var_text); $j++)
								@if ($var_text[$j] == $loop_hari[$i])
								{{$var_value[$j]}}
								@endif
								@endfor
							</div>
						</div>
						<div style="margin-left: 2%; width: 60%;">
							<div style="margin-top: 0.5em; font-weight: 700; text-align: left;">{{$loop_hari[$i]}}</div>
							<div style="font-size: 0.7em; text-align: left;">{{$loop_buka[$i]}} - {{$loop_tutup[$i]}}</div>
						</div>
						<div onclick='hapus_jadwal("{{$loop_hari[$i]}}")' style="width: 15%; cursor: pointer; display: flex; align-items: center; background: #ffaa00; justify-content: center; border-top-right-radius: 0.5em; border-bottom-right-radius: 0.5em; color: white; font-weight:700; font-size: 1.2em;">X</div>
					</div>
					@endif
					<?php
				}
				?>
			</div>
			<div id="jadwal_sample" style="width: 100%; display: flex; justify-content: center;" hidden>
				<div class="input-group mb-3 div-input-mall-square" id="harinya" style="width: 90%; background: white; border: 1px solid white;">
					<div style="width: 20%; display: flex; justify-content: center; margin-left: 3%;">
						<div style="width: 2.5em; height: 2.5em; background:#ffaa00; margin: 0.5em; border-radius: 50%; vertical-align: middle; color: white; padding: 0;line-height: 2.3em; text-align: center;">simbolnya</div>
					</div>
					<div style="margin-left: 2%; width: 60%;">
						<div style="margin-top: 0.5em; font-weight: 700; text-align: left;">harinya</div>
						<div style="font-size: 0.7em; text-align: left;">jamnya</div>
					</div>
					<div onclick='hapus_jadwal("harinya")' style="width: 15%; cursor: pointer; display: flex; align-items: center; background: #ffaa00; justify-content: center; border-top-right-radius: 0.5em; border-bottom-right-radius: 0.5em; color: white; font-weight:700; font-size: 1.2em;">X</div>
				</div>
			</div>
			<hr style="border-top: 1px solid #c8d2dd; width: 100%;">
			<div class="input-group mb-3 div-input-mall" id="div_no_hp" style="width: 90%;">
				<select type="text" class="form-control form-control-mall-modal" id="jadwal" name="jadwal" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" aria-label="jadwal" aria-describedby="basic-addon1" style="width: 100%; text-align: center !important;">
					@for ($i = 0; $i < count($var_text); $i++)
					@php $indikator = false; @endphp
					@for ($j = 0; $j < count($loop_hari); $j++)
					@if ($loop_hari[$j] == $var_text[$i]) 
					@php $indikator = true; @endphp
					@endif
					@endfor
					@if ($indikator == false)
					<option value="{{$var_value[$i]}}">{{$var_text[$i]}}</option>
					@endif
					@endfor
				</select>			
			</div>
			<div style="width: 90%; display: flex; justify-content: space-between;">
				<div class="input-group mb-3 div-input-mall" id="div_no_hp" style="width: 48%;">
					<input type="time" class="form-control form-control-mall-modal"id="waktu_buka" min="09:00" max="18:00" required style="width: 100%; height: auto !important;">
				</div>
				<div class="input-group mb-3 div-input-mall" id="div_no_hp" style="width: 48%;">
					<input type="time" class="form-control form-control-mall-modal"id="waktu_tutup"  min="09:00" max="18:00" required style="width: 100%; height: auto !important;" >
				</div>
			</div>
			<button onclick="tambah_jadwal()" class="btn btn-primary" style="background: #ffaa00;;border: 1px solid #ffaa00; border-radius: 1.5em; padding: 0.5em 2em 0.5em 2em; width: 90%; margin-bottom: 1em;">Tambah Jadwal
			</button>
		</div>
	</div>
</div>


<header class="style__Container-sc-3fiysr-0 header" style="background: white;">
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: space-between;">
		<a href="<?=url('/')?>/akun" style="padding-left: 1em;">
			<img src="<?=url('/')?>/public/img/back_black.svg">
		</a>
		<a id="defaultheader_logo" title="Kitabisa" style="margin-left: 20px; height:33px;margin-right:20px" href="/">
			<img src="<?=url('/')?>/public/img/logo_black.svg">
			<img src="<?=url('/')?>/public/img/logo_text_black.svg">
		</a>
		<div style="margin-right: 2.5em;">
			<img src="<?=url('/')?>/public/img/back.svg" hidden>
		</div>
	</div>
</header>



<main id="homepage" class="homepage" style="padding-top: 4em; background: #eaf4ff;">
	<div style="display: flex; justify-content: center; flex-direction: column;">
		<h5 style="text-align: left; width: 100%; margin-top: 1em; padding-left: 0.1em; font-weight: 640;">Atur Produk</h5>
		<div class="input-group mb-3 div-input-mall" id="div_nama_pemilik" style="border-radius: 0.5em; padding: 0.1em 0em 0.1em 0em;">
			<div style="padding-left: 0.5em; width: 100%;">
				<input type="text" class="form-control-mall" id="nama_pemilik" name="nama_pemilik" placeholder="Masukan nama pemilik" aria-label="Nama Pemilik" aria-describedby="basic-addon1" value="{{$pemilik}}" style="width: 100%;" required>
				<span style="width: 3em; display: flex; justify-content: center;">
					<img src="<?=url('/')?>/public/img/icon_svg/pencarian.svg" style="width: 45%;">
				</span>

			</div>
		</div>
		<h7 style="text-align: left; width: 100%; padding-left: 0.1em; font-weight: 640; margin-bottom: 0.5em;">Produk</h7>
		<div style="width: 100%; display: flex; flex-wrap: wrap; justify-content: space-between; padding-left: 0em;">
			@php
			$digital = array('TKO-1204012490124/product_1.png', 'TKO-1204012490124/product_2.png', 'TKO-1204012490124/product_3.png', 'TKO-1204012490124/product_4.png', 'TKO-1204012490124/product_1.png', 'TKO-1204012490124/product_2.png');
			$nama_digital = array('Bakso', 'Sate', 'Nasi Goreng', 'Mie Ayam', 'Bakso', 'Sate');
			$kategori_toko = array('Makanan', 'Makanan', 'Makanan', 'Makanan', 'Makanan', 'Makanan');
			
			$jumlah_digital = count($digital)-1;
			@endphp 

			@for ($i = 0; $i < count($digital); $i++)  
			<div class="slider-toko" style="margin-bottom: 1em; margin-left: 0px;">
				<?php $svg = "public/img/home/bg-slider-toko.svg"; ?>
				<img src="<?=url('/')?>/public/img/product/{{$digital[$i]}}">
				<div style='text-align: left; font-size: 0.75em; padding: 0.6em 1em 0.7em 1em; width: 100%; background: #9d0208; color: white; background-size: cover; position: relative;'> 
					<div style="position: absolute; top: -1.8em; z-index: 0; width: 3.5em; height: 3.5em; background: #ed9f01; box-shadow: rgba(0, 0, 0, 0.3) 0px 2px 4px 1px; border-radius: 50%; right: 0.5em; display: flex; justify-content: center; align-items: center;">
						<img src="<?=url('/')?>/public/img/icon_svg/pencil.svg" style="width: 1.5em; height: 1.5em;">
					</div>
					<div style="font-weight: 500; margin-top: 0em;"><?=substr(strip_tags($nama_digital[$i]), 0, 15)?>@if (strlen($nama_digital[$i]) > 15)..@endif</div>
					<div style="font-size: 0.7em; line-height: 1.2em; font-weight: 0;">{{$kategori_toko[$i]}}</div>


					<span style="padding: 0; margin: 0.1em 0px 0px 0px; font-size: 0.6em; line-height: 0.7em; vertical-align: center;">
						<s>IDR. 25.000</s>
					</span>
					<span style="padding: 0; margin: 0.1em 0px 0px 0.5em; font-size: 0.9em; line-height: 0.6em; font-weight: 500;">IDR. 5.000</span>
					<div style="padding: 0; margin: 0.5em 0px 0px 0px; font-size: 0.7em; line-height: 0.5em;">
						Stok : 42
					</div>
				</div>
			</div> 
			@endfor
		</div>
		<div class="btn btn-success" onclick="tambah_produk()"><img src="<?=url('/')?>/public/img/icon_svg/plus.svg"></div>

	</div>
</main>

@endsection

@section('footer-scripts')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script type="text/javascript">

	function tambah_foto_toko(){
		$("#foto_toko").click();
	}	

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#pic_toko_privew').attr('src', e.target.result);
				$("#div_pic_toko_privew").prop('hidden', false);
				$("#div_pic_toko").prop('hidden', true);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#foto_toko").change(function(){
		readURL(this);
	});

	function input_focus(id){
		$("#div_"+id).css('border', '1px solid #d1d2d4');
	}

	function input_blur(id){
		$("#div_"+id).css('border', '1px solid white');		
	}		




	function tambah_produk(){
		$('.modal').modal('show'); 
	}


</script>
@endsection
