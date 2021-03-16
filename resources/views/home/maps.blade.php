@extends('layouts.home')

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

	.st0
	{
		background : -moz-linear-gradient(-36.73% 61.91% 20deg,rgba(35, 35, 35, 1) 0%,rgba(53, 53, 53, 1) 19.55%,rgba(38, 38, 38, 1) 43.85%,rgba(53, 53, 53, 1) 72.35%,rgba(33, 33, 34, 1) 100%);
		background : -webkit-linear-gradient(20deg, rgba(35, 35, 35, 1) 0%, rgba(53, 53, 53, 1) 19.55%, rgba(38, 38, 38, 1) 43.85%, rgba(53, 53, 53, 1) 72.35%, rgba(33, 33, 34, 1) 100%);
		background : -webkit-gradient(linear,-36.73% 61.91% ,136.73% 38.09% ,color-stop(0,rgba(35, 35, 35, 1) ),color-stop(0.1955,rgba(53, 53, 53, 1) ),color-stop(0.4385,rgba(38, 38, 38, 1) ),color-stop(0.7235,rgba(53, 53, 53, 1) ),color-stop(1,rgba(33, 33, 34, 1) ));
		background : -o-linear-gradient(20deg, rgba(35, 35, 35, 1) 0%, rgba(53, 53, 53, 1) 19.55%, rgba(38, 38, 38, 1) 43.85%, rgba(53, 53, 53, 1) 72.35%, rgba(33, 33, 34, 1) 100%);
		background : -ms-linear-gradient(20deg, rgba(35, 35, 35, 1) 0%, rgba(53, 53, 53, 1) 19.55%, rgba(38, 38, 38, 1) 43.85%, rgba(53, 53, 53, 1) 72.35%, rgba(33, 33, 34, 1) 100%);
		-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr='#232323', endColorstr='#212122' ,GradientType=0)";
		background : linear-gradient(70deg, rgba(35, 35, 35, 1) 0%, rgba(53, 53, 53, 1) 19.55%, rgba(38, 38, 38, 1) 43.85%, rgba(53, 53, 53, 1) 72.35%, rgba(33, 33, 34, 1) 100%);
		filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#232323',endColorstr='#212122' , GradientType=1);
		background-repeat: background-size: cover;
	}

</style>
@endsection

@section('content')
<div class="modal fade" id="modal-trigger-location" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="display: flex; justify-content: center;">
		<div class="modal-content" style="border-radius: 1.2em;">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			<div class="modal-body">
				<div class="detail-product" style="display: block;">
					<img id="foto_maps" src="<?=url('/')?>/public/img/product/product_1.jpg">
				</div>
				<div>
					<div id="nama-toko" style="font-weight: 600; font-size: 1em; margin-top: 1em;">Somay Bandung</div>
					<div id="alamat-toko" style="font-size: 0.7em; color: #b1aeae;">Jl. RE Martadinata Kelurahan Tondo, Kecamatan Mantikulore Kota Palu</div> 
				</div>
				<div>
					<div class="nama-product" style="font-weight: 600; font-size: 1em; margin-top: 0.2em;">Rating</div>
					<div class="alamat-product" style="font-size: 0.7em;">
						<i class="fas fa-star star-no-rating"></i>
						<i class="fas fa-star star-no-rating"></i>
						<i class="fas fa-star star-no-rating"></i>
						<i class="fas fa-star star-no-rating"></i>
						<i class="fas fa-star star-no-rating"></i>
						&nbsp;&nbsp;<span>0 Penilaian</span>
					</div> 
				</div>
				<div>
					<div class="jadwal-buka" style="font-weight: 600; font-size: 1em; margin-top: 0.2em;">Jadwal Buka</div>
					<div id="detail-jadwal-toko" style="font-size: 0.7em; display: flex; flex-wrap: wrap;">

					</div> 
				</div>
				<div id="contact_free" style="display: flex; justify-content: space-between;">
					<div style="background: #FF006E; color:white; font-size: 1.2em; padding: 0.4em 0.8em; border-radius: 1.5em; display: flex; justify-content: flex-start; align-items: center; margin-top: 0.5em; width: 45%;">
						<div style="border: 2px solid white; width: 2em; height: 2em; display: flex; justify-content: center; align-items: center; border:none; border-radius: 50%;">
							<img src="<?=url('/')?>/public/img/button/emergency/telpon.svg" style="width: 60%;">
						</div>
						<div>Telepon</div>
					</div>
					<a id="link_wa" href="" style="background: #35A500; color:white; font-size: 1.2em; padding: 0.4em 0.8em; border-radius: 1.5em; display: flex; justify-content: flex-start; align-items: center; margin-top: 0.5em; width: 45%;">
						<div style="border: 2px solid white; width: 2em; height: 2em; display: flex; justify-content: center; align-items: center; border:none; border-radius: 50%;">
							<img src="<?=url('/')?>/public/img/button/emergency/whatapp.svg" style="width: 60%;">
						</div>
						<div>Whatsapp</div>
					</a>

				</div>
				<div id="contact_premium">
					<a href="" id="link_landing_page" style="background: #FF006E; color:white; font-size: 1.2em; padding: 0.4em 0.8em; border-radius: 1.5em; align-items: center; margin-top: 0.5em; width: 100%; display: flex; justify-content: center;">
						<div style="border: 2px solid white; width: 2em; height: 2em; display: flex; justify-content: center; align-items: center; border:none; border-radius: 50%; ">
							<img src="<?=url('/')?>/public/img/icon_svg/landing_page3.svg" style="width: 60%;">
						</div>
						<div>Kunjungi Toko</div>
					</a>
				</div>

			</div>
		</div>
	</div>
