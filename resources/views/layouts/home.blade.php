<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="HandheldFriendly" content="true"/>
    <title>@yield('title')Kitapura Mall</title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="icon" type="image/png" sizes="60x60" href="{{asset('public/img/icon.png')}}">
    <link rel="stylesheet" type="text/css" href="<?=url('/')?>/public/template/admin/dist/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="<?=url('/')?>/public/css/kitapura.css">
    <style type="text/css">
        body {
          font-family: 'Roboto', sans-serif;
      }

      .countdown-period {
        /*display: none;*/
    }
    .loader-container{
        width: 100%;
        height: 100vh;
        position: fixed;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
@yield('header-scripts')

</head>
{{-- modal loader --}}
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

<body style="background: #eaf4ff !important;">
    @php  $show = ""; @endphp
    @if(Session::get('status_nomor') == 'Belum Terverifikasi')

    @php
    date_default_timezone_set('Asia/Makassar');
    $waktu = date('Y-m-d H:i:s');
    $user = \App\Models\User::where('id', Session::get('id_user'))->first();
    if ($user->waktu_validasi == null){
    $show = "finish";
}
else {
$newtimestamp = strtotime("$user->waktu_validasi + 1 minute");
$deadline = date('Y-m-d H:i:s', $newtimestamp);
$diff  = strtotime($deadline) - strtotime($waktu);
if ($diff > 0){
$show = "wait";
}
else {
$user->waktu_validasi = null;
$user->save();
$show = "finish";
}
}
@endphp
{{-- <div class="modal fade" id="modal-otp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
    <div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
        <div class="modal-content" style="border-radius: 1.2em; background: #ff006e; display: flex; justify-content: center; align-items: center; margin: 12em 1em 0em 1em; color: white;">
            <div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
                <img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: -1em; right: 0;">
                <img src="<?=url('/')?>/public/img/mitra/modal_otp.svg" style="width: 80%; position: absolute; top: -15em;">
                <div style="font-size: 2em; font-weight: 600; margin-top: 0em;">Masukan Kode OTP</div>
                <div id="prepare_otp" style="width: 100%; display: flex; justify-content: center; flex-direction: column; align-items: center;" @if($show=='wait') hidden @endif>
                    <div style="font-size: 1em; text-align: center; width: 80%; font-weight: 0; color: #ffe6f1;">silahkan cek whatsapp anda, dan <span onclick="masukan_otp()" style="font-weight: 500; text-decoration: underline;">masukan</span> kode yang kami kirimkan ke nomor</div>
                    <div class="container-mall" style="display: flex; justify-content: space-around;" id="div_no_telp_fix">
                        <div class="footer-mall-menu" style="width: 90%; height: 3.5em; display: flex; align-items: center; justify-content: space-around; background: #e9ecef; position: relative;">
                            <div>
                                <input readonly value="{{Session::get('no_telp')}}" name="no_telp" type="text" id="no_telp_fix" class="form-control" style="width: 100% !important; padding: .375rem; border: none; text-align: center;">
                            </div>
                            <img src="<?=url('/')?>/public/img/icon_svg/edit_black.svg" style="position: absolute; right: 1.5em; bottom: 1em;" onclick="ubah_nomor()">

                        </div>
                    </div>
                    <div class="container-mall" style="display: flex; justify-content: space-around;"  hidden id="div_no_telp_edit">
                        <div class="footer-mall-menu" style="width: 90%; height: 3.5em; display: flex; align-items: center; justify-content: space-around; background: white; position: relative;">
                            <div>
                                <input value="{{Session::get('no_telp')}}" name="no_telp" type="text" id="no_telp_edit"
                                class="form-control" style="width: 100% !important; padding: .375rem; border: none; text-align: center;">
                            </div>
                        </div>
                    </div>

                    <div class="container-mall" style="display: flex; justify-content: space-around;" @if($show=='wait') hidden @endif id="btn_kirim">
                        <button type="submit" class="btn" style="border-radius: 2em; background: #FFBD03; color: white; padding: 0.9em 0em 0.9em 0em; width: 90%; margin-bottom: 1.5em;" onclick="kirim_otp()">
                            <img src="<?=url('/')?>/public/img/icon_svg/send_white.svg" style="position: absolute; left: 2em;">
                            <div>Kirim</div>
                        </button>
                    </div>
                    <div class="container-mall" style="display: flex; justify-content: space-around;"  @if($show=='finish') hidden @endif hidden id="btn_wait">
                        <button type="submit" class="btn btn-secondary" style="border-radius: 2em; color: white; padding: 0.9em 0em 0.9em 0em; width: 90%; margin-bottom: 1.5em;"\>
                            <div class="wait_start" style="color: white;" @if($show=='finish') hidden @endif>02:00</div>
                        </button>
                    </div>
                </div>
                <div id="verifikasi_otp" style="width: 100%; display: flex; justify-content: center; flex-direction: column; align-items: center;" @if($show=='finish') hidden @endif>
                    <div style="font-size: 1em; text-align: center; width: 100%; font-weight: 0; color: #ffe6f1;">silahkan cek whatsapp anda, dan masukan kode yang kami kirimkan ke nomor <span id="nomor_wa_verifikasi" style="font-weight: 500; text-decoration: underline;" onclick="cek_nomor()">{{Session::get('no_telp')}}</span></div>

                    <div class="container-mall" style="display: flex; justify-content: space-around;">
                        <div class="footer-mall-menu" style="width: 90%; height: 3.5em; display: flex; align-items: center; justify-content: space-around;">
                            <div>
                                <input type="text" name="nomor_hp" id="nomor_hp" class="form-control" style="width: 100% !important; padding: .375rem; border: none; text-align: center;" placeholder="XXXXXX">
                            </div>
                        </div> 
                    </div>
                    <div class="container-mall" style="display: flex; justify-content: space-around;">
                        <button type="submit" class="btn" style="border-radius: 2em; background: #FFBD03; color: white; padding: 0.9em 0em 0.9em 0em; width: 90%;">
                            <img src="<?=url('/')?>/public/img/icon_svg/send_white.svg" style="position: absolute; left: 2em;">
                            <div>Kirim</div>

                        </button>
                    </div>
                    <div style="width: 100%; display: flex; justify-content: center; flex-direction: column; align-items: center;">
                        <div onclick="kirim_ulang_otp()" style="margin-top: 0.5em; color: white; text-decoration: underline;" id="wait_finish" @if($show=='wait') hidden @endif>Kode Belum diterima? Klik Disini!</div>
                        <span id="timer"></span>
                        <div class="wait_start" style="margin-top: 0.5em; color: white;" @if($show=='finish') hidden @endif>02:00</div>
                        <div style="margin-top: 0.5em; color: white; text-decoration: underline;" id="wait_admin" hidden>Hubungi Admin</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@else
@if(Session::get('progress_biodata') != '5')
<div class="modal fade" id="modal-sukses" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
    <div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
        <div class="modal-content" style="border-radius: 1.2em; background: #ff006e; display: flex; justify-content: center; align-items: center; margin: 8em 1em 0em 1em; color: white;">
            <div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
                <img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: -1em; right: 0;">
                <img src="<?=url('/')?>/public/img/mitra/modal_1_step.svg" style="width: 80%; position: absolute; top: -10.5em;">
                <div style="font-size: 2em; font-weight: 600; margin-top: 1em;">1 Step Lagi</div>
                <div style="font-size: 1.1em; text-align: center; width: 80%; font-weight: 0; color: #ffe6f1;">lengkapi data diri anda, agar dapat <span style="font-weight: 600;">bertransaksi</span> di kitapura mall</div>
                <a href="<?=url('/')?>/akun/pengaturan-profil" class="btn btn-primary" style="background: #ffaa00;;border: 1px solid #ffaa00; border-radius: 1.5em; padding: 0.5em 2em 0.5em 2em; margin-bottom: 1em; font-size: 1.2em; display: flex; justify-content: center;align-items: center; margin-top: 0.5em;"><img src="<?=url('/')?>/public/img/icon_svg/edit_white.svg">&nbsp;&nbsp;Lengkapi
                </a>
            </div>
        </div>
    </div>
</div>
@endif
@endif  

<div class="modal fade" id="modal-cooming-soon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
    <div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
        <div class="modal-content" style="border-radius: 1.2em; background: transparent; display: flex; justify-content: center; align-items: center; margin: 0em 0em 0em 0em; color: white; border: none; box-shadow: none;">
            <div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
                <img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: 30%; right: 1em;">
                <img src="<?=url('/')?>/public/img/modal_assets/modal_cooming_soon.svg" style="width: 100%;">
                <div style="position: absolute; margin: 2.5em 1.5em 0em 1.5em; padding: 0em 1.5em 0em 1.5em; top: 60%;">
                    <div style="font-size: 2em; font-weight: 600; text-align: center;">Sabar Yaa...</div>
                    <div style="font-size: 1em; text-align: center; width: 100%; font-weight: 0; color: #ffe6f1; margin-bottom: 1.2em;">Untuk Sekarang Fitur ini masih belum bisa ditampilkan</div>
                </div>
            </div>
        </div>
    </div>
</div>


@yield("content")
<div class="footer">
    <div class="container-mall footer-mall-menu" style="display: flex; justify-content: space-around;">
        @php
        $menu_color = array('pencarian_color.svg', 'toko_color.svg', 'akun_color.svg');
        $menu = array('pencarian.svg', 'toko.svg', 'akun.svg');
        $nama_menu = array('Pencarian', 'Toko', 'Akun');
        $link_menu = array('pencarian', 'toko','akun');
        $link_now = Request::segment(1);
        @endphp 
        <div style="display: flex; justify-content: center; flex-direction: column; align-items: center; margin: 0em 0.1em 0em 0.1em;">
            <div style="height: 5em; width: 3em; display: flex; flex-direction: column; align-items: center; margin: 0.4em 0em 0.4em 0em; justify-content: center;" onclick="cooming_soon()">
                <div style="background: #6c757d; border: 2px solid #6c757d; width: 3em; height: 3em; border-radius: 1.5em; margin-bottom: 0.3em; display: flex;justify-content: center;" >
                    <img src="<?=url('/')?>/public/img/menu/beranda.svg" style="width: 60%;">
                </div>
                <div style="text-align: center; font-size: 0.7em; color: #5b5b5b;">Beranda</div>
            </div>
        </div> 
        @for ($i = 0; $i < count($menu)-2; $i++)  
        <div style="display: flex; justify-content: center; flex-direction: column; align-items: center; margin: 0em 0.1em 0em 0.1em;" onclick="show_loader()">
            <div style="height: 5em; width: 3em; display: flex; flex-direction: column; align-items: center; margin: 0.4em 0em 0.4em 0em; justify-content: center;">
                <a style="@if ($link_menu[$i] == $link_now) background: #ff006e; @else background: white; border: 2px solid #ff006e; @endif width: 3em; height: 3em; border-radius: 1.5em; margin-bottom: 0.3em; display: flex;justify-content: center;" href="<?=url('/')?>/{{$link_menu[$i]}}">
                    @if ($link_menu[$i] == $link_now)
                    <img src="<?=url('/')?>/public/img/menu/{{$menu[$i]}}" style="width: 60%;">
                    @else
                    <img src="<?=url('/')?>/public/img/menu/{{$menu_color[$i]}}" style="width: 60%;">
                    @endif
                </a>
                <div style="text-align: center; font-size: 0.7em; color: #5b5b5b;">{{$nama_menu[$i]}}</div>
            </div>
        </div> 
        @endfor
        <div style="display: flex; justify-content: center; flex-direction: column; align-items: center; margin: 0em 0.1em 0em 0.1em;">
            <div style="height: 5em; width: 3em; display: flex; flex-direction: column; align-items: center; margin: 0.4em 0em 0.4em 0em; justify-content: center;" onclick="cooming_soon()">
                <div style="background: #6c757d; border: 2px solid #6c757d; width: 3em; height: 3em; border-radius: 1.5em; margin-bottom: 0.3em; display: flex;justify-content: center;">
                    <img src="<?=url('/')?>/public/img/menu/emergency_disabled.svg" style="width: 70%;">
                </div>
                <div style="text-align: center; font-size: 0.7em; color: #5b5b5b;">Emergency</div>
            </div>
        </div> 
        @for ($i = 1; $i < count($menu)-1; $i++)  
        <div style="display: flex; justify-content: center; flex-direction: column; align-items: center; margin: 0em 0.1em 0em 0.1em;" onclick="show_loader()">
            <div style="height: 5em; width: 3em; display: flex; flex-direction: column; align-items: center; margin: 0.4em 0em 0.4em 0em; justify-content: center;">
                <a style="@if ($link_menu[$i] == $link_now) background: #ff006e; @else background: white; border: 2px solid #ff006e; @endif width: 3em; height: 3em; border-radius: 1.5em; margin-bottom: 0.3em; display: flex;justify-content: center;" href="<?=url('/')?>/{{$link_menu[$i]}}">
                    @if ($link_menu[$i] == $link_now)
                    <img src="<?=url('/')?>/public/img/menu/{{$menu[$i]}}" style="width: 60%;">
                    @else
                    <img src="<?=url('/')?>/public/img/menu/{{$menu_color[$i]}}" style="width: 60%;">
                    @endif
                </a>
                <div style="text-align: center; font-size: 0.7em; color: #5b5b5b;">{{$nama_menu[$i]}}</div>
            </div>
        </div> 
        @endfor
        <div style="display: flex; justify-content: center; flex-direction: column; align-items: center; margin: 0em 0.1em 0em 0.1em;">
            <a href="https://lprmsulteng.com/mobile/mobil" style="height: 5em; width: 3em; display: flex; flex-direction: column; align-items: center; margin: 0.4em 0em 0.4em 0em; justify-content: center;">
                <div style="background: white; border: 2px solid #ff006e; width: 3em; height: 3em; border-radius: 1.5em; margin-bottom: 0.3em; display: flex;justify-content: center;">
                    <img src="<?=url('/')?>/public/img/menu/rental_mobil.svg" style="width: 60%;">
                </div>
                <div style="text-align: center; font-size: 0.7em; color: #5b5b5b; white-space: nowrap;">Rental Mobil</div>
            </a>
        </div>        
        @for ($i = 2; $i < count($menu); $i++)  
        <div style="display: flex; justify-content: center; flex-direction: column; align-items: center; margin: 0em 0.1em 0em 0.1em;" onclick="show_loader()">
            <div style="height: 5em; width: 3em; display: flex; flex-direction: column; align-items: center; margin: 0.4em 0em 0.4em 0em; justify-content: center;">
                <a style="@if ($link_menu[$i] == $link_now) background: #ff006e; @else background: white; border: 2px solid #ff006e; @endif width: 3em; height: 3em; border-radius: 1.5em; margin-bottom: 0.3em; display: flex;justify-content: center;" href="<?=url('/')?>/{{$link_menu[$i]}}">
                    @if ($link_menu[$i] == $link_now)
                    <img src="<?=url('/')?>/public/img/menu/{{$menu[$i]}}" style="width: 60%;">
                    @else
                    <img src="<?=url('/')?>/public/img/menu/{{$menu_color[$i]}}" style="width: 60%;">
                    @endif
                </a>
                <div style="text-align: center; font-size: 0.7em; color: #5b5b5b;">{{$nama_menu[$i]}}</div>
            </div>
        </div> 
        @endfor

    </div>
</div>
</body>    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script type="text/javascript" src="<?=url('/')?>/public/plugins/countdown/js/jquery.plugin.js"></script>
<script type="text/javascript" src="<?=url('/')?>/public/plugins/countdown/js/jquery.countdown.js"></script>
<script type="text/javascript">



    @if(Session::get('status_nomor') == 'Belum Terverifikasi')
    $('#modal-otp').modal('show');
    @else
    @if(Session::get('progress_biodata') != '5')
    $('#modal-sukses').modal('show');
    @endif
    @endif

    @if ($show == 'wait')
    $(".wait_start").html(secondsTimeSpanToHMS(<?=$diff?>));
    var myCounter = new Countdown({  
        seconds:<?=$diff?>,
        onUpdateStatus: function(sec){
                            $(".wait_start").html(secondsTimeSpanToHMS(sec)); // watch for spelling
                        }, 
                        onCounterEnd: function(){
                            $("#wait_finish").prop('hidden', false);
                            $(".wait_start").prop('hidden', true);     
                            $("#wait_admin").prop('hidden', false);     
                            $("#btn_wait").prop('hidden', true);   
                            $("#btn_kirim").prop('hidden', false);    
                            $.ajax({
                                url:"{{ route('set-null') }}",
                                method: "post",
                                data : {nomor:"1", _token:'{{csrf_token()}}'},
                            });      
                        }
                    });                
    myCounter.start();

    @endif

    function cek_nomor(){
        $("#prepare_otp").prop('hidden', false);
        $("#verifikasi_otp").prop('hidden', true)            
        $("#btn_wait").prop('hidden', false);   
        $("#btn_kirim").prop('hidden', true);    

    }

    function cooming_soon(){
        $("#modal-cooming-soon").modal('show');
    }

    function masukan_otp(){
        $("#prepare_otp").prop('hidden', true);
        $("#verifikasi_otp").prop('hidden', false)            
        $("#btn_wait").prop('hidden', false);   
        $("#btn_kirim").prop('hidden', true);    
    }


    function ubah_nomor() {
        $('#div_no_telp_fix').prop('hidden', true);
        $('#div_no_telp_edit').prop('hidden', false);
    }

    function simpan_nomor_ubah() {
        $('#div_no_telp_edit').prop('hidden', true);
        $('#div_no_telp_fix').prop('hidden', false);
    }

    function kirim_otp(){
        var nomor = $("#no_telp_edit").val();
        $.ajax({
            url:"{{ route('ganti_nomor_hp') }}",
            method: "post",
            data : {nomor:nomor, _token:'{{csrf_token()}}'},
            success:function(result)
            {
                $("#no_telp_edit").val(nomor);
                $("#no_telp_fix").val(nomor);
                $("#nomor_wa_verifikasi").html(nomor);
            }
        })
        $("#prepare_otp").prop('hidden', true);
        $("#verifikasi_otp").prop('hidden', false)
        kirim_ulang_otp();
    }

    function kirim_ulang_otp(){
        $.ajax({
            url:"{{ route('kirim_ulang_otp') }}",
            method: "post",
            data : {nomor:"1", _token:'{{csrf_token()}}'},
            success:function(result)
            {
                // alert(result);
                $(".wait_start").html(secondsTimeSpanToHMS(result));
                var myCounter = new Countdown({  
                    seconds:result,
                    onUpdateStatus: function(sec){
                        $(".wait_start").html(secondsTimeSpanToHMS(sec)); // watch for spelling
                    }, 
                    onCounterEnd: function(){
                        $("#wait_finish").prop('hidden', false);
                        $(".wait_start").prop('hidden', true);     
                        $("#wait_admin").prop('hidden', false);     
                        $("#btn_wait").prop('hidden', true);   
                        $("#btn_kirim").prop('hidden', false);    
                        $.ajax({
                            url:"{{ route('set-null') }}",
                            method: "post",
                            data : {nomor:"1", _token:'{{csrf_token()}}'},
                        });      
                    }
                });                
                myCounter.start();
                $("#wait_finish").prop('hidden', true);
                $(".wait_start").prop('hidden', false);
                $("#btn_wait").prop('hidden', false);   
                $("#btn_kirim").prop('hidden', true);    

            }
        })    
    }

    function Countdown(options) {
        var timer,
        instance = this,
        seconds = options.seconds || 10,
        updateStatus = options.onUpdateStatus || function () {},
        counterEnd = options.onCounterEnd || function () {};

        function decrementCounter() {
            updateStatus(seconds);
            if (seconds === 0) {
                counterEnd();
                instance.stop();
            }
            seconds--;
        }

        this.start = function () {
         clearInterval(timer);
         timer = 0;
         seconds = options.seconds;
         timer = setInterval(decrementCounter, 1000);
     };

     this.stop = function () {
        clearInterval(timer);
    };
}



function secondsTimeSpanToHMS(s) {
    var h = Math.floor(s/3600); //Get whole hours
    s -= h*3600;
    var m = Math.floor(s/60); //Get remaining minutes
    s -= m*60;
    return ""+(m < 10 ? '0'+m : m)+":"+(s < 10 ? '0'+s : s); //zero padding on minutes and seconds
}

function show_loader(){
    console.log('show');
    $("#modal_loader").modal("show");
};

function hide_loader(){
    console.log('hide');
    $("#modal_loader").modal("hide");
};


</script>
@yield('footer-scripts')


</html>
