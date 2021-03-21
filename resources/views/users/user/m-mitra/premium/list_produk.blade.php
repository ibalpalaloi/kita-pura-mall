@extends('layouts.home_premium')

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
		border-radius: 1em; border:1px solid white;		
		display: flex; justify-content: center; flex-direction: column; align-items: flex-start;
		background: white;
		width: 100%;
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
		width: 8.5em;		
	}

	.slider-toko img {
		width: 8.5em;
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

	.homepage {
		min-height: calc(80vh - 60px); 

	}

	.togglebutton,.togglebutton .toggle,.togglebutton input,.togglebutton label{user-select:none}
	.togglebutton label{cursor:pointer}
	.form-group.is-focused .togglebutton label,.togglebutton label{color:rgba(0,0,0,.26)}
	.form-group.is-focused .togglebutton label:focus,.form-group.is-focused .togglebutton label:hover{
		color:rgba(0,0,0,.54)
	}
	fieldset[disabled] .form-group.is-focused .togglebutton label{color:rgba(0,0,0,.26)}
	.togglebutton label input[type=checkbox]{opacity:0;width:0;height:0}
	.togglebutton label .toggle{text-align:left;margin-left:5px}
	.togglebutton label .toggle,.togglebutton label input[type=checkbox][disabled]+.toggle{
		content:"";
		display:inline-block;
		width:55px;
		height:25px;
		background-color:rgba(80,80,80,.7);
		border-radius:15px;
		margin-right:0px;
		transition:background .8s ease;vertical-align:middle
	}
	.togglebutton label .toggle:after{
		content:"";
		display:inline-block;
		width:22px;
		height:22px;
		background-color:#fff;
		border-radius:20px;
		position:relative;
		box-shadow:0 1px 3px 1px rgba(0,0,0,.4);
		margin-left: 0.3em;
		top:1px;
		border:1px solid rgba(0,0,0,.54);
		transition:left .8s ease,background .8s ease,box-shadow .1s ease
	}
	.togglebutton label input[type=checkbox][disabled]+.toggle:after,.togglebutton label input[type=checkbox][disabled]:checked+.toggle:after{background-color:#bdbdbd}
	.togglebutton label input[type=checkbox]+.toggle:active:after,.togglebutton label input[type=checkbox][disabled]+.toggle:active:after{box-shadow:0 1px 3px 1px rgba(0,0,0,.4),0 0 0 15px rgba(0,0,0,.1)}
	.togglebutton label input[type=checkbox]:checked+.toggle:after{left:25px}
	.togglebutton label input[type=checkbox]:checked+.toggle{background-color:#8a6614}
	.togglebutton label input[type=checkbox]:checked+.toggle:after{border-color:#8a6614}
	.togglebutton label input[type=checkbox]:checked+.toggle:active:after{box-shadow:0 1px 3px 1px #8a6614,0 0 0 15px rgba(156,39,176,.1)}

	.button-detail {
		display: flex;	
	}

	.button-detail > div{
		margin-right: 0.3em;
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


<header class="style__Container-sc-3fiysr-0 header" style="background:#353535; padding-top: 0.3em">
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh">
		<a href="<?=url('/')?>/akun/mitra/premium" style=" width: 15%; height: 100%; display: flex; justify-content: center; align-items: center; padding-bottom: 0.3em; padding-right: 0.7em;">
			<img src="<?=url('/')?>/public/img/back_white.svg">
		</a>
		<a id="defaultheader_logo" title="Kitabisa" style="height: 100%; width: 70%; display: flex; justify-content: center; align-items: center;">
			<img src="<?=url('/')?>/public/img/logo_premium.svg" style="height: 80%;">
		</a>
		<a style="width: 15%; height: 100%; display: flex; justify-content: center; align-items: center;">
		</a>
	</div>
</header>



<main id="homepage" class="homepage" style='background: transparent; padding: 5em 0px 0px 0px;'>
	<div>
		<img src="<?=url('/')?>/public/img/mitra/background_premium.svg" style="object-fit: cover; position: absolute; top: -2em; z-index: -2;">
	</div>
	<div>
		<div style="padding: 0px 16px 1em;">
			<h3 style="color: white;">Input Pesanan Toko</h3>
			<div class="mb-3" style=" display: flex; justify-content: space-between; align-items: center;">
				<div style="font-size: 0.8em; color: #dddddd; line-height: 1.3em;">Dengan memasukan pesanan, dapat memudahkan anda. mengidentifikasi total transaksi kamu. per/bulan/minggu/tahun.</div>
			</div>
			<div class="input-group mb-3 div-input-mall" id="div_no_hp" style="border-radius: 3em;">
				<div style="width: 100%; padding-right: 0.5em;">
					<span class="input-group-text-mall">
					</span>
					<input type="text" class="form-control-mall" id="cari_produk" name="cari_produk" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Cari produk" aria-label="Cari produk" aria-describedby="basic-addon1" value=""style="width: 100%; height: 3em; margin-right: 1em;" required>
					<div style="width: 3em; height: 3em; background: #926c15; border-radius: 50%; padding: 1.5em; display: flex; justify-content: center;align-items: center;">
						<img src="<?=url('/')?>/public/img/icon_svg/search_white.svg">
					</div>
				</div>
			</div>
			<div class="row-mall" style="padding: 0.7em 0em 0.7em 0em;">
				<div class="slider" style=" margin-top: 0em;">
					@if ($produk->count() > 0)
					@foreach($produk as $item)
					<div class="slider-toko" style="@if ($loop->iteration == 0) margin-left: 1em;@endif">
						<?php $svg = "public/img/home/bg-slider-toko.svg"; ?>
						<img src="<?=url('/')?>/public/img/toko/{{$item->toko_id}}/produk/{{$item->foto_produk}}">
						<div class="st0" style='text-align: left; font-size: 0.75em; padding: 0.6em 1em 0.7em 1em; width: 100%;color: white; background-size: cover; position: relative;'> 
							<div id="check_{{$item->id}}"style="position: absolute; top: -1.8em; z-index: 0; width: 3.5em; height: 3.5em; background: #757575; box-shadow: rgba(0, 0, 0, 0.3) 0px 2px 4px 1px; border-radius: 50%; right: 0.5em; display: flex; justify-content: center; align-items: center;" onclick='modal_pesan("{{$item->id}}", "{{$item->harga}}")'>
								<i class="fa fa-check" style="font-size: 2em;"></i>
							</div>
							<div style="font-weight: 500; margin-top: 0em;"><?=substr(strip_tags($item->nama), 0, 15)?>@if (strlen($item->nama) > 15)..@endif</div>
							<div style="font-size: 0.7em; line-height: 1.2em; font-weight: 0;">{{$item->kategori_id}}</div>

							<div style="padding: 0; margin: 0.1em 0px 0px 0px; font-size: 0.7em; line-height: 1em; vertical-align: center;">
								<s>IDR. 25.000</s>
							</div>
							<div style="padding: 0; margin: 0.1em 0px 0px 0em; font-size: 0.9em;font-weight: 500;">IDR. {{$item->harga}}</div>
						</div>
					</div> 
					@endforeach
					@else
					@endif
				</div>
			</div>
			<div class="row-mall" style="padding: 0.7em 0.5em 1.2em 0.5em;">
				<form action="<?=url('/')?>/akun/mitra/premium/simpan-pesanan" method="post">
					{{ csrf_field() }}
					<input type="text" name="jumlah_pesanan" id="input_jumlah_pesanan" value="1" hidden>
					<input type="text" name="id_produk" id="id_produk" hidden>
					<input type="text" name="harga" id="harga" hidden>
					<h4 style="color: white;">Jumlah Pesanan</h4>
					<div class="input-group mb-3 st0" id="div_kategori" style="color: white; padding: 0.5em 1em 0.5em 1em; border-radius: 0.5em; display: flex; justify-content:space-between;">
						<div style="margin-top: 0px; color: white; font-weight: 600; font-size: 0.75em;">Pesanan</div>
						<div class="button-detail">
							<div style="width: 2em; height: 2em; background: white; border-radius: 50%; color: #9d0208; text-align: center; font-size: 0.7em; padding-top: 0.3em;" onclick="kurangi_pesanan()"><i class="fa fa-minus"></i></div>
							<div style="width: 3em; height: 2em; background: white; border-radius: 2em; color: #9d0208; display: flex; justify-content: center; align-items: center; font-size: 0.7em; font-weight: 700;" id="jumlah_pesanan">1</div>
							<div style="width: 2.1em; height: 2em; background: white; border-radius: 50%; color: #9d0208; text-align: center; font-size: 0.7em; padding-top: 0.3em;" onclick="tambah_pesanan()"><i class="fa fa-plus"></i></div>
						</div>
					</div>
					<h4 style="color: white;">Ketersediaan</h4>
					<div class="input-group mb-3 st0" id="div_kategori" style="color: white; padding: 0.5em 1em 0.5em 1em; border-radius: 0.5em; display: flex; justify-content:space-between;">
						<div style="margin-top: 0px; color: white; font-weight: 600; font-size: 0.75em;">Stok</div>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitches" checked>
							<label class="custom-control-label" for="customSwitches"></label>
						</div>
					</div>
					<div>
						@php date_default_timezone_set('Asia/Makassar'); @endphp
						<h4 style="color: white;">Tanggal</h4>
						<div class="input-group mb-3 st0" id="div_tanggal" style="color: white; padding: 0.5em 1em 0.5em 1em; border-radius: 0.5em; display: flex; justify-content:space-between;">
							<input type="date" id="tanggal" name="tanggal" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="tanggal" aria-label="tanggal" aria-describedby="basic-addon1" style="width: 100%; background: transparent; color: white;" value="<?=date('Y-m-d')?>">
						</div>

					</div>
					<div>
						<h4 style="color: white;">Waktu</h4>
						<div class="input-group mb-3 st0" id="div_waktu" style="color: white; padding: 0.5em 1em 0.5em 1em; border-radius: 0.5em; display: flex; justify-content:space-between;">
							<span></span>
							<input type="time" id="waktu" name="waktu" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Nomor Handphone" aria-label="waktu" aria-describedby="basic-addon1" style="width: 100%; background: transparent; color: white;" value="<?=date('H:i')?>">
						</div>

					</div>
					<button type="submit" class="btn" style="width: 100%; margin-bottom: 1em; background: transparent;">
						<img src="<?=url('/')?>/public/img/button/toko_premium/simpan.svg" style="width: 100%;">
					</button>

				</form>
			</div>
		</div>
	</div>
</main>
@endsection

@section('footer-scripts')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script type="text/javascript">


	function tambah_pesanan(){
		var jumlah_pesanan = $("#jumlah_pesanan").html();
		// alert(jumlah_pesanan)
		$("#jumlah_pesanan").html(parseInt(jumlah_pesanan)+1);
		$("#input_jumlah_pesanan").val(parseInt(jumlah_pesanan)+1);
	}

	function kurangi_pesanan(){
		var jumlah_pesanan = $("#jumlah_pesanan").html();
		$("#jumlah_pesanan").html(parseInt(jumlah_pesanan)-1);		
		$("#input_jumlah_pesanan").val(parseInt(jumlah_pesanan)-1);		
	}


	function modal_pesan(id_produk, harga){
		@foreach($produk as $item)
			$("#check_<?=$item->id?>").css('background', '#757575');
		@endforeach
		$("#id_produk").val(id_produk);
		$("#harga").val(harga);
		$("#check_"+id_produk).css('background', '#9a7418');
	}

	function tambah_produk(){
		$('#modal-tambah').modal('show'); 
	}

	function edit_produk(id, gambar, nama, kategori, harga, stok, deskripsi){
		$("#edit_id_produk").val(id);
		$("#hapus_id_produk").val(id);
		$("#pic_edit_toko_privew").attr('src', "<?=url('/')?>/public/img/toko/"+gambar);
		$("#edit_nama_produk").val(nama);
		$("#edit_kategori").val(kategori);
		$("#edit_harga").val(harga);
		$("#edit_stok").val(stok);
		$("#edit_deskripsi").val(deskripsi);
		$("#modal-ubah").modal('show');
	}


</script>
@endsection
