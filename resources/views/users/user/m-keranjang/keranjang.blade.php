@extends('layouts.home_no_menu')

@section('title')
@endsection

@section('header-scripts')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">


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

	.cr-slider-wrap {
		display: none;
	}

	.homepage {
		min-height: calc(50vh - 60px);
	}

	input[type=checkbox] {
		transform: scale(1.4);
		margin-top: 0.8em;
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
		width:10em !important;		
	}

	.slider-toko img {
		/*width: 5em;/*/
		/*height: 5em;*/
		/*border-top-left-radius: 1em;*/
		/*border-top-right-radius: 1em;*/
		border-radius: 1em;
	}

	.slider-toko > div {
		height: 3em;
		background: linear-gradient(-180deg, rgba(0, 0, 0, 0) 2.98%, #000000 80%);
		border-bottom-left-radius: 1em;
		border-bottom-right-radius: 1em;
	}

	.report-modal-body {
		/*max-height:calc(100px);*/
		overflow-y:auto;
		overflow-x:auto;
	}
	.report-pre {
		width:100%;
		overflow-x:auto;
		word-wrap:normal;
		margin:1px;
	}

	.kategori-tabs {
		display: flex; 
		justify-content: space-between; 
		width: 100%;
		margin-bottom: 0.2em;
	}

	.kategori-tabs > div {
		width: 33%;
		padding: 1.8em;
		font-size: 0.9em;
		display: flex; justify-content: center;
		flex-direction: column; align-items: center;
		background: white;
	}


</style>
<script type="text/javascript">
	const formatToCurrency = amount => {
		return "IDR " +amount.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.")
		// return "IDR. " + amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
	};	
</script>
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
@if ($page->warna_header == '#9d0208')
<div class="modal fade" id="modal-keranjang-black" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content" style="border-radius: 1.2em; background: transparent; display: flex; justify-content: center; align-items: center; margin: 0em 0em 0em 0em; color: white; border: none; box-shadow: none;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: 30%; right: 1em;">
				<img src="<?=url('/')?>/public/img/modal_assets/modal_confirm_red.svg" style="width: 100%;">
				<div style="position: absolute; margin: 3% 1.5em 0em 1.5em; padding: 0em 1.5em 0em 1.5em; top: 55%;">
					<div style="font-size: 2em; font-weight: 600; text-align: center;">Yakin ?</div>
					<div style="font-size: 1em; text-align: center; width: 90%; font-weight: 0; color: white; margin-bottom: 1.2em;">Apakah kamu yakin menghapus data ini ?</div>
					<form style="display: flex; justify-content: center;" method="post" action="<?=url('/')?>/user/keranjang/hapus_keranjang">
						@csrf
						<input id="id_keranjang" name="id_keranjang" hidden>
						<button type="submit" class="btn" style="background: #A00007; padding: 0.3em 2em; border-radius: 1.5em; font-size: 1.2em; margin-right: 0.5em; color: white;">Ya</button>
						<div data-dismiss="modal" style="background: #FFAA00; padding: 0.3em 1.5em; border-radius: 1.5em; font-size: 1.2em; margin-left: 0.5em;">Tidak</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@else
<div class="modal fade" id="modal-keranjang-black" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content" style="border-radius: 1.2em; background: transparent; display: flex; justify-content: center; align-items: center; margin: 0em 0em 0em 0em; color: white; border: none; box-shadow: none;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: 30%; right: 1em;">
				<img src="<?=url('/')?>/public/img/modal_assets/modal_confirm_black.svg" style="width: 100%;">
				<div style="position: absolute; margin: 3% 1.5em 0em 1.5em; padding: 0em 1.5em 0em 1.5em; top: 55%;">
					<div style="font-size: 2em; font-weight: 600; text-align: center;">Yakin ?</div>
					<div style="font-size: 1em; text-align: center; width: 90%; font-weight: 0; color: white; margin-bottom: 1.2em;">Apakah kamu yakin menghapus data ini ?</div>
					<form style="display: flex; justify-content: center;" method="post" action="<?=url('/')?>/user/keranjang/hapus_keranjang">
						@csrf
						<input id="id_keranjang" name="id_keranjang" hidden>
						<button type="submit" class="btn" style="background: #525B5C; padding: 0.3em 2em; border-radius: 1.5em; font-size: 1.2em; margin-right: 0.5em; color: white;">Ya</button>
						<div data-dismiss="modal" style="background: #FFAA00; padding: 0.3em 1.5em; border-radius: 1.5em; font-size: 1.2em; margin-left: 0.5em;">Tidak</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endif



<div class="modal fade" id="modal_pesan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<form action="<?=url('/')?>/user/keranjang/pesan" method="post" id="form_pesan">
				<div class="modal-header">
					<h5 class="modal-title" id="modal_nama_toko"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
							<circle cx="14.5" cy="14.5" r="14.5" fill="#CDCDCD"/>
							<rect x="17.7637" y="9.90234" width="2.22343" height="11.1171" rx="1.11171" transform="rotate(45 17.7637 9.90234)" fill="white"/>
							<rect x="19.3359" y="17.7637" width="2.22343" height="11.1171" rx="1.11171" transform="rotate(135 19.3359 17.7637)" fill="white"/>
							<circle cx="14.4998" cy="14.4998" r="10.1707" stroke="#E4E4E4" stroke-width="3"/>
						</svg>
					</button>
				</div>
				<pre class="report-pre modal-body report-modal-body">
					<div class="slider" style="margin-top: 0em; margin-bottom: 0px; position: relative; top: -1.5em;">


					</div>
				</pre>
				<div class="modal-body" style="padding-top: 0px; position: relative; top: -5em; margin-bottom: -5em;">
					{{ csrf_field() }}
					<hr>

					<h5 class="modal-title" style="margin-bottom: 0.3em;">Metode Pengiriman</h5>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="metode_pengiriman" id="exampleRadios1" value="Ambil" checked>
						<label class="form-check-label" for="exampleRadios1" >
							Ambil Sendiri
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="metode_pengiriman" id="exampleRadios2" value="Antar">
						<label class="form-check-label" for="exampleRadios2">
							Antar
						</label>
					</div>
					<hr>
					<h5 class="modal-title" style="margin-bottom: 0.3em;">Metode Pembayaran</h5>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="metode_pembayaran" id="exampleRadios1" value="COD" checked>
						<label class="form-check-label" for="exampleRadios1" >
							COD
						</label>
					</div>
					<hr>
					<h5 class="modal-title" style="margin-bottom: 0.3em;">Alamat</h5>

					@if(Auth()->user()->biodata->alamat == "")
					<div class="form-group">
						<input type="text" class="form-control" name="alamat" id="exampleFormControlInput1" placeholder="Masukkan Alamat">
					</div>
					@else
					<div class="form-check">
						<input class="form-check-input" type="radio" name="radio_alamat" id="alamat_sekarang" value="{{Auth()->user()->biodata->alamat}}" checked>
						<label class="form-check-label" for="exampleRadios1" >
							{{Auth()->user()->biodata->alamat}}
						</label>

					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="radio_alamat" id="radio_alamat_lain" value="alamat lain">
						<label class="form-check-label" for="exampleRadios1" >
							Alamat Lain
						</label>
						<div id="form_isi_alamat" class="form-group" hidden>
							<input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat" value="{{Auth()->user()->biodata->alamat}}">
						</div>
					</div>
					@endif
					<input type="text" name="no_hp" value="{{Auth()->user()->no_hp}}" hidden>					
					<div style="width: 100%; display: flex; justify-content: center; margin-top: 2em;">
						<div onclick="post_pesanan()" class="" style="width: 100%; background: {{$page->warna_header}}; border-radius: 35px; padding: 0.5em; color: white; text-align: center; margin-bottom: 1em; position: relative;">
							<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" style="position: absolute;left: 2em; top: 0.8em;">
								<path d="M0.459623 5.9864C0.0681228 5.8559 0.0643728 5.64515 0.467123 5.5109L14.7824 0.739402C15.1791 0.607402 15.4064 0.829402 15.2954 1.2179L11.2049 15.5324C11.0924 15.9292 10.8636 15.9427 10.6956 15.5662L8.00012 9.50015L12.5001 3.50015L6.50012 8.00015L0.459623 5.9864Z" fill="white"/>
							</svg>

							<span>Kirim Pesanan</span>
						</div>
					</div>

				</div>
			</form>
		</div>
	</div>
</div>

<header class="style__Container-sc-3fiysr-0 header" style="background: white; padding-top: 0.3em;">
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh" >
		<a class="svg_color" href="javascript:history.back()" style=" width: 10%; height: 100%; display: flex; justify-content: center; align-items: center; margin-right: ">
			<svg width="13" height="21" viewBox="0 0 13 21" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M1.09413 11.5312C0.524614 10.9617 0.524613 10.0383 1.09413 9.46882L9.84413 0.718824C10.4136 0.149308 11.337 0.149308 11.9065 0.718824C12.476 1.28834 12.476 2.2117 11.9065 2.78122L4.18772 10.5L11.9065 18.2188C12.476 18.7883 12.476 19.7117 11.9065 20.2812C11.337 20.8507 10.4136 20.8507 9.84413 20.2812L1.09413 11.5312Z" fill="{{$page->warna_header}}"/>
				</svg>
			</a>
			<a style="height: 100%; width: 80%; display: flex; justify-content: center; align-items: center; font-size: 1.5em; font-weight: 600; color: {{$page->warna_header}}">
				Keranjang

			</a>
			<div style="width: 10%; color: white">.</div>
		</div>
	</header>
	<main id="homepage" class="homepage" style="padding: 0px; background: #eaf4ff !important;">
		<div id="data_content" style="display: flex; justify-content: center; position: relative; flex-direction: column; align-items: center; background: white; margin-top: 4.5em; background: #eaf4ff;">
			
			@include('users.user.m-keranjang.data_keranjang')
		</div>
	</main>

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

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		// const formatToCurrency = amount => {
		// 	return "IDR." + amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "&,");
		// };

		var isMobile = mobilecheck();

		function pindah_halaman(status){
			$.ajax({
				url: "?halaman="+status,
				type: "get",
				success: function (data) {
					console.log(data);
					$('#data_content').empty();
					$('#data_content').html(data.html);
				}
			})
		}

		function modal_pesan(nama_toko){
		}

		$('#radio_alamat_lain').change(function(){
			$('#form_isi_alamat').attr('hidden',false);
			$('#alamat').val('');
		});

		$('#alamat_sekarang').change(function(){
			$('#form_isi_alamat').attr('hidden',true);
			$('#alamat').val($('#alamat_sekarang').val());
		});

		

		function checkbox_check(id, harga, id_product){
			var jumlah = parseInt($("#jumlah_pesanan_"+id).html())*parseInt(harga);
			if ($('#checkbox_'+id).is(':checked')) {
				sub_total[id_product] = sub_total[id_product]+jumlah;
			}
			else {
				sub_total[id_product] = sub_total[id_product]-jumlah;				
			}
			$("#sub_total_"+id_product).html(formatToCurrency(sub_total[id_product]));

		}


		function checkbox_check_current(id, harga, id_product){
			var jumlah = parseInt($("#jumlah_pesanan_"+id).html())*parseInt(harga);
			// alert(jumlah);
			if ($('#checkbox_'+id).is(':checked')) {
				sub_total_current[id_product] = sub_total_current[id_product]+jumlah;
			}
			else {
				sub_total_current[id_product] = sub_total_current[id_product]-jumlah;				
			}
			$("#sub_total_current_"+id_product).html(formatToCurrency(sub_total_current[id_product]));

		}

		function hapus_keranjang(id){
			$("#id_keranjang").val(id);
			$("#modal-keranjang-black").modal('show');
		}

		function mobilecheck() {
			var check = false;
			(function (a) {
				if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i
					.test(a) ||
					/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| ||a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i
					.test(a.substr(0, 4))) check = true;
			})(navigator.userAgent || navigator.vendor || window.opera);
			return check;
		}

		var pesan_id_toko;
		var pesan_id_keranjang = [];
		var pesan_keynota;

		function WhatsappMessage(no_hp, nama, id_toko, current) {
			var apilink = 'http://';
			var phone = no_hp;
			var produk = "";
			var jumlah_pesanan = "";
			var nama_produk = "";
			var keynota = "";
			var gambar_produk;
			// alert(id_toko);
			if (current == 'yes'){
				var result = sub_keranjang_current[id_toko].split("~");
				var harga_sub_total = $("#sub_total_current_"+id_toko).html();
				var harga_sub_total_wa = sub_total_current[id_toko];
			}
			else {
				var result = sub_keranjang[id_toko].split("~");
				var harga_sub_total = $("#sub_total_"+id_toko).html();
				var harga_sub_total_wa = sub_total[id_toko];
			}
			
			for (var i = 0; i < result.length-1; i++){
				if ($('#checkbox_'+result[i]).is(':checked')) {
					jumlah_pesanan = $("#jumlah_pesanan_"+result[i]).html();
					nama_produk = $("#nama_"+result[i]).html();
					gambar_produk = $("#gambar_"+result[i]).attr('src');
					produk += '<div class="slider-toko">'+
					'<img src="'+gambar_produk+'" style="width: 100%;">'+
					'<div style="text-align: left; font-size: 0.75em; padding: 0.6em 1em 0.7em 1em; width: 100%;color: white; background-size: cover; position: relative; top: -2.5em;">'+ 
					'<div id="check_1" style="position: absolute; top: -1.8em; z-index: 0; width: 3.5em; height: 3.5em; background: #757575; box-shadow: rgba(0, 0, 0, 0.3) 0px 2px 4px 1px; border-radius: 50%; right: 0.5em; display: flex; justify-content: center; align-items: center;">'+jumlah_pesanan+
					'</div>'+
					'<div style="font-weight: 500; margin-top: 0em;">'+nama_produk.trim()+'</div>'+
					'</div>'+
					'</div>';

					// keynota_current = keynota_current.replace(id_sebelum, id+data);
					keynota += result[i]+jumlah_pesanan;

				}
			}
			keynota += id_toko+harga_sub_total_wa;
			var message = '[Order Produk Kitapuramall]\n\nHaloo '+nama+" saya ingin pesan produk \n"+produk;

			var walink = 'https://wa.me/'+ phone +'?text=' + encodeURI(message);
			for (var i = 0; i < result.length-1; i++){
				if ($('#checkbox_'+result[i]).is(':checked')) {
					pesan_id_keranjang.push(result[i]);
    				// $.ajax({
    				// 	url: "<?=url('/')?>/user/keranjang/tambah_daftar_tunggu",
    				// 	type: "POST",
    				// 	data: {"id_product":result[i], "id_toko":id_toko, 'keynota':keynota},
    				// 	success: function (data) {

    				// 	}
    				// });

    			}
    		}
    		pesan_id_toko = id_toko;
    		pesan_keynota = keynota;
    		$('#modal_nama_toko').text('Pesanan Toko '+nama);
    		$(".slider").html(produk);
    		$('#modal_pesan').modal('show');


    		// location.href=walink;
    	} 

    	function post_pesanan(){
    		console.log(pesan_id_keranjang);
    		var metode_pengiriman = $("input[name='metode_pengiriman']:checked").val();
    		var metode_pembayaran = $("input[name='metode_pembayaran']:checked").val();
    		var alamat = $('#alamat').val();
    		$.ajax({
    			url: "<?=url('/')?>/user/keranjang/tambah_daftar_tunggu",
    			type: "POST",
    			data: {"id_keranjang":pesan_id_keranjang, 
    			"id_toko":pesan_id_toko, 
    			'keynota':pesan_keynota,
    			'metode_pengiriman': metode_pengiriman,
    			'metode_pembayaran': metode_pembayaran,
    			'alamat': alamat,
    		},
    		success: function (data) {

    		}
    	});
    		$('#modal_pesan').modal('hide');
    		setTimeout(load_halaman, 1000);

    	}

    	function load_halaman(){
    		location.reload();
    	}

    	function kirim_pesan(keynota){
    		$.ajax({
    			url: "<?=url('/')?>/user/keranjang/kirim_pesan/kirim_wa",
    			type: "POST",
    			data: { 'keynota':keynota
    		},
    		success: function (data) {

    		}
    	});
    	}


    	var status_ganti_foto = 0;

    	@if(Session::has('message'))
    	$('#modal-pemberitahuan').modal('show');
    	@endif

    	@if(Session::has('pass_message'))
    	$('#modal-ganti-pass').modal('show');
    	@endif


    	function pilih_jenkel(id, jenkel){
    		$("#jenis_kelamin").val(jenkel);
    		if (id == 'option_pria'){
    			$("#option_pria").css('color', '#1c2645');
    			$("#option_wanita").css('color', '#b3b7c0');
    		}
    		else {
    			$("#option_wanita").css('color', '#1c2645');
    			$("#option_pria").css('color', '#b3b7c0');
    		}
    	}

    	function input_focus(id){
    		$("#div_"+id).css('border', '1px solid #d1d2d4');
    	}

    	function input_blur(id){
    		$("#div_"+id).css('border', '1px solid white');		
    	}

    	function ubah_pesanan(id, operasi, harga, id_product){
    		if ($('#checkbox_'+id).is(':checked')) {

    			var jumlah_pesanan = $("#jumlah_pesanan_"+id).html();
    			if ((operasi == 'kurang') && (jumlah_pesanan == 1)){

    			}
    			else {
    				$.ajax({
    					url: "<?=url('/')?>/user/keranjang/ubah_jumlah",
    					type: "POST",
    					data: {"jumlah_pesanan":jumlah_pesanan, "id":id, 'operasi':operasi},
    					success: function (data) {
    						var sub_total_value = sub_total[id_product];

    						$("#jumlah_pesanan_"+id).html(data);
    						if (operasi == 'kurang'){
    							sub_total_value = parseInt(sub_total_value)-parseInt(harga);
    							$("#sub_total_"+id_product).html(formatToCurrency(sub_total_value));
    						}
    						else {
    							sub_total_value = parseInt(sub_total_value)+parseInt(harga);
    							$("#sub_total_"+id_product).html(formatToCurrency(sub_total_value));
    						}
    						sub_total[id_product] = sub_total_value;

    					}
    				});
    			}
    		}
    		else {
    			alert('silahkan centang');
    		}



    	}

    	function ubah_pesanan_current(id, operasi, harga, id_product){
    		if ($('#checkbox_'+id).is(':checked')) {
    		// var jumlah_sebelum = $("#jumlah_pesanan_"+id).html();
    		// var id_sebelum = id+jumlah_sebelum;
    		// var jumlah_pesanan = $("#jumlah_pesanan_"+id).html();
    		var jumlah_pesanan = $("#jumlah_pesanan_"+id).html();

    		if ((operasi == 'kurang') && (jumlah_pesanan == 1)){

    		}
    		else {
    			$.ajax({
    				url: "<?=url('/')?>/user/keranjang/ubah_jumlah",
    				type: "POST",
    				data: {"jumlah_pesanan":jumlah_pesanan, "id":id, 'operasi':operasi},
    				success: function (data) {
    					var sub_total_value = sub_total_current[id_product];
    					$("#jumlah_pesanan_"+id).html(data);
    					if (operasi == 'kurang'){
    						sub_total_value = parseInt(sub_total_value)-parseInt(harga);
    						$("#sub_total_current_"+id_product).html(formatToCurrency(sub_total_value));
    					}
    					else {
    						sub_total_value = parseInt(sub_total_value)+parseInt(harga);
    						$("#sub_total_current_"+id_product).html(formatToCurrency(sub_total_value));
    					}
    					sub_total_current[id_product] = sub_total_value;
    					// alert(keynota_current);

    					// alert(keynota_current);


    				}
    			});

    		}
    	}
    	else {
    		alert('silahkan centang');
    	}



    }



    var resize = $('#upload-demo').croppie({
    	enableExif: true,
    	enableOrientation: true,    
    viewport: { // Default { width: 100, height: 100, type: 'square' } 
    width: 300,
    height: 300,
        type: 'circle' //square
    },
    boundary: {
    	width: 300,
    	height: 300
    }
});


    $('#image').on('change', function () { 
    	$(".cr-slider-wrap").css("display", "block");
    	var reader = new FileReader();
    	reader.onload = function (e) {
    		resize.croppie('bind',{
    			url: e.target.result
    		}).then(function(){
    			console.log('jQuery bind complete');
    		});
    	}
    	$("#div_upload").prop('hidden', false);
    	$("#unggah_foto").prop('hidden', true);
    	$("#prev_image").remove();
    	reader.readAsDataURL(this.files[0]);
    });



    $('.upload-image').on('click', function (ev) {
    	resize.croppie('result', {
    		circle: false,
    		type: 'canvas',
    		size: 'viewport'
    	}).then(function (img) {
    		$.ajax({

    			url: "<?=url('/')?>/akun/pengaturan-profil/simpan-foto",
    			type: "POST",
    			data: {"image":img},
    			success: function (data) {
    				$('#pic_toko_privew').attr('src', img);
    				$("#modal-sukses").modal('hide');

    			}
    		});

    	});
    	status_ganti_foto = 1;

    });

    $( "#form_input").submit(function( event ) {
    	show_loader();
    });

</script>

@endsection
