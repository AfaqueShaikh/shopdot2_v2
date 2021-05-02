<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopDot - Connect Shop</title>
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
                <h1>Connect Shop</h1>
            </div>
        </div>

        <div class="header__logo">
            <picture><a href="{{url('/retailer/dashboard')}}"><img src="{{url('public/front/images/logos/logo-main.png')}}"
                                                 alt="Shop Dot"></a></picture>
        </div>

    </header>

    <main class="content">
        <section class="section subheader">
            <div class="container subheader-container">

                <div class="steps">
                    <!--To highlight current step add class 'active'-->
                    <!--To highlight done step add class 'done'-->
                    <div class="step ">Info</div>
                    <div class="step ">Category</div>
                    <div class="step ">Values</div>
                    <div class="step active">Connect Shop</div>
                    <div class="step ">Invite Brands</div>
                </div>
            </div>
        </section>

        <section class="section retailer retailer-info">
            <div class="container retailer-container">
                <div class="retailer__content">
                    <div class="text-message text-center">
                        <p>We're almost there. Let's connect ShopDot with your Shopify store. <br>
                            This will allow you to start selling on your website. </p>
                    </div>
                    <form id="retailer_connect_shop_form" action="{{url('/retailer/connect/shop')}}" method="POST" class="retailer__form form">
                        @csrf
                        <div class="form__field form__field--floating-label">
                            <input type="text" name="shopify_url" id="shopify_url" placeholder="Your Shopify shop URL">
                            <label for="shopify_url">Your Shopify shop URL</label>
                        </div>
                        <label for="shopify_url" class="error"></label>
                        <div class="form__field buttons">
                            <button type="submit" class="button">Connect</button>
                        </div>
                        <div class="form__field helpers">
                            <div class="later">
                                <a href="javascript:void(0);">Connect your shop later</a>
                            </div>
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

<script src="{{url('public/front/js/jquery.min.js')}}"></script>
<script src="{{url('public/front/js/jquery.validate.min.js')}}"></script>
<script>
    $( "#retailer_connect_shop_form" ).validate({
        rules: {
            shopify_url: {
                required: true
            },
        },
        messages: {
            shopify_url: {
                required: "Please enter shopify url."
            }
        }
    });
</script>

</body>

</html>
