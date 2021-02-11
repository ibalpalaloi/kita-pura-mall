@extends('layouts.admin')


@section('title')
Kategori Toko
@endsection

@section('header-scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .anyClass {
        height:400px;
        overflow-y: scroll;
    }
</style>
@endsection

@section('modal')
{{-- ubah kategori --}}
<div id="edit_kategori" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title">Ubah Password</h4>
            </div>
            <form action="<?=url('/')?>/admin/ubah/kategori_produk" method="post">
                <div class="modal-body">
                    {{ csrf_field() }} 
                    <input name="id" type="text" id="id" hidden>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Kategori</label>
                        <input name="kategori" type="text" class="form-control" id="kategori" style="text-transform: uppercase">
                    </div>
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup  </button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- end ubah kategori --}}
{{-- ubah sub kategori --}}
<div id="edit_sub_kategori" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title">Ubah Password</h4>
            </div>
            <form action="<?=url('/')?>/admin/ubah/sub_kategori_produk" method="post">
                <div class="modal-body">
                    {{ csrf_field() }} 
                    <input name="id" type="text" id="id_sub_kategori" hidden>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Kategori</label>
                        <input name="kategori" type="text" class="form-control" id="_sub_kategori" style="text-transform: uppercase">
                    </div>
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup  </button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- end ubah subu kategori --}}
{{-- ubah tambah kategori --}}
<div id="modal_tambah_kategori" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title">Tambah kategori</h4>
            </div>
            <form action="<?=url('/')?>/admin/tambah/kategori_produk" method="post">
                <div class="modal-body">
                    {{ csrf_field() }} 
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Kategori</label>
                        <input name="kategori" type="text" class="form-control" id="_sub_kategori" style="text-transform: uppercase">
                    </div>
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup  </button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- end tambah kategori --}}
{{-- ubah tambah sub kategori --}}
<div id="modal_tambah_sub_kategori" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title">Tambah sub kategori</h4>
            </div>
            <form action="<?=url('/')?>/admin/tambah/sub_kategori_produk" method="post">
                <div class="modal-body">
                    {{ csrf_field() }} 
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Kategori</label>
                        <select class="form-control" name="kategori" id="">
                            <option value=""></option>
                            @foreach ($kategori as $data)
                                <option value="{{$data->id}}">{{$data->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Sub Kategori</label>
                        <input name="sub_kategori" type="text" class="form-control" id="" style="text-transform: uppercase">
                    </div>
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup  </button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- end tambah sub kategori --}}
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="material-card card">
            <div class="card-body">
                <h4 class="card-title">Kategori Produk</h4>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_tambah_kategori">
                    Tambah Kategori
                </button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_tambah_sub_kategori">
                    Tambah Sub Kategori
                </button>
                <br><br>
                
                <div class=row>
                    <div class=" col-md-4">
                        <ul class="anyClass">
                            @php
                                $index = 0;
                            @endphp
                            @foreach ($kategori as $data)
                            <div>
                                <a class="btn delete_kategori" style="float: right;" data-id="{{$data->id}}"><i class="fa fa-trash"></i></a>
                                <a class="btn edit_kategori" style="float: right;" data-id="{{$data->id}}" data-kategori="{{$data->nama}}"><i class="fa fa-pencil"></i></a>
                            </div>
                            
                            <li class="nav-item">
                                <a class="nav-link kategori" href="#" id="kategori" data-id="{{$data->id}}">{{$data->nama}}</a>
                            </li>
                            
                            @endforeach
                        </ul>
                    </div>

                    <div class=" col-md-4">
                        <ul class="anyClass" id="sub_kategori">
                            
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer-scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function(){
        $(".kategori").click(function(){
            var id = $(this).attr("data-id");
            $.ajax({
                url:"{{ route('get_sub_kategori') }}",
                method: "post",
                data : {id:id, _token:'{{csrf_token()}}'},
                success:function(result)
                {
                    $("#sub_kategori").html(result);
                }
			})
        });

        $('.edit_kategori').on('click', function(){
            $('#edit_kategori').modal('show');
            var id = $(this).attr("data-id");
            var kategori = $(this).attr("data-kategori");

            $('#id').val(id);
            $('#kategori').val(kategori);
        });

        $('.delete_kategori').click(function(){
            var data_id = $(this).attr('data-id');
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = ("<?=url('/')?>/admin/delete/kategori_produk/"+data_id)
                    } 
                });
        });
    })
</script>
<script>
    function edit_sub_kategori(id, kategori) {
        $('#edit_sub_kategori').modal('show');
        $('#id_sub_kategori').val(id);
        $('#_sub_kategori').val(kategori);
    };

    function hapus_sub_kategori(id){
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = ("<?=url('/')?>/admin/delete/sub_kategori_produk/"+id)
                } 
            });
    }  
</script>
@endsection
