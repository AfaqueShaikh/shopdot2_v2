<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopDot - Info</title>
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
                <h1>Info</h1>
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
                    <div class="step active process">Info</div>
                    <div class="step ">Category</div>
                    <div class="step ">Values</div>
                    <div class="step ">Connect Shop</div>
                    <div class="step ">Invite Brands</div>
                </div>
            </div>
        </section>

        <section class="section primary primary-info">
            <div class="container primary-container">
                <div class="primary__content">

                    <div id="error-div" style="display: none;">
                        <div class="info-window">
                            <div class="info-window__text">
                                <p>We currently only support Shopify. Our support team will be in touch with you shortly to learn more about
                                    your integration needs.</p>
                            </div>
                            <div class="info-window__icon">
                                <svg class="icon yellow">
                                    <use xlink:href="images/sprite.svg#icon-traffic-sign"></use>
                                </svg>
                            </div>
                        </div>
                        <div class="retailer__text">
                            <a href="{{url('/retailer/info')}}" class="button button-primary">Back to ShopDotApp.com</a>
                        </div>
                    </div>

                    <div id="form-div">
                        <div class="text-message text-center">
                            <p>Hi {{Auth::user()->first_name.' '.Auth::user()->last_name}}, welcome aboard. Can you tell us more about you and your business? </p>
                        </div>
                        <form method="POST" action="{{url('/retailer/info')}}" id="retailer-info-form" class="primary__form form">
                            @csrf
                            <div class="form__field form__field--floating-label">
                                <input type="text" name="business_name" id="business_name" placeholder="Business name" @if(isset($info)) value="{{$info->business_name}}" @endif required>
                                <label for="business_name">Business name</label>
                            </div>
                            <label for="business_name" class="error"></label>
                            <div class="form__field form__field--floating-label">
                                <input type="text" name="website_address" id="website_address" placeholder="Website address" @if(isset($info)) value="{{$info->website_address}}" @endif required>
                                <label for="website_address">Website address</label>
                            </div>
                            <label for="website_address" class="error"></label>
                            <br><br>
                            <div class="form__field">
                                <div class="form-label">What eCommmerce hosting platform do you use?</div>
                                <!--style: --i: n; => grid-size -->
                                <div class="radios radios--bordered" style="--i: 3">
                                    <div class="radio">
                                        <label for="platform-shopify">
                                            <input value="Shopify" type="radio" name="platform" class="platform" id="platform-shopify" checked >
                                            <span class="radio-text">Shopify</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label for="platform-woocommerce">
                                            <input value="WooCommerce" type="radio" name="platform" class="platform" id="platform-woocommerce">
                                            <span class="radio-text">WooCommerce</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label for="platform-bigcommerce">
                                            <input value="BigCommerce" type="radio" name="platform" class="platform" id="platform-bigcommerce">
                                            <span class="radio-text">BigCommerce</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label for="platform-magento">
                                            <input value="Magento" type="radio" name="platform" class="platform" id="platform-magento">
                                            <span class="radio-text">Magento</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label for="platform-wix">
                                            <input value="Wix" type="radio" name="platform" class="platform" id="platform-wix" >
                                            <span class="radio-text">Wix</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label for="platform-other">
                                            <input value="Other" type="radio" name="platform" class="platform" id="platform-other" >
                                            <span class="radio-text">Other</span>
                                        </label>
                                    </div>
                                </div>
                                {{--<label for="platform" class="error">Please select eCommmerce hosting platform.</label>--}}
                            </div>
                            <div class="form__field buttons">
                                <button type="submit" class="button" id="info_next_btn" @if(!isset($info)) disabled @endif>Next</button>
                            </div>
                        </form>
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

<script src="{{url('public/front/js/jquery.min.js')}}"></script>
<script src="{{url('public/front/js/jquery.validate.min.js')}}"></script>
<script>
    var business_name_char_count = 0;
    var website_address_char_count = 0;
    $( "#retailer-info-form" ).validate({
        rules: {
            business_name: {
                required: true
            },
            website_address: {
                required: true
            },
            platform: {
                required: true
            }
        },
        messages: {
            business_name: {
                required: "Please enter business name."
            },
            website_address: {
                required: "Please enter website address."
            },
            platform: {
                required: "Please select eCommmerce hosting platform."
            }
        }
    });

    $(".platform").click(function(){
        var radioValue = $("input[name='platform']:checked").val();
        if(radioValue !== "Shopify"){
            $('#form-div').hide();
            $('#error-div').show();
        }
    });

    $('#business_name').keyup(function (event) {
        business_name_char_count = $(this).val().length;
        validateData();
    });

    $('#website_address').keyup(function (event) {
        website_address_char_count = $(this).val().length;
        validateData();
    });


    function validateData()
    {
        if(business_name_char_count > 0 && website_address_char_count > 0)
        {
            $('#info_next_btn').attr('disabled',false);
        }
        else
        {
            $('#info_next_btn').attr('disabled',true);
        }
    }


</script>

</body>

</html>
