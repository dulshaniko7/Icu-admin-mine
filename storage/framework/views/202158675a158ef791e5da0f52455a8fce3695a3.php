<?php $__env->startSection('content'); ?>
    <div class="container">
<div class="row mt-4">
    <div class="col-md-4 col-sm-6 ">
        <h2>Checkout</h2>
        <h5>Total Tax: <?php echo e($with_tax); ?></h5>
        <h4>Your Total: <?php echo e($total); ?>$</h4>

        <form action=""></form>
    </div>
</div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\sl_projects\dev-sl-admin-3133b5cfd61dd554 (3)\resources\views/client/checkout.blade.php ENDPATH**/ ?>