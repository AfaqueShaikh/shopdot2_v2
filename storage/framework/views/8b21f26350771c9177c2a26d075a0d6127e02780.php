<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(url('/public')); ?>/images/favicon.png">
    <title>ShopDot</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo e(url('/public')); ?>/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->

    <link href="<?php echo e(url('/public')); ?>/css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="<?php echo e(url('/public')); ?>/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="<?php echo e(url('/public')); ?>/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="<?php echo e(url('/public')); ?>/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="<?php echo e(url('/public')); ?>/css/helper.css" rel="stylesheet">
    <link href="<?php echo e(url('/public')); ?>/css/style.css" rel="stylesheet">
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
</head>
<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
</div>
<!-- Main wrapper  -->
<div id="main-wrapper">
    <?php echo $__env->make('layouts.brand-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.brand-left-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="page-wrapper">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <?php echo $__env->make('layouts.brand-footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
    <!-- All Jquery -->
    <script src="<?php echo e(url('/public')); ?>/js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo e(url('/public')); ?>/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo e(url('/public')); ?>/js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo e(url('/public')); ?>/js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo e(url('/public')); ?>/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo e(url('/public')); ?>/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->


    <!-- Amchart -->
    <script src="<?php echo e(url('/public')); ?>/js/lib/morris-chart/raphael-min.js"></script>
    <script src="<?php echo e(url('/public')); ?>/js/lib/morris-chart/morris.js"></script>
    <script src="<?php echo e(url('/public')); ?>/js/lib/morris-chart/dashboard1-init.js"></script>


    <script src="<?php echo e(url('/public')); ?>/js/lib/calendar-2/moment.latest.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo e(url('/public')); ?>/js/lib/calendar-2/semantic.ui.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo e(url('/public')); ?>/js/lib/calendar-2/prism.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo e(url('/public')); ?>/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo e(url('/public')); ?>/js/lib/calendar-2/pignose.init.js"></script>

    <script src="<?php echo e(url('/public')); ?>/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="<?php echo e(url('/public')); ?>/js/lib/owl-carousel/owl.carousel-init.js"></script>
    <script src="<?php echo e(url('/public')); ?>/js/scripts.js"></script>
    <!-- scripit init-->

    <script src="<?php echo e(url('/public')); ?>/js/custom.min.js"></script>
    <?php echo $__env->yieldContent('footer'); ?>
</body>
</html>
<?php /**PATH C:\wamp64\www\shopdot-1\resources\views/layouts/brand.blade.php ENDPATH**/ ?>