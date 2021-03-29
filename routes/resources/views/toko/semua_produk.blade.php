@extends('layouts.toko')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card">
                <div class="table-responsive">
                    <table class="table product-overview">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product info</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th style="text-align:center">Total</th>
                                <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td width="150"><img src="{{asset('public/template/admin/assets/images/gallery/chair.jpg')}}" alt="iMac" width="80"></td>
                                <td width="550">
                                    <h5 class="font-500">Rounded Chair</h5>
                                    <p>Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look</p>
                                </td>
                                <td>$153</td>
                                <td width="70">
                                    <input type="text" class="form-control" placeholder="1">
                                </td>
                                <td width="150" align="center" class="font-500">$153</td>
                                <td align="center"><a href="javascript:void(0)" class="text-inverse" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash text-dark"></i></a></td>
                            </tr>
                            <tr>
                                <td><img src="{{asset('public/template/admin/assets/images/gallery/chair2.jpg')}}" alt="iMac" width="80"></td>
                                <td>
                                    <h5 class="font-500">Rounded Chair</h5>
                                    <p>Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look</p>
                                </td>
                                <td>$153</td>
                                <td>
                                    <input type="text" class="form-control" placeholder="1">
                                </td>
                                <td class="font-500" align="center">$153</td>
                                <td align="center"><a href="javascript:void(0)" class="text-inverse" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash text-dark"></i></a></td>
                            </tr>
                            <tr>
                                <td><img src="{{asset('public/template/admin/assets/images/gallery/chair3.jpg')}}" alt="iMac" width="80"></td>
                                <td>
                                    <h5 class="font-500">Rounded Chair</h5>
                                    <p>Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look</p>
                                </td>
                                <td>$153</td>
                                <td>
                                    <input type="text" class="form-control" placeholder="1">
                                </td>
                                <td class="font-500" align="center">$153</td>
                                <td align="center"><a href="javascript:void(0)" class="text-inverse" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash text-dark"></i></a></td>
                            </tr>
                            <tr>
                                <td><img src="{{asset('public/template/admin/assets/images/gallery/chair4.jpg')}}" alt="iMac" width="80"></td>
                                <td>
                                    <h5 class="font-500">Rounded Chair</h5>
                                    <p>Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look</p>
                                </td>
                                <td>$153</td>
                                <td>
                                    <input type="text" class="form-control" placeholder="1">
                                </td>
                                <td class="font-500" align="center">$153</td>
                                <td align="center"><a href="javascript:void(0)" class="text-inverse" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash text-dark"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection