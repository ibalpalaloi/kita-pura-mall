@extends('layouts.home_premium')

@section('title')

@endsection

@section('header-scripts')
<?php
// fungsi untuk konversi tanggal ke indonesia
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);     
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>

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
		align-items: center; 
		margin: 0em 0em 0em 0.5em; 
	}

	.slider-toko img {
		width: 100%;
		height: 100%;
		object-fit: cover;
		border-radius: 0.5em;
	}


	.input-group-text-mall {
		border: none;
		display: flex;justify-content: center;
		border-bottom-left-radius: 0.5em; 
		border-top-left-radius: 0.5em; 
	}	


	.star-rating {
		color: #efff3b;
	}

	.star-no-rating {
		color: #c1c3be;
	}

	.button-detail {
		display: flex;	
	}

	.button-detail > div{
		margin-right: 0.3em;
	}

	.modal .fade:not(.in).bottom .modal-dialog {
		-webkit-transform: translate3d(0, 25%, 0);
		transform: translate3d(0, 25%, 0);
	}

	.homepage {
		min-height: calc(80vh - 60px); 

	}

	.form-control-mall {
		height: 2.5em; 
		border-bottom-right-radius: 0.5em; 
		border-top-right-radius: 0.5em; 
		border:  none;	
		background: #202020;
		color: white;
		font-weight: 600;
		padding: 0em 0em 0em 0.6em;	
		margin-left: 0px;
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

<div class="modal fade" id="modal-ubah-pesanan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content st0" style="border-radius: 1.2em; display: flex; justify-content: center; align-items: center; margin: 8em 1em 0em 1em; color: white; border: #353535;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: -1em; right: -0.5em; z-index: 5;">
				<img src="<?=url('/')?>/public/img/mitra/modal_simpan_toko_premium.svg" style="width: 95%; position: absolute; top: -10.5em;">
				<form action="<?=url('/')?>/akun/mitra/premium/ubah-jumlah-pesanan" method="post">
					{{csrf_field()}}
					<div style="display: flex; width: 100%; margin: 0em; cursor: pointer; border-radius: 1em; color: white; font-size: 0.8em; color: #dddddd; padding: 0.5em 1em; flex-direction: column;">
						<div style="margin-top: 1em;">
							<div>Jumlah Pesanan</div>
							<div style="padding: 1em; display: flex; background: #212020; border-radius: 0.5em; margin-top: 0.5em;">
								<div><img src="<?=url('/')?>/public/img/icon_svg/judul.svg" style="width: 100%;"></div>
								<div>
									<input type="text" name="id" id="ubah_id" hidden>
									<input type="text" name="jumlah_pesanan" id="jumlah_pesanan" style="color: white; background: transparent; font-size: 1.15em; padding-left: 0.9em;" placeholder="Jumlah Pesanan">
								</div>
							</div>
						</div>	
						<button type="submit" class="btn btn-primary" style="padding: 0px; margin-top: 1em;background: transparent; border: none;">
							<img src="<?=url('/')?>/public/img/button/toko_premium/simpan.svg" style="width: 100%; margin: 0px;">
						</button>									
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-hapus-pesanan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content st0" style="border-radius: 1.2em; display: flex; justify-content: center; align-items: center; margin: 8em 1em 0em 1em; color: white; border: #353535;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: -1em; right: -0.5em; z-index: 5;">
				<img src="<?=url('/')?>/public/img/mitra/modal_simpan_toko_premium.svg" style="width: 95%; position: absolute; top: -10.5em;">
				<form action="<?=url('/')?>/akun/mitra/premium/hapus-pesanan" method="post">
					{{csrf_field()}}
					<div style="display: flex; width: 100%; margin: 0em; cursor: pointer; border-radius: 1em; color: white; font-size: 1.5em; color: #dddddd; padding: 0.5em 1em; flex-direction: column;">
						<div style="text-align: center; margin-top: 1em; line-height: 1.2em;">Apakah Anda Ingin Menghapus Pesanan?</div>
						<div style="display: flex; justify-content: center; margin-top: 0.5em;">
							<input type="text" name="id" id="hapus_id" hidden>

							<div class="btn btn-secondary" style="width: 30%; margin-right: 1em;" data-dismiss="modal">Tidak</div>
							<button class="btn btn-primary" style="width: 30%;">Ya</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@if(Session::get('message') == 'Pesanan Berhasil Dihapus')
<div class="modal fade" id="modal-notif-hapus-pesanan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content st0" style="border-radius: 1.2em; display: flex; justify-content: center; align-items: center; margin: 8em 1em 0em 1em; color: white; background-color: #353535;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: -1em; right: -4em;">
				<img src="<?=url('/')?>/public/img/mitra/modal_trash.svg" style="width: 120%; position: absolute; top: -8em;">
				<div style="font-size: 1.8em; font-weight: 600; margin-top: 1em;">Dihapus</div>
				<div style="font-size: 1em; text-align: center; width: 100%; font-weight: 0; color: #ffe6f1; margin-bottom: 0.5em;">pesanan berhasil dihapus</div>
			</div>
		</div>
	</div>
</div>
@endif
@if(Session::get('message') == 'Pesanan Berhasil Ditambahkan')
<div class="modal fade" id="modal-notif-tambah-pesanan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content st0" style="border-radius: 1.2em; display: flex; justify-content: center; align-items: center; margin: 8em 1em 0em 1em; color: white; background-color: #353535;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: -1em; right: -4em;">
				<img src="<?=url('/')?>/public/img/mitra/modal_sukses.svg" style="width: 120%; position: absolute; top: -11em;">
				<div style="font-size: 1.8em; font-weight: 600; margin-top: 1em;">Berhasil</div>
				<div style="font-size: 1em; text-align: center; width: 100%; font-weight: 0; color: #ffe6f1; margin-bottom: 0.5em;">pesanan berhasil ditambahkan</div>
			</div>
		</div>
	</div>
</div>
@endif


<header class="style__Container-sc-3fiysr-0 header" style="background: #353535; padding-top: 0.3em">
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh">
		<a href="<?=url('/')?>/akun/mitra/premium" style=" width: 15%; height: 100%; display: flex; justify-content: center; align-items: center; padding-bottom: 0.3em; padding-right: 0.7em;">
			<img src="<?=url('/')?>/public/img/back_white.svg">
		</a>
		<a id="defaultheader_logo" title="Kitabisa" style="height: 100%; width: 70%; display: flex; justify-content: center; align-items: center;">
			<img src="<?=url('/')?>/public/img/logo_premium.svg" style="height: 80%;">
		</a>
		<a style="width: 15%; height: 100%; display: flex; justify-content: center; align-items: center;">
			<img src="<?=url('/')?>/public/img/icon_svg/riwayat_circle.svg">
		</a>
	</div>
</header>



<main id="homepage" class="homepage" style='background: transparent; padding: 5em 0px 6em 0px;'>
	<div>
		<div style="padding: 0px 16px 1em;">
			<h3 style="color: white; font-size: 1.75rem; font-weight: 500;">Laporan</h3>
			<div style=" display: flex; justify-content: space-between; align-items: center;">
				<div style="font-size: 1em; line-height: 1.2em; color: #a1a4a8;">Statistik</div>			
			</div>
			<div style="display: flex; flex-direction: column; justify-content: center; color: white; align-items: center;">
				<div style="display: flex; justify-content: space-around; width: 100%;">
					<div>
						<div>Pemasukan</div>
						<div>Rp. 5.000.000</div>
					</div>
					<div>
						<div>Pengeluaran</div>
						<div>Rp. 3.000.000</div>
					</div>
				</div>
				<div>Untung : Rp. 2.000.000</div>
			</div>
			<div class="input-group mb-3 st0" id="div_kategori_pemasukan" style="color: white; padding: 0.5em 1em 0.5em 1em; border-radius: 0.5em; margin-top: 1em;">
				<div style="margin-top: 0px; color: white; font-weight: 600; font-size: 0.75em;">Pilih Tanggal Laporan</div>
				<div style="display: flex; justify-content: flex-start; width: 100%; margin: 0.2em 0em 0.3em 0em;">
					<span class="input-group-text-mall" style="width: 3em; background: #202020;">
						<img src="<?=url('/')?>/public/img/icon_svg/kategori_white.svg" style="width: 60%;">
					</span>
					<select type="text" class="form-control-mall" onchange="pilih_rentan_tanggal()" id="rentan_tanggal" name="rentan_tanggal" style="height: 2.5em;">
						<option value="Hari ini">Hari ini</option>
						<option value="7 Hari Terakhir">7 Hari Terakhir</option>
						<option value="30 Hari Terakhir">30 Hari Terakhir</option>
						<option value="Semua">Semua</option>
						<option value="Pilih Tanggal">Pilih Tanggal</option>
					</select>
				</div>
			</div>
			<div class="input-group mb-3 st0" id="div_rentan_tanggal" style="color: white; padding: 0.5em 1em 0.5em 1em; border-radius: 0.5em; display: flex; justify-content: space-between;" hidden>
				<div style="width: 48%;">
					<div style="margin-top: 0px; color: white; font-weight: 600; font-size: 0.75em;">Tanggal Mulai</div>
					<div style="display: flex; justify-content: flex-start; width: 100%; margin: 0.2em 0em 0.3em 0em; ">
						<input type="date" class="form-control-mall" id="tanggal_mulai" name="tanggal_mulai" aria-label="Tanggal mulai" aria-describedby="basic-addon1" style="width: 100%; color: white; border-radius: 0.5em;" value="<?=date('Y-m-d')?>">
					</div>
				</div>
				<div style="width: 48%">
					<div style="margin-top: 0px; color: white; font-weight: 600; font-size: 0.75em;">Tanggal Akhir</div>
					<div style="display: flex; justify-content: flex-start; width: 100%; margin: 0.2em 0em 0.3em 0em; ">
						<input type="date" class="form-control-mall" id="tanggal_akhir" name="tanggal_akhir" aria-label="Tanggal akhir" aria-describedby="basic-addon1" style="width: 100%; color: white; border-radius: 0.5em;" value="<?=date('Y-m-d')?>">
					</div>
				</div>
			</div>			
		</div>
		<table class="table" style="color: white;">
			<thead>
				<tr>
					<th>Transaksi</th>
					<th style="text-align: right;">Pemasukan</th>
					<th style="text-align: right;">Pengeluaran</th>
				</tr>
			</thead>
			<tbody id="body_transaksi">
				@foreach ($transaksi as $row)
				<tr>
					<td><div style="line-height: 0.5em; padding-top: 0.5em;">{{$row->kategori}}</div>
						<small style="font-size: 0.65em;">{{tgl_indo(date('Y-m-d', strtotime($row->tanggal)))}}</small>
					</td>
					@if ($row->jenis == 'Pemasukan')
					<td style="text-align: right;">{{number_format($row->harga_total,0,',','.')}}</td>
					<td style="text-align: right; padding-right: 3em;">-</td>
					@else
					<td style="text-align: right; padding-right: 2em;">-</td>
					<td style="text-align: right; padding-right: 1.2em;">{{number_format($row->harga_total,0,',','.')}}</td>
					@endif
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
</main>
<div class="footer st0">
	<a href="<?=url('/')?>/akun/mitra/premium/transaksi/tambah-transaksi" class="container-mall" style="display: flex; justify-content: space-around; padding: 0px;">
		<img src="<?=url('/')?>/public/img/button/toko_premium/input_pesanan.svg" style="width: 100%;">
	</a>
</div>
@endsection

@section('footer-scripts')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script type="text/javascript">


	function pilih_rentan_tanggal(){
		var rentan_tanggal = $("#rentan_tanggal").val();
		if (rentan_tanggal == 'Pilih Tanggal'){
			$("#div_rentan_tanggal").prop('hidden', false);
		}
		else {

			$.ajax({
				url : "{{ route('pilih_rentan_tanggal') }}",
				method : 'post',
				data : {rentan:rentan_tanggal, _token:'{{csrf_token()}}'},
				success:function(data)
				{
					$("#body_transaksi").html(data);
				}
			})
			$("#div_rentan_tanggal").prop('hidden', true);			
		}
	}


</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

@endsection
