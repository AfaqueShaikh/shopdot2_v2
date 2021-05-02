
<?php $__env->startSection('content'); ?>
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-two">
                            <header>
                                <div class="avatar">
                                    <img src="<?php echo e(url('/public')); ?>/images/users/profile.png" alt="Brand Name" />
                                </div>
                            </header>

                            <h3>Brand Name</h3>
                            <div class="contacts">
                                <a href="">&nbsp;</a>
                                <a href="javascript:void(0)"><i class="fa fa-plus"></i></a>
                                <a href="">&nbsp;</a>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-12">
                <div class="card">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs profile-tab" role="tablist">
                        <li class="nav-item"> <a class="nav-link <?php if(!(Session::has('bank-setting') || Session::has('business-setting') ||  Session::has('shipping'))): ?> active <?php endif; ?>" data-toggle="tab" href="#credential" role="tab">Account Credentials</a> </li>
                        <li class="nav-item"> <a class="nav-link <?php if(Session::has('bank-setting')): ?> active <?php endif; ?>" data-toggle="tab" href="#bank-setting" role="tab">Bank Details</a> </li>
                        <li class="nav-item"> <a class="nav-link <?php if(Session::has('business-setting')): ?> active <?php endif; ?>" data-toggle="tab" href="#business-setting" role="tab">Business Details</a> </li>
                        <li class="nav-item"> <a class="nav-link <?php if(Session::has('shipping')): ?> active <?php endif; ?>" data-toggle="tab" href="#shipping" role="tab">Shipping Details</a> </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane <?php if(!(Session::has('bank-setting') || Session::has('business-setting') ||  Session::has('shipping'))): ?> active <?php endif; ?>" id="credential" role="tabpanel">
                            <div class="card-body">
                                <?php if(Session::has('error')): ?>
                                    <p class="alert <?php echo e(Session::get('alert-class', 'alert-danger')); ?>"><?php echo e(Session::get('error')); ?></p>
                                <?php endif; ?>
                                <?php if(Session::has('success')): ?>
                                    <p class="alert <?php echo e(Session::get('alert-class', 'alert-success')); ?>"><?php echo e(Session::get('success')); ?></p>
                                <?php endif; ?>
                                <form class="form-horizontal form-material" method="post" action="<?php echo e(url('brand/update/account-credential')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" value="<?php echo e(Auth::user()->email); ?>" class="form-control form-control-line" name="email">
                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <label class="text text-danger"><?php echo e($message); ?></label>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Old Password</label>
                                        <div class="col-md-12">
                                            <input type="password" name="password" class="form-control form-control-line">
                                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <label class="text text-danger"><?php echo e($message); ?></label>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">New Password</label>
                                        <div class="col-md-12">
                                            <input type="password" name="new_password" class="form-control form-control-line">
                                            <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <label class="text text-danger"><?php echo e($message); ?></label>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane <?php if(Session::has('bank-setting')): ?> active <?php endif; ?>" id="bank-setting" role="tabpanel">
                            <div class="card-body">
                                <?php if(Session::has('error')): ?>
                                    <p class="alert <?php echo e(Session::get('alert-class', 'alert-danger')); ?>"><?php echo e(Session::get('error')); ?></p>
                                <?php endif; ?>
                                <?php if(Session::has('success')): ?>
                                    <p class="alert <?php echo e(Session::get('alert-class', 'alert-success')); ?>"><?php echo e(Session::get('success')); ?></p>
                                <?php endif; ?>
                                <form class="form-horizontal form-material" method="post" action="<?php echo e(url('brand/update/bank-detail')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label class="col-md-12">Bank Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="bank_name" value="<?php if(Auth::user()->bankDetails): ?><?php echo e(Auth::user()->bankDetails->bank_name); ?><?php endif; ?>" class="form-control form-control-line">
                                            <?php $__errorArgs = ['bank_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <label class="text text-danger"><?php echo e($message); ?></label>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Account Number</label>
                                        <div class="col-md-12">
                                            <input type="number" name="account_number" class="form-control form-control-line" value="<?php if(Auth::user()->bankDetails): ?><?php echo e(Auth::user()->bankDetails->account_number); ?><?php endif; ?>">
                                            <?php $__errorArgs = ['account_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <label class="text text-danger"><?php echo e($message); ?></label>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane <?php if(Session::has('business-setting')): ?> active <?php endif; ?>" id="business-setting" role="tabpanel">
                            <div class="card-body">
                                <?php if(Session::has('error')): ?>
                                    <p class="alert <?php echo e(Session::get('alert-class', 'alert-danger')); ?>"><?php echo e(Session::get('error')); ?></p>
                                <?php endif; ?>
                                <?php if(Session::has('success')): ?>
                                    <p class="alert <?php echo e(Session::get('alert-class', 'alert-success')); ?>"><?php echo e(Session::get('success')); ?></p>
                                <?php endif; ?>
                                <form class="form-horizontal form-material" method="post" action="<?php echo e(url('brand/update/business-detail')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label class="col-md-12">Brand Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="brand_name" value="<?php if(Auth::user()->businessDetails): ?><?php echo e(Auth::user()->businessDetails->brand_name); ?><?php endif; ?>" class="form-control form-control-line">
                                            <?php $__errorArgs = ['brand_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <label class="text text-danger"><?php echo e($message); ?></label>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Company Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="company_name" value="<?php if(Auth::user()->businessDetails): ?><?php echo e(Auth::user()->businessDetails->company_name); ?><?php endif; ?>" class="form-control form-control-line">
                                            <?php $__errorArgs = ['company_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <label class="text text-danger"><?php echo e($message); ?></label>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">City</label>
                                        <div class="col-md-12">
                                            <input type="text" name="city" value="<?php if(Auth::user()->businessDetails): ?><?php echo e(Auth::user()->businessDetails->city); ?><?php endif; ?>" class="form-control form-control-line">
                                            <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <label class="text text-danger"><?php echo e($message); ?></label>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">State</label>
                                        <div class="col-md-12">
                                            <input type="text" name="state" value="<?php if(Auth::user()->businessDetails): ?><?php echo e(Auth::user()->businessDetails->state); ?><?php endif; ?>" class="form-control form-control-line">
                                            <?php $__errorArgs = ['state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <label class="text text-danger"><?php echo e($message); ?></label>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Zip</label>
                                        <div class="col-md-12">
                                            <input type="number" name="zip" value="<?php if(Auth::user()->businessDetails): ?><?php echo e(Auth::user()->businessDetails->zip); ?><?php endif; ?>" class="form-control form-control-line">
                                            <?php $__errorArgs = ['zip'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <label class="text text-danger"><?php echo e($message); ?></label>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">Select Country</label>
                                        <div class="col-sm-12">
                                            <select name="country" class="form-control form-control-line">
                                                <option <?php if(Auth::user()->businessDetails && Auth::user()->businessDetails->country == '1'): ?>selected <?php endif; ?> value="1">London</option>
                                                <option <?php if(Auth::user()->businessDetails && Auth::user()->businessDetails->country == '2'): ?>selected <?php endif; ?> value="2">India</option>
                                                <option <?php if(Auth::user()->businessDetails && Auth::user()->businessDetails->country == '3'): ?>selected <?php endif; ?> value="3">Usa</option>
                                                <option <?php if(Auth::user()->businessDetails && Auth::user()->businessDetails->country == '4'): ?>selected <?php endif; ?> value="4">Canada</option>
                                                <option <?php if(Auth::user()->businessDetails && Auth::user()->businessDetails->country == '5'): ?>selected <?php endif; ?> value="5">Thailand</option>
                                            </select>
                                            <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <label class="text text-danger"><?php echo e($message); ?></label>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Phone</label>
                                        <div class="col-md-12">
                                            <input type="number" name="phone" value="<?php if(Auth::user()->businessDetails): ?><?php echo e(Auth::user()->businessDetails->phone); ?><?php endif; ?>" class="form-control form-control-line">
                                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <label class="text text-danger"><?php echo e($message); ?></label>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Fax</label>
                                        <div class="col-md-12">
                                            <input type="text" name="fax" value="<?php if(Auth::user()->businessDetails): ?><?php echo e(Auth::user()->businessDetails->fax); ?><?php endif; ?>" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane <?php if(Session::has('shipping')): ?> active <?php endif; ?>" id="shipping" role="tabpanel">
                            <div class="card-body">
                                <?php if(Session::has('error')): ?>
                                    <p class="alert <?php echo e(Session::get('alert-class', 'alert-danger')); ?>"><?php echo e(Session::get('error')); ?></p>
                                <?php endif; ?>
                                <?php if(Session::has('success')): ?>
                                    <p class="alert <?php echo e(Session::get('alert-class', 'alert-success')); ?>"><?php echo e(Session::get('success')); ?></p>
                                <?php endif; ?>
                                <form class="form-horizontal form-material" method="post" action="<?php echo e(url('brand/update/shipping-detail')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label class="">Default Shipping Rate</label>
                                        <div class="">
                                            <input type="text" name="rate" value="<?php if(Auth::user()->shippingDetails): ?><?php echo e(Auth::user()->shippingDetails->rate); ?><?php endif; ?>" class="form-control form-control-line">
                                            <?php $__errorArgs = ['rate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <label class="text text-danger"><?php echo e($message); ?></label>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="">Processing & Shipping Time</label>
                                        <input type="text" name="time" value="<?php if(Auth::user()->shippingDetails): ?><?php echo e(Auth::user()->shippingDetails->time); ?><?php endif; ?>" class="form-control form-control-line">
                                        <?php $__errorArgs = ['time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <label class="text text-danger"><?php echo e($message); ?></label>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="">Processing & Shipping Time Unit</label>
                                        <select class="form-control" name="unit">
                                            <option <?php if(Auth::user()->shippingDetails && Auth::user()->shippingDetails->unit == '1'): ?>selected <?php endif; ?> value="1">Days</option>
                                            <option <?php if(Auth::user()->shippingDetails && Auth::user()->shippingDetails->unit == '2'): ?>selected <?php endif; ?> value="2">Hours</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>

        <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.brand', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\shopdot\app\Modules/Brand/resources/views/profile.blade.php ENDPATH**/ ?>