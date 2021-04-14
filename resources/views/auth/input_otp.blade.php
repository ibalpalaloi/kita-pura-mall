<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="HandheldFriendly" content="true" />     
    <link rel="stylesheet" type="text/css" href="<?=url('/')?>/public/template/admin/dist/css/style.min.css">
    <link href="<?=url('/')?>/public/plugins/material-design/css/material-design.min.css" rel="stylesheet">
    <link href="<?=url('/')?>/public/plugins/material-design/demo/demo.css" rel="stylesheet">

    <style type="text/css">

        .hBSxmh {
            max-width: 480px;
            width: 100%;
            display: flex;
            height: 60px;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: justify;
            justify-content: space-between;
            margin: 0px auto;
        }

        a {
            text-decoration: none;
            color: #00aeef;
            transition: all .35s ease;
            background-color: transparent;
        }

        .sUjAJ {
            background: white;
            display: flex;
            -webkit-box-pack: justify;
            justify-content: space-between;
            -webkit-box-align: center;
            align-items: center;
            border: none;
            color: #dedede;
            padding: 0px 15px;
            font-size: 12px;
            height: 36px;
            width: 100%;
            border-radius: 5px;
            margin-right: 15px;
        }   
        
        .svg-inline--fa, svg:not(:root).svg-inline--fa {
            overflow: visible;
        }

        svg:not(:root).svg-inline--fa {
            overflow: visible;
        }
        .svg-inline--fa.fa-w-16 {
            width: 1em;
        }
        .svg-inline--fa.fa-w-16 {
            width: 1em;
        }
        .svg-inline--fa {
            display: inline-block;
            font-size: inherit;
            height: 1em;
            vertical-align: -.125em;
        }
        .svg-inline--fa {
            display: inline-block;
            font-size: inherit;
            height: 1em;
            overflow: visible;
            vertical-align: -0.125em;
        }
        .clPWcC {
            max-width: 1020px;
            margin: 0px auto;
            padding-top: 5px;
        }
        .iBqPAl {
            margin: 15px 0px 0px;
            font-weight: 600;
            font-size: 18px;
            line-height: 23px;
        }
        .kyUdEc {
            padding: 20px 0px;
        }

        .jEenUH {
            display: inline-block;
            border: 0px;
            font-weight: 700;
            line-height: normal;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            transition: all 0.35s ease 0s;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            text-decoration: none;
            width: 100%;
            padding: 11px 37.5px;
            font-size: 16px;
            border-radius: 20px;
            background-color: rgb(0, 174, 239);
            color: rgb(255, 255, 255);
        }

        .calMVq {
            display: flex;
            font-weight: 700;
            line-height: normal;
            text-align: center;
            -webkit-box-pack: center;
            justify-content: center;
            vertical-align: middle;
            cursor: pointer;
            transition: all 0.35s ease 0s;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            text-decoration: none;
            width: 100%;
            padding: 11px 37.5px;
            font-size: 16px;
            border-radius: 20px;
            background-color: rgb(255, 255, 255);
            color: rgb(0, 174, 239);
            border: 1px solid rgb(0, 174, 239);
        }

        .dcmUJR {
            margin-right: 8px;
        }

        .homepage {
            background-color: white;
            position: relative;
            /*top: 60px;*/
            max-width: 480px;
            width: 100%;
            margin: 0px auto;
            padding: 0px 16px 1em;
            box-sizing: border-box;

        }   

        .container-mall {
            max-width: 480px;
            width: 100%;
            margin: 0px auto;
            padding: 0px 16px 0px;
            box-sizing: border-box; 
        }

        .banner {
            max-width: 480px;
            width: 100%;
            margin: 0px auto;
            padding: 2em 0em 1em 0em;
        }

        .header {
            background: #fb036b;
            position: fixed;
            width: 100%;
            top: 0px;
            left: 0px;
            right: 0px;
            z-index: 11;                
        }


        .card-mall {
            border-radius: 1.5em;   
            /*border: 2px solid red;            */
            margin-bottom: 1em;
            /*margin-top: 1em;*/
        }

        .kategori {
            padding: 0.8em 0em 1em 0em;
            display: flex; 
            position: relative; 
            top: -3em; 
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

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            color: white;
            text-align: center;
            background-color: transparent;
        }

        .footer-mall-menu {
            background: white;
            box-shadow: rgba(152, 152, 152, 0.5) 0px 2px 8px 1px;
            border-radius: 3em;         
            margin-bottom: 1em; 

        }

        .sosmed > img {
            margin: 0px 0.6em 0px 0.6em !important;
        }

        .loader-container{
            width: 100%;
            height: 100vh;
            position: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        input::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
          color: white !important;
          opacity: 1; /* Firefox */
      }

      input:-ms-input-placeholder { /* Internet Explorer 10-11 */
          color: white !important;
      }

      input::-ms-input-placeholder { /* Microsoft Edge */
          color: white !important;
      }

      body {
        background: white !important;
    }

    .btn {
        text-transform: none;
        font-size: 0.9em;
    }
