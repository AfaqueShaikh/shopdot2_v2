<?php $__env->startSection('content'); ?>
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Edit Product Variant</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Product</li>
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
                        <form action="" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-body">
                                <h3 class="card-title m-t-15">Variants</h3>
                                <div class="row p-t-20">
                                    <div class="col-md-12" id="variant">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Image</th>
                                                    <th>Sale Price</th>
                                                    <th>qty</th>
                                                    <th style="text-align: left;">SKU</th>
                                                    <th>Color</th>
                                                    <th>Size</th>
                                                    <th>Material</th>
                                                    <th>Remove</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $__currentLoopData = $variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr id="<?php echo e($variant->id); ?>">
                                                        <td><?php echo e($index+1); ?></td>
                                                        <td><input style="width: auto;" class="form-control" type="file" name="variant_images[]"></td>
                                                        <td><input class="form-control" type="number" required name="variant_prices[]" value="<?php echo e($variant->sale_price); ?>"></td>
                                                        <td><input class="form-control" type="number" required name="variant_qtys[]" value="<?php echo e($variant->qty); ?>"></td>
                                                        <td><input class="form-control" type="text" required name="variant_skus[]" value="<?php echo e($variant->sku); ?>"></td>
                                                        <td><input class="form-control" type="text" name="variant_color[]" value="<?php echo e($variant->color); ?>"></td>
                                                        <td><input class="form-control" type="text" name="variant_size[]" value="<?php echo e($variant->size); ?>"></td>
                                                        <td><input class="form-control" type="text" name="variant_material[]" value="<?php echo e($variant->material); ?>"></td>
                                                        <td><button type="button" class="btn btn-danger btn-xs" onclick="removeVariant('<?php echo e($variant->id); ?>')"><i class="fa fa-trash"></i></button></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                <button type="button" class="btn btn-inverse">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <script>
        function removeVariant(id) {
            if(confirm('Do you really want remove this variant')){
                $.ajax({
                    url:"<?php echo e(url('/brand/product/remove-variant')); ?>",
                    data:{
                        id: id,
                    },
                    success: function (result) {
                        if(result['status'] == 'success'){
                            $('#'+id).remove();
                        } else {
                            alert('something went wrong');
                        }
                    }
                });
            }
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.brand', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\shopdot\app\Modules/Product/resources/views/edit-variant.blade.php ENDPATH**/ ?>