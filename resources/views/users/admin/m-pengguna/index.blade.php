@extends('layouts.admin')


@section('title')
Pengguna
@endsection

@php
// fungsi untuk konversi tanggal ke indonesia
function tgl_indo($tanggal){
$bulan = array (
1 => 'Januari',
'Februari',
'Maret',
'April',
'Mei',
'Juni',
'Juli',
'Agustus',
'September',
'Oktober',
'November',
'Desember'
);
$pecahkan = explode('-', $tanggal);
return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
@endphp

@section('header-scripts')

<link href="<?=url('/')?>/public/template/admin/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css"
    rel="stylesheet">
<link rel="stylesheet" type="text/css"
    href="<?=url('/')?>/public/template/admin/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css">

@endsection

@section('modal')
<div id="editPassModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    style="display: none;">
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
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup </button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('page-title')
<div class="row">
    <div class="col-lg-3 col-md-4 col-xs-12 justify-content-start d-flex align-items-center">
        <h5 class="font-medium text-uppercase mb-0">Daftar Pengguna</h5>
    </div>
    <div class="col-lg-9 col-md-8 col-xs-12 d-flex justify-content-start justify-content-md-end align-self-center">
        <nav aria-label="breadcrumb" class="mt-2">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{url('/admin/beranda')}}">Beranda</a> </li>
                <li class="breadcrumb-item active" aria-current="page">Daftar Pengguna</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
{{-- <div class="row">
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
                                    <a class="btn btn-danger btn-circle delete" data-id="{{$data->id}}"><i
                                            class="fa fa-trash"></i> </a>
                                    <a class="btn btn-info btn-circle editPassBtn"><i class="fa fa-pencil-square"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-dark">
                <div class="d-flex flex-row">
                    <div class="mr-auto align-self-center">
                        <h4 class="card-title mb-0 text-white">Pengguna</h4>
                    </div>
                </div>

            </div>
            <div class="card-body">

                <div class="table-responsive m-t-40">
                    <table id="config-table" class="table display table-bordered table-striped no-wrap">
                        <thead>
                            <tr>
                                <th style="width:1%;">No.</th>
                                <th>No. HP</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Email</th>
                                <th>Tanggal Bergabung</th>
                                <th style="width:3%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                @if ($data->no_hp)
                                <td><a href="<?=url('/')?>/admin/manajemen/detail_pengguna/{{$data->id}}">{{$data->no_hp}}</a></td>
                                @else
                                <td><a href="<?=url('/')?>/admin/manajemen/detail_pengguna/{{$data->id}}">{{$data->email}}</a></td> 
                                @endif
                                @if (!empty($data->biodata->nama))
                                <td>{{$data->biodata->nama}}</td>
                                @else
                                <td></td>
                                @endif
                                <td>{{ucfirst($data->status)}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{ tgl_indo(date('Y-m-d', strtotime($data->created_at))) }}</td>
                                <td>
                                    <a class="btn btn-danger btn-circle delete" data-id="{{$data->id}}"><i
                                            class="fa fa-trash"></i> </a>
                                    @if ($data->google_id)
                                    @else
                                    <a class="btn btn-info btn-circle editPassBtn">
                                        <i class="fa fa-pencil-square"></i>
                                    </a>
                                    @endif
                                    
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
<script src="<?=url('/')?>/public/template/admin/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=url('/')?>/public/template/admin/assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js">
</script>
<script src="<?=url('/')?>/public/template/admin/dist/js/pages/datatable/datatable-basic.init.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $('.editPassBtn').on('click', function () {
        $('#editPassModal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();

        console.log(data);

        $('#no_hp').val(data[1]);
        $('#nama').val(data[2]);
    })

</script>
<script>
    $('.delete').click(function () {
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
                    window.location = ("<?=url('/')?>/admin/delete/pengguna/" + data_id)
                }
            });
    });

</script>
@endsection
