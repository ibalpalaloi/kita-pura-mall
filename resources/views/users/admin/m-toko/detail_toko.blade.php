@extends('layouts.admin')


@section('title')
Toko
@endsection

@section('header-scripts')
    <meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="<?=url('/')?>/public/plugins/lunar/css/lunar.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
@endsection

@section('modal')
@endsection


@section('content')
{{-- modal data toko --}}
<div id="modal_data_toko" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myModalLabel">Data Toko</h4>
                <button type="button" class="close ml-auto" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="<?=url('/')?>/admin/manajemen/toko/{{$toko->id}}/post_ubah" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Nama Toko:</label>
                        <input value="{{$toko->nama_toko}}" type="text" class="form-control" id="nama_toko" name="nama_toko">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Username:</label>
                        <input value="{{$toko->username}}" type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Jenis Mitra:</label>
                        <select class="form-control" name="jenis_mitra" id="jenis_mitra">
                            <option @if($toko->jenis_mitra == 'premium') selected @endif value="premium">Premium</option>
                            <option @if($toko->jenis_mitra == 'free') selected @endif value="free">Free</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">No Hp:</label>
                        <input value="{{$toko->no_hp}}" type="text" class="form-control" id="no_hp" name="no_hp">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Deskripsi:</label>
                        <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10">{{$toko->deskripsi}}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info waves-effect">Ubah</button>
                    </div>
                </form>
            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

