@extends('layouts.admin')


@section('title')
Kategori Toko
@endsection

@section('header-scripts')

@endsection

@section('modal')
{{-- modal tambah kategori --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Toko</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?=url('/')?>/admin/tambah/kategori_toko" method="post">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Kategori</label>
                    <input name="kategori" type="text" class="form-control" id="recipient-name" style="text-transform: uppercase">
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
</div>
{{-- end tambah kategori --}}
{{-- ubah kategori --}}
<div id="editPassModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title">Ubah Password</h4>
            </div>
            <form action="<?=url('/')?>/admin/ubah/kategori_toko" method="post">
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
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="material-card card">
            <div class="card-body">
                <h4 class="card-title">Kategori Toko</h4>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Tambah Kategori
                </button>
                <br><br>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped border">
                        <thead>
                            <tr>
                                <th style="display: none">id</th>
                                <th>Kategori Toko</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody> 
                            @foreach ($kategori_toko as $data)
                                <tr>
                                    <td style="display: none">{{$data->id}}</td>
                                    <td>{{$data->kategori}}</td>
                                    <td>
                                        <a class="btn btn-danger btn-circle delete" data-id="{{$data->id}}"><i class="fa fa-trash"></i> </a>
                                        <a class="btn btn-info btn-circle editPassBtn"><i class="fa fa-pencil-square"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer-scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $('.delete').click(function(){
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
                    window.location = ("<?=url('/')?>/admin/delete/kategori_toko/"+data_id)
                } 
            });
    });
</script>
<script>
    $('.editPassBtn').on('click', function(){
        $('#editPassModal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);

        $('#id').val(data[0]);
        $('#kategori').val(data[1]);
    })
</script>
@endsection
