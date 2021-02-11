<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="HandheldFriendly" content="true"/>
	<title>@yield('title')Kitapura Mall</title>
	<link rel="stylesheet" type="text/css"
	href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
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

<body style="background: #eaf4ff; min-height: 100%;" class="hold-transition sidebar-mini layout-fixed">
	@yield("content")
</body>    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@yield('footer-scripts')


</html>
