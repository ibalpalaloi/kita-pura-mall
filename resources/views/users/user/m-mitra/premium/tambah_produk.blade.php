@extends('layouts.home_premium')

@section('title')

@endsection

@section('header-scripts')
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="<?=url('/')?>/public/plugins/lunar/css/lunar.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">

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
		border-radius: 1.5em; border:1px solid white;	
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
		border-bottom-left-radius: 0.5em; 
		border-top-left-radius: 0.5em; 
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

	.modal-content-jadwal{
		position:fixed;
		padding:0;
		margin:0;
		top:auto;
		right:auto;
		left:auto;
		bottom:0;
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
		width:30px;
		height:15px;
		background-color:rgba(80,80,80,.7);
		border-radius:15px;
		margin-right:15px;
		transition:background .3s ease;vertical-align:middle
	}
	.togglebutton label .toggle:after{
		content:"";
		display:inline-block;
		width:20px;
		height:20px;
		background-color:#fff;
		border-radius:20px;
		position:relative;
		box-shadow:0 1px 3px 1px rgba(0,0,0,.4);
		left:-5px;
		top:-2.5px;
		border:1px solid rgba(0,0,0,.54);
		transition:left .3s ease,background .3s ease,box-shadow .1s ease
	}
	.togglebutton label input[type=checkbox][disabled]+.toggle:after,.togglebutton label input[type=checkbox][disabled]:checked+.toggle:after{background-color:#bdbdbd}
	.togglebutton label input[type=checkbox]+.toggle:active:after,.togglebutton label input[type=checkbox][disabled]+.toggle:active:after{box-shadow:0 1px 3px 1px rgba(0,0,0,.4),0 0 0 15px rgba(0,0,0,.1)}
	.togglebutton label input[type=checkbox]:checked+.toggle:after{left:15px}
	.togglebutton label input[type=checkbox]:checked+.toggle{background-color:#8a6614}
	.togglebutton label input[type=checkbox]:checked+.toggle:after{border-color:#8a6614}
	.togglebutton label input[type=checkbox]:checked+.toggle:active:after{box-shadow:0 1px 3px 1px #8a6614,0 0 0 15px rgba(156,39,176,.1)}


	.cr-slider-wrap {
		display: none;
		margin-bottom: 0px;
		margin-top: 2em;
	}

</style>

@endsection



@section('content')
<div class="modal fade" id="modal-sukses" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px;">
		<div class="modal-content st0" style="border-radius: 1.2em; display: flex; justify-content: center; align-items: center; margin: 5em 1em 0em 1em; background-color: #353535;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<div class="container">
					<div class="panel panel-info">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-4 text-center">
									<div id="upload-demo">

									</div>
								</div>
								<div class="col-md-4">
									<div class="btn btn-primary btn-block" id="unggah_foto" onclick="unggah_foto()" style="margin-top: 5%;">Unggah Foto</div>
									<div id="div_upload" hidden style="padding: 0% 5% 5% 5%;">
										<button class="btn btn-primary btn-block upload-image" style="margin-top:2%" >Upload Image</button>
										<button class="btn btn-secondary btn-block" onclick="unggah_foto()">Unggah Foto</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<header class="style__Container-sc-3fiysr-0 header" style="background: #353535; padding-top: 0.3em;">
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh">
		<a href="{{url()->previous()}}" style=" width: 15%; height: 100%; display: flex; justify-content: center; align-items: center; padding-bottom: 0.3em; padding-right: 0.7em;">
			<img src="<?=url('/')?>/public/img/back_white.svg">
		</a>
		<a id="defaultheader_logo" title="Kitabisa" style="height: 100%; width: 70%; display: flex; justify-content: center; align-items: center;">
			<img src="<?=url('/')?>/public/img/logo_premium.svg" style="height: 80%;">
		</a>
		<a style="width: 15%; height: 100%; display: flex; justify-content: center; align-items: center;">
		</a>
	</div>
</header>



<main id="homepage" class="homepage" style="padding-top: 4em; background: transparent;">
	<div>
		<img src="<?=url('/')?>/public/img/mitra/background_premium.svg" style="object-fit: cover; position: absolute; top: -2em; z-index: -5;">
	</div>	
	<form enctype="multipart/form-data" action="{{url()->current()}}/simpan" method="post">
		{{csrf_field()}}
		<div style="display: flex; justify-content: center;">
			<div style="width: 90%; margin-top: 0em; display: flex; flex-direction: column; align-items: center;">
				<div class="input-group mb-4 div-input-mall-square" id="div_foto_toko" style="margin-top: 1em; background:transparent; border: none; border-radius: 1.2em;">
					<div style="display: flex; justify-content: center; width: 100%; margin: 0em; cursor: pointer;" onclick="ubah_foto()" id="div_pic_toko">
						<img src="<?=url('/')?>/public/img/temp_produk/default.svg" style="width: 100%; border-radius: 1em;">
					</div>
					<div style="display: flex; justify-content: center; width: 100%; margin: 0px;" id="div_pic_toko_privew" hidden>
						<img id="pic_toko_privew" src="<?=url('/')?>/public/img/img.jpg" style="width: 100%; border-radius: 1em;">
						<div style="position: absolute; right: 0.5em; bottom: 0.5em; width: 3em; height: 3em; border-radius: 50%; display: flex; justify-content: center;" class="st0">
							<img id="pic_toko" src="<?=url('/')?>/public/img/icon_svg/pencil_circle_white.svg" onclick="ubah_foto()" style="width: 90%">
						</div>
					</div>

					<input hidden type="file" name="foto_toko" id="image">
					<input type="hidden" name="nama_foto_temp" id="nama_foto_temp">
				</div>
				<div class="input-group mb-3 st0" id="div_kategori" style="color: white; padding: 0.5em 1em 0.5em 1em; border-radius: 0.5em;">
					<div style="margin-top: 0px; color: white; font-weight: 600; font-size: 0.75em;">Nama Produk</div>
					<div style="display: flex; justify-content: flex-start; width: 100%; margin: 0.2em 0em 0.3em 0em;">
						<span class="input-group-text-mall" style="width: 3em; background: #202020;">
							<img src="<?=url('/')?>/public/img/icon_svg/todo_white.svg" style="width: 55%;">
						</span>
						<input type="text" class="form-control-mall" id="nama_produk" name="nama_produk" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Nama Produk" aria-label="nama_produk" aria-describedby="basic-addon1" style="width: 100%;" required>
					</div>
				</div>
				<div class="input-group mb-3 st0" id="div_kategori" style="color: white; padding: 0.5em 1em 0.5em 1em; border-radius: 0.5em;">
					<div style="margin-top: 0px; color: white; font-weight: 600; font-size: 0.75em;">Kategori</div>
					<div style="display: flex; justify-content: flex-start; width: 100%; margin: 0.2em 0em 0.3em 0em;">
						<span class="input-group-text-mall" style="width: 3em; background: #202020;">
							<img src="<?=url('/')?>/public/img/icon_svg/kategori_white.svg" style="width: 40%;">
						</span>
						@php
							$index = 0;
						@endphp
						<select type="text" class="form-control-mall" id="kategori_produk" name="kategori_produk" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" style="height: 2.5em;"  required>
							<option value="" disabled selected>Pilih Kategori Produk</option>
							@foreach($kategori_produk as $row)
							<option data-index="{{$index++}}" value="{{$row->id}}">{{$row->nama}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="input-group mb-3 st0" id="div_kategori" style="color: white; padding: 0.5em 1em 0.5em 1em; border-radius: 0.5em;">
					<div style="margin-top: 0px; color: white; font-weight: 600; font-size: 0.75em;">Sub Kategori</div>
					<div style="display: flex; justify-content: flex-start; width: 100%; margin: 0.2em 0em 0.3em 0em;">
						<span class="input-group-text-mall" style="width: 3em; background: #202020;">
							<img src="<?=url('/')?>/public/img/icon_svg/kategori_white.svg" style="width: 40%;">
						</span>
						<select type="text" class="form-control-mall" id="sub_kategori_produk" name="sub_kategori_produk" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" style="height: 2.5em;"  required>
							<option value="" disabled selected>Pilih Sub Kategori Produk</option>
						</select>
					</div>
				</div>
				<div class="input-group mb-3 st0" id="div_kategori" style="color: white; padding: 0.5em 1em 0.5em 1em; border-radius: 0.5em; display: flex;justify-content: space-between;">
					<div class="harga" style="width: 45%;">
						<div style="margin-top: 0px; color: white; font-weight: 600; font-size: 0.75em;">Harga</div>
						<div style="display: flex; justify-content: flex-start; width: 100%; margin: 0.2em 0em 0.3em 0em;">
							<span class="input-group-text-mall" style="width: 3em; background: #202020;">
								<img src="<?=url('/')?>/public/img/icon_svg/harga_white.svg" style="width: 70%;">
							</span>
							<input type="number" class="form-control-mall" id="harga_produk" name="harga_produk" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Harga" aria-label="harga_produk" aria-describedby="basic-addon1" style="width: 100%;" required>
						</div>
					</div>
					<div class="diskon" style="width: 45%;">
						<div style="margin-top: 0px; color: white; font-weight: 600; font-size: 0.75em;">Diskon</div>
						<div style="display: flex; justify-content: flex-start; width: 100%; margin: 0.2em 0em 0.3em 0em;">
							<span class="input-group-text-mall" style="width: 3em; background: #202020;">
								<img src="<?=url('/')?>/public/img/icon_svg/percent_white.svg" style="width: 60%;">
							</span>
							<input type="number" class="form-control-mall" id="diskon_produk" name="diskon_produk" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Diskon Produk" aria-label="diskon_produk" aria-describedby="basic-addon1" style="width: 100%;" value="0" required>
						</div>
					</div>
				</div>
				<div class="input-group mb-3 st0" id="div_kategori" style="color: white; padding: 0.5em 1em 0.5em 1em; border-radius: 0.5em;">
					<div style="margin-top: 0px; color: white; font-weight: 600; font-size: 0.75em;">Deskripsi</div>
					<div style="height: 11.5em; width: 100%;">
						<textarea id="deskripsi" name="deskripsi" onblur="input_blur(this.id)" onfocus="input_focus(this.id)" style="width: 100%; height: 15em; border-radius: 0px; margin-top: 0.5em; background: #292929; color: #dddddd; border: none; font-size: 0.7em; padding: 0.3em 1em 0.5em 1em; text-align: justify; border-radius: 0.5em;" rows="10" required placeholder="Silahkan Isi Deskripsi Produk..."></textarea>
					</div>
				</div>
				<div class="input-group mb-3 st0" id="div_kategori" style="color: white; padding: 0.7em 1em 0.5em 1em; border-radius: 0.5em; display: flex; justify-content: space-between;">
					<div style="margin-top: 0px; color: white; font-weight: 600; font-size: 1em;">Stok</div>
					<div class="togglebutton">
						<label>
							<input type="checkbox" name="stok" checked>
							<span class="toggle"></span>
						</label>
					</div>
				</div>
				<button type="submit" class="btn btn-primary" style="padding: 0px; background: transparent; border: none;">
					<img src="<?=url('/')?>/public/img/button/toko_premium/simpan.svg" style="width: 100%; margin: 0px;">
				</button>	
			</div>
		</div>
	</form>

	@if(Session::has('message'))
	<div id="modal-pemberitahuan" class="modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
	aria-hidden="true" data-backdrop="static" data-keyboard="false" style="width: 100%;">
	<div class="modal-dialog modal-sm modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body text-center font-weight-bold py-3">
				{{Session::get('message')}}
				<div class="row mt-2 p-2">
					<button type="button" class="col-sm-12 btn waves-effect waves-light btn-outline-secondary"
					data-dismiss="modal">Tutup</button>

				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</div>
@endif


</main>

@endsection

@section('footer-scripts')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script type="text/javascript">

	@if(Session::has('message'))
	$('#modal-pemberitahuan').modal('show')
	@endif

	var i = 0;
	var jadwal_hari = [];
	var jadwal_buka = [];
	var jadwal_tutup = [];

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


	function input_focus(id){
		$("#div_"+id).css('border', '1px solid #d1d2d4');
	}

	function input_blur(id){
		$("#div_"+id).css('border', '1px solid white');		
	}		


	function pilih_lokasi(){
		location.href="<?=url()->current()?>/pilih-lokasi?pemilik="+$("#nama_pemilik").val()+"&no_hp="+$("#no_hp").val()+"&kategori=" + $("#kategori_toko").val()+"&hari="+$("#jadwal_hari").val()+"&buka="+$("#jadwal_buka").val()+"&tutup="+$("#jadwal_tutup").val()+"&deskripsi="+$("#deskripsi").val();		
	}

	function pilih_jadwal(){
		$('.modal').modal('show'); 
	}




	function tambah_jadwal(){
		var simbol = $("#jadwal").val();
		var hari = $("#jadwal option:selected").text();
		var waktu_tutup = $("#waktu_tutup").val();
		var waktu_buka = $("#waktu_buka").val();
		var jadwal_sample = $("#jadwal_sample").html();
		var fix_id = jadwal_sample.replaceAll(hari.replaceAll(" ", '_')).trim();
		var fix_harinya = fix_id.replaceAll("harinya", hari).trim();
		var fix_waktu = fix_harinya.replace("jamnya", waktu_buka+" - "+waktu_tutup).trim();
		var fix_simbol = fix_waktu.replace("simbolnya", simbol).trim();
		$("#jadwal_fix").append(fix_simbol);

		jadwal_hari.push(hari);
		jadwal_buka.push(waktu_buka);
		jadwal_tutup.push(waktu_tutup);

		check_select();		
		i++;
	}

	function check_select(){
		var option_value = ["SH", "SS", "SJ", "S", "S", "R", "K", "J", "S", "M"];
		var option_text = ["Setiap-Hari", "Senin-Sabtu", "Senin-Jumat", "Senin", "Selasa", "Rabu", "Kamis","Jumat", "Sabtu", "Minggu"];
		var option = "";
		for (var i = 0; i < option_text.length; i++){
			var indikator = false;
			for (var j = 0; j < jadwal_hari.length; j++){
				if (jadwal_hari[j] == option_text[i]){
					indikator = true;
				}
			}
			if (indikator == false){
				option += "<option value='"+option_value[i]+"' >"+option_text[i]+"</option>"; 				
			}
		}
		$("#jadwal").html(option);		
		var string_hari = jadwal_hari.toString();
		var string_buka = jadwal_buka.toString();
		var string_tutup = jadwal_tutup.toString();
		$("#jadwal_hari").val(string_hari.replaceAll(",", "~"));
		$("#jadwal_buka").val(string_buka.replaceAll(",", "~"));
		$("#jadwal_tutup").val(string_tutup.replaceAll(",", "~"));

		if ($("#jadwal_hari").val() == ''){
			$("#pilih_jadwal_buka_toko").html("Pilih Jadwal Buka Tutup Toko");
		}
		else {
			$("#pilih_jadwal_buka_toko").html("Telah memilih Jadwal");			
		}

	}

	function hapus_jadwal(hari){
		// alert(id);
		var temp;
		for (var i = 0; i < jadwal_hari.length; i++){
			if (jadwal_hari[i] == hari){
				jadwal_hari[i] = jadwal_hari[i+1];
				jadwal_buka[i] = jadwal_buka[i+1];
				jadwal_tutup[i] = jadwal_tutup[i+1];

			}
		}
		jadwal_hari.pop();
		jadwal_tutup.pop();
		jadwal_buka.pop();
		check_select();
		$("#"+hari.replaceAll(" ", "_")).remove();
	}


</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>

<script type="text/javascript">
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	function ubah_foto(){
		$("#div_upload").prop('hidden', true);
		$("#unggah_foto").prop('hidden', false);
		$('#modal-sukses').modal('show');
	}

	function unggah_foto(){
		$("#image").click();
	}




	var resize = $('#upload-demo').croppie({
		enableExif: true,
		enableOrientation: true,    
    viewport: { // Default { width: 100, height: 100, type: 'square' } 
    width: 300,
    height: 250,
        type: 'square' //square
    },
    boundary: {
    	width: 300,
    	height:250
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

				url: "<?=url('/')?>/akun/mitra/premium/tambah-produk/simpan-foto",
				type: "POST",
				data: {"image":img},
				success: function (data) {
					// alert(data);
					$("#modal-sukses").modal('hide');
					$('#pic_toko_privew').attr('src', "<?=url('/')?>/public/img/temp_produk/"+data);
					$("#nama_foto_temp").val(data);
					$("#div_pic_toko_privew").prop('hidden', false);
					$("#div_pic_toko").prop('hidden', true);

				}
			});

		});
		status_ganti_foto = 1;

	});

	$('#kategori_produk').on('change', function(){
		var index = $('#kategori_produk').find(':selected').data('index');
		$('#sub_kategori_produk').empty();
		var sub_kategori = {!!json_encode($sub_kategori)!!}
		$('#sub_kategori_produk').append($('<option>', {
			text: 'Pilih Sub Kategori Produk'
		}));
		for(i=0; i<sub_kategori.length; i++){
			$('#sub_kategori_produk').append($('<option>', {
				value: sub_kategori[index][i]['id_sub_kategori'],
				text: sub_kategori[index][i]['sub_kategori']
			}));
		}

	})

</script>
@endsection
