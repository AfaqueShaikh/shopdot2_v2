<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ShopDot - Login</title>
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
            <h1>Sign In</h1>
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





              
              <form method="POST" action="<?php echo e(route('login')); ?>" class="sign__form form">
                <?php echo csrf_field(); ?>
                <div class="form__field form__field--floating-label">
                  <input value="<?php echo e(old('email')); ?>" type="email" name="email" id="email" placeholder="Email address" required>
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
                  <input class="password" type="password" name="password" id="password" placeholder="Enter password" required>
                  <label for="password">Enter password</label>
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
                <div class="form__field buttons">
                  <!--disabled by default, remove it when do validation-->
                  <button type="submit" class="button" >Sign In</button>
                </div>
                <div class="form__field helpers">
                  <div class="forgot text-center">
                    <a href="<?php echo e(route('password.request')); ?>">Forgot Password</a>
                  </div>
                </div>
              </form>








            </div>
          </div>
        </section>

      </main>
      <footer class="footer"></footer>
    </div>

    <script src="<?php echo e(url('public/front/js/vendor.min.js')); ?>" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/MorphSVGPlugin.min.js?r=182"></script>
    <script src="<?php echo e(url('public/front/js/app.min.js')); ?>" defer></script>

    </body>

    </html>
<?php /**PATH F:\xampp\htdocs\shopdot\resources\views/auth/login2.blade.php ENDPATH**/ ?>