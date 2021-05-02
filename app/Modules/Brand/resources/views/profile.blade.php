@extends('layouts.brand')
@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-two">
                            <header>
                                <div class="avatar">
                                    <img src="{{url('/public')}}/images/users/profile.png" alt="Brand Name" />
                                </div>
                            </header>

                            <h3>Brand Name</h3>
                            <div class="contacts">
                                <a href="">&nbsp;</a>
                                <a href="javascript:void(0)"><i class="fa fa-plus"></i></a>
                                <a href="">&nbsp;</a>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-12">
                <div class="card">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs profile-tab" role="tablist">
                        <li class="nav-item"> <a class="nav-link @if(!(Session::has('bank-setting') || Session::has('business-setting') ||  Session::has('shipping'))) active @endif" data-toggle="tab" href="#credential" role="tab">Account Credentials</a> </li>
                        <li class="nav-item"> <a class="nav-link @if(Session::has('bank-setting')) active @endif" data-toggle="tab" href="#bank-setting" role="tab">Bank Details</a> </li>
                        <li class="nav-item"> <a class="nav-link @if(Session::has('business-setting')) active @endif" data-toggle="tab" href="#business-setting" role="tab">Business Details</a> </li>
                        <li class="nav-item"> <a class="nav-link @if(Session::has('shipping')) active @endif" data-toggle="tab" href="#shipping" role="tab">Shipping Details</a> </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane @if(!(Session::has('bank-setting') || Session::has('business-setting') ||  Session::has('shipping'))) active @endif" id="credential" role="tabpanel">
                            <div class="card-body">
                                @if(Session::has('error'))
                                    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
                                @endif
                                @if(Session::has('success'))
                                    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
                                @endif
                                <form class="form-horizontal form-material" method="post" action="{{url('brand/update/account-credential')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" value="{{Auth::user()->email}}" class="form-control form-control-line" name="email">
                                            @error('email')
                                            <label class="text text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Old Password</label>
                                        <div class="col-md-12">
                                            <input type="password" name="password" class="form-control form-control-line">
                                            @error('password')
                                            <label class="text text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">New Password</label>
                                        <div class="col-md-12">
                                            <input type="password" name="new_password" class="form-control form-control-line">
                                            @error('new_password')
                                            <label class="text text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane @if(Session::has('bank-setting')) active @endif" id="bank-setting" role="tabpanel">
                            <div class="card-body">
                                @if(Session::has('error'))
                                    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
                                @endif
                                @if(Session::has('success'))
                                    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
                                @endif
                                <form class="form-horizontal form-material" method="post" action="{{url('brand/update/bank-detail')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-12">Bank Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="bank_name" value="@if(Auth::user()->bankDetails){{Auth::user()->bankDetails->bank_name}}@endif" class="form-control form-control-line">
                                            @error('bank_name')
                                            <label class="text text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Account Number</label>
                                        <div class="col-md-12">
                                            <input type="number" name="account_number" class="form-control form-control-line" value="@if(Auth::user()->bankDetails){{Auth::user()->bankDetails->account_number}}@endif">
                                            @error('account_number')
                                            <label class="text text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane @if(Session::has('business-setting')) active @endif" id="business-setting" role="tabpanel">
                            <div class="card-body">
                                @if(Session::has('error'))
                                    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
                                @endif
                                @if(Session::has('success'))
                                    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
                                @endif
                                <form class="form-horizontal form-material" method="post" action="{{url('brand/update/business-detail')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-12">Brand Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="brand_name" value="@if(Auth::user()->businessDetails){{Auth::user()->businessDetails->brand_name}}@endif" class="form-control form-control-line">
                                            @error('brand_name')
                                            <label class="text text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Company Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="company_name" value="@if(Auth::user()->businessDetails){{Auth::user()->businessDetails->company_name}}@endif" class="form-control form-control-line">
                                            @error('company_name')
                                            <label class="text text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">City</label>
                                        <div class="col-md-12">
                                            <input type="text" name="city" value="@if(Auth::user()->businessDetails){{Auth::user()->businessDetails->city}}@endif" class="form-control form-control-line">
                                            @error('city')
                                            <label class="text text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">State</label>
                                        <div class="col-md-12">
                                            <input type="text" name="state" value="@if(Auth::user()->businessDetails){{Auth::user()->businessDetails->state}}@endif" class="form-control form-control-line">
                                            @error('state')
                                            <label class="text text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Zip</label>
                                        <div class="col-md-12">
                                            <input type="number" name="zip" value="@if(Auth::user()->businessDetails){{Auth::user()->businessDetails->zip}}@endif" class="form-control form-control-line">
                                            @error('zip')
                                            <label class="text text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">Select Country</label>
                                        <div class="col-sm-12">
                                            <select name="country" class="form-control form-control-line">
                                                <option @if(Auth::user()->businessDetails && Auth::user()->businessDetails->country == '1')selected @endif value="1">London</option>
                                                <option @if(Auth::user()->businessDetails && Auth::user()->businessDetails->country == '2')selected @endif value="2">India</option>
                                                <option @if(Auth::user()->businessDetails && Auth::user()->businessDetails->country == '3')selected @endif value="3">Usa</option>
                                                <option @if(Auth::user()->businessDetails && Auth::user()->businessDetails->country == '4')selected @endif value="4">Canada</option>
                                                <option @if(Auth::user()->businessDetails && Auth::user()->businessDetails->country == '5')selected @endif value="5">Thailand</option>
                                            </select>
                                            @error('country')
                                            <label class="text text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Phone</label>
                                        <div class="col-md-12">
                                            <input type="number" name="phone" value="@if(Auth::user()->businessDetails){{Auth::user()->businessDetails->phone}}@endif" class="form-control form-control-line">
                                            @error('phone')
                                            <label class="text text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Fax</label>
                                        <div class="col-md-12">
                                            <input type="text" name="fax" value="@if(Auth::user()->businessDetails){{Auth::user()->businessDetails->fax}}@endif" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane @if(Session::has('shipping')) active @endif" id="shipping" role="tabpanel">
                            <div class="card-body">
                                @if(Session::has('error'))
                                    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
                                @endif
                                @if(Session::has('success'))
                                    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
                                @endif
                                <form class="form-horizontal form-material" method="post" action="{{url('brand/update/shipping-detail')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="">Default Shipping Rate</label>
                                        <div class="">
                                            <input type="text" name="rate" value="@if(Auth::user()->shippingDetails){{Auth::user()->shippingDetails->rate}}@endif" class="form-control form-control-line">
                                            @error('rate')
                                            <label class="text text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="">Processing & Shipping Time</label>
                                        <input type="text" name="time" value="@if(Auth::user()->shippingDetails){{Auth::user()->shippingDetails->time}}@endif" class="form-control form-control-line">
                                        @error('time')
                                        <label class="text text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="">Processing & Shipping Time Unit</label>
                                        <select class="form-control" name="unit">
                                            <option @if(Auth::user()->shippingDetails && Auth::user()->shippingDetails->unit == '1')selected @endif value="1">Days</option>
                                            <option @if(Auth::user()->shippingDetails && Auth::user()->shippingDetails->unit == '2')selected @endif value="2">Hours</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>

        <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->
@endsection