@extends('layouts.admin')


@section('title')
Produk Toko
@endsection

@section('header-scripts')


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
@endsection


@section('content')
<div class="row el-element-overlay">
    @foreach ($produk as $data)
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="el-card-item">
                <div class="el-card-avatar el-overlay-1"> <img src="<?=url('/')?>/public/img/toko/{{$toko->id}}/produk/{{$data->foto_produk}}" alt="user" height="600" />
                    <div class="el-overlay">
                        <ul class="list-style-none el-info">
                            <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="../../assets/images/gallery/chair.jpg"><i class="icon-magnifier"></i></a></li>
                            <li class="el-item"><a class="btn default btn-outline el-link" href="javascript:void(0);"><i class="icon-link"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="d-flex no-block align-items-center">
                    <div class="ml-3">
                        <h4 class="mb-0">{{$data->nama}}</h4>
                        <span class="text-muted">Kategori : {{$data->kategori->nama}}</span><br>
                        <span class="text-muted">Kategori : {{$data->sub_kategori->nama}}</span><br>
                        @if ($data->jenis_harga == "Statis")
                            <span class="text-muted">Harga : {{$data->harga}}</span>
                        @else
                            <span class="text-muted">Harga Mulai : {{$data->harga_terendah}}</span>
                        @endif
                        
                    </div>
                    <div class="ml-auto mr-3">
                        <button onclick="modal_ubah_produk('{{$data->nama}}', '{{$data->harga}}', '{{$data->kategori->id}}', '{{$data->sub_kategori->id}}', '{{$data->sub_kategori->nama}}', '{{$data->id}}')" type="button" class="btn btn-dark btn-circle" >
                            <i class="fas fa-pencil-alt"></i>
                        </button>
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
@endsection