</div>

<header class="style__Container-sc-3fiysr-0 header" style="background: transparent;">
	<div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: center; flex-direction: column; height: 55px;">
		<div class="pencarian-tabs" style="display: flex; justify-content: center; background: white; padding: 8px; border-radius: 1.5em;">
			<a href="<?=url('/')?>/pencarian/rekomendasi">
				Rekomendasi
			</a>
			<a class="active-mall" href="<?=url('/')?>/pencarian/maps">
				Maps
			</a>
			<a href="<?=url('/')?>/pencarian/explore">
				Explore
			</a>
		</div>
	</div>
</header>

<main id="homepage" class="homepage" style="padding-left: 0px; padding-right: 0px;">
	<div id="mapid"></div>
</main>


@endsection

@section('footer-scripts')
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
crossorigin=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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

	var food_icon = L.icon({
		iconUrl: "<?=url('/')?>/public/img/maps/logo_maps.svg",
		    iconSize:     [38, 95], // size of the icon
		    shadowSize:   [50, 64], // size of the shadow
		    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
		    shadowAnchor: [4, 62],  // the same for the shadow
		    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
		});

	@foreach ($foto_maps as $row)
	@if (($row->latitude != null) && ($row->longitude != null))
	var marker = L.marker([<?=$row->latitude?>, <?=$row->longitude?>], {icon: food_icon}).on('click', function(e) { markerClick(e, "<?=$row->nama_toko?>", "<?=$row->alamat?>", "<?=$row->foto?>", "<?=$row->id?>", "<?=$row->no_hp?>", "<?=$row->jenis_mitra?>", "<?=$row->username?>");});
	marker.addTo(map);
	alert('tes');
	@endif
	@endforeach

	function markerClick(e, nama_toko, alamat_toko, foto, toko_id, no_hp, jenis_mitra, username) {
		$.ajax({
			url: "{{route('get_jadwal')}}",
			method: "post",
			data: {id_toko:toko_id, _token:'{{csrf_token()}}'},
			success:function(result){
				$("#nama-toko").html(nama_toko);
				$("#alamat-toko").html(alamat_toko);
				if (jenis_mitra == 'free'){
					$("#link_wa").attr('href', 'https://api.whatsapp.com/send?phone='+no_hp+'&text=Saya%20Ingin%20Memesan%20Anda%20');
					$("#contact_free").prop('hidden', false);
					$("#contact_premium").prop('hidden', true);
				}
				else {
					$("#link_landing_page").attr('href', "<?=url('/')?>/"+username);
					$("#contact_free").prop('hidden', true);
					$("#contact_premium").prop('hidden', false);					
				}
				$("#foto_maps").attr('src', "<?=url('/')?>/public/img/toko/"+toko_id+"/maps/"+foto);
				$("#detail-jadwal-toko").html(result.trim());
				$("#modal-trigger-location").modal('show');

			}
		})
	}
</script>
@endsection
</html>
