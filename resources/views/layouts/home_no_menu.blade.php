<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="HandheldFriendly" content="true"/>
    <title>@yield('title')Kitapura Mall</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/template/admin/assets/images/favicon.png')}}">
    <link rel="stylesheet" type="text/css" href="<?=url('/')?>/public/template/admin/dist/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="<?=url('/')?>/public/css/kitapura.css">
    @yield('header-scripts')
</head>

<body>
    @yield("content")
</body>    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@yield('footer-scripts')


</html>
