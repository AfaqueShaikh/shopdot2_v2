<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopDot - Content Type</title>
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
                <h1>Content type</h1>
            </div>
        </div>

        <div class="header__logo">
            <picture><a href="{{url('/retailer/dashboard')}}"><img
                            src="{{url('public/front/images/logos/logo-main.png')}}"
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



            </div>
        </section>
        <section class="section subheader">
            <div class="container subheader-container">

                <div class="steps">
                    <!--To highlight current step add class 'active'-->
                    <!--To highlight done step add class 'done'-->
                    <div class="step done">Info</div>
                    <div class="step active process">Content type</div>
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
                        <p>Share some additional information about you and your audience. <br>We will utilize this information to recommend brands for your shop. </p>
                    </div>
                    <form action="{{url('/content-creator/content')}}" method="POST" class="primary__form form">
                        @csrf
                        <div class="form__field form__field--floating-label">
                            <input type="text" name="content_type" id="content_type" placeholder="Content type" @if(isset($info)) value="{{$info->content_type}}" @endif required>
                            <label for="c-type">Content type</label>
                        </div>
                        <div class="form__field form__field--floating-label">
                            <textarea name="about" id="about" rows="4" placeholder="Tell us about you and your community">@if(isset($info)) {{$info->about}} @endif</textarea>
                            <label for="about">Tell us about you and your community</label>
                        </div>
                        <div class="form__field buttons">
                            <button type="submit" class="button" id="content_type_btn" disabled>Next</button>
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
    var content_type_char_count = 0;
    var aboutus_char_count = 0;

    $('#content_type').keyup(function (event) {
        content_type_char_count = $(this).val().length;
        validateData();
    });

    $('#about').keyup(function (event) {
        aboutus_char_count = $(this).val().length;
        validateData();
    });

    function validateData()
    {
        if(content_type_char_count > 0 && aboutus_char_count > 0)
        {
            $('#content_type_btn').attr('disabled',false);
        }
        else
        {
            $('#content_type_btn').attr('disabled',true);
        }
    }

</script>

</body>

</html>
