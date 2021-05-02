<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('/public')}}/images/favicon.png">
    <title>Shopdot</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{url('/public')}}/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{url('/public')}}/css/helper.css" rel="stylesheet">
    <link href="{{url('/public')}}/css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .password i {
            margin-left: -30px;
            cursor: pointer;
        }
    </style>
</head>

<body class="fix-header fix-sidebar">
<!-- Preloader - style you can find in spinners.css -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
</div>
<!-- Main wrapper  -->
<div id="main-wrapper">
    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="login-content card">
                        <div class="login-form">
                            <h4>Register</h4>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <input type="hidden" name="user_type" value="3">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name">
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name">
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    <a href="javascript:void(0)" onclick="showPassword()" class="pull-right" id="password-icon">Show Password</a>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" onchange="checkPolicy()" name="agree_term" id="agree_term" required value="1"> by signing up for ShopDot, you are agreeing to our <a href="void:javascript(0)" data-toggle="modal" data-target="#policyModal" style="color: blue">Terms and Privacy Policy</a>
                                        @error('agree_term')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </label>
                                </div>
                                <button id="register" disabled type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                                <div class="register-link m-t-15 text-center">
                                    <p>Are you a Content Creator and interested in using Shopdot? <a href="{{url('/login')}}"> Sign up here</a> Interested in selling on Shopdot? <a href="javascript:void(0)"> Sign up</a> as a brand</p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="policyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Terms And Policy</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="height: 200px; overflow-y: scroll">
                {{$policy->content}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End Wrapper -->
<!-- All Jquery -->
<script src="{{url('/public')}}/js/lib/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{url('/public')}}/js/lib/bootstrap/js/popper.min.js"></script>
<script src="{{url('/public')}}/js/lib/bootstrap/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{url('/public')}}/js/jquery.slimscroll.js"></script>
<!--Menu sidebar -->
<script src="{{url('/public')}}/js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="{{url('/public')}}/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
<!--Custom JavaScript -->
<script src="{{url('/public')}}/js/custom.min.js"></script>
<script>
    function checkPolicy() {
        if($('#agree_term').prop('checked')){
            $('#register').prop('disabled',false);
        } else {
            $('#register').prop('disabled',true);
        }
    }
    function showPassword() {
        if($('#password').prop('type')=='password'){
            $('#password').attr('type','text');
            $('#password-icon').html('Hide Password');
        } else {
            $('#password').attr('type','password');
            $('#password-icon').html('Show Password');
        }
    }
</script>
</body>
</html>
