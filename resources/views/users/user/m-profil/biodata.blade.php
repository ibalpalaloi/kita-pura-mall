@extends('layouts.home_no_menu')

@section('title')

@endsection

@section('header-scripts')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
	}

	.div-input-mall-square {
		border-radius: 0.5em;		
	}

	.form-control-mall-square {
		border-radius: 1.5em !important;
		padding-left: 1.5em;	
	}


	.input-group-text-mall {
		border: none;
		display: flex;justify-content: center;
		width: 3em; 
		height: 3em; 
		border-bottom-right-radius: 1.5em !important; 
		border-top-right-radius: 1.5em !important; 
		background:white;		
	}

	.form-control-mall {
		height: 3em; 
		border-bottom-left-radius: 1.5em; 
		border-top-left-radius: 1.5em; 
		border-left: none;	
		padding-left: 1.5em;	
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

	.modal-content{
		position:fixed;
		padding:0;
		margin:0;
		top:auto;
		right:auto;
		left:auto;
		bottom:0;
	}  



	.profile-picture {
		background: transparent;
		border-radius: 50%;
		display: flex;
		width: 40%;
		position: relative;
		top: -6em;
		margin-bottom: -6em;
		z-index: 2;
		overflow-y: visible;
		overflow-x: auto;
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

	body {
		background: #eaf4ff;
	}

	.form-group label {
		color: #b3b6bc;
		font-weight: 600;
		margin-bottom: 0.4em;	
		font-size: 0.9em;	
	}
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

<div class="wrapper" style="background: #ff006e; position: relative; z-index: -1; padding-top: 8em;">
	<div class="banner" >
		<div class="" style="display: flex; justify-content: center; flex-direction: column; align-items: center; color: white;">
			<div class="profile-picture">
				<div style="padding: 0.1em; background: transparent;">
					<img src="<?=url('/')?>/public/img/user/profile_picture/fathul.jpg" style="width: 100%; border-radius: 50%;">
				</div>
			</div>
			<div style="font-size: 1.5em; font-weight: 600;">@if ($biodata->nama == '') Belum ada nama @else {{$biodata->nama}} @endif</div>
			<div style="line-height: 1em; margin-bottom: 0.5em;"><?="@".$biodata->username?></div>
		</div>
	</div>
</div>

<main id="homepage" class="homepage" style="padding: 0px; background: #eaf4ff !important;">
	<div class="card-mall kategori" style="display: flex; justify-content: center; position: relative; flex-direction: column; align-items: center; background: #eaf4ff;">

		<form action="<?=url('/')?>/akun/pengaturan-profil/simpan-biodata" method="post" style="width: 85%;">
			{{csrf_field()}}
			<input type="hidden" value="PUT" name="_method">
			<div class="form-group" style="margin-top: 0.5em;">
				<label>Nama Lengkap</label>
				<div class="input-group mb-3 div-input-mall" id="div_nama_lengkap">
					<input type="text" class="form-control form-control-mall" id="nama_lengkap" name="nama_lengkap"
					onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Masukan nama lengkap"
					aria-label="Nama lengkap" aria-describedby="basic-addon1" required
					oninvalid="this.setCustomValidity('Harap Masukkan Nama Lengkap')" oninput="setCustomValidity('')"
					value="{{$biodata->nama}}">
					<div class="input-group-prepend">
						<span class="input-group-text input-group-text-mall">
							<img src="<?=url('/')?>/public/img/icon_svg/people.svg">&nbsp;&nbsp;&nbsp;
						</span>
					</div>
				</div>
			</div>
			<div class="form-group" style="margin-top: 0.5em;">
				<label>Jenis Kelamin</label>
				<div class="input-group mb-3 div-input-mall" id="div_jenis_kelamin" style="border: 1px solid #eaf4ff;">
					<div class="input-group-prepend">
						<div class="input-group-text input-group-text-mall" style="border-radius: 1.5em; width: auto;">
						
							<span style="margin-left: 0.5em; margin-right: 2em; color:@if($biodata->jenis_kelamin == 'Pria') #1c2645 @else #b3b7c0 @endif;" 
							id="option_pria" onclick="pilih_jenkel(this.id, 'Pria')"><i class="fas fa-circle" style="font-size: 0.8em;"></i>&nbsp;&nbsp;Pria</span>
							<span style="margin-right: 0.5em; color:@if($biodata->jenis_kelamin == 'Wanita') #1c2645 @else #b3b7c0 @endif;" id="option_wanita" onclick="pilih_jenkel(this.id, 'Wanita')"><i class="fas fa-circle" style="font-size: 0.8em;"></i>&nbsp;&nbsp;Wanita</span>
						</div>
					</div>
				</div>
				<input type="hidden" name="jenis_kelamin" id="jenis_kelamin" value="{{$biodata->jenis_kelamin}}">
			</div>
			<div class="form-group" style="margin-top: 0.5em;">
				<label>Alamat</label>
				<div class="input-group mb-3 div-input-mall" id="div_alamat">
					<input type="text" class="form-control form-control-mall" id="alamat" name="alamat"
					onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Masukan alamat"
					aria-label="Alamat" aria-describedby="basic-addon1" required
					oninvalid="this.setCustomValidity('Harap Masukkan Alamat')" oninput="setCustomValidity('')"
					value="{{$biodata->alamat}}">
					<div class="input-group-prepend">
						<span class="input-group-text input-group-text-mall">
							<img src="<?=url('/')?>/public/img/icon_svg/location.svg">&nbsp;&nbsp;&nbsp;&nbsp;
						</span>
					</div>
				</div>
			</div>
			<div class="form-group" style="margin-top: 0.5em;">
				<label>Username</label>
				<div class="input-group mb-3 div-input-mall" id="div_username">
					<input type="text" class="form-control form-control-mall" id="username" name="username"
					onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Masukan username"
					aria-label="Username" aria-describedby="basic-addon1" required
					oninvalid="this.setCustomValidity('Harap Masukkan Username')" oninput="setCustomValidity('')"
					value="{{$biodata->username}}">
					<div class="input-group-prepend">
						<span class="input-group-text input-group-text-mall">
							<img src="<?=url('/')?>/public/img/icon_svg/people.svg">&nbsp;&nbsp;&nbsp;
						</span>
					</div>
				</div>
			</div>
			<div class="form-group" style="margin-top: 0.5em;">
				<label>Nomor Handphone</label>
				<div class="input-group mb-3 div-input-mall" id="div_no_hp" style="border: 1px solid #e9ecef;">
					<input type="text" class="form-control form-control-mall" id="no_hp" name="no_hp"
					onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Masukan alamat"
					aria-label="no_hp" aria-describedby="basic-addon1" disabled 
					oninvalid="this.setCustomValidity('Harap Masukkan Nomor Handphone')" oninput="setCustomValidity('')"
					value="{{Session::get('no_telp')}}" >
					<div class="input-group-prepend">
						<span class="input-group-text input-group-text-mall" style="background: #e9ecef;">
							<img src="<?=url('/')?>/public/img/icon_svg/handphone.svg">&nbsp;&nbsp;&nbsp;&nbsp;
						</span>
					</div>
				</div>
			</div>
			<!-- <div class="form-group" style="margin-top: 0.5em; display: flex; align-items: center;">
				<input type="checkbox" name="">&nbsp;
				<label style="font-size: 0.6em; vertical-align: center;">saya telah membaca dan menyetujui <a href="#" style="color: #ff006e;">syarat dan ketentuan berlaku</a></label>

			</div> -->
			<div style="display: flex;justify-content: center;">
				<button type="submit" class="btn btn-primary" style="background: #fb036b; font-size: 1em; border: 1px solid #fb036b; border-radius: 1.5em;  width: 60%; display: flex; align-items: center; justify-content: center;"><img src="<?=url('/')?>/public/img/icon_svg/folder_white.svg" style="width: 1.2em;">&nbsp;&nbsp;&nbsp;Simpan
				</button>
			</div>
		</form>

	</div>


</main>


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

@endsection

@section('footer-scripts')
<script src="<?=url('/')?>/public/template/admin/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>

<script type="text/javascript">

		@if(Session::has('message'))
			$('#modal-pemberitahuan').modal('show')
		@endif
	var i = 0;
	var jadwal_hari = [];
	var jadwal_buka = [];
	var jadwal_tutup = [];


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

	function pilih_lokasi(){
		location.href="<?=url()->current()?>/pilih-lokasi?pemilik="+$("#nama_pemilik").val()+"&no_hp="+$("#no_hp").val()+"&hari="+$("#jadwal_hari").val()+"&buka="+$("#jadwal_buka").val()+"&tutup="+$("#jadwal_tutup").val();		
	}

	function pilih_jadwal(){
		$("#btn_trigger_hapus").click();
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
		var option_text = ["Setiap Hari", "Senin-Sabtu", "Senin-Jumat", "Senin", "Selasa", "Rabu", "Kamis","Jumat", "Sabtu", "Minggu"];
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
