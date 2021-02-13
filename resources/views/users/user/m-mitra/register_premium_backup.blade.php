@extends('layouts.home_no_menu')

@section('title')

@endsection

@section('header-scripts')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<style type="text/css">
	.banner {
		max-width: 480px;
		width: 100%;
		margin: 0px auto;
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
		border-left: none;	
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

	.modal-content{
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
		width: 100%;
		margin-left: 0.4em;
	}

	input, textarea, select {
		border: none;
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
$gambar_toko = "";
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
if (!empty($_GET['gambar_toko'])){
	$gambar_toko = $_GET['gambar_toko'];
}
if (!empty($_GET['deskripsi'])){
	$deskripsi = $_GET['deskripsi'];
}
?>

<div class="text-center">
	<button type="button" id="btn_trigger_hapus" class="btn btn-default btn-rounded" data-toggle="modal"
	data-target="#modal-trigger-location">
	Open Modal Hapus
</button>

<div class="modal fade" id="modal-trigger-location" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px;">
		<div class="modal-content" style="border-radius: 1.2em; background: #eaf4ff; display: flex; justify-content: center; align-items: center;">
			<div class="modal-body">
				<div>
					<div class="nama-toko" style="font-weight: 600; font-size: 1em; line-height: 1.1em; font-size: 1.2em;">Silahkan Masukan Jadwal<br>Buka/Tutup Usaha Anda</div>
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
							<div style="width: 2.5em; height: 2.5em; background:#ff006e; margin: 0.5em; border-radius: 50%; vertical-align: middle; color: white; padding: 0;line-height: 2.3em;">
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
						<div onclick='hapus_jadwal("{{$loop_hari[$i]}}")' style="width: 15%; cursor: pointer; display: flex; align-items: center; background: #ff006e; justify-content: center; border-top-right-radius: 0.5em; border-bottom-right-radius: 0.5em; color: white; font-weight:700; font-size: 1.2em;">X</div>
					</div>
					@endif
					<?php
				}
				?>
			</div>
			<div id="jadwal_sample" style="width: 100%; display: flex; justify-content: center;" hidden>
				<div class="input-group mb-3 div-input-mall-square" id="harinya" style="width: 90%; background: white; border: 1px solid white;">
					<div style="width: 20%; display: flex; justify-content: center; margin-left: 3%;">
						<div style="width: 2.5em; height: 2.5em; background:#ff006e; margin: 0.5em; border-radius: 50%; vertical-align: middle; color: white; padding: 0;line-height: 2.3em;">simbolnya</div>
					</div>
					<div style="margin-left: 2%; width: 60%;">
						<div style="margin-top: 0.5em; font-weight: 700; text-align: left;">harinya</div>
						<div style="font-size: 0.7em; text-align: left;">jamnya</div>
					</div>
					<div onclick='hapus_jadwal("harinya")' style="width: 15%; cursor: pointer; display: flex; align-items: center; background: #ff006e; justify-content: center; border-top-right-radius: 0.5em; border-bottom-right-radius: 0.5em; color: white; font-weight:700; font-size: 1.2em;">X</div>
				</div>
			</div>
			<hr style="border-top: 1px solid #c8d2dd; width: 100%;">
			<div class="input-group mb-3 div-input-mall" id="div_no_hp" style="width: 90%;">
				<select type="text" class="form-control form-control-mall-modal" id="jadwal" name="jadwal" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" aria-label="jadwal" aria-describedby="basic-addon1" style="width: 100%; text-align: center !important;">
					<option disabled selected>--- Silahkan Pilih Hari ---</option>
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

<header class="style__Container-sc-3fiysr-0 header" style="background: #ffaa00;">
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: space-between;">
		<a href="<?=url('/')?>/user/jadi-mitra" style="padding-left: 1em;">
			<img src="<?=url('/')?>/public/img/icon_left_white.svg">
		</a>
		<a id="defaultheader_logo" title="Kitabisa" style="margin-left: 20px; height:33px;margin-right:20px" href="/">
			<img src="<?=url('/')?>/public/img/logo.svg">
			<img src="<?=url('/')?>/public/img/logo_text.svg">
			<input type="text" id="gambar_toko" hidden>
		</a>
		<div style="margin-right: 2.5em;">
			<img src="<?=url('/')?>/public/img/back.svg" hidden>
		</div>
	</div>
</header>
<form enctype="multipart/form-data" action="<?=url('/')?>/user/jadi-mitra/{{Request::segment(3)}}/simpan" method="post">
	{{csrf_field()}}
	<div class="wrapper" style="background: #eaf4ff; position: relative; z-index: 2; top: -5.5em;">
		<div class="banner" style="position: relative;">
			<img src="<?=url('/')?>/public/img/mitra/cover_premium.svg" style="width: 100%;">
			<div style="position: absolute; top: 7.5em; left: 5%; width: 90%; height: 90%; display: flex; justify-content: center; align-items: center; flex-direction: column; background: white; border-radius: 1.5em;">
				<div id="div_pic_toko" style="padding: auto 0; border:2px dashed #ffaa00; display: flex; justify-content: center; align-items: center; border-radius: 50%; width: 50%; height: 50%;">
					<img id="pic_toko" src="<?=url('/')?>/public/img/icon_svg/add_circle_yellow.svg" onclick="tambah_foto_toko()">
				</div>
				<div id="div_pic_toko_privew" style="position: relative; padding: auto 0; display: flex; justify-content: center; align-items: center; border-radius: 50%; width: 50%; height: 50%; border: 2px solid #b3b6bc;" hidden>
					<img id="pic_toko_privew" src="<?=url('/')?>/public/img/img.jpg" style="width: 100%; border-radius: 50%; object-fit: cover;height: 100%;">
					<img id="pic_toko" src="<?=url('/')?>/public/img/icon_svg/add_circle_yellow.svg" onclick="tambah_foto_toko()" style="position: absolute; right: 0px; bottom: 0px;">
				</div>
				<div style="font-weight: 600; color: black; font-size: 1.3em; margin-top: 0.5em;">Logo Toko</div>
				<div style="color: #b3b6bc; font-size: 1em; margin-top: 0em;  font-size: 0.8em; line-height: 1.3em; width: 100%; padding: 0em 10%;">logo toko sangat penting untuk membantu branding kepada masyarakat. dan membantu pengindentifikasian toko</div>
				<input type="file" name="foto_toko" id="foto_toko" hidden>
			</div>
		</div>
	</div>

	<main id="homepage" class="homepage" style="padding: 0px; background: #eaf4ff; margin-top: 2em; border-radius: 1.5em;">
		<div class="card-mall kategori" style="display: flex; justify-content: center; position: relative; flex-direction: column; align-items: center; background: #eaf4ff;">
			<div style="width: 90%; margin-top: 1em; display: flex; flex-direction: column; align-items: center;">
				<div class="input-group mb-3 div-input-mall" id="div_nama_pemilik">
					<span>Nama Pemilik</span>
					<div>
						<span class="input-group-text-mall">
							<img src="<?=url('/')?>/public/img/icon_svg/people.svg" style="width: 100%;">
						</span>
						<input type="text" class="form-control-mall" id="nama_pemilik" name="nama_pemilik" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Masukan nama pemilik" aria-label="Nama Pemilik" aria-describedby="basic-addon1" value="{{$pemilik}}" style="width: 100%;" required>
					</div>
				</div>
				<div class="input-group mb-3 div-input-mall" id="div_kategori">
					<span>Kategori</span>
					<div>
						<span class="input-group-text-mall">
							<img src="<?=url('/')?>/public/img/icon_svg/kategori.svg" style="width: 100%;">
						</span>
						<select type="text" class="form-control-mall" id="kategori_toko" name="kategori_toko" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" style="height: 2.5em;" value="{{$kategori}}" required>
							<option value="" disabled selected>--- Pilih Kategori Toko ---</option>
							@foreach($daftar_kategori as $row)
							<option value="{{$row->id}}" @if($kategori==$row->id ) selected='selected' @endif>{{$row->kategori}}
							</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="input-group mb-3 div-input-mall" id="div_no_hp">
					<span>Nomor Handphone Toko</span>
					<div>
						<span class="input-group-text-mall">
							<img src="<?=url('/')?>/public/img/icon_svg/handphone.svg" style="width: 100%;">
						</span>
						<input type="text" class="form-control-mall" id="no_hp" name="no_hp" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Masukan nomor hp toko" aria-label="Nomor Handphone Toko" aria-describedby="basic-addon1" value="{{$no_hp}}" style="width: 100%;" required>
					</div>
				</div>
				<div class="input-group mb-3 div-input-mall" id="div_jadwal">
					<span>Jadwal Buka Tutup Toko</span>
					<div>
						<span class="input-group-text-mall">
							<img src="<?=url('/')?>/public/img/icon_svg/calender.svg" style="width: 100%;">
						</span>
						<div onclick="pilih_jadwal()" class="form-control form-control-mall" style="vertical-align: center;display: flex; align-items: center; justify-content: flex-start; cursor: pointer; margin-left: 0.4em; " id="pilih_jadwal_buka_toko">
							<?php
							if ( (($latitude == null) || ($latitude == '')) && (($longitude == null) || ($longitude == '')) && (($latitude == null) || ($latitude == ''))){
								echo "Pilih Jadwal Toko";
							}
							else {
								echo "Telah memilih jadwal";
							}
							?>
							</div>
						</div>
					</div>
					<div>
						<input type="hidden" name="jadwal_hari" id="jadwal_hari" value="{{$hari}}">
						<input type="hidden" name="jadwal_buka" id="jadwal_buka" value="{{$buka}}">
						<input type="hidden" name="jadwal_tutup" id="jadwal_tutup" value="{{$tutup}}">
					</div>
					<?php
					if ( (($latitude == null) || ($latitude == '')) && (($longitude == null) || ($longitude == '')) && (($latitude == null) || ($latitude == ''))){
						?>
						<div class="input-group mb-3 div-input-mall" id="div_lokasi">
							<span>Alamat Toko</span>
							<div>
								<span class="input-group-text-mall">
									<img src="<?=url('/')?>/public/img/icon_svg/home.svg" style="width: 100%;">
								</span>
								<div onclick="pilih_lokasi()" class="form-control form-control-mall" style="vertical-align: center;display: flex; align-items: center; justify-content: flex-start; cursor: pointer; margin-left: 0.4em;" id="pilih_jadwal_buka_toko">Pilih Lokasi Toko</div>
							</div>
						</div>
						<?php 
					} else {
						?>
						<div class="input-group mb-1 div-input-mall" id="div_alamat">
							<span>Alamat Toko</span>
							<div>
								<span class="input-group-text-mall">
									<img src="<?=url('/')?>/public/img/icon_svg/home.svg" style="width: 100%;">
								</span>
								<input type="text" class="form-control-mall" id="alamat" name="alamat" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Alamat" aria-label="alamat" aria-describedby="basic-addon1" value="{{$alamat}}" style="width: 100%;">

							</div>
						</div>
						<div style="display: flex; justify-content: space-between;">
							<div class="input-group mb-1 div-input-mall" id="div_latitude" style="width: 48%;">
								<span>Latitude</span>
								<div>
									<input type="text" class="form-control-mall" id="latitude" name="latitude" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Latitude" aria-label="latitude" aria-describedby="basic-addon1" value="{{$latitude}}" style="width: 100%; border-radius: 1.5em;">
								</div>
							</div>
							<div class="input-group mb-1 div-input-mall" id="div_longitude" style="width: 48%;">
								<span>Longitude</span>
								<div>

									<input type="text" class="form-control-mall" id="longitude" name="longitude" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Longitude" aria-label="longitude" aria-describedby="basic-addon1" value="{{$longitude}}" style="width: 100%; border-radius: 1.5em;">
								</div>
							</div>
						</div>
						<small onclick="pilih_lokasi()" style="cursor: pointer;">Ganti Lokasi</small>
						<?php 
					}
					?>					
					<div class="input-group mb-3 div-input-mall" id="div_no_hp" style="height: 20em; justify-content: flex-start;">
						<span style="margin-top: 0px;">Deskripsi</span>
						<div style="height: 15em; width: 100%;">
							<textarea class="form-control-mall" id="deskripsi" name="deskripsi" onblur="input_blur(this.id)" onfocus="input_focus(this.id)" style="width: 100%; height: 15em; border-radius: 0px; margin: 0.6em;" rows="8" required>{{$deskripsi}}</textarea>
						</div>
					</div>		


				</div>
				<button type="submit" class="btn btn-primary" style="background: #ffaa00; margin-top: 0.5em;border: 1px solid #ffaa00; border-radius: 1.5em; padding: 0.5em 2em 0.5em 2em; width: 70%;">Simpan
				</button>

			</div>
		</div>
	</main>
</form>

@endsection

@section('footer-scripts')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript">

	$("input[required], select[required]").attr("oninvalid",
		"this.setCustomValidity('Harap Dimasukkan')");
	$("input[required], select[required]").attr("oninput", "setCustomValidity('')");

	var i = 0;
	var jadwal_hari = [];
	var jadwal_buka = [];
	var jadwal_tutup = [];

	<?php for ($i = 0; $i < count($loop_hari); $i++){?>
		@if ($loop_hari[0] != "")
		jadwal_hari.push("<?=$loop_hari[$i]?>");
		jadwal_buka.push("<?=$loop_buka[$i]?>");
		jadwal_tutup.push("<?=$loop_tutup[$i]?>");
		@endif
	<?php } ?>
	function input_focus(id){
		$("#div_"+id).css('border', '1px solid #d1d2d4');
	}

	function input_blur(id){
		$("#div_"+id).css('border', '1px solid white');		
	}		

	function pilih_lokasi(){
		location.href="<?=url()->current()?>/pilih-lokasi?pemilik="+$("#nama_pemilik").val()+"&no_hp="+$("#no_hp").val()+"&kategori=" + $("#kategori_toko").val()+"&hari="+$("#jadwal_hari").val()+"&buka="+$("#jadwal_buka").val()+"&tutup="+$("#jadwal_tutup").val()+"&deskripsi="+$("#deskripsi").val()+"&gambar_toko="+$("#gambar_toko").val();		
	}

	function pilih_jadwal(){
		$("#btn_trigger_hapus").click();
	}

	function tambah_foto_toko(){
		$("#foto_toko").click();
	}

	function tambah_foto_lokasi_toko(){
		$("#foto_lokasi_toko").click();
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
		var option = "<option disabled selected>--- Silahkan Pilih Hari ---</option>";
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



	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#pic_toko_privew').attr('src', e.target.result);
				$("#div_pic_toko_privew").prop('hidden', false);
				$("#div_pic_toko").prop('hidden', true);
				var gambarnya = $("#foto_toko").val();
				$("#gambar_toko").val(gambarnya);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#foto_toko").change(function(){
		readURL(this);
	});


	function readURLlokasi(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#pic_lokasi_toko_privew').attr('src', e.target.result);
				$("#div_pic_lokasi_toko_privew").prop('hidden', false);
				$("#div_pic_lokasi_toko").prop('hidden', true);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#foto_lokasi_toko").change(function(){
		readURLlokasi(this);
	});

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
@endsection
