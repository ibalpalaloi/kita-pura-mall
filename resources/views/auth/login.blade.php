<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="HandheldFriendly" content="true" />     
    <link rel="stylesheet" type="text/css" href="<?=url('/')?>/public/template/admin/dist/css/style.min.css">
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
            min-height: calc(100vh - 60px); 

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
            padding: 4em 0em 4em 0em;
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
            background: white;
            box-shadow: rgba(152, 152, 152, 0.5) 0px 2px 8px 1px;
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
  </style>
</head>
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

    <header class="style__Container-sc-3fiysr-0 header">
        <div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: center;">
            <a id="defaultheader_logo" title="Kitapura Mall" href="/">
                <img src="<?=url('/')?>/public/img/logo.svg">&nbsp;
                <img src="<?=url('/')?>/public/img/logo_text.svg">
            </a>
        </div>
    </header>

    <div class="wrapper" style="background: #EAF4FF; margin-top: 2em; display: flex; justify-content: center;">
        <div class="banner" style="display: flex;justify-content: center; flex-direction: column; align-items: center;">
            <img src="<?=url('/')?>/public/img/register/mitra_login.svg" style="width: 75%;">
            <div style="color: white; text-align: center; padding-top: 0em; display: flex; justify-content: center; flex-direction: column; align-items: center; ">
                <h4 style="color: black; font-weight: 500; margin-top:0px;">Spesial!! Jadilah Mitra <br>Pertama di kitapuramall</h4>
                <div style="color: #7D7D7D; width: 80%; line-height: 1.3em; font-size:0.85em;">buat kalian yang punya usaha, silahkan daftar sekarang. dan nikmati fitur mitra premium di kitapuramall gratis. kuota terbatas. kesempatan ini dibuka dari tanggal <span style="font-weight: 600; color: black;">21 - 30 Maret 2021</span> sebelum aplikasi kitapuramall Terbuka untuk umum. <span style="font-weight: 600; color: black;"><br>Buruan daftar sekarang!!!</span></div>
            </div>
        </div>
    </div>
    <div class="footer" style="background: #EAF4FF;">
        <div style="color: #353535; font-weight: 500;">Silahkan daftarkan nomor hp anda</div>
        <form action="<?=url('/masuk')?>" method="post" class="container-mall" style="display: flex; justify-content: space-around; width: 100%;">
            {{csrf_field()}}
            <div class="footer-mall-menu" style="width: 100%; height: 3.5em; display: flex; align-items: center; justify-content: space-around; background: #fb036b;">
                <div style="display: flex; justify-content: row; align-items: center; margin-left: 1.5em;">
                    <div style="padding-top: 0.5em;">
                        <img src="<?=url('/')?>/public/img/register/indonesia.svg">
                    </div>
                    <div>
                        <span style="color: white;">+62&nbsp;</span>
                    </div>
                </div>
                <div>
                    <input type="text" name="nomor_hp" id="nomor_hp" class="form-control" style="width: 90% !important; padding: .375rem; border: none; background: #fb036b; color: white;" placeholder="851-5628-9855" name="no_telp" required>
                </div>
                <div style="display: flex; justify-content: row; align-items: center; margin-right: 1.5em;">
                    <button type="submit" class="btn" style="text-align: center;">
                        <i class="fas fa-sign-in-alt" style="color: white; font-size: 1.5em;"></i>
                    </button>
                </div>
            </div> 
        </form>
    </div>
</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

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

</script>
</html>