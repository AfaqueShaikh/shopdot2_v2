
<?php $__env->startSection('content'); ?>
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Imported Product</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Imported Product</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-12">
                <?php if(Session::has('error')): ?>
                    <p class="alert <?php echo e(Session::get('alert-class', 'alert-danger')); ?>"><?php echo e(Session::get('error')); ?></p>
                <?php endif; ?>
                <?php if(Session::has('success')): ?>
                    <p class="alert <?php echo e(Session::get('alert-class', 'alert-success')); ?>"><?php echo e(Session::get('success')); ?></p>
                <?php endif; ?>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Imported Product</h4>
                        
                            
                                
                            
                            
                                
                            
                        
                        <div class="table-responsive m-t-40">
                            <table id="product" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr role="row">
                                    <th>Brand Name</th>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Category Name</th>
                                    <th>Price</th>
                                    <th>Qty with Variant</th>
                                    <th>Processing & Shipping Time</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(url('/public/js/jquery.dataTables.min.js')); ?>"></script>
    <script type="text/javascript">
        var dataTable;
        $(document).ready(function () {
            dataTable = $('#product').DataTable({
                processing: true,
                serverSide: true,
                ajax: "<?php echo e(url('retailer/import-product/data')); ?>",
                columns: [
                    {data: 'brand_name', name: 'brand_name'},
                    {data: 'image', name: 'image'},
                    {data: 'name', name: 'name'},
                    {data: 'category', name: 'category'},
                    {data: 'sale_price', name: 'sale_price'},
                    {data: 'qty', name: 'qty'},
                    {data: 'shipping', name: 'shipping'},
                    {data: 'status', name: 'status'},
                ]
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.retailer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\shopdot\app\Modules/ImportProduct/resources/views/list.blade.php ENDPATH**/ ?>