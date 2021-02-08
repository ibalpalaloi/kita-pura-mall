@extends('layouts.admin')


@section('title')
Pengguna
@endsection

@section('header-scripts')


@endsection

@section('modal')
<div id="editPassModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title">Ubah Password</h4>
            </div>
            <form action="<?=url('/')?>/admin/ubah_password/pengguna" method="post">
                <div class="modal-body">
                    {{ csrf_field() }} 
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Nama</label>
                        <input name="nama" type="text" class="form-control" id="nama" readonly>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Nomor Hp</label>
                        <input name="no_hp" type="text" class="form-control" id="no_hp" readonly>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Password Baru</label>
                        <input name="password_baru" type="text" class="form-control" id="password">
                    </div>
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup   </button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@section('content')

<div class="row">
    <div class="col-12">
        <div class="material-card card">
            <div class="card-body">
                <h4 class="card-title">Pengguna</h4>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped border">
                        <thead>
                            <tr>
                                <th>No Hp</th>
                                <th>Nama</th>
                                <th>Level Akses</th>
                                <th>Status</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $data)
                                <tr>
                                    <td><a href="">{{$data->no_hp}}</a></td>
                                    @if (!empty($data->biodata->nama))
                                        <td>{{$data->biodata->nama}}</td>  
                                    @else
                                        <td></td>  
                                    @endif
                                    <td><a href=""></a>{{$data->level_akses}}</td>
                                    <td><a href=""></a>{{$data->status}}</td>
                                    <td><a href=""></a>{{$data->email}}</td>
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
    $('.editPassBtn').on('click', function(){
        $('#editPassModal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);

        $('#no_hp').val(data[0]);
        $('#nama').val(data[1]);
    })
</script>
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
                    window.location = ("<?=url('/')?>/admin/delete/pengguna/"+data_id)
                } 
            });
    });
</script>
@endsection