</style>
</head>
<div class="modal fade" id="modal_loader" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content st0" style="border-radius: 1.2em; display: flex; justify-content: center; align-items: center; margin: 8em 1em 0em 1em; color: white; border: #353535;">
			<div class="loader-container">
				<div class="spinner-border text-danger" role="status">
					<span class="sr-only">Loading...</span>
				</div>
			</div>
		</div>
    </div>
</div>
<body style="margin: 0px; background: #EAF4FF;">
    @if(Session::get('message') == 'Masih Menunggu')
    <div class="modal fade" id="modal-verifikasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
        <div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
            <div class="modal-content" style="border-radius: 1.2em; background: #ff006e; display: flex; justify-content: center; align-items: center; margin: 8em 1em 0em 1em; color: white;">
                <div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
                    <img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: -1em; right: 0;">
                    <img src="<?=url('/')?>/public/img/mitra/modal_daftar_register.svg" style="width: 80%; position: absolute; top: -16em;">
                    <div style="font-size: 2em; font-weight: 600; margin-top: 1em;">Mohon Tunggu...</div>
                    <div style="font-size: 1.1em; text-align: center; width: 90%; font-weight: 0; color: #ffe6f1;">kitapuramall akan mengkonfirmasi permintaan anda. mohon tunggu konfirmasi</div>
                    <a href="<?=url('/')?>/akun/pengaturan-profil" style="margin-bottom: 1em; font-size: 1.1em;margin-top: 0.5em; text-align: center; text-decoration: underline; color: white;">Konfirmasi lama? Klik disini
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="wrapper" style="background: #FB036B; position: relative; z-index: -1; height: 100%;">
        <div class="banner" style="display: flex; justify-content: flex-end;">
            <div class="" style="width: 30%; display: flex; align-items: flex-start; flex-direction: column; padding-top: 4em; padding-left: 2em;">
                <img src="<?=url('/')?>/public/img/logo.svg" style="width: 30%; width: 60%;">
                <img src="<?=url('/')?>/public/img/logo_text_vertical.svg" style="width: 30%; width: 90%; margin-top: 0.7em;">
            </div>
            <img src="<?=url('/')?>/public/img/user/img_user.png" style="width: 70%;">
        </div>
    </div>

    <main id="homepage" class="homepage">
        <div class="card-mall">
            <div class="card-body" style="padding-top: 2em;">
                <p>Kode Otp Dikirimkan ke akun whatapps dan email yang sebelumnya anda masukkan</p>
                <form method="post" action="<?=url('/')?>/buat-akun/post_otp" id="form_input">
                    {{ csrf_field() }}
                    <input type="text" name="email" value="{{$email}}" hidden>
                    <input type="text" name="no_hp" value="{{$no_hp}}" hidden>
                    <div class="form-group">
                        <label for="exampleEmail" class="bmd-label-floating" id="label_kode_otp" style="color: #999797">Kode OTP</label>
                        <input  type="number" name="kode_otp" id="kode_otp" class="form-control" id="exampleEmail"/>
                    </div>
                    <div class="form-group" style="display: flex;justify-content: center; flex-direction: column;">

                        <button onclick="cek_submit()" type="button" class="btn" style="width: 100%; background: #0CA437;">
                            Masukkan OTP
                        </button>
                        <a href="<?=url('/')?>" style="color:#353535;width: 100%; text-align: center; font-size: 0.9em; margin-top: 0.5em;">Sudah punya akun? <span style="color: #FB036B; font-weight: 600; text-decoration: underline;">Masuk disini</span></a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="<?=url('/')?>/public/plugins/material-design/js/core/popper.min.js"></script>
