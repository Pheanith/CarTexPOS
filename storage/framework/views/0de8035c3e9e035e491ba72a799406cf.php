

<?php $__env->startSection('title', __('product.Product_List')); ?>
<?php $__env->startSection('content-header', __('product.Product_List')); ?>
<?php $__env->startSection('content-actions'); ?>
<a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary"><?php echo e(__('product.Create_Product')); ?></a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/sweetalert2/sweetalert2.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="card product-list">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th><?php echo e(__('product.ID')); ?></th>
                    <th><?php echo e(__('product.Name')); ?></th>
                    <th><?php echo e(__('product.Image')); ?></th>
                    <th><?php echo e(__('product.Barcode')); ?></th>
                    <th><?php echo e(__('product.Price')); ?></th>
                    <th><?php echo e(__('product.Quantity')); ?></th>
                    <th><?php echo e(__('product.Status')); ?></th>
                    <th><?php echo e(__('product.Created_At')); ?></th>
                    <th><?php echo e(__('product.Updated_At')); ?></th>
                    <th><?php echo e(__('product.Actions')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($product->id); ?></td>
                    <td><?php echo e($product->name); ?></td>
                    <td><img class="product-img" src="<?php echo e(Storage::url($product->image)); ?>" alt=""></td>
                    <td><?php echo e($product->barcode); ?></td>
                    <td><?php echo e($product->price); ?></td>
                    <td><?php echo e($product->quantity); ?></td>
                    <td>
                        <span class="right badge badge-<?php echo e($product->status ? 'success' : 'danger'); ?>"><?php echo e($product->status ? __('common.Active') : __('common.Inactive')); ?></span>
                    </td>
                    <td><?php echo e($product->created_at); ?></td>
                    <td><?php echo e($product->updated_at); ?></td>
                    <td>
                        <a href="<?php echo e(route('products.edit', $product)); ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-danger btn-delete" data-url="<?php echo e(route('products.destroy', $product)); ?>"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo e($products->render()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('plugins/sweetalert2/sweetalert2.min.js')); ?>"></script>
<script type="module">
    $(document).ready(function() {
        $(document).on('click', '.btn-delete', function() {
            var $this = $(this);
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: "<?php echo e(__('product.sure')); ?>",
                text: "<?php echo e(__('product.really_delete')); ?>",
                icon: "<?php echo e(__('product.Create_Product')); ?>'warning'",
                showCancelButton: true,
                confirmButtonText: "<?php echo e(__('product.yes_delete')); ?>",
                cancelButtonText: "<?php echo e(__('product.No')); ?>",
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.post($this.data('url'), {
                        _method: 'DELETE',
                        _token: '<?php echo e(csrf_token()); ?>'
                    }, function(res) {
                        $this.closest('tr').fadeOut(500, function() {
                            $(this).remove();
                        })
                    })
                }
            })
        })
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\I4\InternetProgramming\S2Project\laravel-pos\resources\views/products/index.blade.php ENDPATH**/ ?>