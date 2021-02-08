@extends('layouts.admin')


@section('title')
Kategori Toko
@endsection

@section('header-scripts')

@endsection

@section('modal')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="material-card card">
            <div class="card-body">
                <h4 class="card-title">Kategori Toko</h4>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped border">
                        <thead>
                            <tr>
                                <th>Kategori Toko</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody> 
                            @foreach ($kategori_toko as $data)
                                <tr>
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
@endsection
