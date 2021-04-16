@extends('layouts.admin')


@section('title')

Detail Daftar Tunguu
@endsection

@section('header-scripts')

1
<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section('modal')
@endsection


@section('content')
<?php
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
  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>
<div id="modal_kategori" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                <button onclick="simpan_kategori('{{$toko->toko_id}}')" type="button" class="btn btn-info waves-effect" data-dismiss="modal">simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="row">
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <center class="mt-4"> <img src="<?=url('/')?>/public/img/toko/{{$toko->toko_id}}/logo/{{$toko->logo_toko}}" class="rounded-circle" width="150" />
                    <h4 class="card-title mt-2">{{$toko->nama_toko}}</h4>
                </center>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <div class="card-body">
                <div class="card-body">
                    <form class="form-horizontal form-material" method="post" action="<?=url('/')?>/admin/manajemen/daftar_tunggu_toko/post" id="form_submit">
                        {{ csrf_field() }}
                        <input type="text" name="id" value="{{$toko->id}}" hidden>
                        <input type="text" name="toko_id" value="{{$toko->toko_id}}" hidden>
                        <input type="text" name="user_id" value="{{$toko->users_id}}" hidden>
                        <input type="text" name="kelurahan_id" value="{{$toko->kelurahan_id}}" hidden>
                        <input type="text" name="logo_toko" value="{{$toko->logo_toko}}" hidden>
                        <div class="form-group">
                            <label class="col-md-12">Nomor Akun</label>
                            <div class="col-md-12">
                                <input id="no_akun" readonly name="nama_toko" type="text" class="form-control form-control-line" value="{{$user->no_hp}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Nama Toko</label>
                            <div class="col-md-12">
                                <input name="nama_toko" type="text" class="form-control form-control-line" value="{{$toko->nama_toko}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Nama Pemilik</label>
                            <div class="col-md-12">
                                <input name="nama_pemilik" type="text" class="form-control form-control-line" value="{{$toko->user->biodata->nama}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Username</label>
                            <div class="col-md-12">
                                <input name="username" type="text" class="form-control form-control-line" value="{{$toko->username}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">No Hp</label>
                            <div class="col-md-12">
                                <input name="no_hp" type="text" class="form-control form-control-line" value="{{$toko->no_hp}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Alamat</label>
                            <div class="col-md-12">
                                <textarea name="alamat" rows="5" class="form-control form-control-line">{{$toko->alamat}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Jenis Mitra</label>
                            <div class="col-sm-12">
                                <select name="jenis_mitra" class="form-control form-control-line">
                                    <option value="free" @if($toko->jenis_mitra == 'free') selected @endif>Free</option>
                                    <option value="premium" @if($toko->jenis_mitra == 'premium') selected @endif>Premium</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label >Kategori Toko</label>
                                <a onclick="list_kategori()" href="#">Tambah</a>
                            </div>
                            <div class="col-sm-12" id="list_kategorinya_toko">
                                @foreach ($kategori as $item)
                                    <li id="kategori_{{$item->id}}">{{$item->kategori_toko->kategori}} <i onclick="hapus_kategori_toko('{{$item->id}}')" class="far fa-trash-alt remove-note"></i></li>
                                @endforeach
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-md-12">Deskripsi</label>
                            <div class="col-md-12">
                                <textarea name="deskripsi" rows="5" class="form-control form-control-line">{{$toko->deskripsi}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Latitude</label>
                            <div class="col-md-12">
                                <input name="latitude" type="text" class="form-control form-control-line" value="{{$toko->latitude}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">longitude</label>
                            <div class="col-md-12">
                                <input name="longitude" type="text" class="form-control form-control-line" value="{{$toko->longitude}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Waktu Pendaftaran</label>
                            <div class="col-md-12">
                                <input name="" type="text" class="form-control form-control-line" value="{{tgl_indo(date('Y-m-d h:i', strtotime($toko->created_at)))}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <button onclick="WhatsappMessage('{{$user->no_hp}}')" type="submit" class="btn btn-success">Konfirmasi WA</button>
                                </div>
                                <div class="col-sm-4">
                                    <button onclick="tampil_alert()" type="button" class="btn btn-primary">Verifikasi</button>
                                    <button id="submit" type="button" class="btn btn-primary" hidden>hidden</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer-scripts')

<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function hapus_kategori_toko(id){
        $.ajax({
            url: "{{route('hapus_kategorinya_toko')}}",
            method: "post",
            data : {id:id, _token:'{{csrf_token()}}'},
            success:function(result)
            {
                $("#kategori_"+id).remove();
            }
        })
        
    }

    function list_kategori(){
        $('#modal_kategori').modal('show');
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

    var isMobile = mobilecheck();

    function mobilecheck() {
        var check = false;
        (function (a) {
            if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i
                .test(a) ||
                /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| ||a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i
                .test(a.substr(0, 4))) check = true;
        })(navigator.userAgent || navigator.vendor || window.opera);
        return check;
    }


   function WhatsappMessage(no_hp) {
        event.preventDefault();
        var data = {!! json_encode($toko) !!};
        var kategorinya_toko = {!! json_encode($kategori) !!}
        var kategori='';
        for(i=0; i<kategorinya_toko.length; i++){
            kategori = kategori+kategorinya_toko[i]['kategori_toko']['kategori']+", ";
        }
        var apilink = 'http://';
        var phone = no_hp;
        var message = 'Terima kasih telah mendaftar sebagai mitra di kitapura mall!! \n\n'+
                      'Kami dari admin kitapuramall ingin mengkonfirmasi data toko anda, Silahkan pastikan data yang anda masukan telah sesuai\n\n'+
                      'Nama Toko = '+data['nama_toko']+'\n' +
                      'Nama Pemilik = '+'\n'+
                      'No HP Toko = ' + data['no_hp'] + '\n' +
                      'Alamat = '+ data['alamat']+'\n'+
                      'Kategori = '+kategori+'\n'+
                      'Deskripsi Toko = '+data['deskripsi']+'\n\n'+
                      'Pastikan data di atas telah benar '
                        ;

        // apilink += isMobile ? 'api' : 'web';
        // apilink += '.whatsapp.com/send?phone=' + phone + '&text=' + encodeURI(message);
        var walink = 'https://wa.me/'+ phone +'?text=' + encodeURI(message);
        window.open(walink);
    } 

    function tampil_alert(){
        swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            $('#submit').click();
        } else {
            swal("Your imaginary file is safe!");
        }
        });
    }

    $( "#submit" ).click(function() {
        $.ajax({
            url: "{{route('validasi_toko')}}",
            method: "post",
            data : $('#form_submit').serialize(),
            success:function()
            {
                var data = {!! json_encode($toko) !!};
                var user = {!! json_encode($user) !!};
                var apilink = 'http://';
                var phone = user['no_hp'];
                var message = 'Hallo kak akun Toko ' + data['nama_toko'] + ' telah aktif\n' +
                            'sekarang kaka sudah bisa menggunakan semua layanan kami, silahkan menambahakan produk dan mengatur landing page toko kaka\n\n'+
                            'jika ada kendala atau hal yang tidak dipahami silahkan hubungi admin kitapuramall\n'+
                            '-----------------------\n'+
                            'Informasi dan konfirmasi (0851-5836-2224)\n\n'+
                            'Official Account:\n'+
                            'IG : @kitapuramall\n\n'+
                            'Kantor Pemasaran Kitapuramall\n'+
                            'Jln. Gelatik, No. 29, Birobuli Utara, Palu Selatan, Palu - Sulawesi Tengah';

                // apilink += isMobile ? 'api' : 'web';
                // apilink += '.whatsapp.com/send?phone=' + phone + '&text=' + encodeURI(message);
                var walink = 'https://wa.me/'+ phone +'?text=' + encodeURI(message);
                window.open(walink);
            }
        })
        
    });
</script>
@endsection
