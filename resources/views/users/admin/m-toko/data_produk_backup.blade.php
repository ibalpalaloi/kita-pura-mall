@extends('layouts.admin')


@section('title')
Produk Toko
@endsection

@section('header-scripts')

<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">

@endsection

@section('modal')

<div id="modal_ubah_produk" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myModalLabel">Data Toko</h4>
                <button type="button" class="close ml-auto" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="<?=url('/')?>/admin/manajemen/toko/{{$toko->id}}/post_ubah_produk" method="post">
                    {{ csrf_field() }}
                    <input type="text" id="id_produk" name="id_produk" hidden>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Nama Produk:</label>
                        <input value="" type="text" class="form-control" id="nama_produk" name="nama_produk">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Kategori:</label>
                        <select class="form-control" name="kategori" id="kategori">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Sub Kategori:</label>
                        <select class="form-control" name="sub_kategori" id="sub_kategori">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Harga:</label>
                        <input value="" type="text" class="form-control" id="harga" name="harga">
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
<div id="modal_hapus_perubahan" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myModalLabel">Data Toko</h4>
                <button type="button" class="close ml-auto" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="<?=url('/')?>/admin/manajemen/toko/{{$toko->id}}/post_validasi_perubahan" method="post" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
                    {{ csrf_field() }}
                    <h3 style="text-align: center;">Apakah produk ini telah valid ?</h3>
                    <div class="form-group" hidden>
                        <label for="recipient-name" class="control-label">Nama Produk:</label>
                        <input value="" type="text" class="form-control" id="id_perubahan" name="id_perubahan">
                        <input value="" type="text" class="form-control" id="id_produk_perubahan" name="id_produk_perubahan">

                        <!-- <input type="" name=""> -->
                    </div>
                    <div>
                        <button class="btn btn-success" id="valid">Valid</button>
                        <button class="btn btn-danger" id="tidak_valid">Tidak Valid</button>                        
                        <div class="btn btn-dark" data-dismiss="modal">Tutup</div>
                    </div>
                </form>
            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div id="modal-foto" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel">Tambah Foto Rental</h4>
                <button type="button" class="close ml-auto" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form enctype="multipart/form-data" action="{{url()->current()}}/update-foto-ori" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
                    <div class="container">
                        <div class="panel panel-info">
                            <div class="panel-body">
                                <div class="row" style="display: flex; flex-direction: column;">
                                    <div>
                                        <div>Preview :</div>
                                        <div id="upload-demo">

                                        </div>
                                    </div>
                                    <div>
                                        <div class="btn btn-primary btn-block" id="unggah_foto" onclick="unggah_foto()" style="margin-top: 5%;">Unggah Foto</div>
                                    </div>
                                    <div class="div_upload" hidden>
                                        <div class="btn btn-primary btn-block upload-image" style="margin-top:2%" >Upload Image</div>
                                        <div class="btn btn-secondary btn-block" onclick="unggah_foto()">Unggah Foto
                                        </div>
                                    </div>
                                    <input type="file" name="image" id="image" hidden>
                                    <input type="text" name="nama_foto_temp" id="nama_foto_temp" hidden>
                                    <input type="text" name="id_toko" id="id_toko" value="<?=Request::segment(4)?>" hidden>

                                    <button type="submit" id="btn_image" hidden></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection


@section('content')
<div class="row el-element-overlay">
    @foreach ($produk as $data)
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="el-card-item">
                <div class="el-card-avatar el-overlay-1"> <img src="<?=url('/')?>/public/img/toko/{{$toko->id}}/produk/600x600/{{$data->foto_produk}}" alt="user" height="600" />
                    <div class="el-overlay">
                        <ul class="list-style-none el-info">
                            <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="<?=url('/')?>/public/img/toko/{{$toko->id}}/produk/600x600/{{$data->foto_produk}}"><i class="icon-magnifier"></i></a></li>
                            <li class="el-item"><a class="btn default btn-outline el-link" href="<?=url('/')?>/public/img/toko/{{$toko->id}}/produk/600x600/{{$data->foto_produk}}" download=""><i class="icon-link"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="d-flex no-block align-items-center" style="position: relative;">
                    <div class="ml-3">
                        <h4 class="mb-0">{{$data->nama}}</h4>
                        <span class="text-muted">Kategori : {{$data->kategori}}</span><br>
                        
                        <span class="text-muted">sub_Kategori : {{$data->sub_kategori}}</span><br>
                        @if ($data->jenis_harga == "Statis")
                        <span class="text-muted">Harga : {{$data->harga}}</span>
                        @else
                        <span class="text-muted">Harga Mulai : {{$data->harga_terendah}}</span>
                        @endif
                        
                    </div>
                    <div class="ml-auto mr-3" style="position: absolute; right: 0.1em; top: -3em;">
                        <a download href="<?=url('/')?>/public/img/toko/{{$data->toko_id}}/produk/original/{{$data->foto_produk}}"  type="button" class="btn btn-info btn-circle" >
                            <i class="fas fa-download"></i>
                        </a>
                        <button onclick='open_modal_foto("<?=$data->id?>")' type="button" class="btn btn-primary btn-circle" >
                            <i class="fas fa-camera"></i>
                        </button>
                        <button onclick="modal_ubah_produk('{{$data->nama}}', '{{$data->harga}}', '{{$data->kategori_id}}', '{{$data->sub_kategori_id}}', '{{$data->sub_kategori}}', '{{$data->id}}')" type="button" class="btn btn-dark btn-circle" >
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                        @if ($data->perubahan_product != null)
                        <button onclick='validasi_perubahan("<?=$data->perubahan_product?>", "<?=$data->id?>", "tidak_valid")' type="button" class="btn btn-danger btn-circle" >
                            <i class="fas fa-exclamation-triangle"></i>
                        </button>
                        @else
                        <button  onclick='validasi_perubahan("<?=$data->perubahan_product?>", "<?=$data->id?>", "valid")' type="button" class="btn btn-success btn-circle" >
                            <i class="fas fa-check"></i>
                        </button>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

