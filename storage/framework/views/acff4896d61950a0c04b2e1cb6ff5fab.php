

<?php $__env->startSection('content-header', __('dashboard.title')); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                  <h3><?php echo e($orders_count); ?></h3>
                <p><?php echo e(__('dashboard.Orders_Count')); ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo e(route('orders.index')); ?>" class="small-box-footer"><?php echo e(__('common.More_info')); ?> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                  <h3><?php echo e(config('settings.currency_symbol')); ?> <?php echo e(number_format($income, 2)); ?></h3>
                <p><?php echo e(__('dashboard.Income')); ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo e(route('orders.index')); ?>" class="small-box-footer"><?php echo e(__('common.More_info')); ?> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo e(config('settings.currency_symbol')); ?> <?php echo e(number_format($income_today, 2)); ?></h3>

                <p><?php echo e(__('dashboard.Income_Today')); ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?php echo e(route('orders.index')); ?>" class="small-box-footer"><?php echo e(__('common.More_info')); ?> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo e($customers_count); ?></h3>

                <p><?php echo e(__('dashboard.Customers_Count')); ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo e(route('customers.index')); ?>" class="small-box-footer"><?php echo e(__('common.More_info')); ?> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\I4\InternetProgramming\S2Project\laravel-pos\resources\views/home.blade.php ENDPATH**/ ?>