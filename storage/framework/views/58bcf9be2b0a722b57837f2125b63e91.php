<?php if(Session::has('error')): ?>
<div class="alert alert-danger">
    <?php echo e(Session::get('error')); ?>

</div>
<?php endif; ?><?php /**PATH D:\I4\InternetProgramming\S2Project\laravel-pos\resources\views/layouts/partials/alert/error.blade.php ENDPATH**/ ?>