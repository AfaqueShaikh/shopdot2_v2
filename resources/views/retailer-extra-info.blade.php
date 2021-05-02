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

<body class="sign-page">
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
                    <div class="step active">Info</div>
                    <div class="step ">Category</div>
                    <div class="step ">Values</div>
                    <div class="step ">Connect Shop</div>
                    <div class="step ">Invite Brands</div>
                </div>
            </div>
        </section>

        <section class="section retailer retailer-info">
            <div class="container retailer-container">
                <div class="retailer__content">


                    <form id="retailer-extra-info-form" method="post" action="{{url('/retailer/extra/info')}}" class="retailer__form form">
                        @csrf
                        <div class="form__field">
                            <div class="form-label">How do you interact with your customers? (Check all that apply)</div>
                            <!--style: --i: n; => grid-size -->
                            <div class="checkboxes checkboxes--bordered" style="--i: 2">
                                <div class="checkbox">
                                    <label for="interact-1">
                                        <input value="Face-to-face" type="checkbox" name="interact_with_customer[]" id="interact-1">
                                        <span class="checkbox-text">Face-to-face (i.e. in store or pop-up events)</span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="interact-2">
                                        <input value="Email" type="checkbox" name="interact_with_customer[]" id="interact-2">
                                        <span class="checkbox-text">Email</span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="interact-3">
                                        <input value="Facebook" type="checkbox" name="interact_with_customer[]" id="interact-3">
                                        <span class="checkbox-text">Facebook</span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="interact-4">
                                        <input value="Instagram" type="checkbox" name="interact_with_customer[]" id="interact-4">
                                        <span class="checkbox-text">Instagram</span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="interact-5">
                                        <input value="Twitter" type="checkbox" name="interact_with_customer" id="interact-5">
                                        <span class="checkbox-text">Twitter</span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="interact-6">
                                        <input value="Other" type="checkbox" name="interact_with_customer[]" id="interact-6">
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
                                        <input type="checkbox" value="Trade show" name="find_new_brand[]" id="find-1">
                                        <span class="checkbox-text">Trade show</span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="find-2">
                                        <input type="checkbox" value="Social media" name="find_new_brand[]" id="find-2">
                                        <span class="checkbox-text">Social media</span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="find-3">
                                        <input type="checkbox" value="Online" name="find_new_brand[]" id="find-3">
                                        <span class="checkbox-text">Online</span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="find-4">
                                        <input type="checkbox" value="Word-of-mouth" name="find_new_brand[]" id="find-4">
                                        <span class="checkbox-text">Word-of-mouth</span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="find-5">
                                        <input type="checkbox" value="Sales Reps" name="find_new_brand[]" id="find-5">
                                        <span class="checkbox-text">Sales Reps</span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="find-6">
                                        <input type="checkbox" value="Other" name="find_new_brand[]" id="find-6">
                                        <span class="checkbox-text">Other</span>
                                    </label>
                                </div>
                            </div>
                            <label for="find_new_brand[]" class="error"></label>
                        </div>
                        <div class="form__field buttons">
                            <button type="submit" class="button" >Next</button>
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
</script>

</body>

</html>
