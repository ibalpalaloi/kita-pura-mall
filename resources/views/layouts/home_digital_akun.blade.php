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

		@charset "utf-8";
		.st0
		{
			background : -moz-linear-gradient(-36.73% 61.91% 20deg,rgba(35, 35, 35, 1) 0%,rgba(53, 53, 53, 1) 19.55%,rgba(38, 38, 38, 1) 43.85%,rgba(53, 53, 53, 1) 72.35%,rgba(33, 33, 34, 1) 100%);
			background : -webkit-linear-gradient(20deg, rgba(35, 35, 35, 1) 0%, rgba(53, 53, 53, 1) 19.55%, rgba(38, 38, 38, 1) 43.85%, rgba(53, 53, 53, 1) 72.35%, rgba(33, 33, 34, 1) 100%);
			background : -webkit-gradient(linear,-36.73% 61.91% ,136.73% 38.09% ,color-stop(0,rgba(35, 35, 35, 1) ),color-stop(0.1955,rgba(53, 53, 53, 1) ),color-stop(0.4385,rgba(38, 38, 38, 1) ),color-stop(0.7235,rgba(53, 53, 53, 1) ),color-stop(1,rgba(33, 33, 34, 1) ));
			background : -o-linear-gradient(20deg, rgba(35, 35, 35, 1) 0%, rgba(53, 53, 53, 1) 19.55%, rgba(38, 38, 38, 1) 43.85%, rgba(53, 53, 53, 1) 72.35%, rgba(33, 33, 34, 1) 100%);
			background : -ms-linear-gradient(20deg, rgba(35, 35, 35, 1) 0%, rgba(53, 53, 53, 1) 19.55%, rgba(38, 38, 38, 1) 43.85%, rgba(53, 53, 53, 1) 72.35%, rgba(33, 33, 34, 1) 100%);
			-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr='#232323', endColorstr='#212122' ,GradientType=0)";
			background : linear-gradient(70deg, rgba(35, 35, 35, 1) 0%, rgba(53, 53, 53, 1) 19.55%, rgba(38, 38, 38, 1) 43.85%, rgba(53, 53, 53, 1) 72.35%, rgba(33, 33, 34, 1) 100%);
			filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#232323',endColorstr='#212122' , GradientType=1);
			background-repeat: background-size: cover;
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
			<div class="btn btn-primary" data-dismiss="modal" hidden id="modal_close">Close</div>

		</div>
	</div>
</div>

<body style="min-height: 100%; background: #161616;" class="hold-transition sidebar-mini layout-fixed">
	@yield("content")
</body>    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	function show_loader(){
		console.log('show');
		$("#modal_loader").modal("show");
		setTimeout(hide_loader, 10000);		
	};

	function hide_loader(){
		console.log('hide');
		$("#modal_loader").modal("hide");
	};
</script>
@yield('footer-scripts')


</html>
