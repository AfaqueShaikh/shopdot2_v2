<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>Variant</th>
            <th>Image</th>
            <th>Price</th>
            <th>qty</th>
            <th style="text-align: left;">SKU</th>
            <th>Remove</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $first; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $second; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $third; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $newsku = $sku.'-';
                    $newsku = $f ? $newsku.''.$f[0] : $newsku;
                    $newsku = $s ? $newsku.''.$s[0] : $newsku;
                    $newsku = $t ? $newsku.''.$t[0] : $newsku;
                ?>
        <tr id="<?php echo e($newsku); ?>">
            <td><?php echo e($f); ?> / <?php echo e($s); ?> / <?php echo e($t); ?></td>
            <td><input class="form-control" type="file" name=""></td>
            <td><input class="form-control" type="number" required name="" value="<?php echo e($price); ?>"></td>
            <td><input class="form-control" type="number" required name="" value="<?php echo e($qty); ?>"></td>
            <td><input class="form-control" type="text" required name="" value="<?php echo e($newsku); ?>"></td>
            <td><button type="button" class="btn btn-danger btn-xs" onclick="removeVariant('<?php echo e($newsku); ?>')"><i class="fa fa-trash"></i></button></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div><?php /**PATH C:\wamp64\www\shopdot-1\app\Modules/Product/resources/views/variant.blade.php ENDPATH**/ ?>