<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopDot - Invite Brands</title>
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
                <h1>Invite Brands</h1>
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
                    @php
                        $exploded_data = explode(',',$info->interact_with_customer);
                    @endphp
                    <div class="info-bar__text">
                        <p>{{$exploded_data[0]}}, +{{count($exploded_data) - 1}}</p>
                    </div>
                </div>

                <div class="info-bar__item category-name">
                    <div class="info-bar__icon">
                        <svg class="icon">
                            <use xlink:href="images/sprite.svg#category-other"></use>
                        </svg>
                    </div>
                    <div class="info-bar__text">
                        <p>{{$info->category}}</p>
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
                    <div class="step done">Category</div>
                    <div class="step done">Values</div>
                    <div class="step done">Connect Shop</div>
                    <div class="step active process">Invite Brands</div>
                </div>
            </div>
        </section>

        @php
            $invited_emails = [];
            if(isset($info->invited_brands_email))
            {
                $invited_emails = explode(', ',$info->invited_brands_email);
            }
        @endphp

        <section class="section primary primary-info">
            <div class="container primary-container">
                <div class="primary__content">


                    <div class="text-message text-center">
                        <p>ShopDot is now connected to your Shopify store. <br>
                            Invite brands that you already work with and start selling their products on your website.
                        </p>
                    </div>
                    <form id="email_form" class="primary__form form form__brands">
                        <div class="form__brands-left">
                            <div class="form__field">
                                <input type="email" name="add_brand_email" id="add_brand_email"
                                       placeholder="Add brand email address...">
                                <div class="form__field-help">
                                    <small id="email_error" style="display: none"></small>
                                    <small>Don’t worry, the brands won’t see the other recipients.</small>
                                </div>
                            </div>

                            <div class="form__brands-added" id="added_email">
                                @if(count($invited_emails) > 0)
                                    @foreach($invited_emails as $email)
                                        <div class="form__brand">
                                            <div class="form__brand-email">{{$email}}</div>
                                            <span class="remove-email">
                                        <svg class="icon">
                                            <use xlink:href="images/sprite.svg#icon-close"></use>
                                        </svg>
                                    </span>
                                        </div>
                                    @endforeach
                                @endif
                                {{--<div class="form__brand">
                                    <div class="form__brand-email">contact@aeropress.com</div>
                                    <span class="remove-email">
                                        <svg class="icon">
                                            <use xlink:href="images/sprite.svg#icon-close"></use>
                                        </svg>
                                    </span>
                                </div>--}}

                            </div>

                        </div>
                        <div class="form__brands-right">
                            <h3>Edit Message</h3>
                            <div class="form__field">
                                <!--Make it with div because we cant add links into textarea-->
                                <!--If need it can be replaced with textarea-->
                                <div class="email-message-box" id="email-message-box" contenteditable="true">
                                    Hi, it's {{Auth::user()->first_name.' '.Auth::user()->last_name}} from {{$info->business_name}}. I just signed up for <a href="javascript:void(0);">ShopDot</a>, a
                                    brand-to-retail platform that
                                    integrates with my Shopify store to launch products with ease and streamline
                                    inventory and drop-shipping.
                                    <br><br>
                                    I'm interested in selling your brand on my website through <a href="javascript:void(0);">ShopDot</a>.
                                    To learn more about the benefits of
                                    selling on ShopDot, <a href="javascript:void(0);">click here</a>.
                                </div>
                            </div>
                            <div class="form__field buttons">

                                <button onclick="sendInvitationMail();" type="button" id="email_invite_button" class="button" @if(count($invited_emails) === 0) disabled @endif>Invite</button>


                            </div>
                            <div class="form__field helpers">
                                <div class="later">
                                    <a href="{{url('/welcome/to/dashboard')}}">Invite Brands Later</a>
                                </div>
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
    var added_brand_email = {!! json_encode($invited_emails) !!};
    var site_path = '{{url('/')}}';
    $("#retailer_connect_shop_form").validate({
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

    $('#email_form').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13)
        {
            e.preventDefault();
            return false;
        }
    });

    $("#add_brand_email").keypress(function(event) {
        $('#email_error').text('').hide();
        if (event.keyCode === 13)
        {
            var current_email = $(this).val();
            if(added_brand_email.indexOf(current_email) === -1)
            {
                var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
                if(current_email.match(mailformat))
                {
                    added_brand_email.push(current_email);
                    appendAddedEmail(current_email);
                    $(this).val('');
                    $('#email_invite_button').attr('disabled',false);
                }
                else
                {
                    $('#email_error').text('Please enter valid email addresss.').show();
                }
            }
            else
            {
                $('#email_error').text('Email already added.').show();
            }
        }
    });

    function appendAddedEmail(addedEmail)
    {
        var html_content = '';
        html_content += '<div class="form__brand">';
        html_content += '<div class="form__brand-email">'+addedEmail+'</div>';
        html_content += '<span class="remove-email">';
        html_content += '<svg class="icon">';
        html_content += '<use xlink:href="images/sprite.svg#icon-close"></use>';
        html_content += '</svg>';
        html_content += '</span>';
        html_content += '</div>';
        $('#added_email').append(html_content);
    }

    function sendInvitationMail()
    {
        $('#email_invite_button').attr('disabled',true);
        $.ajax({
            url: site_path+'/send/brands/invitation/mail',
            type:'POST',
            dataType:'JSON',
            data:{
                "_token": "{{ csrf_token() }}",
                email: JSON.stringify(added_brand_email),
                email_content: $('#email-message-box').text()
            },
            success:function (response)
            {
                if(response.status === "1")
                {
                    window.location.href = site_path+'/welcome/to/dashboard';
                }
            }
        });
    }


</script>

</body>

</html>
