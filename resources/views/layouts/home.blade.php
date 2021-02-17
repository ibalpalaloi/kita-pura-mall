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


    </style>
@yield('header-scripts')
</head>

<body style="background: #eaf4ff !important;">
    @yield("content")
    <div class="footer">
        <div class="container-mall footer-mall-menu" style="display: flex; justify-content: space-around;">
            @php
            $menu_color = array('beranda_color.svg', 'pencarian_color.svg', 'toko_color.svg', 'emergency_color.svg', 'akun_color.svg');
            $menu = array('beranda.svg', 'pencarian.svg', 'toko.svg', 'emergency.svg', 'akun.svg');
            $nama_menu = array('Beranda', 'Pencarian', 'Toko', 'Emergency', 'Akun');
            $link_menu = array('home', 'pencarian', 'toko', 'emergency', 'akun');
            $link_now = Request::segment(1);
            @endphp 
            @for ($i = 0; $i < count($menu); $i++)  
            <div style="display: flex; justify-content: center; flex-direction: column; align-items: center; margin: 0em 0.1em 0em 0.1em;">
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
@yield('footer-scripts')


</html>
