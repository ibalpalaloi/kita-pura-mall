@extends('layouts.admin')


@section('title')
Toko
@endsection

@section('header-scripts')


@endsection

@section('modal')
@endsection


@section('content')
<div class="row">
    

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Pengguna</h4>
                @if ($user->toko)
                    <a href="<?=url('/')?>/admin/manajemen/toko/{{$user->toko->id}}" class="btn btn-danger">Toko</a>
                @else
                    <a href="<?=url('/')?>/admin/manajemen/buat_toko/{{$user->id}}" class="btn btn-danger">Buat Toko</a>
                @endif
            </div>
            <hr class="mt-0">
            <div class="card-body">
                <h4 class="card-title">Data Auth</h4>
                <div class="form-group row align-items-center mb-0">
                    <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Nomor HP</label>
                    <div class="col-9 border-left pb-2 pt-2">
                        <input readonly value="{{$user->no_hp}}" type="text" class="form-control" id="no_akun" name="no_akun" >
                    </div>
                </div>
                <div class="form-group row align-items-center mb-0">
                    <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Nama Email</label>
                    <div class="col-9 border-left pb-2 pt-2">
                        <input readonly value="{{$user->email}}" type="text" class="form-control" id="nama_toko" name="nama_toko" >
                    </div>
                </div>
                @if ($user->google_id)
                <div class="form-group row align-items-center mb-0">
                    <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Google Id</label> 
                    <div class="col-9 border-left pb-2 pt-2">
                        <input readonly value="{{$user->google_id}}" type="text" class="form-control" id="username" name="username">
                    </div>
                </div>
                @endif
                
                <div class="form-group row align-items-center mb-0">
                    <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Status</label>
                    <div class="col-9 border-left pb-2 pt-2">
                        <input readonly value="{{$user->status}}" type="email" class="form-control" id="jenis_mitra" name="jenis_mitra">
                    </div>
                </div>
                
            <hr class="mt-0">
            <div class="car-body">
                
            </div>
            @if ($user->biodata)
            <div class="card-body">
                <h4 class="card-title">Biodata</h4>
                <div class="form-group row align-items-center mb-0">
                    <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Username</label>
                    <div class="col-9 border-left pb-2 pt-2">
                        <input readonly value="{{$user->biodata->username}}" type="text" class="form-control" id="kecamatan" name="kecamatan">
                    </div>
                </div>
                <div class="form-group row align-items-center mb-0">
                    <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Nama</label>
                    <div class="col-9 border-left pb-2 pt-2">
                        <input readonly value="{{$user->biodata->nama}}" type="text" class="form-control" id="kecamatan" name="kecamatan">
                    </div>
                </div>
                <div class="form-group row align-items-center mb-0">
                    <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Jenis Kelamin</label>
                    <div class="col-9 border-left pb-2 pt-2">
                        <input readonly value="{{$user->biodata->jenis_kelamin}}" type="text" class="form-control" id="kecamatan" name="kecamatan">
                    </div>
                </div>
                <div class="form-group mb-0 text-right">
                    <button data-toggle="modal" data-target="#modal_alamat_toko" type="button" class="btn btn-info waves-effect waves-light">ubah</button>
                </div>
            </div> 
            @endif
            
        </div>
    </div>
</div>

@endsection

@section('footer-scripts')
<script>
    var id_toko = {!! json_encode($user->id) !!}
    function ubah_status_toko(){
        $.ajax({
            url: "<?=url('/')?>/admin/manajemen/toko/"+id_toko+"/ubah_status_toko",
            method: "get",
            data : {_token:'{{csrf_token()}}'},
            success:function(result)
            {   
                if(result == "Aktif"){
                    $('#btn_ubah_status_toko').removeClass()
                    $('#btn_ubah_status_toko').addClass('btn btn-primary')
                    $('#btn_ubah_status_toko').text('Aktif')
                }else{
                    $('#btn_ubah_status_toko').removeClass()
                    $('#btn_ubah_status_toko').addClass('btn btn-danger')
                    $('#btn_ubah_status_toko').text('Tidak Aktif')
                }
            }
        })
    }

    function cek_pass(){
        if($('#pass_ketik').val() != $('#ketikan').val()){
            $('#pass_salah').empty();
            $('#pass_salah').append("Inputan salah");
        }
        else{
            $("#submit").click();
            kirim_wa_password();
        }
    }

    function kirim_wa_password(){
        var data = {!! json_encode($user) !!};
        var apilink = 'http://';
        var phone = $('#no_akun').val();
        var message = 'password baru akun anda "'+$('#pass').val()+'" \n'+
                        'Silahkan login dan ubah password akun anda';

        // apilink += isMobile ? 'api' : 'web';
        // apilink += '.whatsapp.com/send?phone=' + phone + '&text=' + encodeURI(message);
        var walink = 'https://wa.me/'+ phone +'?text=' + encodeURI(message);
        window.open(walink);
    }

    function upload_gambar(){
		$("#foto_logo").click();
	}

    $("#foto_logo").change(function(){
        readURL(this);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview_logo').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function simpan_kategori(toko_id){
        var id = $('#kategori_toko').val();
        $.ajax({
            url: "{{route('simpan_kategorinya_toko')}}",
            method: "post",
            data : {id:id, toko_id:toko_id, _token:'{{csrf_token()}}'},
            success:function(result)
            {
                $('#list_kategorinya_toko').append(result);
                $('#modal_kategori').modal('hide');
            }
        })
    }

    function hapus_kategori_toko(id, id_toko){
        $.ajax({
            url: "{{route('hapus_kategorinya_toko')}}",
            method: "post",
            data : {id:id, id_toko:id_toko, _token:'{{csrf_token()}}'},
            success:function(result)
            {
                if(result == 'false'){
                    alert('kategori toko harus terisi')
                }
                else{
                    $("#kategori_"+id).remove();
                }
                
            }
        })
        
    }
    
    $('#select_kota').change(function(){
		// show_loader();
		$('#select_kecamatan').empty();
		$('#select_kecamatan').append($('<option>', {
			text: 'Memuat'
		}));
		$.ajax({
			url: "{{ route('get_kecamatan') }}?id_kota="+$(this).val(),
			method: 'GET', 
			success: function(data){
				// hide_loader();
				$('#select_kecamatan').empty();
				$('#select_kecamatan').html(data.html);
			}
		})
	})

    $('#select_kecamatan').change(function(){
		$('#select_kelurahan').empty();
		$('#select_kelurahan').append($('<option>', {
			text: 'Memuat'
		}));
		$.ajax({
			url: "{{ route('get_kelurahan') }}?id_kecamatan="+$(this).val(),
			method: 'GET', 
			success: function(data){
				$('#select_kelurahan').empty();
				$('#select_kelurahan').html(data.html);
			}
		})
	})
</script>
@endsection
