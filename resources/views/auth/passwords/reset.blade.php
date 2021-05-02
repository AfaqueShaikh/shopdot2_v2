<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopDot - Forgot Password</title>
    <link rel="icon"
          href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🚀</text></svg>">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">

    <link media="all" rel="stylesheet" href="{{url('public/front/css/vendor.min.css')}}">
    <link media="all" rel="stylesheet" href="{{url('public/front/css/styles.min.css')}}">
</head>

<body class="sign-page">
<div class="wrapper">
    <header class="header">

        <div class="container header-container">
            <div class="text-center">
                <h1>{{ __('Reset Password') }}</h1>
            </div>
        </div>

        <div class="header__logo">
            <picture><a href="{{url('/')}}"><img src="{{url('public/front/images/logos/logo-main.png')}}"
                                                 alt="Shop Dot"></a></picture>
        </div>

    </header>

    <main class="content">
        <section class="section sign sign-@@cls">
            <div class="container">
                <div class="sign__content">
                    <div class="info-window">
                        <div class="info-window__text">
                            <p>You can now create a new password.</p>
                        </div>
                        <div class="info-window__icon">
                            <svg class="icon">
                                <use xlink:href="images/sprite.svg#icon-lock"></use>
                            </svg>
                        </div>
                    </div>

                    <form action="{{ route('password.update') }}" method="POST" class="sign__form form">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form__field form__field--floating-label">
                            <input value="{{ $email ?? old('email') }}" type="email" name="email" id="email"
                                   placeholder="Email address" readonly>
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form__field form__field--floating-label">
                            <input class="password" type="password" name="password" id="password" placeholder="Create password" required>
                            <label for="password-new">{{ __('Password') }}</label>
                            <!--for show password-message add class 'show'-->
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <span class="password-show"></span>
                        </div>
                        <div class="form__field form__field--floating-label">
                            <input class="password" type="password" name="password_confirmation" id="password-confirm" placeholder="Create password" required>
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <!--for show password-message add class 'show'-->
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <span class="password-show"></span>
                        </div>
                        <div class="form__field buttons">
                            <!--disabled by default, remove it when do validation-->
                            <button type="submit" class="button">{{ __('Reset Password') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </main>
    <footer class="footer"></footer>
</div>

<script src="{{url('public/front/js/vendor.min.js')}}" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/MorphSVGPlugin.min.js?r=182"></script>
<script src="{{url('public/front/js/app.min.js')}}" defer></script>

</body>

</html>
