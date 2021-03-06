<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopDot - Category</title>
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
                <h1>Category</h1>
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
                    @php
                        $exploded_data = explode(',',$info->interact_with_customer);
                    @endphp
                    <div class="info-bar__text">
                        <p>{{$exploded_data[0]}}, +{{count($exploded_data) - 1}}</p>
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
                    <div class="step active process">Category</div>
                    <div class="step ">Values</div>
                    <div class="step ">Connect Shop</div>
                    <div class="step ">Invite Brands</div>
                </div>
            </div>
        </section>

        <section class="section primary primary-info">
            <div class="container primary-container">
                <div class="primary__content">
                    <div class="text-message text-center">
                        <p>Please pick the best category for your shop.</p>
                    </div>
                    <form action="{{url('/retailer/category')}}" method="POST" id="retailer-category-form" class="primary__form primary__form--wide no-bg form">
                        @csrf
                        <div class="form__categories categories">
                            <div class="category">
                                <input class="category_selection" type="radio" value="Apparel Boutique" name="category" id="category-1" @if(isset($info->category) && $info->category == "Apparel Boutique") checked @endif>
                                <label for="category-1">
                                  <span class="category__icon">
                                    <svg class="icon">
                                      <use xlink:href="images/sprite.svg#category-apparel-boutique"></use>
                                    </svg>
                                  </span>
                                    <span class="category__text">
                                        Apparel Boutique
                                    </span>
                                </label>
                            </div>

                            <div class="category">
                                <input class="category_selection" type="radio" value="Book Store" name="category" id="category-2" @if(isset($info->category) && $info->category == "Book Store") checked @endif>
                                <label for="category-2">
                  <span class="category__icon">
                    <svg class="icon">
                      <use xlink:href="images/sprite.svg#category-book-store"></use>
                    </svg>
                  </span>
                                    <span class="category__text">
                    Book Store
                  </span>
                                </label>
                            </div>

                            <div class="category">
                                <input class="category_selection" type="radio" value="Bakery or Coffee Shop" name="category" id="category-3" @if(isset($info->category) && $info->category == "Bakery or Coffee Shop") checked @endif>
                                <label for="category-3">
                  <span class="category__icon">
                    <svg class="icon">
                      <use xlink:href="images/sprite.svg#category-bakery-or-cofee-shop"></use>
                    </svg>
                  </span>
                                    <span class="category__text">
                    Bakery or Coffee Shop
                  </span>
                                </label>
                            </div>

                            <div class="category">
                                <input class="category_selection" type="radio" value="Electronics" name="category" id="category-4"  @if(isset($info->category) && $info->category == "Electronics") checked @endif>
                                <label for="category-4">
                  <span class="category__icon">
                    <svg class="icon">
                      <use xlink:href="images/sprite.svg#category-electronics"></use>
                    </svg>
                  </span>
                                    <span class="category__text">
                    Electronics
                  </span>
                                </label>
                            </div>

                            <div class="category">
                                <input class="category_selection" type="radio" value="Fitness or Yoga Studio" name="category" id="category-5"  @if(isset($info->category) && $info->category == "Fitness or Yoga Studio") checked @endif>
                                <label for="category-5">
                  <span class="category__icon">
                    <svg class="icon">
                      <use xlink:href="images/sprite.svg#category-fintess-or-yoga-studio"></use>
                    </svg>
                  </span>
                                    <span class="category__text">
                    Fitness or Yoga Studio
                  </span>
                                </label>
                            </div>

                            <div class="category">
                                <input class="category_selection" type="radio" value="Florist or Garden Store" name="category" id="category-6"  @if(isset($info->category) && $info->category == "Florist or Garden Store") checked @endif>
                                <label for="category-6">
                  <span class="category__icon">
                    <svg class="icon">
                      <use xlink:href="images/sprite.svg#category-florist-or-garden-store"></use>
                    </svg>
                  </span>
                                    <span class="category__text">
                    Florist or Garden Store
                  </span>
                                </label>
                            </div>

                            <div class="category">
                                <input class="category_selection" type="radio" value="Footwear" name="category" id="category-7"  @if(isset($info->category) && $info->category == "Footwear") checked @endif>
                                <label for="category-7">
                  <span class="category__icon">
                    <svg class="icon">
                      <use xlink:href="images/sprite.svg#category-footwear"></use>
                    </svg>
                  </span>
                                    <span class="category__text">
                    Footwear
                  </span>
                                </label>
                            </div>

                            <div class="category">
                                <input class="category_selection" type="radio" value="Furniture Store" name="category" id="category-8"  @if(isset($info->category) && $info->category == "Furniture Store") checked @endif>
                                <label for="category-8">
                  <span class="category__icon">
                    <svg class="icon">
                      <use xlink:href="images/sprite.svg#category-furniture-store"></use>
                    </svg>
                  </span>
                                    <span class="category__text">
                    Furniture Store
                  </span>
                                </label>
                            </div>

                            <div class="category">
                                <input class="category_selection" type="radio" value="Gift Store" name="category" id="category-9"  @if(isset($info->category) && $info->category == "Gift Store") checked @endif>
                                <label for="category-9">
                  <span class="category__icon">
                    <svg class="icon">
                      <use xlink:href="images/sprite.svg#category-gift-store"></use>
                    </svg>
                  </span>
                                    <span class="category__text">
                    Gift Store
                  </span>
                                </label>
                            </div>

                            <div class="category">
                                <input  class="category_selection" type="radio" value="Kids or Toy Store" name="category" id="category-10"  @if(isset($info->category) && $info->category == "Kids or Toy Store") checked @endif>
                                <label for="category-10">
                  <span class="category__icon">
                    <svg class="icon">
                      <use xlink:href="images/sprite.svg#category-kids-or-toy-store"></use>
                    </svg>
                  </span>
                                    <span class="category__text">
                    Kids or Toy Store
                  </span>
                                </label>
                            </div>

                            <div class="category">
                                <input class="category_selection" type="radio" value="Medical Office" name="category" id="category-11"  @if(isset($info->category) && $info->category == "Medical Office") checked @endif>
                                <label for="category-11">
                  <span class="category__icon">
                    <svg class="icon">
                      <use xlink:href="images/sprite.svg#category-medical-office"></use>
                    </svg>
                  </span>
                                    <span class="category__text">
                    Medical Office
                  </span>
                                </label>
                            </div>

                            <div class="category">
                                <input class="category_selection" type="radio" value="Musical Instruments" name="category" id="category-12"  @if(isset($info->category) && $info->category == "Musical Instruments") checked @endif>
                                <label for="category-12">
                  <span class="category__icon">
                    <svg class="icon">
                      <use xlink:href="images/sprite.svg#category-musical-instruments"></use>
                    </svg>
                  </span>
                                    <span class="category__text">
                    Musical Instruments
                  </span>
                                </label>
                            </div>

                            <div class="category">
                                <input class="category_selection" type="radio" value="Pet Store" name="category" id="category-13"  @if(isset($info->category) && $info->category == "Pet Store") checked @endif>
                                <label for="category-13">
                  <span class="category__icon">
                    <svg class="icon">
                      <use xlink:href="images/sprite.svg#category-pet-store"></use>
                    </svg>
                  </span>
                                    <span class="category__text">
                    Pet Store
                  </span>
                                </label>
                            </div>

                            <div class="category">
                                <input class="category_selection" type="radio" value="Pharmacy" name="category" id="category-14"  @if(isset($info->category) && $info->category == "Pharmacy") checked @endif>
                                <label for="category-14">
                  <span class="category__icon">
                    <svg class="icon">
                      <use xlink:href="images/sprite.svg#category-pharmacy"></use>
                    </svg>
                  </span>
                                    <span class="category__text">
                    Pharmacy
                  </span>
                                </label>
                            </div>

                            <div class="category">
                                <input class="category_selection" type="radio" value="Spa or Salon" name="category" id="category-15"  @if(isset($info->category) && $info->category == "Spa or Salon") checked @endif>
                                <label for="category-15">
                  <span class="category__icon">
                    <svg class="icon">
                      <use xlink:href="images/sprite.svg#category-spa-or-salon"></use>
                    </svg>
                  </span>
                                    <span class="category__text">
                    Spa or Salon
                  </span>
                                </label>
                            </div>

                            <div class="category">
                                <input class="category_selection" type="radio" value="Sporting and Outdoor" name="category" id="category-16"  @if(isset($info->category) && $info->category == "porting and Outdoor") checked @endif>
                                <label for="category-16">
                  <span class="category__icon">
                    <svg class="icon">
                      <use xlink:href="images/sprite.svg#category-sporting-and-outdoor"></use>
                    </svg>
                  </span>
                                    <span class="category__text">
                    Sporting and Outdoor
                  </span>
                                </label>
                            </div>

                            <div class="category">
                                <input class="category_selection" type="radio" value="Stationeries Store" name="category" id="category-17"  @if(isset($info->category) && $info->category == "Stationeries Store") checked @endif>
                                <label for="category-17">
                  <span class="category__icon">
                    <svg class="icon">
                      <use xlink:href="images/sprite.svg#category-stationeries-store"></use>
                    </svg>
                  </span>
                                    <span class="category__text">
                    Stationeries Store
                  </span>
                                </label>
                            </div>

                            <div class="category">
                                <input class="category_selection" type="radio" value="Other" name="category" id="category-18"  @if(isset($info->category) && $info->category == "Other") checked @endif>
                                <label for="category-18">
                  <span class="category__icon">
                    <svg class="icon">
                      <use xlink:href="images/sprite.svg#category-other"></use>
                    </svg>
                  </span>
                                    <span class="category__text">
                    Other
                  </span>
                                </label>
                            </div>
                        </div>
                        <label for="category" class="error"></label>
                        <div class="form__field buttons">
                            <button type="submit" id="category_select_btn" class="button" @if(!isset($info->category)) disabled @endif>Next</button>
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
    $("#retailer-category-form").validate({
        rules: {
            "category": {
                required: true
            },
        },
        messages: {
            "category": {
                required: "Please select category."
            },
        }
    });

    $('.category_selection').click(function () {
        validateData();
    });

    function validateData() {
        if ($(".category_selection").is(":checked"))
        {
            $('#category_select_btn').attr('disabled', false);
        }
        else {
            $('#category_select_btn').attr('disabled', true);
        }
    }
</script>

</body>

</html>
