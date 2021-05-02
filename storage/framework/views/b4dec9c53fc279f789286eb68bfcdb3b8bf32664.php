<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ShopDot - Sign Up as a Retailer</title>
  <link rel="icon"
    href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🚀</text></svg>">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">

  <link media="all" rel="stylesheet" href="<?php echo e(url('public/front/css/vendor.min.css')); ?>">
  <link media="all" rel="stylesheet" href="<?php echo e(url('public/front/css/styles.min.css')); ?>">
</head>


<body class="sign-page">
<div class="wrapper">
  <header class="header">

    <div class="container header-container">
      <div class="text-center">
        <h1>Sign Up as a Retailer</h1>
      </div>
    </div>

    <div class="header__logo">
      <picture><a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(url('public/front/images/logos/logo-main.png')); ?>" alt="Shop Dot"></a></picture>
    </div>

  </header>

  <main class="content">
    <section class="section sign sign-@cls">
      <div class="container">
        <div class="sign__content">

          <div class="text-message text-center">
            <p>Hi! Nice to meet you. Sign up to start shopping for your store and community.</p>
          </div>

            <form class="sign__form form" method="POST" action="<?php echo e(route('register')); ?>">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="user_type" value="3">
            <div class="form__field form__field--half form__field--floating-label">
              <input type="text" name="first_name" value="<?php echo e(old('first_name')); ?>" id="f-name" placeholder="First name" required>
              <label for="f-name">First name</label>
            </div>
            <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($message); ?></strong>
            </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <div class="form__field form__field--half form__field--floating-label">
              <input id="l-name" type="text"  placeholder="Last name" name="last_name" value="<?php echo e(old('last_name')); ?>" required >
              <label for="l-name">Last name</label>
            </div>
            <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <div class="form__field form__field--floating-label">

              <input id="email" type="email"  name="email" placeholder="Email address" value="<?php echo e(old('email')); ?>" required >
              <label for="email">Email address</label>
            </div>
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <div class="form__field form__field--floating-label">
              <input class="password" type="password" name="password" id="password" placeholder="Create password" required>
              <label for="password">Create password</label>
              <!--for show password-message add class 'show'-->
              <div class="password-message">Password is <span>strong!</span></div>
              <span class="password-show"></span>
            </div>
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <div class="form__field checkbox">
              <label for="terms-and-privacy">
                <input type="checkbox" onchange="checkPolicy(this)" name="agree_term" id="terms-and-privacy" required>


                <small class="checkbox-text">
                  By signing up for ShopDot, you are agreeing to our <a href="#">Terms</a> and <a href="#">Privacy
                  Policy</a>.</small>
              </label>
            </div>
            <div class="form__field buttons">
              <!--disabled by default, remove it when do validation-->
              <button type="submit" id="register" disabled class="button" >Sign Up</button>
            </div>
            <div class="form__field helpers">
              <small>Are you a Content Creator and interested in using ShopDot? <a href="#">Sign up here</a></small>
              <small>Interested in selling on ShopDot? <a href="#">Sign up</a> as a brand</small>
            </div>
          </form>












        </div>
      </div>
    </section>

  </main>
  <footer class="footer"></footer>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="<?php echo e(url('public/front/js/vendor.min.js')); ?>" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/MorphSVGPlugin.min.js?r=182"></script>
<script src="<?php echo e(url('public/front/js/app.min.js')); ?>" defer></script>
<script>
     function checkPolicy(ele) {
        if($(ele).prop('checked')){
            $('#register').prop('disabled',false);
        } else {
            $('#register').prop('disabled',true);
        }
    }
    </script>
</body>

</html>
<?php /**PATH F:\xampp\htdocs\shopdot\resources\views/auth/register.blade.php ENDPATH**/ ?>