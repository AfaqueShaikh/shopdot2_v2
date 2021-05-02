<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopDot - Values</title>
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
                <h1>Values</h1>
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
                    <div class="step">Info</div>
                    <div class="step">Category</div>
                    <div class="step active">Values</div>
                    <div class="step ">Connect Shop</div>
                    <div class="step ">Invite Brands</div>
                </div>
            </div>
        </section>

        <section class="section retailer retailer-info">
            <div class="container retailer-container">
                <div class="retailer__content">
                    <div class="text-message text-center">
                        <p>Please select the values that are most important to you and your customers.</p>
                    </div>
                    <form id="retailer-values-form" action="{{url('/retailer/values')}}" method="POST" class="retailer__form retailer__form--wide no-bg form">
                        @csrf
                        <div class="form__values values">
                            <div class="value">
                                <input type="checkbox" value="BIPOC Owned" name="value[]" id="value-1">
                                <label for="value-1">
                  <span class="value__icon">
                    <svg class="icon">
                      <use xlink:href="images/sprite.svg#value-bipoc-owned"></use>
                    </svg>
                  </span>
                                    <span class="value__text">
                    BIPOC Owned
                  </span>
                                </label>
                            </div>

                            <div class="value">
                                <input type="checkbox" value="Eco-friendly" name="value[]" id="value-2">
                                <label for="value-2">
                  <span class="value__icon">
                    <svg class="icon">
                      <use xlink:href="images/sprite.svg#value-eco-friendly"></use>
                    </svg>
                  </span>
                                    <span class="value__text">
                   Eco-friendly
                  </span>
                                </label>
                            </div>

                            <div class="value">
                                <input type="checkbox" value="Handmade" name="value[]" id="value-3">
                                <label for="value-3">
                  <span class="value__icon">
                    <svg class="icon">
                      <use xlink:href="images/sprite.svg#value-handmade"></use>
                    </svg>
                  </span>
                                    <span class="value__text">
                   Handmade
                  </span>
                                </label>
                            </div>

                            <div class="value">
                                <input type="checkbox" value="Made in Canada" name="value[]" id="value-4">
                                <label for="value-4">
                  <span class="value__icon">
                    <svg class="icon">
                      <use xlink:href="images/sprite.svg#value-made-in-canada"></use>
                    </svg>
                  </span>
                                    <span class="value__text">
                   Made in Canada
                  </span>
                                </label>
                            </div>

                            <div class="value">
                                <input type="checkbox" value="Made in USA" name="value[]" id="value-5">
                                <label for="value-5">
                  <span class="value__icon">
                    <svg class="icon">
                      <use xlink:href="images/sprite.svg#value-made-in-usa"></use>
                    </svg>
                  </span>
                                    <span class="value__text">
                   Made in USA
                  </span>
                                </label>
                            </div>

                            <div class="value">
                                <input type="checkbox" value="Not on Amazon" name="value[]" id="value-6">
                                <label for="value-6">
                  <span class="value__icon">
                    <svg class="icon">
                      <use xlink:href="images/sprite.svg#value-not-on-amazon"></use>
                    </svg>
                  </span>
                                    <span class="value__text">
                   Not on Amazon
                  </span>
                                </label>
                            </div>

                            <div class="value">
                                <input type="checkbox" value="Organic" name="value[]" id="value-7">
                                <label for="value-7">
                  <span class="value__icon">
                    <svg class="icon">
                      <use xlink:href="images/sprite.svg#value-organic"></use>
                    </svg>
                  </span>
                                    <span class="value__text">
                   Organic
                  </span>
                                </label>
                            </div>

                            <div class="value">
                                <input type="checkbox" value="Size Inclusive" name="value[]" id="value-8">
                                <label for="value-8">
                  <span class="value__icon">
                    <svg class="icon">
                      <use xlink:href="images/sprite.svg#value-size-inclusive"></use>
                    </svg>
                  </span>
                                    <span class="value__text">
                   Size Inclusive
                  </span>
                                </label>
                            </div>

                            <div class="value">
                                <input type="checkbox" value="Small Batch" name="value[]" id="value-9">
                                <label for="value-9">
                  <span class="value__icon">
                    <svg class="icon">
                      <use xlink:href="images/sprite.svg#value-small-batch"></use>
                    </svg>
                  </span>
                                    <span class="value__text">
                   Small Batch
                  </span>
                                </label>
                            </div>

                            <div class="value">
                                <input type="checkbox" value="Social Good" name="value[]" id="value-10">
                                <label for="value-10">
                  <span class="value__icon">
                    <svg class="icon">
                      <use xlink:href="images/sprite.svg#value-social-good"></use>
                    </svg>
                  </span>
                                    <span class="value__text">
                   Social Good
                  </span>
                                </label>
                            </div>

                            <div class="value">
                                <input type="checkbox" value="Women Owned" name="value[]" id="value-11">
                                <label for="value-11">
                  <span class="value__icon">
                    <svg class="icon">
                      <use xlink:href="images/sprite.svg#value-woomen-owned"></use>
                    </svg>
                  </span>
                                    <span class="value__text">
                   Women Owned
                  </span>
                                </label>
                            </div>

                            <div class="value">
                                <input type="checkbox" value="Other" name="value[]" id="value-12">
                                <label for="value-12">
                  <span class="value__icon">
                    <svg class="icon">
                      <use xlink:href="images/sprite.svg#value-other"></use>
                    </svg>
                  </span>
                                    <span class="value__text">
                  Other
                  </span>
                                </label>
                            </div>

                        </div>
                        <label for="value[]" class="error"></label>
                        <div class="form__field buttons">
                            <button type="submit" class="button">Next</button>
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
    $("#retailer-values-form").validate({
        rules: {
            "value[]": {
                required: true
            },
        },
        messages: {
            "value[]": {
                required: "Please select atleast one value."
            },
        }
    });
</script>

</body>

</html>
