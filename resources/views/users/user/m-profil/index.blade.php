@extends('layouts.home')

@section('title')
Explore |
@endsection

@section('header-scripts')
<style type="text/css">
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

	.banner {
		max-width: 480px;
		width: 100%;
		margin: 0px auto;
		padding: 0.7em 0em 0.3em 0em;
	}


	.card-mall {
		background: white;
		/*box-shadow: rgba(152, 152, 152, 0.5) 0px 2px 8px 1px;*/
		border-radius: 1.5em;	
		margin-bottom: 1em;
	}

	.card-mall a {
		color: black;
		text-decoration: none !important;
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
	.homepage {
		min-height: calc(80vh - 60px);	
	}	

</style>
@endsection

@section('content')
<?php
$daftar_mitra = "";
if (!empty($_GET['daftar_mitra'])){
	$daftar_mitra = $_GET['daftar_mitra'];
}
?>

<?php
$daftar_mitra_premium = "";
if (!empty($_GET['daftar_mitra_premium'])){
	$daftar_mitra_premium = $_GET['daftar_mitra_premium'];
}
?>

@if(Session::get('message') == 'Belum Terverifikasi')
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

@if(Session::get('message') == 'Belum Terverifikasi KTP')
<div class="modal fade" id="modal-verifikasi-upgrade-ktp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content" style="border-radius: 1.2em; background: #ff006e; display: flex; justify-content: center; align-items: center; margin: 8em 1em 0em 1em; color: white;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: -1em; right: 0;">
				<img src="<?=url('/')?>/public/img/mitra/modal_1_step.svg" style="width: 80%; position: absolute; top: -11em;">
				<div style="font-size: 2em; font-weight: 600; margin-top: 1em;">1 Langkah Lagi</div>
				<div style="font-size: 1.1em; text-align: center; width: 90%; font-weight: 0; color: #ffe6f1;">anda sedang dalam proses upgrade akun free ke akun premium. Sisa 1 langkah lagi kamu sudah bisa menikmati akun premium</div>
				<a href="<?=url('/')?>/akun/mitra/free/upgrade-premium/upload-ktp" class="btn btn-primary" style="margin-bottom: 0em; font-size: 1.1em;margin-top: 1em; text-align: center; color: white;">Lanjutkan
				</a>
				<a href="<?=url('/')?>/akun/mitra/free/upgrade-premium/batalkan-upgrade" style="margin-bottom: 1em; font-size: 1em;margin-top: 0.5em; text-align: center; text-decoration: underline; color: white;">Batalkan Upgrade?
				</a>
			</div>
		</div>
	</div>
</div>
@endif

@if(Session::get('message') == 'Belum Terverifikasi Upgrade')
<div class="modal fade" id="modal-verifikasi-upgrade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content" style="border-radius: 1.2em; background: #ff006e; display: flex; justify-content: center; align-items: center; margin: 8em 1em 0em 1em; color: white;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: -1em; right: 0;">
				<img src="<?=url('/')?>/public/img/mitra/modal_daftar_register.svg" style="width: 80%; position: absolute; top: -16em;">
				<div style="font-size: 2em; font-weight: 600; margin-top: 1em;">Mohon Tunggu...</div>
				<div style="font-size: 1.1em; text-align: center; width: 90%; font-weight: 0; color: #ffe6f1;">anda sedang dalam proses upgrade akun free ke akun premium. Silahkan menunggu admin untuk memverifikasi data anda</div>
				<a href="<?=url('/')?>/akun/mitra/free/upgrade-premium/batalkan-upgrade" style="margin-bottom: 1em; font-size: 1.1em;margin-top: 0.5em; text-align: center; text-decoration: underline; color: white;">Batalkan Upgrade?
				</a>
			</div>
		</div>
	</div>
</div>
@endif

@if(Session::get('message') == 'Batal Upgrade')
<div class="modal fade" id="modal-batal-upgrade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content" style="border-radius: 1.2em; background: #ff006e; display: flex; justify-content: center; align-items: center; margin: 8em 1em 0em 1em; color: white;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: -1em; right: 0;">
				<img src="<?=url('/')?>/public/img/mitra/modal_daftar_register.svg" style="width: 80%; position: absolute; top: -16em;">
				<div style="font-size: 2em; font-weight: 600; margin-top: 1em;">Yahhh</div>
				<div style="font-size: 1.1em; text-align: center; width: 90%; font-weight: 0; color: #ffe6f1;">kamu telah membatalkan upgrade akun ke premium</div>
			</div>
		</div>
	</div>
</div>
@endif


@if(Session::get('message') == 'Belum Terverifikasi')
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

@if($toko)
@if($toko->notif == 0)
<div class="modal fade" id="modal-notif-berhasil-toko" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content" style="border-radius: 1.2em; background: linear-gradient(180deg, #D4D700 20.31%, #80B918 100%); display: flex; justify-content: center; align-items: center; margin: 10em 1em 0em 1em; color: white;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: -1em; right: 0;">
				<img src="<?=url('/')?>/public/img/mitra/modal_sukses_toko.svg" style="width: 80%; position: absolute; top: -17em;">
				<div style="font-size: 2.5em; font-weight: 600; margin-top: 0.5em;">Selamat !!</div>
				<div style="font-size: 1.1em; text-align: center; width: 60%; font-weight: 0;  line-height: 1.3em; color: #ffe6f1; margin-bottom: 1em;">anda sudah bergabung menjadi mitra <span style="font-weight: 600;">kitapuramall</span></div>
			</div>
		</div>
	</div>
</div>
@endif
@endif


@if($biodata->notif == 1)
<div class="modal fade" id="modal-notif-berhasil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px; position: relative;">
		<div class="modal-content" style="border-radius: 1.2em; background: linear-gradient(180deg, #D4D700 20.31%, #80B918 100%); display: flex; justify-content: center; align-items: center; margin: 8em 1em 0em 1em; color: white;">
			<div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
				<img data-dismiss="modal" src="<?=url('/')?>/public/img/icon_svg/button_close.svg" style="position: absolute; top: -1em; right: 0;">
				<img src="<?=url('/')?>/public/img/mitra/modal_berhasil_biodata.svg" style="width: 80%; position: absolute; top: -9.5em;">
				<div style="font-size: 2em; font-weight: 600; margin-top: 2em;">Yeah, Hore!</div>
				<div style="font-size: 1.1em; text-align: center; width: 100%; font-weight: 0; color: #ffe6f1; margin-bottom: 1em;">selamat anda sudah bisa menikmati semua fitur kitapuramall</div>
			</div>
		</div>
	</div>
</div>
@endif

@if(Session::get('message') == 'Biodata Belum Lengkap')
<div id="modal-pemberitahuan" class="modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
aria-hidden="true" data-backdrop="static" data-keyboard="false" style="width: 100%;">
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

@if((Session::get('message') == 'KTP Belum Lengkap') || ($cek_ktp == "KTP Belum Lengkap"))
<div class="modal fade" id="modal-verifikasi-ktp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
	<div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px;">
		<div class="modal-content" style="border-radius: 1.2em; background: transparent; display: flex; justify-content: center; align-items: center; box-shadow: none; border: none;">
			<div style="width: 80%;">
				<div style="background: transparent; margin-top: 4.5em; border-radius: 1.5em; position: relative;">
					<div style="display: flex; justify-content: center; flex-direction: column; align-items: center; width: 100%; position: absolute; top: -6.8em;">
						<img src="<?=url('/')?>/public/img/mitra/waiting.svg" style="width: 100%; margin-left: 0.7em; margin-bottom: 0em;">
						<h3 style="margin-top: 0em; color: white;">1 Langkah Lagi</h3>
						<div style="text-align: center; font-size: 0.8em; line-height: 1.2em; color: white;">data toko anda berhasil dikirimkan.<br>mohon tunggu verifikasi dari<br>tim kitapuramall</div>
						@if(Session::get('status_mitra') == 'free')
						<a href="<?=url('/')?>/akun/mitra/{{Session::get('status_mitra')}}/upgrade-premium/upload-ktp" style="color: white; background: #ffaa00; padding: 0.3em 0em 0.5em 0em; width: 50%; margin-top: 0.8em; border-radius: 2em; text-align: center; font-weight: 600;">Ubah data ?</a>
						@else
						<a href="<?=url('/')?>/akun/mitra/{{Session::get('status_mitra')}}/upload-ktp" style="color: white; background: #ffaa00; padding: 0.3em 0em 0.5em 0em; width: 50%; margin-top: 0.8em; border-radius: 2em; text-align: center; font-weight: 600;">Lengkapi Sekarang</a>
						@endif
					</div>
					<img src="<?=url('/')?>/public/img/mitra/bg-waiting.svg" style="width: 100%;">
				</div>
			</div>
		</div>
	</div>
</div>
@endif

<div class="wrapper" style="background: #ff006e; position: relative; z-index: -1">
	<div class="banner" style="display: flex; justify-content: flex-end;">
		<div class="" style="width: 30%; display: flex; align-items: flex-start; flex-direction: column; padding-top: 4em; padding-left: 2em;">
			<img src="<?=url('/')?>/public/img/logo.svg" style="width: 30%; width: 60%;">
			<img src="<?=url('/')?>/public/img/logo_text_vertical.svg" style="width: 30%; width: 90%; margin-top: 0.7em;">
		</div>
		<img src="<?=url('/')?>/public/img/user/img_user.png" style="width: 70%;">
	</div>
</div>


<main id="homepage" class="homepage" style="background: #eaf4ff;">
	<div class="card-mall kategori" style="padding: 5px;">
		<div style="display: flex; justify-content: center; flex-direction: row; align-items: center;">
			<div style="width: 25%; display: flex; flex-direction: column; align-items: center; margin: 0.4em 0em 0.4em 0em; ">
				@if ($biodata->foto)
				<img src="<?=url('/')?>/public/img/user/profile_picture/{{$biodata->foto}}" style="width: 100%; border-radius: 50%;">
				@else
				<img src="<?=url('/')?>/public/img/user/profile_picture/user.png" style="width: 100%; border-radius: 50%;">
				@endif
				@if (Session::get('status_mitra') != 'Belum jadi mitra')
				<?php $img = "";
				if (Session::get('status_mitra') == 'free'){
					$img = url('/')."/public/img/icon_svg/icon_gratis.svg";
				}
				else {
					$img = url('/')."/public/img/icon_svg/icon_premium.svg";
				}
				?>
				<div style="font-size: 0.7em; background: #ff006e; color: white; padding: 0.3em 1em 0.3em 1em; border-radius:2em; position: absolute; bottom: 1em;"><img src="<?=$img?>">&nbsp;Mitra {{ucfirst($status_aktif_mitra)}}</div>
				@endif
			</div>
			<div style="width: 63%; display: flex; flex-direction: column; align-items: center; margin: 0.4em 0em 0.4em 2%;">
				<div class="container">
					@if(Session::get('progress_biodata') == '5')
					<div style="line-height: 1.1em;">Semoga Harimu <strong>Menyenangkan!</strong></div>
					@else
					<div>Lengkapi akun anda!</div>			
					@endif
					<div style="display: flex; justify-content: center; align-items: center;">
						<div class="progress" style="border-radius: 1.5em; width: 90%; height: 1rem;">
							<div class="progress-bar" role="progressbar" aria-valuenow="{{Session::get('progress_biodata')*20}}" aria-valuemin="0" aria-valuemax="100" style="width:{{Session::get('progress_biodata')*20}}%; border-radius: 1.5em; background: #ff006e;">
							</div>
						</div>
						<div style="width: 5%; margin-left: 0.5em;"><b>{{Session::get('progress_biodata')}}/5</b></div>
					</div>
					@if(Session::get('progress_biodata') == '5')
					<div style="font-size: 0.60em; text-align: center; width: 90%;"><b>Data Anda Sudah Lengkap </b>anda bisa melakukan transaksi pada aplikasi ini</div>
					@else
					<div style="font-size: 0.60em; text-align: center; width: 90%;"><b>Lengkapi akun </b>anda, Untuk bisa melakukan transaksi pada aplikasi ini</div>
					@endif
				</div>
			</div>
		</div> 
	</div>
	<div class="card-mall">
		<div style="padding: 1.5em 2em 1.5em 2em;">
			<a href="<?=url('/')?>/akun/pengaturan-profil">
				<span><img src="<?=url('/')?>/public/img/user/setting.svg"></span>
				<span>&nbsp;&nbsp;&nbsp;Pengaturan Profil</span>
			</a>
		</div>
	</div>
	<div class="card-mall">
		<div style="padding: 1.5em 2em 1.5em 2em;">
			<a href="<?=url('/')?>/akun/mitra">
				<span><img src="<?=url('/')?>/public/img/user/mitra.svg"></span>
				<span>&nbsp;&nbsp;&nbsp;Mitra Kitapura</span>
			</a>

		</div>
	</div>
	<div class="card-mall">
		<div style="padding: 1.5em 2em 1.5em 2em;">
			<a href="<?=url('/')?>/logout">
				<span>&nbsp;&nbsp;<img src="<?=url('/')?>/public/img/user/logout.svg"></span>
				<span>&nbsp;&nbsp;&nbsp;Keluar</span>
			</a>
		</div>
	</div>
</main>

@endsection

@section('footer-scripts')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script type="text/javascript">

	@if(Session::get('message') == 'Biodata Belum Lengkap')
	$('#modal-pemberitahuan').modal('show');
	@endif

	@if($biodata->notif == 1)
	$('#modal-notif-berhasil').modal('show');
	$.ajax({
		url:"{{ route('notif_lengkap') }}",
		method: "post",
		data : {nomor:"<?=$biodata->id?>", _token:'{{csrf_token()}}'},
		success:function(result)
		{
			// do something
		}
	})  
	@endif

	@if($toko)
	@if($toko->notif == 0)
	$("#modal-notif-berhasil-toko").modal('show');
	$.ajax({
		url:"{{ route('notif_toko_lengkap') }}",
		method: "post",
		data : {nomor:"<?=$toko->id?>", _token:'{{csrf_token()}}'},
		success:function(result)
		{
			// do something
		}
	})  
	@endif
	@endif

	@if(Session::get('message') == 'Belum Terverifikasi')
	$('#modal-verifikasi').modal('show');
	@endif

	@if(Session::get('message') == 'Belum Terverifikasi KTP')
	$('#modal-verifikasi-upgrade-ktp').modal('show');
	@endif

	@if(Session::get('message') == 'Batal Upgrade')
	$('#modal-batal-upgrade').modal('show');
	@endif


	@if(Session::get('message') == 'Belum Terverifikasi Upgrade')
	$('#modal-verifikasi-upgrade').modal('show');
	@endif


	// @if((Session::get('message') == 'KTP Belum Lengkap') || ($cek_ktp == "KTP Belum Lengkap"))
	// $('#modal-verifikasi-ktp').modal('show');
	// @endif	


	@if ($status_aktif_mitra == "Belum lengkap")
	function verifikasi_ktp(){
		$('#modal-verifikasi-ktp').modal('show');
	}
	@endif

	@if ($daftar_mitra == 'success')
	$('#modal-verifikasi').modal('show');
	@endif	




</script>

@endsection
