@extends('layouts.brand')
@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Retailer Request</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Retailer Request</li>
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
                        <h4 class="card-title">Retailer Requests</h4>
                        <div class="table-responsive m-t-40">
                            <table id="category" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr role="row">
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
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
        var dataTable = '';
        $(document).ready(function () {
            dataTable = $('#category').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('/brand/retailer-request/data') }}",
                columns: [
                    {data: 'retailer', name: 'retailer'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action'},
                ]
            });
        });

        function changeStatus(id,status) {
            if(status)
                var msg = 'Do you really want to allow product access?';
            else
                var msg = 'Do you really want to remove product access?';
            if(confirm(msg)){
                $.ajax({
                    url:"{{url('/brand/retailer-request/status')}}",
                    data:{
                        id: id,
                        status: status
                    },
                    success: function (result) {
                        dataTable.draw();
                    }
                });
            }
        }
    </script>
@endsection