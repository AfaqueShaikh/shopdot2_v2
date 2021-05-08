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

<body class="retailer-page">
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
        <section class="section info-bar">
            <div class="container info-bar-container">
                <!--For store type we have 5 icons from design file-->
                <!--1. store-type-brik-and-mortar-->
                <!--2. store-type-marketplace-->
                <!--3. store-type-online-only-->
                <!--4. store-type-other-store-->
                <!--5. store-type-popup-->


                <div class="info-bar__item business-name">
                    <div class="info-bar__icon">
                        <svg class="icon">
                            <use xlink:href="images/sprite.svg#store-type-brik-and-mortar"></use>
                        </svg>
                    </div>
                    <div class="info-bar__text">
                        <p>{{$info->business_name}}</p>
                    </div>
                </div>


                <div class="info-bar__item interactions">
                    <div class="info-bar__text">
                        <p>{{$socials['facebook']}}, +{{count($socials) - 1}}</p>
                    </div>
                </div>


                <div class="info-bar__item category-name">
                    @php
                        $exploded_values = explode(',',$info->values);
                    @endphp
                    <div class="info-bar__icon">
                        <svg class="icon">
                            <use xlink:href="images/sprite.svg#icon-thump--up"></use>
                        </svg>
                    </div>
                    <div class="info-bar__text">
                        <p>{{$exploded_values[0]}}, +{{count($exploded_values) - 1}}</p>
                    </div>
                </div>


            </div>
        </section>
        <section class="section subheader">
            <div class="container subheader-container">

                <div class="steps">
                    <!--To highlight current step add class 'active'-->
                    <!--To highlight done step add class 'done'-->
                    <div class="step done">Info</div>
                    <div class="step done">Content type</div>
                    <div class="step done">Values</div>
                    <div class="step active process">Connect Shop</div>
                    <div class="step ">Invite Brands</div>
                </div>
            </div>
        </section>

        <section class="section primary primary-info">
            <div class="container primary-container">
                <div class="primary__content">
                    <div class="text-message text-center">
                        <p>We're almost there. Let's connect ShopDot with your Shopify store. <br>
                            This will allow you to start selling on your website. </p>
                    </div>
                    <form id="content_creator_connect_shop_form" action="{{url('/content-creator/connect/shop')}}" method="POST" class="primary__form form">
                        @csrf
                        <div class="form__field form__field--floating-label">
                            <input type="text" name="shopify_url" id="shopify_url" placeholder="Your Shopify shop URL" value="{{$info->website_address}}">
                            <label for="shopify_url">Your Shopify shop URL</label>
                        </div>
                        <label for="shopify_url" class="error"></label>
                        <div class="form__field buttons">
                            <button type="submit" class="button" id="connect_shop_btn">Connect</button>
                        </div>
                        <div class="form__field helpers">
                            <div class="later">
                                <a href="{{url('/content-creator/invite/brands')}}">Connect your shop later</a>
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
    $( "#content_creator_connect_shop_form" ).validate({
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

    $('#shopify_url').keyup(function () {
        if($(this).val().length === 0)
        {
            $('#connect_shop_btn').attr('disabled',true);
        }
        else
        {
            $('#connect_shop_btn').attr('disabled',false);
        }
    })
</script>

</body>

</html>
