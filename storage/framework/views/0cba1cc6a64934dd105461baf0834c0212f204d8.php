<?php $__env->startSection('content'); ?>
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Brand Info</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Brand Info</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-primary">
                    <div class="card-body">
                        <form action="#">
                            <div class="form-body">
                                <div class="row p-t-20">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Brand Name</label>
                                            <input type="text" id="firstName" disabled class="form-control" placeholder="<?php echo e($brand->businessDetails->brand_name); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Company Name</label>
                                            <input type="text" id="firstName" disabled class="form-control" placeholder="<?php echo e($brand->businessDetails->company_name); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">City</label>
                                            <input type="text" id="firstName" disabled class="form-control" placeholder="<?php echo e($brand->businessDetails->city); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">State</label>
                                            <input type="text" id="firstName" disabled class="form-control" placeholder="<?php echo e($brand->businessDetails->state); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Country</label>
                                            <input type="text" id="firstName" disabled class="form-control" placeholder="<?php echo e($brand->businessDetails->country); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Zip</label>
                                            <input type="text" id="firstName" class="form-control" disabled placeholder="<?php echo e($brand->businessDetails->zip); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Phone</label>
                                            <input type="text" id="firstName" disabled class="form-control" placeholder="<?php echo e($brand->businessDetails->phone); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Fax</label>
                                            <input type="text" id="firstName" class="form-control" disabled placeholder="<?php echo e($brand->businessDetails->fax); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- End Container fluid  -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.brand', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\shopdot\app\Modules/RegisterBrand/resources/views/info.blade.php ENDPATH**/ ?>