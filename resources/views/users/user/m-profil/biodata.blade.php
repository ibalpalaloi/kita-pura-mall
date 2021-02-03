@extends('layouts.home')

@section('title')
Biodata |
@endsection

@section('header-scripts')
<style type="text/css">
    .banner {
        max-width: 480px;
        width: 100%;
        margin: 0px auto;
        padding: 5em 0em 5em 0em;
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


    .profile-picture {
        background: white;
        box-shadow: rgba(152, 152, 152, 0.5) 0px 2px 8px 1px;
        border-radius: 50%;
        margin-bottom: 1em;
        display: flex;
        width: 30%;
        position: relative;
        top: -4em;
        margin-bottom: -2em;
        z-index: 2;
        overflow-y: visible;
        overflow-x: auto;

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

    input:focus {
        border: none;
    }

    .form-control {
        border: none;
    }

    .div-input-mall {
        border-radius: 1.5em;
        border: 1px solid #d1d2d4;
    }

    .input-group-text-mall {
        border: none;
        display: flex;
        justify-content: center;
        width: 3em;
        height: 3em;
        border-bottom-left-radius: 1.5em;
        border-top-left-radius: 1.5em;
        background: white;
    }

    .form-control-mall {
        height: 3em;
        border-bottom-right-radius: 1.5em;
        border-top-right-radius: 1.5em;
        border-left: none;
        padding-left: 0.2em;
    }

    .homepage {
        min-height: calc(60vh - 60px);
    }

</style>
@endsection

@section('content')
<header class="style__Container-sc-3fiysr-0 header">
    <div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: center;">
        <a id="defaultheader_logo" title="Kitabisa" style="margin-left: 20px; height:33px;margin-right:20px" href="/">
            <img src="<?=url('/')?>/public/img/logo.svg">
            <img src="<?=url('/')?>/public/img/logo_text.svg">
        </a>
    </div>
</header>

<div class="wrapper"
    style="background: #ff006e; position: relative; z-index: -1;border-bottom-left-radius:70%;border-bottom-right-radius:70%;">
    <div class="banner">

    </div>
</div>

<main id="homepage" class="homepage">

    <div class="" style="display: flex; justify-content: center;">
        <div class="profile-picture">
            <img src="<?=url('/')?>/public/img/user/profile_picture/fathul.jpg" style="width: 100%;">
        </div>
    </div>
    <form action="<?=url('/')?>/akun/pengaturan-profil/simpan-biodata" method="post">
        {{csrf_field()}}
        <input type="hidden" value="PUT" name="_method">
        <div class="input-group mb-3 div-input-mall" id="div_nama_lengkap">
            <div class="input-group-prepend">
                <span class="input-group-text input-group-text-mall">
                    &nbsp;&nbsp;&nbsp;<img src="<?=url('/')?>/public/img/icon_svg/people.svg">
                </span>
            </div>
            <input type="text" class="form-control form-control-mall" id="nama_lengkap" name="nama_lengkap"
                onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Nama lengkap"
                aria-label="Nama lengkap" aria-describedby="basic-addon1" required
                oninvalid="this.setCustomValidity('Harap Masukkan Nama Lengkap')" oninput="setCustomValidity('')"
                value="{{$biodata->nama}}">
        </div>
        <div class="input-group mb-3 div-input-mall" id="div_alamat">
            <div class="input-group-prepend">
                <span class="input-group-text input-group-text-mall">
                    <img src="<?=url('/')?>/public/img/icon_svg/location.svg">
                </span>
            </div>
            <input type="text" class="form-control form-control-mall" id="alamat" name="alamat"
                onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Alamat" aria-label="alamat"
                aria-describedby="basic-addon1" required oninvalid="this.setCustomValidity('Harap Masukkan Alamat')"
                oninput="setCustomValidity('')" value="{{$biodata->alamat}}">
        </div>
        <div class="input-group mb-3 div-input-mall" id="div_username">
            <div class="input-group-prepend">
                <span class="input-group-text input-group-text-mall">
                    &nbsp;&nbsp;&nbsp;<img src="<?=url('/')?>/public/img/icon_svg/people.svg">
                </span>
            </div>
            <input type="text" class="form-control form-control-mall" id="username" name="username"
                onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="Username" aria-label="Username"
                aria-describedby="basic-addon1" required oninvalid="this.setCustomValidity('Harap Masukkan Username')"
                oninput="setCustomValidity('')" value="{{$biodata->username}}">
        </div>
        <div class="input-group mb-3 div-input-mall" id="div_no_hp">
            <div class="input-group-prepend">
                <span class="input-group-text input-group-text-mall">
                    <img src="<?=url('/')?>/public/img/icon_svg/handphone.svg">
                </span>
            </div>
            <input type="text" class="form-control form-control-mall" id="no_hp" onfocus="input_focus(this.id)"
                onblur="input_blur(this.id)" placeholder="Nomor Handphone" aria-label="no_hp"
                aria-describedby="basic-addon1" required Readonly
                oninvalid="this.setCustomValidity('Harap Masukkan Nomor Handphone')" oninput="setCustomValidity('')"
                value="{{Session::get('no_telp')}}">
        </div>
        <div class="float-right">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>

    @if(Session::has('message'))
    <div id="modal-pemberitahuan" class="modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
<script src="<?=url('/')?>/public/template/admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="<?=url('/')?>/public/template/admin/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>

<script>
    @if(Session::has('message'))
    $('#modal-pemberitahuan').modal('show')
    @endif

</script>
<script type="text/javascript">
    function input_focus(id) {
        $("#div_" + id).css('border', '1px solid #525f7f');

    }

    function input_blur(id) {
        $("#div_" + id).css('border', '1px solid #d1d2d4');
    }

</script>
@endsection
