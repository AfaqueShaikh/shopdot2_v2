<?php $__env->startSection('content'); ?>
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Add Product</h3> </div>
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
                                <div class="row p-t-20">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Product Name</label>
                                            <input type="text" value="<?php echo e(old('name') ? old('name') : $product->name); ?>" class="form-control" name="name">
                                            <?php $__errorArgs = ['name'];
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Category</label>
                                            <select class="form-control" name="category">
                                                <option value="">Select Category</option>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if($product->category_id == $category->id): ?> selected <?php endif; ?> value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php $__errorArgs = ['category'];
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Product Description</label>
                                            <textarea name="description" class="form-control"><?php echo e(old('description') ? old('description') : $product->description); ?></textarea>
                                            <?php $__errorArgs = ['description'];
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Weight</label>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input type="text" value="<?php echo e(old('weight') ? old('weight') : $product->weight); ?>" class="form-control" name="weight">
                                                    <?php $__errorArgs = ['weight'];
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
                                                <div class="col-md-4">
                                                    <select name="weight_unit" class="form-control">
                                                        <option <?php if($product->weight_unit == "lb"): ?> selected <?php endif; ?> value="lb">lb</option>
                                                        <option <?php if($product->weight_unit == "oz"): ?> selected <?php endif; ?> value="oz">oz</option>
                                                        <option <?php if($product->weight_unit == "kg"): ?> selected <?php endif; ?> value="kg">kg</option>
                                                        <option <?php if($product->weight_unit == "g"): ?> selected <?php endif; ?> value="g">g</option>
                                                    </select>
                                                    <?php $__errorArgs = ['weight_unit'];
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
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">SKU</label>
                                            <input type="text" value="<?php echo e(old('sku') ? old('sku') : $product->sku); ?>" class="form-control" name="sku">
                                            <?php $__errorArgs = ['sku'];
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Price</label>
                                            <input type="number" id="price" step="0.01" value="<?php echo e(old('price') ? old('price') : $product->price); ?>" class="form-control" name="price">
                                            <?php $__errorArgs = ['price'];
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Sale Price</label>
                                            <input type="number" step="0.01" value="<?php echo e(old('sell_price') ? old('sell_price') : $product->sale_price); ?>" class="form-control" name="sell_price">
                                            <?php $__errorArgs = ['sell_price'];
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Quantity</label>
                                            <input type="number" value="<?php echo e(old('qty') ? old('qty') : $product->qty); ?>" class="form-control" name="qty">
                                            <?php $__errorArgs = ['qty'];
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Featured Image</label>
                                            <input type="file" class="form-control" name="featured_image">
                                            <?php $__errorArgs = ['featured_image'];
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Detail Images</label>
                                            <input type="file" name="detailed_images[]" class="form-control" multiple>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group has-danger">
                                            <div class="form-group">
                                                <label class="control-label">Status</label>
                                                <div class="form-check">
                                                    <input id="radio1" name="status" value="1" type="radio" <?php if($product->status == '1'): ?> checked <?php endif; ?> class="">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Active</span>
                                                    <input id="radio2" name="status" value="0" <?php if($product->status == '0'): ?>) checked <?php endif; ?> type="radio" class="">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Inactive</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="card-title m-t-15">Detail Images</h3>
                                <hr>
                                <div class="row p-t-20">
                                <?php $__empty_1 = true; $__currentLoopData = $product->detailImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detailImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <div class="col-md-2" id="<?php echo e($detailImage->id); ?>">
                                        <div class="form-group">
                                            <img width="50px" src="<?php echo e(url('/')); ?>/storage/app/public/<?php echo e(Auth::user()->id); ?>/detail-image/<?php echo e($detailImage->name); ?>">
                                            <button type="button" onclick="removeDetailImage(<?php echo e($detailImage->id); ?>)" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        
                                <?php endif; ?>
                                </div>
                                <h3 class="card-title m-t-15">Offer</h3>
                                <hr>
                                <div class="row p-t-20">
                                    <div class="col-md-4">
                                        <div class="form-group has-danger">
                                            <div class="form-group">
                                                <label class="control-label">Offer Available?</label>
                                                <div class="form-check">
                                                    <input id="offer_yes" name="offer" <?php if(old('offer') || $product->offer_available == '1'): ?> checked <?php endif; ?> onclick="offerAvailable()" value="1" type="radio" class="">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Yes</span>
                                                    <input id="offer_no" name="offer" <?php if(old('offer') || $product->offer_available == '0'): ?> checked <?php endif; ?> onclick="offerAvailable()" value="0" type="radio" class="">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">No</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="offer_price">
                                        <div class="form-group">
                                            <label class="control-label">Offer Price</label>
                                            <input type="number" step="0.01" value="<?php echo e(old('offer_price') ? old('offer_price') : $product->offer_price); ?>" name="offer_price" class="form-control" placeholder="">
                                            <?php $__errorArgs = ['offer_price'];
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
                                    <div class="col-md-4" id="start_date">
                                        <div class="form-group">
                                            <label class="control-label">Offer Start Date</label>
                                            <input type="text" value="<?php echo e(old('start_date') ? old('start_date') : $product->offer_startdate); ?>" id="from" name="start_date" class="form-control" placeholder="">
                                            <?php $__errorArgs = ['start_date'];
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
                                    <div class="col-md-4" id="end_date">
                                        <div class="form-group">
                                            <label class="control-label">Offer End Date</label>
                                            <input type="text" value="<?php echo e(old('end_date') ? old('end_date') : $product->offer_enddate); ?>" id="to" name="end_date" class="form-control" placeholder="">
                                            <?php $__errorArgs = ['end_date'];
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
                                </div>
                                <h3 class="card-title m-t-15">Variants</h3>
                                <hr>
                                <div class="row p-t-20">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Color</label>
                                            <input type="text" value="<?php echo e(old('color')); ?>" name="color" class="form-control" placeholder="Separate options with a comma">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Size</label>
                                            <input type="text" value="<?php echo e(old('size')); ?>" name="size" class="form-control" placeholder="Separate options with a comma">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Material</label>
                                            <input type="text" value="<?php echo e(old('material')); ?>" name="material" class="form-control" placeholder="Separate options with a comma">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <br>
                                            <button type="button" class="btn btn-success" onclick="addVariant()">Add Variants</button>
                                        </div>
                                    </div>
                                    <div class="col-md-12" id="variant">

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
        $(document).ready(function () {
            datePick();
            offerAvailable();
        });
        function offerAvailable() {
            if($('#offer_yes').prop('checked')){
                $('#offer_price').show();
                $('#start_date').show();
                $('#end_date').show();
            } else if($('#offer_no').prop('checked')) {
                $('#offer_price').hide();
                $('#start_date').hide();
                $('#end_date').hide();
            } else {
                $('#offer_no').prop('checked', true);
                offerAvailable();
            }

        }
        function addVariant() {
            var color = $('[name="color"]').val();
            var size = $('[name="size"]').val();
            var material = $('[name="material"]').val();
            var price = $('[name="sell_price"]').val();
            var qty = $('[name="qty"]').val();
            var sku = $('[name="sku"]').val();
            var msg = '';
            var error_flag = 0;
            if(price == ''){
                msg += 'Sell price, '
                error_flag = 1;
            }
            if(qty == ''){
                msg += 'Quantity, '
                error_flag = 1;
            }
            if(sku == ''){
                msg += 'Sku '
                error_flag = 1;
            }
            if(error_flag){
                alert(msg+'Should not be empty.');
                return;
            }
            $('#variant').html('<h3 style="text-align: center; color: #1da1f2">Please wait adding variants</h3>');
            if(color != '' || size != '' || material != ''){
                $.ajax({
                    url:"<?php echo e(url('/brand/product/add-variant')); ?>",
                    data:{
                        color: color,
                        size: size,
                        material: material,
                        price: price,
                        qty: qty,
                        sku: sku
                    },
                    success: function (result) {
                        $('#variant').html(result);
                    }
                });
            } else {
                alert('Please add at least one variant');
            }
        }
        function removeVariant(id) {
            if(confirm('Do you really want remove this variant')){
                $('#'+id).remove();
            }
        }
        function removeDetailImage(id){
            if(confirm('Do you really want remove this image')){
                $.ajax({
                    url:"<?php echo e(url('/brand/product/remove-detail-image')); ?>",
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
        function datePick() {
            var dateFormat = "mm/dd/yy",
                from = $( "#from" )
                    .datepicker({
                        defaultDate: "+1w",
                        changeMonth: true,
                        numberOfMonths: 1
                    })
                    .on( "change", function() {
                        to.datepicker( "option", "minDate", getDate( this ) );
                    }),
                to = $( "#to" ).datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1
                })
                    .on( "change", function() {
                        from.datepicker( "option", "maxDate", getDate( this ) );
                    });

            function getDate( element ) {
                var date;
                try {
                    date = $.datepicker.parseDate( dateFormat, element.value );
                } catch( error ) {
                    date = null;
                }

                return date;
            }
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.brand', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\shopdot\app\Modules/Product/resources/views/edit.blade.php ENDPATH**/ ?>