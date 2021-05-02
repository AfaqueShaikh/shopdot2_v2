@extends('layouts.brand')
@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Category</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Category</li>
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
                        <h4 class="card-title">Manage Categories</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{url('/brand/category/create')}}" class="btn btn-primary pull-right">Add Category</a>
                            </div>
                        </div>
                        <div class="table-responsive m-t-40">
                            <table id="category" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr role="row">
                                    <th>Category Name</th>
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
        $(document).ready(function () {
            $('#category').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('/brand/category/data') }}",
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'status', name: 'status'},
                    {data: "delete",
                        render: function (data, type, row) {
                            if (type === 'display') {
                                return '<a  class="btn btn-primary btn-xs" title="edit" href="{{url("brand/category/edit/")}}/' + row.id + '"><i class="fa fa-pencil"></i> Edit</a><form id="delete_' + row.id + '" action="{{url("brand/category/delete/")}}/' + row.id + '"><button type="button" class="btn btn-danger btn-xs" onclick="confirmDelete(' + row.id + ')"><i class="fa fa-trash"></i> Delete</a></form>';
                            }
                            return data;
                        },
                        className: "dt-body-center",
                        orderable: false,
                        'defaultContent':'-'
                    }
                ]
            });
        });

        function confirmDelete(id) {
            if(confirm('Do you really want to delete this record?')){
                $('#delete_'+id).submit();
            }
        }
    </script>
@endsection