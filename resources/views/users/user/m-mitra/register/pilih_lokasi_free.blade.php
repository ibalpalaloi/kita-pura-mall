@extends('layouts.home_no_menu')

@section('title')
Maps |
@endsection

@section('header-scripts')
<link rel="stylesheet" type="text/css" href="<?=url('/')?>/public/template/admin/dist/css/style.min.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
    integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
    crossorigin="" />
<link rel="stylesheet" type="text/css" href="<?=url('/')?>/public/plugins/lunar/css/lunar.css">
<style type="text/css">
    .pencarian-tabs>a {
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

    .detail-product>img {
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

    .nilai-product>img {
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
        border-radius: 1.5em;
        border: 1px solid white;
        width: 100%;
    }

    .input-group-text-mall {
        border: none;
        display: flex;
        justify-content: center;
        width: 5em;
        height: 3em;
        border-bottom-left-radius: 1.5em;
        border-top-left-radius: 1.5em;
        background: white;
    }

    .form-control-mall {
        height: 3em;
        border-radius: 1.5em;
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
$kategori = "";
$buka = "";
$tutup = "";
$hari = "";
if (!empty($_GET['pemilik'])){
	$pemilik = $_GET['pemilik'];
}
if (!empty($_GET['no_hp'])){
	$no_hp = $_GET['no_hp'];
}
if (!empty($_GET['kategori'])){
	$kategori = $_GET['kategori'];
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

<header class="style__Container-sc-3fiysr-0 header" style="background: transparent;">
    <div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: flex-end;">
        <div style="margin-right: 1em;">
            <div class="btn btn-primary" onclick="cari_lokasi()"
                style="background: #ff006e; border: 2px solid #ff006e;">Cari Lokasi</div>
        </div>
    </div>
</header>

<main id="homepage" class="homepage" style="padding-left: 0px; padding-right: 0px;">
    <div id="mapid"></div>
</main>

<div class="footer" style="background: #eaf4ff;">
    <form action="{{url()->current()}}/simpan" method="post" >
	{{csrf_field()}}
	<input type="hidden" value="PUT" name="_method">
        <span id="icon_loading"><img src="<?=url('/')?>/public/img/icon_svg/loading.gif"
                style="width: 0.8em;"></span>&nbsp;<span id="status_pencarian"
            style="color: black; font-size: 0.8em;">Sedang mendeteksi lokasi....</span>
        <div class="container-mall" id="tampil_titik"
            style="display: flex; flex-direction: column; justify-content: center; align-items: center; padding-bottom: 1em;">
            <div style="display: flex; width: 100%; justify-content: space-between;">
                <div class="input-group mb-3 div-input-mall" id="div_latitude"
                    style="width: 100%; display: flex; justify-content: center; align-items: center; background: white;">
                    <div class="input-group-prepend">
                        <span class="input-group-text input-group-text-mall" style="width: 4em; font-weight: 600;">
                            X
                        </span>
                    </div>
                    <input type="text" class="form-control form-control-mall" id="latitude" name="latitude"
                        onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Latitude"
                        aria-label="latitude" aria-describedby="basic-addon1" style="font-size: 1em;">
                </div>
            </div>
            <div class="input-group mb-3 div-input-mall" id="div_longitude"
                style="width: 100%; display: flex; justify-content: center; align-items: center; background: white;">
                <div class="input-group-prepend">
                    <span class="input-group-text input-group-text-mall" style="width: 4em; font-weight: 600;">
                        Y
                    </span>
                </div>
                <input type="text" class="form-control form-control-mall" id="longitude" name="longitude"
                    onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Longitude"
                    aria-label="longitude" aria-describedby="basic-addon1" style="font-size: 1em;">
            </div>
            <button onclick="simpan_koordinat()" id="btn_simpan_lokasi" class="btn btn-primary"
                style="background: #ff006e;;border: 1px solid #ff006e; border-radius: 1.5em; padding: 0.5em 2em 0.5em 2em; width: 100%;">Simpan
                Koordinat
            </button>
            <a href="{{url()->current()}}/selesai" class="btn btn-primary mt-2"
                style="background: #007bff;border: 1px solid #007bff; border-radius: 1.5em; padding: 0.5em 2em 0.5em 2em; width: 100%;">Lewati</a>

        </div>
    </form>

</div>
@endsection

@section('footer-scripts')
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
    integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
    crossorigin=""></script>
<script type="text/javascript" src="<?=url('/')?>/public/plugins/leaflet/js/Leaflet.AccuratePosition.js"></script>
<script type="text/javascript">
    var map = L.map('mapid', {
        attributionControl: false,
        zoomControl: false
    }).setView([-0.8479103, 119.8993065], 12);
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
        "color": "#fb3131",
        "weight": 1,
        "opacity": 0.9
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
        $("#koordinat").val(e.latlng.lat + ", " + e.latlng.lng);
        $("#latitude").val(e.latlng.lat);
        $("#longitude").val(e.latlng.lng);

        // $("#longitude").val();
    }

    function onLocationError(e) {
        alert(e.message);
    }



    // wrap map.locate in a function    
    function locate() {
        map.locate({
            setView: true,
            maxZoom: 16
        });

    }


    function tampilkan_titik() {
        $("#tampil_titik").prop('hidden', false);
        $("#tampil_alamat").prop('hidden', true);
    }

    function onAccuratePositionProgress(e) {
        $("#icon_loading").prop('hidden', false);
        L.marker(e.latlng).addTo(map).bindPopup("Sedang mendeteksi lokasi....").openPopup();
        $("#status_pencarian").html("Sedang mendeteksi lokasi.... (Akurasi :" + e.accuracy + ")");
        $("#btn_simpan_lokasi").prop('disabled', true);
        $("#btn_koordinat").prop('hidden', false);
        $("#btn_koordinat_ditemukan").prop('hidden', true);
    }

    function onAccuratePositionFound(e) {
        $("#icon_loading").prop('hidden', true);
        L.marker(e.latlng).addTo(map).bindPopup("Lokasi ditemukan! (Akurasi : " + e.accuracy + ")").openPopup();
        $("#status_pencarian").html("Lokasi ditemukan! (Akurasi :" + e.accuracy + ")");
        $("#btn_simpan_lokasi").prop('disabled', false);
        $("#btn_koordinat").prop('hidden', true);
        $("#btn_koordinat_ditemukan").prop('hidden', false);

    }

    function onAccuratePositionError(e) {
        // console.log(e.message)
        alert('error');
    }


    cari_lokasi();

    function cari_lokasi() {
        map.on('locationfound', onLocationFound);
        map.on('locationerror', onLocationError);
        map.on('accuratepositionprogress', onAccuratePositionProgress);
        map.on('accuratepositionfound', onAccuratePositionFound);
        map.on('accuratepositionerror', onAccuratePositionError);

        map.findAccuratePosition({
            maxWait: 15000, // defaults to 10000
            desiredAccuracy: 30 // defaults to 20
        });
        locate();

    }


    function markerClick(e, string) {
        $("#btn_trigger_location").click();
    }

</script>
<script type="text/javascript">
    function input_focus(id) {
        $("#div_" + id).css('border', '1px solid #d1d2d4');
    }

    function input_blur(id) {
        $("#div_" + id).css('border', '1px solid white');
    }

    function simpan_lokasi() {
        var pemilik = "<?=$pemilik?>";
        var no_hp = "<?=$no_hp?>";
        var kategori = "<?=$kategori?>"
        var buka = "<?=$buka?>";
        var tutup = "<?=$tutup?>";
        var hari = "<?=$hari?>";
        var status_mitra = "{{Request::segment(3)}}";
        location.href = "<?=url('/')?>/akun/jadi-mitra/" + status_mitra + "?pemilik=" + pemilik + "&no_hp=" + no_hp +
            "&kategori=" + kategori + "&x=" + $('#latitude').val() + "&y=" + $('#longitude').val() + "&alamat=" + $(
                "#alamat").val() + "&hari=" + hari + "&buka=" + buka + "&tutup=" + tutup;
    }

    function simpan_koordinat() {
        $("#tampil_titik").prop('hidden', true);
        $("#tampil_alamat").prop('hidden', false);
        $("#koordinat").val($("#latitude").val() + ", " + $("#longitude").val());
    }

</script>
@endsection

</html>