{{-- modal data toko --}}
<div id="modal_alamat_toko" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myModalLabel">Alamat Toko</h4>
                <button type="button" class="close ml-auto" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="<?=url('/')?>/admin/manajemen/toko/{{$toko->id}}/post_ubah_alamat" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Alamat:</label>
                        <textarea class="form-control" name="alamat" id="" cols="30" rows="10">{{$toko->alamat}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Kabupaten Kota:</label>
                        <select class="form-control" name="kota" id="select_kota">
                            <option value="">Pilih Kabupaten / Kota</option>
                            @foreach ($kabupaten as $item)
                            <option value="{{$item->id}}" @if ($toko->kelurahan->kecamatan->kabupaten_kota->id == $item->id) selected @endif>{{$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Kecamatan:</label>
                        <select class="form-control" name="kecamatan" id="select_kecamatan">
                            <option value=""> {{$toko->kelurahan->kecamatan->nama}} </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Kelurahan:</label>
                        <select class="form-control" name="kelurahan" id="select_kelurahan">
                            <option value="{{$toko->kelurahan->id}}"> {{$toko->kelurahan->kelurahan}} </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Latitude:</label>
                        <input value="{{$toko->latitude}}" type="text" class="form-control" id="latitude" name="latitude">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Longitude:</label>
                        <input value="{{$toko->longitude}}" type="text" class="form-control" id="longitude" name="longitude">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info waves-effect">Ubah</button>
                    </div>
                </form>
            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

{{-- modal kategori toko --}}
<div id="modal_kategori_toko" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myModalLabel">Modal Heading</h4>
                <button type="button" class="close ml-auto" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-sm-12">Kategori</label>
                    <div class="col-sm-12">
                        <select id="kategori_toko" name="" class="form-control form-control-line">
                            @foreach ($kategori_toko as $data)
                            <option value="{{$data->id}}">{{$data->kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button onclick="simpan_kategori('{{$toko->id}}')" type="button" class="btn btn-info waves-effect" data-dismiss="modal">simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

{{-- hapus toko --}}
<div id="modal_ubah_password" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myModalLabel">Hapus Toko</h4>
                <button type="button" class="close ml-auto" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="<?=url('/')?>/admin/manajemen/toko/{{$toko->id}}/post_password_baru" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        Ketikkan untuk ubah password mitra <b>"kitapuramallpalu"</b> 
                        <p style="color: red" id="pass_salah"></p>
                        <input name="ketikan" id="ketikan" type="text" hidden value="kitapuramallpalu">
                        <input name="id_toko" type="text" hidden value="{{$toko->id}}">
                        <div class="col-sm-12">
                            <input name="pass_ketik" id="pass_ketik" type="text" class="form-control">
                        </div>
                        <br>
                        <label for="">Password Baru</label>
                        <div class="col-sm-12">
                            <input name="pass" id="pass" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="cek_pass()" class="btn btn-info waves-effect">Ubah Password</button>
                        <button id="submit" type="submit" hidden class="btn btn-info waves-effect">hidden</button>
                    </div>
                </form>
            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-sukses" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding: 1.5em; padding: 0px;">
    <div class="modal-dialog modal-dialog-centered" role="document" style="padding: 0px;">
        <div class="modal-content st0" style="border-radius: 1.2em; display: flex; justify-content: center; align-items: center; margin: 5em 1em 0em 1em; background-color: #353535;">
            <div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
                <div class="container">
                    <div class="panel panel-info">
                        <div class="panel-body">
                            <div class="row" style="display: flex; flex-direction: column;">
                                <div>
                                    <div id="upload-demo">

                                    </div>
                                </div>
                                <div>
                                    <div class="btn btn-primary btn-block" id="unggah_foto" onclick="unggah_foto()" style="margin-top: 5%;">Unggah Foto</div>
                                </div>
                                <div class="div_upload">
                                    <input type="file" name="foto_toko" id="image" hidden>
                                    <div class="btn btn-primary btn-block upload-image" style="margin-top:2%" >Upload Image</div>
                                    <div class="btn btn-secondary btn-block" onclick="unggah_foto()">Unggah Foto
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row el-element-overlay">
    <form action="<?=url('/')?>/admin/manajemen/toko/{{$toko->id}}/ubah_logo" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="el-card-item">
                    <div class="el-card-avatar el-overlay-1"> 
                        @if ($toko->logo_toko)
                        <img id="preview_logo" src="<?=url('/')?>/public/img/toko/{{$toko->id}}/logo/400x400/{{$toko->logo_toko}}" alt="user" />
                        @else
                        <img id="preview_logo" src="<?=url('/')?>/public/img/toko/premium.svg">
                        @endif
                        <div class="el-overlay">
                            <ul class="list-style-none el-info">
                                <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="<?=url('/')?>/public/img/toko/{{$toko->id}}/logo/400x400/{{$toko->logo_toko}}"><i class="icon-magnifier"></i></a></li>
                                <li class="el-item"><a class="btn default btn-outline el-link" href="<?=url('/')?>/public/img/toko/{{$toko->id}}/logo/400x400/{{$toko->logo_toko}}" download=""><i class="icon-link"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="el-card-content">
                        <button onclick="tambah_foto_toko()" type="button" class="btn btn-primary">Upload</button>
                        <button type="submit" class="btn btn-danger">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="row">


    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Toko</h4>
                <a href="#" onclick="modal_ubah_password('{{$toko->id}}')" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal_ubah_password">Ubah Password</a>
                <a href="<?=url('/')?>/admin/manajemen/toko/{{$toko->id}}/daftar_produk" type="button" class="btn btn-danger" >Data Produk</a>
                <a href="<?=url('/')?>/admin/manajemen/toko/{{$toko->id}}/landing_page" type="button" class="btn btn-danger" >Landing Page</a>
                
                @if ($toko->status == "Aktif" or $toko->status == "aktif")
                <a href="#" id="btn_ubah_status_toko" onclick="ubah_status_toko()" type="button" class="btn btn-primary" >Aktif</a>
                @else
                <a href="#" id="btn_ubah_status_toko" onclick="ubah_status_toko()" type="button" class="btn btn-danger" >Tidak Aktif</a>
                @endif

            </div>
            <hr class="mt-0">
            <div class="card-body">
                <h4 class="card-title">Personal Info</h4>
                <div class="form-group row align-items-center mb-0">
                    <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Nomor Akun</label>
                    <div class="col-9 border-left pb-2 pt-2">
                        <input readonly value="{{$toko->user->no_hp}}" type="text" class="form-control" id="no_akun" name="no_akun" placeholder="First Name Here">
                    </div>
                </div>
                <div class="form-group row align-items-center mb-0">
                    <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Nama Toko</label>
                    <div class="col-9 border-left pb-2 pt-2">
                        <input readonly value="{{$toko->nama_toko}}" type="text" class="form-control" id="nama_toko" name="nama_toko" placeholder="First Name Here">
                    </div>
                </div>
                <div class="form-group row align-items-center mb-0">
                    <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Username</label> 
                    <div class="col-9 border-left pb-2 pt-2">
                        <input readonly value="{{$toko->username}}" type="text" class="form-control" id="username" name="username">
                    </div>
                </div>
                <div class="form-group row align-items-center mb-0">
                    <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Jenis Mitra</label>
                    <div class="col-9 border-left pb-2 pt-2">
                        <input readonly value="{{$toko->jenis_mitra}}" type="email" class="form-control" id="jenis_mitra" name="jenis_mitra">
                    </div>
                </div>
                <br>
                <div class="form-group row align-items-center mb-0">
                    <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Kategori Toko</label>
                    <div class="col-9 border-left pb-2 pt-2" id="list_kategorinya_toko">
                        <button data-toggle="modal" data-target="#modal_kategori_toko" type="button" class="btn btn-primary">Tambah Kategori Toko</button>
                        <br><br>
                        @foreach ($kategorinya_toko as $data)
                        <li id="kategori_{{$data->id}}">{{$data->kategori_toko->kategori}} &nbsp;&nbsp;&nbsp;&nbsp; <i onclick="hapus_kategori_toko('{{$data->id}}', '{{$toko->id}}')" class="far fa-trash-alt remove-note"></i></li>
                        @endforeach
                    </div>
                </div>
                <br>
                <div class="form-group row align-items-center mb-0">
                    <label for="inputEmail3" class="col-3 text-right control-label col-form-label">No HP Toko</label>
                    <div class="col-9 border-left pb-2 pt-2">
                        <input readonly value="{{$toko->no_hp}}" type="text" class="form-control" id="no_hp_toko" name="no_hp_toko">
                    </div>
                </div>
                <div class="form-group row align-items-center mb-0">
                    <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Deskripsi Toko</label>
                    <div class="col-9 border-left pb-2 pt-2">
                        <textarea readonly name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control">{{$toko->deskripsi}}</textarea>
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group mb-0 text-right">
                    <button onclick="show_modal('modal_data_toko')" data-toggle="modal" data-target="#modal_data_toko" type="button" class="btn btn-info waves-effect waves-light">ubah</button>
                </div>
            </div>
            <hr class="mt-0">
            <div class="car-body">

            </div>
            <div class="card-body">
                <h4 class="card-title">Lokasi</h4>
                <div class="form-group row align-items-center mb-0">
                    <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Alamat</label>
                    <div class="col-9 border-left pb-2 pt-2">
                        <textarea readonly name="alamat" id="alamat" cols="30" rows="10" class="form-control">{{$toko->alamat}}</textarea>
                    </div>
                </div>
                <div class="form-group row align-items-center mb-0">
                    <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Kabupaten / Kota</label>
                    <div class="col-9 border-left pb-2 pt-2">
                        <input readonly value="{{$toko->kelurahan->kecamatan->kabupaten_kota->nama}}" type="text" class="form-control" id="kabupaten" name="kota">
                    </div>
                </div>
                <div class="form-group row align-items-center mb-0">
                    <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Kecamatan</label>
                    <div class="col-9 border-left pb-2 pt-2">
                        <input readonly value="{{$toko->kelurahan->kecamatan->nama}}" type="text" class="form-control" id="kecamatan" name="kecamatan">
                    </div>
                </div>
                <div class="form-group row align-items-center mb-0">
                    <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Kelurahan</label>
                    <div class="col-9 border-left pb-2 pt-2">
                        <input readonly value="{{$toko->kelurahan->kelurahan}}" type="text" class="form-control" id="kelurahan" name="kelurahan">
                    </div>
                </div>
                <div class="form-group row align-items-center mb-0">
                    <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Latitude</label>
                    <div class="col-9 border-left pb-2 pt-2">
                        <input readonly value="{{$toko->latitude}}" type="text" class="form-control" id="latitude" name="latitude">
                    </div>
                </div>
                <div class="form-group row align-items-center mb-0">
                    <label for="inputEmail3" class="col-3 text-right control-label col-form-label">longitude</label>
                    <div class="col-9 border-left pb-2 pt-2">
                        <input readonly value="{{$toko->longitude}}" type="text" class="form-control" id="longitude" name="longitude">
                    </div>
                </div>
                <div class="form-group mb-0 text-right">
                    <button onclick="show_modal('modal_alamat_toko')" data-toggle="modal" data-target="#modal_alamat_toko" type="button" class="btn btn-info waves-effect waves-light">ubah</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer-scripts')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="<?=url('/')?>/public/plugins/select2/js/select2.full.min.js"></script>

<script>
    function show_modal(id_modal){
        $('#'+id_modal).modal('show');
    }
    var id_toko = {!! json_encode($toko->id) !!}
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
        var data = {!! json_encode($toko) !!};
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

function tambah_foto_toko(){
    $(".div_upload").prop('hidden', true);
    $("#unggah_foto").prop('hidden', false);
    $('#modal-sukses').modal('show');
        // $("#foto_toko").click();
    }    
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function unggah_foto(){
        $("#image").click();
    }

    function input_focus_username(id){
            // alert(id);
            $("#"+id).css('color', 'white');
            $("#"+id).css('text-decoration', 'none');           
        }

        var resize = $('#upload-demo').croppie({
            enableExif: true,
            enableOrientation: true,
    viewport: { // Default { width: 100, height: 100, type: 'square' } 
    width: 240,
    height: 240,
        type: 'circle' //square
    },
    boundary: {
        width: 240,
        height:240
    }
});


        $('#image').on('change', function () { 
            $(".cr-slider-wrap").css("display", "block");
            var reader = new FileReader();
            reader.onload = function (e) {
                resize.croppie('bind',{
                    url: e.target.result
                }).then(function(){
                    console.log('jQuery bind complete');
                });
            }
            $(".div_upload").prop('hidden', false);
            $("#unggah_foto").prop('hidden', true);
            $("#prev_image").remove();
            reader.readAsDataURL(this.files[0]);
        });


        var imageSize = {
            width: 400,
            height: 400,
            type: 'square'
        };

        var imageSize2 = {
            width: 200,
            height: 200,
            type: 'square'
        };      


        $('.upload-image').on('click', function (ev) {
            $("#modal-sukses").modal('hide');
            var id_toko = "<?=Request::segment(4)?>";
            var rString = randomString(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
            resize.croppie('result', {
                circle: false,
                type: 'canvas',
                size: imageSize,
                quality: 1
            }).then(function (img) {
                $.ajax({

                    url: "<?=url('/')?>/admin/manajemen/toko/"+id_toko+"/ganti-foto-logo",
                    type: "POST",
                    data: {"image":img, "size":"400x400", "id_toko":id_toko, "nama":rString},
                    success: function (data) {
                     setTimeout(
                      function() 
                      {
                        location.reload();
                    }, 1500);
                 }
             });

            });
            status_ganti_foto = 1;
            resize.croppie('result', {
                circle: false,
                type: 'canvas',
                size: imageSize2,
                quality: 1
            }).then(function (img) {
                $.ajax({
                    url: "<?=url('/')?>/admin/manajemen/toko/"+id_toko+"/ganti-foto-logo",
                    type: "POST",
                    data: {"image":img, "size":"200x200", "id_toko":id_toko, "nama":rString},
                    success: function (data) {

                    }
                });
            });

        });

        function randomString(length, chars) {
            var d = new Date();
            var milliseconds  = Date.parse(d);
            var result = '';
            for (var i = length; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];
                return milliseconds+result;
        }


    </script>



    @endsection
