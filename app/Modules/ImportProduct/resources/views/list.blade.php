@extends('layouts.retailer')
@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Imported Product</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Imported Product</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-12">
                @if(Session::has('error'))
                    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
                @endif
                @if(Session::has('success'))
                    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
                @endif
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Imported Product</h4>
                        {{--<div class="row">--}}
                            {{--<div class="col-md-8">--}}
                                {{--<input type="text" class="form-control" name="name" placeholder="product name" value="{{old('name')}}">--}}
                            {{--</div>--}}
                            {{--<div class="col-md-4">--}}
                                {{--<button type="button" class="btn btn-primary">Search</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="table-responsive m-t-40">
                            <table id="product" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr role="row">
                                    <th>Brand Name</th>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Category Name</th>
                                    <th>Price</th>
                                    <th>Qty with Variant</th>
                                    <th>Processing & Shipping Time</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->
@endsection
@section('footer')
    <script src="{{url('/public/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript">
        var dataTable;
        $(document).ready(function () {
            dataTable = $('#product').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('retailer/import-product/data') }}",
                columns: [
                    {data: 'brand_name', name: 'brand_name'},
                    {data: 'image', name: 'image'},
                    {data: 'name', name: 'name'},
                    {data: 'category', name: 'category'},
                    {data: 'sale_price', name: 'sale_price'},
                    {data: 'qty', name: 'qty'},
                    {data: 'shipping', name: 'shipping'},
                    {data: 'status', name: 'status'},
                ]
            });
        });
    </script>
@endsection