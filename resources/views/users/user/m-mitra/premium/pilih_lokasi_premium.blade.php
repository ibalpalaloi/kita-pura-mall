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
$gambar_toko = "";
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
if (!empty($_GET['hari'])){
	$hari = $_GET['hari'];
}
if (!empty($_GET['buka'])){
	$buka = $_GET['buka'];
}
if (!empty($_GET['tutup'])){
	$tutup = $_GET['tutup'];
}
if (!empty($_GET['tutup'])){
	$tutup = $_GET['tutup'];
}
if (!empty($_GET['gambar_toko'])){
	$gambar_toko = $_GET['gambar_toko'];
}
if (!empty($_GET['deskripsi'])){
	$deskripsi = $_GET['deskripsi'];
}
?>


@if (($toko->latitude == 1) && ($toko->longitude == 1)) 
<div class="modal fade" id="modal-verifikasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
    <div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
        <div class="modal-content" style="border-radius: 1.2em; background: transparent; display: flex; justify-content: center; align-items: center; margin: -8em 0em 0em 0em; color: white; border: none; box-shadow: none;">
            <div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
                <img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: 30%; right: 1em;">
                <img src="<?=url('/')?>/public/img/modal_assets/modal_waiting2.svg" style="width: 100%;">
                <div style="position: absolute; margin: 3% 1.5em 0em 1.5em; padding: 0em 1.5em 0em 1.5em; top: 60%; background: #FF006E; border-bottom-right-radius: 1em; border-bottom-left-radius: 1em; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); display: flex; justify-content: center; flex-direction: column;align-items: center;">
                    <div style="font-size: 2em; font-weight: 600; text-align: center;">Mohon Tunggu...</div>
                    <div style="font-size: 1em; text-align: center; width: 100%; font-weight: 0; color: #ffe6f1; margin-bottom: 1.2em;">anda telah mengirimkan lokasi kepada admin untuk ditambahkan oleh admin. Silahkan menunggu admin untuk mengkonfirmasi alamat anda</div>
                    <a class="btn btn-primary" href="<?=url('/')?>/akun/mitra/premium/ubah-toko" style="margin-bottom: 0.7em; font-size: 1.1em;text-align: center; color: white;">Kembali ke atur toko
                    </a>
                    <div data-dismiss="modal" href="<?=url('/')?>/akun/mitra/premium/ubah-toko" style="margin-bottom: 1em; font-size: 1em; text-align: center; text-decoration: underline; color: white;">Atur Manual Koordinat Saya
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<header class="style__Container-sc-3fiysr-0 header" style="background: transparent;">
    <div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: flex-end;">
        <div style="margin-right: 1em;" id="cari_lokasi" @if (($toko->latitude != null) && ($toko->longitude != null)) hidden @endif>
            <div class="btn btn-primary" onclick="cari_lokasi()" style="background: #ffaa00; border: 2px solid #ffaa00;">Cari Lokasi</div>
            <a class="btn btn-primary" href="<?=url('/')?>/akun/mitra/premium/ubah-toko/kirim-lokasi" id="kirim_lokasi" style="background: #35A500; border: 2px solid #35A500;" hidden>Tidak Menemukan Lokasi?</a>
        </div>
    </div>
</header>

<main id="homepage" class="homepage" style="padding-left: 0px; padding-right: 0px;">
    <div id="mapid"></div>
</main>

<div class="footer" style="background: #eaf4ff;">
<!--         <span id="icon_loading"><img src="<?=url('/')?>/public/img/icon_svg/loading.gif" style="width: 0.8em;">
</span>&nbsp;<span id="status_pencarian" style="color: black; font-size: 0.8em;">Sedang mendeteksi lokasi....</span> -->
<div class="container-mall" id="tampil_titik" style="display: flex; flex-direction: column; justify-content: center; align-items: center; padding-bottom: 1em;">
    <form action="{{url()->current()}}/simpan" method="post" style="width: 100%;">
        {{csrf_field()}}
        <input type="hidden" value="PUT" name="_method">

        <div style="display: flex; width: 100%; justify-content: space-between;">
            <div class="input-group mb-3 div-input-mall" id="div_latitude" style="width: 100%; display: flex; justify-content: center; align-items: center; background: white;">
                <div class="input-group-prepend">
                    <span class="input-group-text input-group-text-mall" style="width: 4em; font-weight: 600;">
                        X
                    </span>
                </div>
                <input type="text" class="form-control form-control-mall" id="latitude" name="latitude" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Latitude" aria-label="latitude" aria-describedby="basic-addon1" style="font-size: 1em;" value="@if($toko->latitude != null){{$toko->latitude}} @endif">
            </div>
        </div>
        <div class="input-group mb-3 div-input-mall" id="div_longitude" style="width: 100%; display: flex; justify-content: center; align-items: center; background: white;">
            <div class="input-group-prepend">
                <span class="input-group-text input-group-text-mall" style="width: 4em; font-weight: 600;">
                    Y
                </span>
            </div>
            <input type="text" class="form-control form-control-mall" id="longitude" name="longitude" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Longitude" aria-label="longitude" aria-describedby="basic-addon1" style="font-size: 1em;" value="@if($toko->longitude != null){{$toko->longitude}} @endif">
        </div>
        <div id="koordinat_belum_tersimpan" style="width: 100%;" @if (($toko->latitude == null) && ($toko->longitude == null)) @else hidden @endif>
            <button onclick="simpan_koordinat()" id="btn_simpan_lokasi" class="btn btn-primary" style="background: #ffaa00;border: 1px solid #ffaa00; border-radius: 1.5em; padding: 0.5em 2em 0.5em 2em; width: 100%;">Simpan Koordinat
            </button>
            <div onclick="batal_ubah()" class="btn btn-primary mt-2" style="background: #007bff;border: 1px solid #007bff; border-radius: 1.5em; padding: 0.5em 2em 0.5em 2em; width: 100%;">Batal Ubah</div>
        </div>
        <div id="koordinat_sudah_tersimpan" style="width: 100%;" @if (($toko->latitude == null) && ($toko->longitude == null)) hidden @endif>
            <div onclick="ubah_koordinat()" id="btn_simpan_lokasi" class="btn btn-primary" style="background: #ffaa00;border: 1px solid #ffaa00; border-radius: 1.5em; padding: 0.5em 2em 0.5em 2em; width: 100%;">Ubah Koordinat
            </div>
            <a href="<?=url('/')?>/akun/mitra/premium/ubah-toko" class="btn btn-primary mt-2" style="background: #007bff;border: 1px solid #007bff; border-radius: 1.5em; padding: 0.5em 2em 0.5em 2em; width: 100%;">Kembali</a>
        </div>

    </form>


</div>

</div>
@endsection

@section('footer-scripts')
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
crossorigin=""></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script type="text/javascript" src="<?=url('/')?>/public/plugins/leaflet/js/Leaflet.AccuratePosition.js"></script>
<script type="text/javascript"> 
    var latitude = -0.8479103;
    var longitude = 119.8993065;
    @if (($toko->latitude != null) && ($toko->longitude != null))
    latitude = "<?=$toko->latitude?>"; 
    longitude = "<?=$toko->longitude?>";
    @endif
    @if (($toko->latitude == 1) && ($toko->longitude == 1))
    $("#modal-verifikasi").modal('show');
    @endif

    var map = L.map('mapid', {
        attributionControl: false,
        zoomControl: false
    }).setView([latitude, longitude], 12);
    var LayerKita = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
    });

    map.addLayer(LayerKita)


    // placeholders for the L.marker and L.circle representing user's current position and accuracy    
    var current_position, current_accuracy;

    @if (($toko->latitude != null) && ($toko->longitude != null))
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

    var marker = L.marker([<?=$toko->latitude?>, <?=$toko->longitude?>], {icon: food_icon}).on('click', function(e) { markerClick(e, "tes1");});
    marker.addTo(map);  

    function markerClick(e, string) {
        $("#latitude").val("<?=$toko->latitude?>");
        $("#longitude").val("<?=$toko->longitude?>");
    }
    @endif

    function batal_ubah(){
        location.reload();
    }

    function kirim_lokasi(){
        alert('tes');
    }

    function ubah_koordinat(){
        $("#koordinat_belum_tersimpan").prop('hidden', false);
        $("#koordinat_sudah_tersimpan").prop('hidden', true);        
        $("#cari_lokasi").prop('hidden', false);
    }

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
        console.log(e.message)
    }


    // cari_lokasi();

    function cari_lokasi() {
        $("#kirim_lokasi").prop('hidden', false);
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
        $("#koordinat_belum_tersimpan").prop('hidden', false);
        $("#koordinat_sudah_tersimpan").prop('hidden', true);
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
        var deskripsi = "<?=$deskripsi?>";
        var gambar_toko = "<?=$gambar_toko?>";
        var status_mitra = "{{Request::segment(3)}}";
        // location.href = "<?=url('/')?>/akun/jadi-mitra/" + status_mitra + "?pemilik=" + pemilik + "&no_hp=" + no_hp +
        // "&kategori=" + kategori + "&x=" + $('#latitude').val() + "&y=" + $('#longitude').val() + "&alamat=" + $(
        //     "#alamat").val() + "&hari=" + hari + "&buka=" + buka + "&tutup=" + tutup + "&deskripsi=" + deskripsi +
        // "&gambar_toko=" + gambar_toko;
    }

    function simpan_koordinat() {
        $("#tampil_titik").prop('hidden', true);
        $("#tampil_alamat").prop('hidden', false);
        $("#koordinat").val($("#latitude").val() + ", " + $("#longitude").val());
    }

</script>
@endsection

</html>
