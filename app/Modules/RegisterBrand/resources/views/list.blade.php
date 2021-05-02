@extends('layouts.retailer')
@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Register Brands</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Register Brands</li>
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
                        <h4 class="card-title">Registered Brands</h4>
                        <div class="table-responsive m-t-40">
                            <table id="category" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr role="row">
                                    <th>Brand Name</th>
                                    <th>Brand Info</th>
                                    <th>Products</th>
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
        $(document).ready(function () {
            $('#category').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('/retailer/register-brand/data') }}",
                columns: [
                    {data: 'brand', name: 'brand'},
                    {data: 'info', name: 'info'},
                    {data: 'product', name: 'product'},
                ]
            });
        });
    </script>
@endsection