@section('footer-scripts')
<script>
    function modal_ubah_produk(nama_produk, harga, kategori_id, sub_kategori_id, sub_kategori_nama, id_produk){
        $('#kategori').empty();
        $('#sub_kategori').empty();
        $('#id_produk').val(id_produk);
        $("#nama_produk").val(nama_produk);
        $("#harga").val(harga);
        $('#sub_kategori').append(new Option(sub_kategori_nama, sub_kategori_id, false, true));
        var kategori_produk = {!! json_encode($kategori) !!}
        console.log(kategori_produk);
        for(i=0; i<kategori_produk.length; i++){
            if(kategori_produk[i]['id'] == kategori_id){
                $('#kategori').append(new Option(kategori_produk[i]['nama'], kategori_produk[i]['id'], false, true));
            }
            else{
                $('#kategori').append(new Option(kategori_produk[i]['nama'], kategori_produk[i]['id'], false, false));
            }
        }
        $('#modal_ubah_produk').modal('show');
    }

    $('#kategori').on('change', function() {
        var value = $(this).find(":selected").val()
        $.ajax({
            url: "{{route('get_sub_kategori_')}}",
            method: "post",
            data : {value:value, _token:'{{csrf_token()}}'},
            success:function(result)
            {
                $('#sub_kategori').empty();
                $('#sub_kategori').html(result);
            }
        })
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var id_produk = "";

    function open_modal_foto(id_produk_tes){
        id_produk = id_produk_tes;
        $("#modal-foto").modal('show');
    }

    function ubah_foto(){
        $(".div_upload").prop('hidden', true);
        $("#unggah_foto").prop('hidden', false);
        $('#modal-sukses').modal('show');
    }

    function unggah_foto(){
        $("#image").click();
    }


    function input_focus_username(id){
            // alert(id);
            $("#"+id).css('color', 'white');
            $("#"+id).css('text-decoration', 'none');           
        }

        function unggah_foto(){
            $("#image").click();
        }  



        var resize = $('#upload-demo').croppie({
            enableExif: true,
            enableOrientation: true,
    viewport: { // Default { width: 100, height: 100, type: 'square' } 
    width: 300,
    height: 300,
        type: 'square' //square
    },
    boundary: {
        width: 300,
        height:300
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
            width: 600,
            height: 600,
            type: 'square'
        };

        var imageSize2 = {
            width: 240,
            height: 240,
            type: 'square'
        };


        function validasi_perubahan(id, id_produk, valid){
        // alert(id);

        $("#id_perubahan").val(id);
        if (valid == 'valid'){
            $("#valid").prop('hidden', true);
            $("#tidak_valid").prop('hidden',false);            
        }
        else {
            $("#valid").prop('hidden', false);
            $("#tidak_valid").prop('hidden', true);

        }
        $("#id_produk_perubahan").val(id_produk);
        $("#modal_hapus_perubahan").modal('show');
    }



    $('.upload-image').on('click', function (ev){ 
        show_loader();
        $("#modal-sukses").modal('hide');
        var id_toko = "{{Request::segment(4)}}";
        var rString = randomString(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
        resize.croppie('result', {
            circle: false,
            type: 'canvas',
            size: imageSize,
        }).then(function (img) {
            $.ajax({
                url: "<?=url('/')?>/admin/manajemen/toko/{{Request::segment(4)}}/daftar_produk/ganti-foto-produk",
                type: "POST",
                data: {"image":img, "size":"600x600", "id_produk":id_produk, "id_toko":id_toko, "nama":rString},
                success: function (data) {
                    setTimeout(
                      function() 
                      {
                        $("#nama_foto_temp").val(rString);
                        $("#btn_image").click();
                      }, 2000);
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
                url: "<?=url('/')?>/admin/manajemen/toko/{{Request::segment(4)}}/daftar_produk/ganti-foto-produk",
                type: "POST",
                data: {"image":img, "size":"240x240", "id_produk":id_produk, "id_toko":id_toko,"nama":rString},
                success: function (data) {
                    // alert(data);
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

    function show_loader(){
        console.log('show');
        $("#modal_loader").modal("show");
    };

    function hide_loader(){
        console.log('hide');
        $("#modal_loader").modal("hide");
    };


</script>



@endsection
