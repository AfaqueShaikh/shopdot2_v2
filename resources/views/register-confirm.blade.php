<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ShopDot - Registration Verification</title>
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
        <h1>Sign In</h1>
      </div>
    </div>



    <div class="header__logo">
        <picture><a href="{{url('/')}}"><img src="{{url('public/front/images/logos/logo-main.png')}}" alt="Shop Dot"></a></picture>
      </div>
  </header>

  <main class="content">
    <section class="section sign sign-@@cls">
      <div class="container">
        <div class="sign__content">




          <div class="info-window">
            <div class="info-window__text">
              <p>Confirmation link has been sent to your email address. Please follow the link to activate your account. If
                you did not see it, please check your Spam or Trash folder or contact <a
                  href="mailto:support@shopdotapp.com">support@shopdotapp.com</a>.</p>
            </div>
            <div class="info-window__icon">
              <svg class="icon">
                <use xlink:href="images/sprite.svg#icon-email-sent"></use>
              </svg>
            </div>
          </div>









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
