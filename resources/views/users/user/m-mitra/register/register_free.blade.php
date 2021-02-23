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

    .sosmed>img {
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

    .div-input-mall>span {
        color: #b3b6bc;
        padding: 0em 0em 0em 1.5em;
        font-size: 0.75em;
        position: relative;
        top: 0.5em;
    }

    .div-input-mall div {
        display: flex;
        justify-content: center;
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

    .modal-dialog-bottom {
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


    .modal-content {
        position: fixed;
        padding: 0;
        margin: 0;
        top: auto;
        right: auto;
        left: auto;
        bottom: 0;
    }

</style>
@endsection

@section('content')
<div class="modal fade" id="modal-jadwal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
style="padding: 1.5em; padding: 0px;">
<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px;">
    <div class="modal-content" style="border-radius: 1.2em; background: #eaf4ff; display: flex; justify-content: center; align-items: center;">
        <div class="modal-body">
            <div>
                <div class="nama-toko"
                style="font-weight: 600; font-size: 1em; line-height: 1.1em; font-size: 1.2em;">Silahkan
                Masukan
                Jadwal<br>Buka/Tutup Usaha Anda</div>
            </div>
        </div>
        <div id="jadwal_fix"
        style="width: 100%; display: flex; justify-content: center; flex-direction: column; align-items: center;">
        <!-- Jadwal -->
    </div>
    <div id="jadwal_sample" style="width: 100%; display: flex; justify-content: center;" hidden>
        <div class="input-group mb-3 div-input-mall-square" id="harinya"
        style="width: 90%; background: white; border: 1px solid white;">
        <div style="width: 20%; display: flex; justify-content: center; margin-left: 3%;">
            <div
            style="width: 2.5em; height: 2.5em; background:#ff006e; margin: 0.5em; border-radius: 50%; vertical-align: middle; color: white; padding: 0;line-height: 2.3em; text-align: center;">
        simbolnya</div>
    </div>
    <div style="margin-left: 2%; width: 60%;">
        <div style="margin-top: 0.5em; font-weight: 700; text-align: left;">harinya</div>
        <div style="font-size: 0.7em; text-align: left;">jamnya</div>
    </div>
    <div onclick='hapus_jadwal("harinya")'
    style="width: 15%; cursor: pointer; display: flex; align-items: center; background: #ff006e; justify-content: center; border-top-right-radius: 0.5em; border-bottom-right-radius: 0.5em; color: white; font-weight:700; font-size: 1.2em;">
X</div>
</div>
</div>
<hr style="border-top: 1px solid #c8d2dd; width: 100%;">
<div class="input-group mb-3 div-input-mall" id="div_no_hp" style="width: 90%;">
    <select type="text" class="form-control form-control-mall-modal" id="jadwal" name="jadwal"
    onfocus="input_focus(this.id)" onblur="input_blur(this.id)" aria-label="jadwal"
    aria-describedby="basic-addon1" style="width: 100%; text-align: center !important;">
    <option disabled selected>--- Silahkan Pilih Hari ---</option>
    <option value="SH">Setiap-Hari</option>
    <option value="SS">Senin-Sabtu</option>
    <option value="SJ">Senin-Jumat</option>
    <option value="S">Senin</option>
    <option value="S">Selasa</option>
    <option value="R">Rabu</option>
    <option value="K">Kamis</option>
    <option value="J">Jumat</option>
    <option value="S">Sabtu</option>
    <option value="M">Minggu</option>
</select>
</div>
<div style="width: 90%; display: flex; justify-content: space-between;">
    <div class="input-group mb-3 div-input-mall" id="div_no_hp" style="width: 48%;">
        <input type="time" class="form-control form-control-mall-modal" id="waktu_buka" min="09:00"
        max="18:00" required style="width: 100%; height: auto !important;">
    </div>
    <div class="input-group mb-3 div-input-mall" id="div_no_hp" style="width: 48%;">
        <input type="time" class="form-control form-control-mall-modal" id="waktu_tutup" min="09:00"
        max="18:00" required style="width: 100%; height: auto !important;">
    </div>
</div>
<button onclick="tambah_jadwal()" class="btn btn-primary"
style="background: #ff006e;border: 1px solid #ff006e; border-radius: 1.5em; padding: 0.5em 2em 0.5em 2em; width: 90%; margin-bottom: 1em;">Tambah
Jadwal
</button>
</div>
</div>
</div>


<header class="style__Container-sc-3fiysr-0 header">
    <div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: space-between;">
        <a href="<?=url('/')?>/akun/jadi-mitra" style="padding-left: 1em;">
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
    <div class="banner">
    </div>
</div>

<main id="homepage" class="homepage" style="padding: 0px;background: #eaf4ff;">
    <div class="card-mall kategori" style="display: flex; justify-content: center; position: relative; flex-direction: column; align-items: center; background: #eaf4ff;">
        <img src="<?=url('/')?>/public/img/mitra/mitra_free.png" width="75%" style="top: -11em; position: relative; overflow-x: visible; z-index: 3 !important;">
        <div style="text-align: center;font-size: 1.2em; font-weight: 500; line-height: 1.2em; margin-top: -10em;">
            Hi, Silahkan&nbsp;<span style="color: #fb036b;">lengkapi informasi</span><br>usaha anda
        </div>
        <form enctype="multipart/form-data" action="<?=url('/')?>/akun/jadi-mitra/{{Request::segment(3)}}/simpan" method="post" style="width: 90%; margin-top: 2em;  display: flex; flex-direction: column; align-items: center;">
            {{csrf_field()}}
            <div class="input-group mb-3 div-input-mall" id="div_nama_toko">
                <span>Nama Toko</span>
                <div>
                    <span class="input-group-text-mall">
                        <img src="<?=url('/')?>/public/img/icon_svg/people.svg" style="width: 100%;">
                    </span>
                    <input type="text" class="form-control-mall" id="nama_toko" name="nama_toko"
                    onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Masukan Nama Toko"
                    aria-label="Nama Pemilik" aria-describedby="basic-addon1" style="width: 100%;" required>
                </div>
            </div>
            <div class="input-group mb-3 div-input-mall" id="div_kategori">
                <span>Kategori</span>
                <div>
                    <span class="input-group-text-mall">
                        <img src="<?=url('/')?>/public/img/icon_svg/kategori.svg" style="width: 100%;">
                    </span>
                    <select type="text" class="form-control-mall" id="kategori_toko" name="kategori_toko"
                    onfocus="input_focus(this.id)" onblur="input_blur(this.id)" style="height: 2.5em;" required>
                    <option value="" disabled selected>Pilih Kategori Toko</option>
                    @foreach($daftar_kategori as $row)
                    <option value="{{$row->id}}">{{$row->kategori}}</option>
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
                <input type="text" class="form-control-mall" id="no_hp" name="no_hp" onfocus="input_focus(this.id)"
                onblur="input_blur(this.id)" placeholder="Masukan nomor hp toko"
                aria-label="Nomor Handphone Toko" aria-describedby="basic-addon1" style="width: 100%;" required>
            </div>
        </div>
        <div class="input-group mb-3 div-input-mall" id="div_jadwal">
            <span>Jadwal Buka Tutup Toko</span>
            <div>
                <span class="input-group-text-mall">
                    <img src="<?=url('/')?>/public/img/icon_svg/calender.svg" style="width: 100%;">
                </span>
                <div onclick="pilih_jadwal()" class="form-control form-control-mall"
                style="vertical-align: center;display: flex; align-items: center; justify-content: flex-start; cursor: pointer; margin-left: 0.4em; "
                id="pilih_jadwal_buka_toko">Pilih Jadwal Toko</div>
            </div>
        </div>
        <div>
            <input type="hidden" name="jadwal_hari" id="jadwal_hari">
            <input type="hidden" name="jadwal_buka" id="jadwal_buka">
            <input type="hidden" name="jadwal_tutup" id="jadwal_tutup">
        </div>
        <div class="input-group mb-3 div-input-mall" id="div_lokasi">
            <span>Alamat Toko</span>
            <div>
                <span class="input-group-text-mall">
                    <img src="<?=url('/')?>/public/img/icon_svg/home.svg" style="width: 100%;">
                </span>&nbsp;
                <input type="text" class="form-control-mall" id="alamat" name="alamat"
                onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Alamat"
                aria-label="alamat" aria-describedby="basic-addon1" style="width: 100%;" required>
            </div>
        </div>
        <div class="input-group mb-3 div-input-mall" id="div_kelurahan">
            <span>Kategori</span>
            <div>
                <span class="input-group-text-mall">
                    <img src="<?=url('/')?>/public/img/icon_svg/kategori.svg" style="width: 100%;">
                </span>
                <select type="text" class="form-control-mall" id="kelurahan" name="kelurahan"
                onfocus="input_focus(this.id)" onblur="input_blur(this.id)" style="height: 2.5em;" required>
                <option value="" disabled selected>Pilih Kelurahan</option>
                @foreach($kelurahan as $row)
                <option value="{{$row->id}}">{{$row->kelurahan}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="input-group mb-3 div-input-mall-square" id="div_foto_toko" style="margin-top: 1em; background: white;">
        <div style="text-align: center; width: 100%; margin-top: 1.2em; margin-bottom: 0.8em;">Upload Foto Toko</div>
        <div style="display: flex; justify-content: center; width: 100%; border: 2px dashed #FF006E; margin: 0px 10% 2em 10%; height: 11.5em; cursor: pointer;" onclick="tambah_foto_toko('1')" id="div_pic_toko_1">
            <img src="<?=url('/')?>/public/img/icon_svg/add_circle_pink.svg" style="width: 2em;">
        </div>
        <div style="display: flex; justify-content: center; width: 100%; margin: 0px 10% 2em 10%; height: 11.5em; position: relative;" id="div_pic_toko_privew_1" hidden>
            <img id="pic_toko_privew_1" src="<?=url('/')?>/public/img/img.jpg" style="width: 100%; object-fit: cover;height: 100%;">
            <img id="pic_toko_1" src="<?=url('/')?>/public/img/icon_svg/add_circle_pink.svg" onclick="tambah_foto_toko('1')" style="position: absolute; right: 1em; bottom: 1em;">
        </div>
        <input hidden type="file" name="foto_toko_1" id="foto_toko_1" required>
        <div style="display: flex; justify-content: center; width: 100%; border: 2px dashed #FF006E; margin: 0px 10% 2em 10%; height: 11.5em; cursor: pointer;" onclick="tambah_foto_toko('2')" id="div_pic_toko_2">
            <img src="<?=url('/')?>/public/img/icon_svg/add_circle_pink.svg" style="width: 2em;">
        </div>
        <div style="display: flex; justify-content: center; width: 100%; margin: 0px 10% 2em 10%; height: 11.5em; position: relative;" id="div_pic_toko_privew_2" hidden>
            <img id="pic_toko_privew_2" src="<?=url('/')?>/public/img/img.jpg" style="width: 100%; object-fit: cover;height: 100%;">
            <img id="pic_toko_2" src="<?=url('/')?>/public/img/icon_svg/add_circle_pink.svg" onclick="tambah_foto_toko('2')" style="position: absolute; right: 1em; bottom: 1em;">
        </div>
        <input hidden type="file" name="foto_toko_2" id="foto_toko_2" >
        <div style="display: flex; justify-content: center; width: 100%; border: 2px dashed #FF006E; margin: 0px 10% 2em 10%; height: 11.5em; cursor: pointer;" onclick="tambah_foto_toko('3')" id="div_pic_toko_3">
            <img src="<?=url('/')?>/public/img/icon_svg/add_circle_pink.svg" style="width: 2em;">
        </div>
        <div style="display: flex; justify-content: center; width: 100%; margin: 0px 10% 2em 10%; height: 11.5em; position: relative;" id="div_pic_toko_privew_3" hidden>
            <img id="pic_toko_privew_3" src="<?=url('/')?>/public/img/img.jpg" style="width: 100%; object-fit: cover;height: 100%;">
            <img id="pic_toko_3" src="<?=url('/')?>/public/img/icon_svg/add_circle_pink.svg" onclick="tambah_foto_toko('3')" style="position: absolute; right: 1em; bottom: 1em;">
        </div>
        <input hidden type="file" name="foto_toko_3" id="foto_toko_3" >
    </div>

    <button type="submit" class="btn btn-primary" style="background: #ff006e; margin-top: 1em;border: 1px solid #ff006e;border-radius: 1.5em; padding: 0.5em 2em 0.5em 2em; width: 70%;"> Daftar
    </button>
</form>
</div>
</main>

@endsection

@section('footer-scripts')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script type="text/javascript">
    $("input[required], select[required]").attr("oninvalid",
        "this.setCustomValidity('Harap Dimasukkan')");
    $("input[required], select[required]").attr("oninput", "setCustomValidity('')");


    var i = 0;
    var jadwal_hari = [];
    var jadwal_buka = [];
    var jadwal_tutup = [];

    function input_focus(id) {
        $("#div_" + id).css('border', '1px solid #d1d2d4');
    }

    function input_blur(id) {
        $("#div_" + id).css('border', '1px solid white');
    }

    function pilih_jadwal() {
        $('#modal-jadwal').modal('show');
    }


    function tambah_foto_toko(id) {
        $("#foto_toko_"+id).click();
        $("#foto_toko_"+id).change(function () {
            readURL(this, id);
        });

    }



    function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#pic_toko_privew_'+id).attr('src', e.target.result);
                $("#div_pic_toko_privew_"+id).prop('hidden', false);
                $("#div_pic_toko_"+id).prop('hidden', true);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


    function tambah_jadwal() {
        var simbol = $("#jadwal").val();
        var hari = $("#jadwal option:selected").text();
        var waktu_tutup = $("#waktu_tutup").val();
        var waktu_buka = $("#waktu_buka").val();
        var jadwal_sample = $("#jadwal_sample").html();
        var fix_id = jadwal_sample.replaceAll(hari.replaceAll(" ", '_')).trim();
        var fix_harinya = fix_id.replaceAll("harinya", hari).trim();
        var fix_waktu = fix_harinya.replace("jamnya", waktu_buka + " - " + waktu_tutup).trim();
        var fix_simbol = fix_waktu.replace("simbolnya", simbol).trim();
        $("#jadwal_fix").append(fix_simbol);

        jadwal_hari.push(hari);
        jadwal_buka.push(waktu_buka);
        jadwal_tutup.push(waktu_tutup);

        check_select();
        i++;
    }



    function check_select() {
        var option_value = ["SH", "SS", "SJ", "S", "S", "R", "K", "J", "S", "M"];
        var option_text = ["Setiap-Hari", "Senin-Sabtu", "Senin-Jumat", "Senin", "Selasa", "Rabu", "Kamis", "Jumat",
        "Sabtu", "Minggu"
        ];
        var option = "<option disabled selected>--- Silahkan Pilih Hari ---</option>";
        for (var i = 0; i < option_text.length; i++) {
            var indikator = false;
            for (var j = 0; j < jadwal_hari.length; j++) {
                if (jadwal_hari[j] == option_text[i]) {
                    indikator = true;
                }
            }
            if (indikator == false) {
                option += "<option value='" + option_value[i] + "' >" + option_text[i] + "</option>";
            }
        }
        $("#jadwal").html(option);
        var string_hari = jadwal_hari.toString();
        var string_buka = jadwal_buka.toString();
        var string_tutup = jadwal_tutup.toString();
        $("#jadwal_hari").val(string_hari.replaceAll(",", "~"));
        $("#jadwal_buka").val(string_buka.replaceAll(",", "~"));
        $("#jadwal_tutup").val(string_tutup.replaceAll(",", "~"));

        if ($("#jadwal_hari").val() == '') {
            $("#pilih_jadwal_buka_toko").html("Pilih Jadwal Buka Tutup Toko");
        } else {
            $("#pilih_jadwal_buka_toko").html("Telah memilih Jadwal");
        }

    }

    function hapus_jadwal(hari) {
        // alert(id);
        var temp;
        for (var i = 0; i < jadwal_hari.length; i++) {
            if (jadwal_hari[i] == hari) {
                jadwal_hari[i] = jadwal_hari[i + 1];
                jadwal_buka[i] = jadwal_buka[i + 1];
                jadwal_tutup[i] = jadwal_tutup[i + 1];
            }
        }
        jadwal_hari.pop();
        jadwal_tutup.pop();
        jadwal_buka.pop();
        check_select();
        $("#" + hari.replaceAll(" ", "_")).remove();
    }

</script>
@endsection
