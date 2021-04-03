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
        <div class="banner" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
            <div >
                <img src="<?=url('/')?>/public/img/logo.svg">
                <img src="<?=url('/')?>/public/img/logo_text.svg">
            </div>
            <img src="<?=url('/')?>/public/img/home/animasi_login.gif" style="width: 100%;">
        </div>
    </div>

    <main id="homepage" class="homepage">
        <div class="card-mall">
            <div class="card-body" style="padding-top: 2em;">
                <form method="post" action="<?=url('/')?>/masuk">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleEmail" class="bmd-label-floating">Email Address / No. Whatsapp</label>
                        <input type="text" name="email" class="form-control" id="exampleEmail" required/>
                    </div>
                    <div class="form-group">
                        <label for="examplePass" class="bmd-label-floating">Password</label>
                        <input type="password" name="password" class="form-control" id="examplePass" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn" style="width: 100%; background: #FB036B;" value="Masuk">
                    </div>
                </form>
                <div class="form-group" style="display: flex; justify-content: center;">
                    <a href="https://api.whatsapp.com/send?phone=6285158362224&text=Halo%20admin,%20Saya%20lupa%20password%20saya"  style="text-align: center; color: #FB036B; font-weight: 700;">Lupa Kata Sandi?</a>
                </div>
                <div style="display: flex;justify-content: center; align-items: center;">
                    <hr style="width: 100%; margin-right: 1em;">
                    <span style="color: #9D9D9D;">Atau</span>
                    <hr style="width: 100%; margin-left: 1em;">
                </div>
                <div class="form-group">
                    <a href="<?=url('/')?>/register" class="btn" style="width: 100%; background: #0CA437;">
                        Buat Akun kitapura <i>mall</i>
                    </a>
                    {{-- <a href="<?=url('/')?>/redirectToGoogle">
                        <div class="btn" style="width: 100%; background: #EAF4FF; color: #575757; display: flex;">
                            <span class="" style="width: 15%; display: flex; justify-content: center;">
                                <img src="<?=url('/')?>/public/img/home/google-icon.svg" style="width: 1.5em;">
                            </span>
                            <span style="width: 70%;">Google</span>
                            <span style="width: 15%; color: #EAF4FF">a</span>
                        </div>
                    </a>
                    <div class="btn" style="width: 100%; background: #00A3FF; display: flex; margin-top: 0.8em;">
                        <span class="" style="width: 15%; display: flex; justify-content: center;">
                            <img src="<?=url('/')?>/public/img/home/facebook-icon.svg" style="width: 1.5em;">
                        </span>
                        <span style="width: 70%;">Facebook</span>
                        <span style="width: 15%; color: #00A3FF">a</span>
                    </div> --}}
                </div>

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


<script type="text/javascript">
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