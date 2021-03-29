@extends('layouts.toko')
@section('content')
<div class="row">
    <!-- Column -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="#">
                    <div class="form-body">
                        <h5 class="card-title">Tambah Produk</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Nama Produk</label>
                                    <input type="text" id="firstName" class="form-control" placeholder="Produk"> </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Sub text</label>
                                    <input type="text" id="lastName" class="form-control" placeholder="Sub Text"> </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Kategori</label>
                                    <select class="form-control" data-placeholder="Pilih Kategori" tabindex="1" id="kategori">
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($kategori as $data)
                                            <option value="{{$data->id}}">{{$data->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Sub Kategori</label>
                                    <select class="form-control" data-placeholder="Sub Kategori" tabindex="1" id="sub_kategori">
                                        
                                    </select>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Harga</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="ti-money"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="price" aria-label="price" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Diskon</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2"><i class="ti-cut"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Discount" aria-label="Discount" aria-describedby="basic-addon2">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <h5 class="card-title mt-5">Product Description</h5>
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <textarea class="form-control" rows="4">Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. but the majority have suffered alteration in some form, by injected humour</textarea>
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Meta Title</label>
                                    <input type="text" class="form-control"> </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Meta Keyword</label>
                                    <input type="text" class="form-control"> </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-3">
                                <h5 class="card-title mt-3">Upload Image</h5>
                                <div class="el-element-overlay">
                                    <div class="el-card-item">
                                        <div class="el-card-avatar el-overlay-1"> <img src="../../assets/images/gallery/chair3.jpg" alt="user" />
                                            <div class="el-overlay">
                                                <ul class="list-style-none el-info">
                                                    <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="../../assets/images/gallery/chair3.jpg"><i class="icon-magnifier"></i></a></li>
                                                    <li class="el-item"><a class="btn default btn-outline el-link" href="javascript:void(0);"><i class="icon-link"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn btn-info waves-effect waves-light"><span>Upload Anonther Image</span>
                                    <input type="file" class="upload"> </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="card-title mt-5">GENERAL INFO</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered td-padding">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" placeholder="Brand">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" placeholder="Stellar">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" placeholder="Delivery Condition">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" placeholder="Knock Down">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" placeholder="Seat Lock Included">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" placeholder="Yes">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" placeholder="Type">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" placeholder="Office Chair">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" placeholder="Style">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" placeholder="Contemporary &amp; Modern">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" placeholder="Wheels Included">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" placeholder="Yes">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" placeholder="Upholstery Included">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" placeholder="Yes">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr> </div>
                    <div class="form-actions mt-5">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                        <button type="button" class="btn btn-dark">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
@endsection
@section('footer-scripts')
    <script>
        $(document).ready(function(){
            $('#kategori').change(function(){
			if($(this).val() != ' ')
			{
				var value = $(this).val();
				$.ajax({
					url:"{{ route('get_sub_kategori') }}",
					method: "post",
					data : {value:value, _token:'{{csrf_token()}}'},
					success:function(result)
					{
						$("#sub_kategori").html(result);
					}
				})
			}
		    });
        })
    </script>
@endsection