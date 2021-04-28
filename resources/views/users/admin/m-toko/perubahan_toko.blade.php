@extends('layouts.admin')


@section('title')
Toko
@endsection

@section('header-scripts')


@endsection

@section('modal')
@endsection


@section('content')
{{-- modal hapus toko --}}

{{-- hapus toko --}}
<?php
    // fungsi untuk konversi tanggal ke indonesia
function tgl_indo($tanggal){
    $bulan = array (
        1 =>   'Januari',
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

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>

<div id="modal_hapus_toko" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myModalLabel">Hapus Toko</h4>
                <button type="button" class="close ml-auto" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="<?=url('/')?>/admin/manajemen/hapus_toko" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        Ketikkan untuk menghapus toko <b>"kitapuramallpalu"</b> 
                        <p style="color: red" id="pass_salah"></p>
                        <input name="ketikan" id="ketikan" type="text" hidden value="kitapuramallpalu">
                        <input name="id_toko" id="id_toko" type="text" hidden>
                        <div class="col-sm-12">
                            <input name="pass" id="pass" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="cek_pass()" class="btn btn-info waves-effect">Hapus Toko</button>
                        <button id="submit" type="submit" hidden class="btn btn-info waves-effect">hidden</button>
                    </div>
                </form>
            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="row">
    <div class="col-12">
        <div class="material-card card">
            <div class="card-body">
                <h4 class="card-title">Daftar Semua Toko</h4>
                <a type="button" class="btn btn-primary" href="<?=url('/')?>/admin/manajemen/daftar_tunggu_toko">
                    Daftar Tunggu
                </a>
                <br><br>
                <div class="table-responsive">
                    <table style="width: 100%" id="config-table" class="table display table-bordered table-striped no-wrap">
                        <thead>
                            <tr>
                                <td>No</td>
                                <th>Nama Toko</th>
                                <th>No Telp</th>
                                <th>Alamat</th>
                                <th>Jumlah Produk</th>
                                <th>Perubahan</th>
                                <th>Terakhir diubah</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 0; @endphp
                            @foreach ($toko as $data)
                            @if ($data->jumlah_perubahan > 0)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>{{$data->nama_toko}}</td>
                                <td>{{$data->no_hp}}</td>
                                <td>{{$data->alamat}}</td>
                                <td><a href="<?=url('/')?>/admin/manajemen/toko/{{$data->id}}/daftar_produk">{{$data->jumlah_produk}}</a></td>
                                <td><a href="<?=url('/')?>/admin/manajemen/toko/{{$data->id}}/daftar_produk">{{$data->jumlah_perubahan}}</a></td>
                                <td>{{tgl_indo(date('Y-m-d', strtotime($data->created_at)))}} - {{date('H:i', strtotime($data->created_at))}} WITA</td>
                                <td>
                                    <a href="<?=url('/')?>/admin/manajemen/toko/{{$data->id}}" type="button" class="btn btn-primary">Ubah</a>
                                    <a onclick="modal_hapus('{{$data->id}}')" type="button" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            @php $i++; @endphp
                            @endif
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

<script>
    function modal_hapus(id_toko){
        $('#modal_hapus_toko').modal('show');
        $('#id_toko').val(id_toko);
    }

    function cek_pass(){
        if($('#ketikan').val() != $('#pass').val()){
            $('#pass_salah').empty();
            $('#pass_salah').append("Inputan salah");
        }
        else{
            $("#submit").click();
        }
    }
</script>
@endsection
