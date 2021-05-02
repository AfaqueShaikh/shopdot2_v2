<?php $__env->startSection('content'); ?>
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Product</h3> </div>
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
            <div class="col-12">
                <?php if(Session::has('error')): ?>
                    <p class="alert <?php echo e(Session::get('alert-class', 'alert-danger')); ?>"><?php echo e(Session::get('error')); ?></p>
                <?php endif; ?>
                <?php if(Session::has('success')): ?>
                    <p class="alert <?php echo e(Session::get('alert-class', 'alert-success')); ?>"><?php echo e(Session::get('success')); ?></p>
                <?php endif; ?>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Manage Products</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="<?php echo e(url('/brand/product/create')); ?>" class="btn btn-primary pull-right">Add Product</a>
                            </div>
                        </div>
                        <div class="table-responsive m-t-40">
                            <table id="product" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr role="row">
                                    <th>SKU</th>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Category Name</th>
                                    <th>Price</th>
                                    <th>Sell Price</th>
                                    <th>Qty</th>
                                    <th>Status</th>
                                    <th>Action</th>
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
        $(document).ready(function () {
            $('#product').DataTable({
                processing: true,
                serverSide: true,
                ajax: "<?php echo e(url('/brand/product/data')); ?>",
                columns: [
                    {data: 'sku', name: 'sku'},
                    {data: 'image', name: 'image'},
                    {data: 'name', name: 'name'},
                    {data: 'category', name: 'category'},
                    {data: 'price', name: 'price'},
                    {data: 'sale_price', name: 'sale_price'},
                    {data: 'qty', name: 'qty'},
                    {data: 'status', name: 'status'},
                    {data: "delete",
                        render: function (data, type, row) {
                            if (type === 'display') {
                                return '<a  class="btn btn-primary btn-xs" title="edit" href="<?php echo e(url("brand/product/edit/")); ?>/' + row.id + '"><i class="fa fa-pencil"></i> Edit Product</a>' +
                                    '<a  class="btn btn-warning btn-xs" title="edit" href="<?php echo e(url("brand/product/edit/variant")); ?>/' + row.id + '"><i class="fa fa-pencil"></i> Edit Variants</a>' +
                                    '<form id="delete_' + row.id + '" action="<?php echo e(url("brand/product/delete/")); ?>/' + row.id + '"><button type="button" class="btn btn-danger btn-xs" onclick="confirmDelete(' + row.id + ')"><i class="fa fa-trash"></i> Delete</a></form>';
                            }
                            return data;
                        },
                        className: "dt-body-center",
                        orderable: false,
                        'defaultContent':'-'
                    }
                ]
            });
        });

        function confirmDelete(id) {
            if(confirm('Do you really want to delete this record?')){
                $('#delete_'+id).submit();
            }
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.brand', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\shopdot\app\Modules/Product/resources/views/list.blade.php ENDPATH**/ ?>