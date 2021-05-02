<!-- Left Sidebar  -->
<div class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li class="nav-label">Home</li>
                <li> <a class="" href="<?php echo e(url('/retailer/dashboard')); ?>" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard </span></a>
                </li>
                <hr>
                <li class="nav-label">Brand Section</li>
                <li> <a class="" href="<?php echo e(url('/retailer/register-brand/list')); ?>" aria-expanded="false"><i class="fa fa-lock"></i><span class="hide-menu">Register Brands</span></a>
                </li>
                <li> <a class="" href="<?php echo e(url('/retailer/invite-brand/list')); ?>" aria-expanded="false"><i class="fa fa-lock"></i><span class="hide-menu">Invite Brands</span></a>
                </li>
                <hr>
                <li class="nav-label">Products Section</li>
                <li> <a class="" href="<?php echo e(url('/retailer/retailer-product/list')); ?>" aria-expanded="false"><i class="fa fa-lock"></i><span class="hide-menu">Products</span></a>
                </li>
                <li> <a class="" href="<?php echo e(url('/retailer/import-product/list')); ?>" aria-expanded="false"><i class="fa fa-lock"></i><span class="hide-menu">Imported Products</span></a>
                </li>
                <hr>
                <li class="nav-label">Orders</li>
                <li> <a class="" href="<?php echo e(url('/retailer/order/list')); ?>" aria-expanded="false"><i class="fa fa-lock"></i><span class="hide-menu">Order</span></a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</div>
<!-- End Left Sidebar  --><?php /**PATH F:\xampp\htdocs\shopdot\resources\views/layouts/retailer-left-menu.blade.php ENDPATH**/ ?>