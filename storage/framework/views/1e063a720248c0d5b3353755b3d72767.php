

<?php $__env->startSection('title', __('customer.Customer_List')); ?>
<?php $__env->startSection('content-header', __('customer.Customer_List')); ?>
<?php $__env->startSection('content-actions'); ?>
<a href="<?php echo e(route('customers.create')); ?>" class="btn btn-primary"><?php echo e(__('customer.Add_Customer')); ?></a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/sweetalert2/sweetalert2.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th><?php echo e(__('customer.ID')); ?></th>
                    <th><?php echo e(__('customer.Avatar')); ?></th>
                    <th><?php echo e(__('customer.First_Name')); ?></th>
                    <th><?php echo e(__('customer.Last_Name')); ?></th>
                    <th><?php echo e(__('customer.Email')); ?></th>
                    <th><?php echo e(__('customer.Phone')); ?></th>
                    <th><?php echo e(__('customer.Address')); ?></th>
                    <th><?php echo e(__('common.Created_At')); ?></th>
                    <th><?php echo e(__('customer.Actions')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($customer->id); ?></td>
                    <td>
                        <img width="50" src="<?php echo e($customer->getAvatarUrl()); ?>" alt="">
                    </td>
                    <td><?php echo e($customer->first_name); ?></td>
                    <td><?php echo e($customer->last_name); ?></td>
                    <td><?php echo e($customer->email); ?></td>
                    <td><?php echo e($customer->phone); ?></td>
                    <td><?php echo e($customer->address); ?></td>
                    <td><?php echo e($customer->created_at); ?></td>
                    <td>
                        <a href="<?php echo e(route('customers.edit', $customer)); ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-danger btn-delete" data-url="<?php echo e(route('customers.destroy', $customer)); ?>"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo e($customers->render()); ?>

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
                title: "<?php echo e(__('customer.sure')); ?>",
                text: "<?php echo e(__('customer.really_delete')); ?>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "<?php echo e(__('customer.yes_delete')); ?>",
                cancelButtonText: "<?php echo e(__('customer.No')); ?>",
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\I4\InternetProgramming\S2Project\laravel-pos\resources\views/customers/index.blade.php ENDPATH**/ ?>