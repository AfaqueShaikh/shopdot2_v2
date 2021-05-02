@extends('layouts.retailer')
@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Invite Brands</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Invite Brands</li>
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
                        <h4 class="card-title">Invite Brands</h4>
                        <form action="{{url(('retailer/invite-brand/invite'))}}" method="POST">
                            @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="email" placeholder="brand email" value="{{old('email')}}">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Invite</button>
                            </div>
                            @error('email')
                            <label class="text text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        </form>
                        <div class="table-responsive m-t-40">
                            <table id="category" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr role="row">
                                    <th>Brand Email</th>
                                    <th>Invited At</th>
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
                ajax: "{{ url('/retailer/invite-brand/data') }}",
                columns: [
                    {data: 'email', name: 'email'},
                    {data: 'invite', name: 'invite'},
                ]
            });
        });
    </script>
@endsection