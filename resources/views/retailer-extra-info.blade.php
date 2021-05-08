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






            </div>
        </section>
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
        @php

            $interact_with_customer = [];
            if(isset($info->interact_with_customer))
            {
                $interact_with_customer = explode(', ',$info->interact_with_customer);
            }

            $find_new_brand = [];
            if(isset($info->find_new_brand))
            {
                $find_new_brand = explode(', ',$info->find_new_brand);
            }


        @endphp

        <section class="section primary primary-info">
            <div class="container primary-container">
                <div class="primary__content">


                    <form id="retailer-extra-info-form" method="post" action="{{url('/retailer/extra/info')}}" class="primary__form form">
                        @csrf
                        <div class="form__field">
                            <div class="form-label">How do you interact with your customers? (Check all that apply)</div>
                            <!--style: --i: n; => grid-size -->
                            <div class="checkboxes checkboxes--bordered" style="--i: 2">
                                <div class="checkbox">
                                    <label for="interact-1">
                                        <input class="interaction" value="Face-to-face" type="checkbox" name="interact_with_customer[]" id="interact-1" @if(count($interact_with_customer) > 0 && in_array('Face-to-face',$interact_with_customer)) checked @endif>
                                        <span class="checkbox-text">Face-to-face (i.e. in store or pop-up events)</span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="interact-2">
                                        <input class="interaction" value="Email" type="checkbox" name="interact_with_customer[]" id="interact-2" @if(count($interact_with_customer) > 0 && in_array('Email',$interact_with_customer)) checked @endif>
                                        <span class="checkbox-text">Email</span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="interact-3">
                                        <input class="interaction" value="Facebook" type="checkbox" name="interact_with_customer[]" id="interact-3" @if(count($interact_with_customer) > 0 && in_array('Facebook',$interact_with_customer)) checked @endif>
                                        <span class="checkbox-text">Facebook</span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="interact-4">
                                        <input class="interaction" value="Instagram" type="checkbox" name="interact_with_customer[]" id="interact-4" @if(count($interact_with_customer) > 0 && in_array('Instagram',$interact_with_customer)) checked @endif>
                                        <span class="checkbox-text">Instagram</span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="interact-5">
                                        <input class="interaction" value="Twitter" type="checkbox" name="interact_with_customer" id="interact-5" @if(count($interact_with_customer) > 0 && in_array('Twitter',$interact_with_customer)) checked @endif>
                                        <span class="checkbox-text">Twitter</span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="interact-6">
                                        <input class="interaction" value="Other" type="checkbox" name="interact_with_customer[]" id="interact-6" @if(count($interact_with_customer) > 0 && in_array('Other',$interact_with_customer)) checked @endif>
                                        <span class="checkbox-text">Other</span>
                                    </label>
                                </div>
                            </div>
                            <label for="interact_with_customer[]" class="error"></label>
                        </div>
                        <div class="form__field">
                            <div class="form-label">How do you find new brands? (Check all that apply)</div>
                            <!--style: --i: n; => grid-size -->
                            <div class="checkboxes checkboxes--bordered" style="--i: 3">
                                <div class="checkbox">
                                    <label for="find-1">
                                        <input class="find_brands" type="checkbox" value="Trade show" name="find_new_brand[]" id="find-1" @if(count($find_new_brand) > 0 && in_array('Trade show',$find_new_brand)) checked @endif>
                                        <span class="checkbox-text">Trade show</span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="find-2">
                                        <input class="find_brands" type="checkbox" value="Social media" name="find_new_brand[]" id="find-2" @if(count($find_new_brand) > 0 && in_array('Social media',$find_new_brand)) checked @endif>
                                        <span class="checkbox-text">Social media</span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="find-3">
                                        <input class="find_brands" type="checkbox" value="Online" name="find_new_brand[]" id="find-3" @if(count($find_new_brand) > 0 && in_array('Online',$find_new_brand)) checked @endif>
                                        <span class="checkbox-text">Online</span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="find-4">
                                        <input class="find_brands" type="checkbox" value="Word-of-mouth" name="find_new_brand[]" id="find-4" @if(count($find_new_brand) > 0 && in_array('Word-of-mouth',$find_new_brand)) checked @endif>
                                        <span class="checkbox-text">Word-of-mouth</span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="find-5">
                                        <input class="find_brands" type="checkbox" value="Sales Reps" name="find_new_brand[]" id="find-5" @if(count($find_new_brand) > 0 && in_array('Sales Reps',$find_new_brand)) checked @endif>
                                        <span class="checkbox-text">Sales Reps</span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="find-6">
                                        <input class="find_brands" type="checkbox" value="Other" name="find_new_brand[]" id="find-6" @if(count($find_new_brand) > 0 && in_array('Other',$find_new_brand)) checked @endif>
                                        <span class="checkbox-text">Other</span>
                                    </label>
                                </div>
                            </div>
                            <label for="find_new_brand[]" class="error"></label>
                        </div>
                        <div class="form__field buttons">
                            <button type="submit" class="button" id="extra_info_btn" @if(count($interact_with_customer) === 0 || count($find_new_brand) === 0) disabled @endif>Next</button>
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
    $.validator.setDefaults({
        ignore: [] // DON'T IGNORE PLUGIN HIDDEN SELECTS, CHECKBOXES AND RADIOS!!!
    });
    $( "#retailer-extra-info-form" ).validate({
        rules: {
            "interact_with_customer[]": {
                required: true
            },
            "find_new_brand[]": {
                required: true
            }
        },
        messages: {
            "interact_with_customer[]": {
                required: "Please select atleast one option."
            },
            "find_new_brand[]": {
                required: "Please select atleast one option."
            },
        }
    });

    $('.interaction').click(function () {
        validateData();
    });

    $('.find_brands').click(function () {
        validateData();
    });

    function validateData() {
        if ($(".interaction").is(":checked") && $(".find_brands").is(":checked"))
        {
            $('#extra_info_btn').attr('disabled', false);
        }
        else {
            $('#extra_info_btn').attr('disabled', true);
        }
    }
</script>

</body>

</html>