<script src="<?=url('/')?>/public/plugins/material-design/js/core/bootstrap-material-design.min.js"></script>
<script src="<?=url('/')?>/public/plugins/material-design/js/plugins/perfect-scrollbar.jquery.min.js"></script>

<script src="<?=url('/')?>/public/plugins/material-design/js/material-dashboard.min.js?v=2.1.0"></script>

<script>
    var status_email = 0;
    var status_no_hp = 0;
    var status_password = 0;
    var result_no_hp = "";
    var result_email = "";
    
    $('#email').change(function(){
        var email = $(this).val();
        if(email != "" && email != result_email){
            $.ajax({
            url: "<?=url('/')?>/register/cek_email",
            method: "post",
            data : {email:email, _token:'{{csrf_token()}}'},
            success:function(result)
            {
                if(result.data['status'] == "false"){
                    $('#label_email').css('color', 'red');
                    $('#label_email').text('Email Telah Tersedia');
                    status_email = 0;
                }
                else{
                    $('#label_email').css('color', '#999797');
                    $('#label_email').text('Alamat Email');
                    status_email = 1;
                }
            }
            })
            result_email = email;
            // console.log(result_email);
        }
        
    });

    $('#no_hp').change(function(){
        var no_hp = $(this).val();
        if(no_hp != result_no_hp && no_hp != ""){
            result_no_hp = no_hp;
            $.ajax({
                url: "<?=url('/')?>/register/cek_no_hp",
                method: "post",
                data : {no_hp:no_hp, _token:'{{csrf_token()}}'},
                success:function(result)
                {
                    if(result.data['status'] == "false"){
                        result_no_hp = no_hp;
                        status_no_hp = 0;
                        $('#label_no_hp').css('color', 'red');
                        $('#label_no_hp').text('Nomor Telah Tersedia');
                    }
                    else{
                        result_no_hp = no_hp;
                        status_no_hp = 1;
                        $('#label_no_hp').css('color', '#999797')
                        $('#label_no_hp').text('Nomor Whatsapp')
                    }
                }
            })
            // console.log(result_no_hp);
        }
        
    });
</script>
<script type="text/javascript">
    function cek_submit(){
        var kode_otp = $('#kode_otp').val()
        if(kode_otp.length < 6){
            $('#label_kode_otp').css('color', 'red');
            $('#label_kode_otp').text('Kode Otp Terdiri dari 6 Angka');
        }
        else if(kode_otp.length > 6){
            $('#label_kode_otp').css('color', 'red');
            $('#label_kode_otp').text('Kode Otp Terdiri dari 6 Angka');
        }
        else{
            $('#form_input').submit();
        }
    }

    function cek_password(){
        var password = $('#password').val();
        if(password.length >= 8){
            status_password = 1;
        }
        else{
            $('#label_password').text('Password (Minimal 8 Karakter)');
            $('#label_password').css('color', 'red')
            status_password = 0;
        }
    }

    (function($) {
        $.fn.nodoubletapzoom = function() {
            $(this).bind('touchstart', function preventZoom(e) {
                var t2 = e.timeStamp
                , t1 = $(this).data('lastTouch') || t2
                , dt = t2 - t1
                , fingers = e.originalEvent.touches.length;
                $(this).data('lastTouch', t2);
                if (!dt || dt > 500 || fingers > 1) return; 
                e.preventDefault();
                $(this).trigger('click').trigger('click');
            });
        };
    })(jQuery);     

    $('#nomor_hp').keyup(function(){
        $(this).val($(this).val().replace(/(\d{3})\-?(\d{4})\-?(\d{4})/,'$1-$2-$3'))
    });     

    @if(Session::get('message') == 'Masih Menunggu')
    $('#modal-verifikasi').modal('show');
    @endif

    $( "#form_input").submit(function( event ) {
        show_loader();
    });

    function show_loader(){
        console.log('show');
        $("#modal_loader").modal("show");
    };

    function hide_loader(){
        console.log('hide');
        $("#modal_loader").modal("hide");
    };
</script>
</html>