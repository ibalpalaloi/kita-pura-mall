@extends('layouts.home_no_menu')

@section('title')
Maps |
@endsection

@section('header-scripts')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="<?=url('/')?>/public/template/admin/dist/css/style.min.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
crossorigin=""/>
<link rel="stylesheet" type="text/css" href="<?=url('/')?>/public/plugins/lunar/css/lunar.css">
<style type="text/css">
	.pencarian-tabs > a {
		padding: 0.5em 1.5em 0.5em 1.5em;
		color: #ff006e;
		border-radius: 1.5em;
		margin: 0em 0.5em 0em 0.5em;
		font-size: 0.7em;
	}

	.active-mall {
		background: #ff006e;
		color: white !important;
	}

	#mapid {
		height: 100vh;
		z-index: 0;
	}

	.detail-product > img {
		object-fit: cover;
		width: 100%;
		height: 18em;	
		border-radius: 0.2em;
	}

	.star-rating {
		color: #ff006e;
	}

	.star-no-rating {
		color: #c4c4c4;
	}

	.nilai-product {
		margin-right: 0.8em;
	}

	.nilai-product > img{
		width: 2.2em;
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
		border-radius: 1.5em; border:1px solid #d1d2d4;		
		width: 48%;
	}

	.input-group-text-mall {
		border: none;
		display: flex;justify-content: center;
		width: 5em; 
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

	input:focus {
		border: none;
	}

	.form-control {
		border: none;
	}
</style>
@endsection

@section('content')
<div class="text-center" style="display: none;">
	<button type="button" id="btn_trigger_location" class="btn btn-default btn-rounded" data-toggle="modal"
	data-target="#modal-trigger-location">
	Open Modal Hapus
</button>
</div>
<?php
$pemilik = "";
$no_hp = "";
if (!empty($_GET['pemilik'])){
	$pemilik = $_GET['pemilik'];
}
if (!empty($_GET['no_hp'])){
	$no_hp = $_GET['no_hp'];
}
if (!empty($_GET['hari'])){
	$hari = $_GET['hari'];
}
if (!empty($_GET['buka'])){
	$buka = $_GET['buka'];
}
if (!empty($_GET['tutup'])){
	$tutup = $_GET['tutup'];
}

?>


<div class="modal fade" id="modal-trigger-location" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em;">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content" style="border-radius: 1.2em;">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			<div class="modal-body">
				<div class="detail-product" style="display: block;">
					<div class="like-product" style="position: absolute; top: 10; right: 0; padding: 16.5em 1em 0.4em 0.5em;">
						<div class="stroke-like-product" style="background: #fafafa; padding: 0.3em; border-radius: 1.5em;">
							<div class="border-like-product" style="border: 2px solid #ff006e; border-radius: 1.5em; padding: 0.3em;color: #ff006e; font-size: 0.8em;">
								<img src="<?=url('/')?>/public/img/like.svg" style="width: 1.5em;">&nbsp;1000+
							</div>
						</div>
					</div>
					<img src="<?=url('/')?>/public/img/product/product_1.jpg" >
				</div>
				<div>
					<div class="nama-toko" style="font-weight: 600; font-size: 1em; margin-top: 1em;">Somay Bandung</div>
					<div class="alamat-toko" style="font-size: 0.7em; color: #b1aeae;">Jl. RE Martadinata Kelurahan Tondo, Kecamatan Mantikulore Kota Palu</div> 
				</div>
				<div>
					<div class="nama-product" style="font-weight: 600; font-size: 1em; margin-top: 0.2em;">Rating</div>
					<div class="alamat-product" style="font-size: 0.7em;">
						<i class="fas fa-star star-rating"></i>
						<i class="fas fa-star star-rating"></i>
						<i class="fas fa-star star-rating"></i>
						<i class="fas fa-star star-rating"></i>
						<i class="fas fa-star star-no-rating"></i>
						&nbsp;&nbsp;<span>12 Penilaian</span>
					</div> 
				</div>
				<div class="penilaian-product" style="display: flex; justify-content: flex-start; margin-top: 0.3em;">
					<div class="nilai-product" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
						<img src="<?=url('/')?>/public/img/nilai_product/porsi_pas.svg">
						<div class="ket-nilai-product" style="color: #b1aeae; font-size: 0.5em; font-weight: 500;">Porsi Pas</div>
					</div>
					<div class="nilai-product" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
						<img src="<?=url('/')?>/public/img/nilai_product/rasa_enak.svg">
						<div class="ket-nilai-product" style="color: #b1aeae; font-size: 0.5em; font-weight: 500;">Rasa Enak</div>
					</div>
					<div class="nilai-product" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
						<img src="<?=url('/')?>/public/img/nilai_product/kemasan_baik.svg">
						<div class="ket-nilai-product" style="color: #b1aeae; font-size: 0.5em; font-weight: 500;">Kemasan Baik</div>
					</div>
				</div>
				<div>
					<div class="jadwal-buka" style="font-weight: 600; font-size: 1em; margin-top: 0.2em;">Jadwal Buka</div>
					<div class="detail-jadwal-toko" style="font-size: 0.7em; display: flex;">
						<img src="<?=url('/')?>/public/img/nilai_product/kalender.svg" style="width: 2.5em;">
						<div class="" style="font-size: 0.9em; margin-left: 1em;">
							<div>Senin - Minggu</div>
							<div>08.00 WITA - 20.00 WITA</div>
						</div>
					</div> 
				</div>
			</div>
		</div>
		<div class="div-call" style="position: absolute; bottom: 1; right: 0; width: 4.5em; padding: 33em 0em 0em 0em;">
			<img src="<?=url('/')?>/public/img/nilai_product/call.svg" style="width: 100%;">
		</div>
	</div>
</div>

<header class="style__Container-sc-3fiysr-0 header" style="background: transparent;">
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: space-between;">
		<a href="<?=url('/')?>/user/jadi-mitra" style="padding-left: 1em;">
			<img src="<?=url('/')?>/public/img/back.svg">
		</a>
		<a id="defaultheader_logo" title="Kitabisa" style="margin-left: 20px; height:33px;margin-right:20px" href="/">
			<img src="<?=url('/')?>/public/img/logo_color.svg">
			<img src="<?=url('/')?>/public/img/logo_text_color.svg">
		</a>
		<div style="margin-right: 1em;">
			<div class="btn btn-primary" onclick="cari_lokasi()">Cari Lokasi</div>
		</div>
	</div>
</header>

<main id="homepage" class="homepage" style="padding-left: 0px; padding-right: 0px;">
	<div id="mapid"></div>
</main>

<div class="footer" style="background: white;">
	<div class="container-mall" style="display: flex; flex-direction: column; justify-content: center; align-items: center; padding-bottom: 1em;">
		<div style="display: flex; justify-content: space-between;">
			<div class="input-group mb-3 div-input-mall" id="div_lat">
				<div class="input-group-prepend">
					<span class="input-group-text input-group-text-mall">
						X (LAT)
					</span>
				</div>
				<input type="text" class="form-control form-control-mall" id="latitude" name="latitude" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Latitude" aria-label="latitude" aria-describedby="basic-addon1">
			</div>
			<div class="input-group mb-3 div-input-mall" id="div_longitude">
				<div class="input-group-prepend">
					<span class="input-group-text input-group-text-mall">
						Y (LNG)
					</span>
				</div>
				<input type="text" class="form-control form-control-mall" id="longitude" name="longitude" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Longitude" aria-label="longitude" aria-describedby="basic-addon1">
			</div>

		</div>
		<div class="input-group mb-3 div-input-mall" id="div_alamat" style="width: 100%;">
			<div class="input-group-prepend">
				<span class="input-group-text input-group-text-mall" style="width: 4em;">
					<img src="<?=url('/')?>/public/img/icon_svg/location.svg">
				</span>
			</div>
			<input type="text" class="form-control form-control-mall" id="alamat" name="alamat" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Masukan alamat" aria-label="alamat" aria-describedby="basic-addon1" >
		</div>
		<button onclick="simpan_lokasi()" class="btn btn-primary" style="background: #ff006e;;border: 1px solid #ff006e; border-radius: 1.5em; padding: 0.5em 2em 0.5em 2em; width: 100%;">Simpan Lokasi
		</button>
	</div>
</div>
@endsection

@section('footer-scripts')
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
crossorigin=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?=url('/')?>/public/plugins/leaflet/js/Leaflet.AccuratePosition.js"></script>
<script type="text/javascript">
	var map = L.map('mapid', {attributionControl: false, zoomControl: false}).setView([-0.8479103, 119.8993065], 12);
	var LayerKita = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		maxZoom: 18,
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1,
		accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
	});

	map.addLayer(LayerKita)

	var myStyle2 = {
		"color":"#fb3131",
		"weight":1,
		"opacity":0.9
	};

    // placeholders for the L.marker and L.circle representing user's current position and accuracy    
    var current_position, current_accuracy;

    function onLocationFound(e) {
      // if position defined, then remove the existing position marker and accuracy circle from the map
      if (current_position) {
      	map.removeLayer(current_position);
      	map.removeLayer(current_accuracy);
      }

      var radius = e.accuracy / 2;

      current_position = L.marker(e.latlng).addTo(map);

      current_accuracy = L.circle(e.latlng, radius).addTo(map);
      var latlng = e.latlng;
      $("#latitude").val(e.latlng.lat);
      $("#longitude").val(e.latlng.lng);
  }

  function onLocationError(e) {
  	alert(e.message);
  }



    // wrap map.locate in a function    
    function locate() {
    	map.locate({setView: true, maxZoom: 16});

    }


    function onAccuratePositionProgress (e) {
    	L.marker(e.latlng).addTo(map).bindPopup("Sedang mendeteksi lokasi.... (Akurasi :"+e.accuracy+")").openPopup();
    }

    function onAccuratePositionFound (e) {
    	L.marker(e.latlng).addTo(map).bindPopup("Lokasi ditemukan! (Akurasi : "+e.accuracy+")").openPopup();

    }

    function onAccuratePositionError (e) {
    	console.log(e.message)
    }


    cari_lokasi();
    function cari_lokasi(){
    	locate();
    	map.on('locationfound', onLocationFound);
    	map.on('locationerror', onLocationError);
    	map.on('accuratepositionprogress', onAccuratePositionProgress);
    	map.on('accuratepositionfound', onAccuratePositionFound);
    	map.on('accuratepositionerror', onAccuratePositionError);

    	map.findAccuratePosition({
		    maxWait: 15000, // defaults to 10000
	    	desiredAccuracy: 30 // defaults to 20
	    });

    }


    function markerClick(e, string) {
    	$("#btn_trigger_location").click();
    }
</script>
<script type="text/javascript">
	function input_focus(id){
		$("#div_"+id).css('border', '1px solid #525f7f');

	}

	function input_blur(id){
		$("#div_"+id).css('border', '1px solid #d1d2d4');		
	}

	function simpan_lokasi(){
		var pemilik = "<?=$pemilik?>";
		var no_hp = "<?=$no_hp?>";
		var buka = "<?=$buka?>";
		var tutup = "<?=$tutup?>";
		var hari = "<?=$hari?>";

		location.href="<?=url('/')?>/user/jadi-mitra/free/register?pemilik="+pemilik+"&no_hp="+no_hp+"&x="+$('#latitude').val()+"&y="+$('#longitude').val()+"&alamat="+$("#alamat").val()+"&hari="+hari+"&buka="+buka+"&tutup="+tutup;
	}
</script>
@endsection
</html>
