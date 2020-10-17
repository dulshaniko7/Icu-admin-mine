<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <?php if(Session::has('cart')): ?>
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <ul class="list-group">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item">
                                <span class="badge-success badge float-right"><?php echo e($product['qty']); ?></span>
                                <storng><?php echo e($product['item']['product_name']); ?></storng>
                                <span class="label-success"><?php echo e($product['item']['product_price']); ?></span>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle"
                                            data-toggle="dropdown">Action
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="">Reduce by 1</a></li>
                                        <li><a href="">Reduce All</a></li>
                                    </ul>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <strong>Total: <?php echo e($totalPrice); ?> $</strong>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <a href="<?php echo e(route('user.checkout')); ?>" type="button" class="btn btn-success">Checkout</a>
                </div>
            </div>
        <?php else: ?>
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <h2>No Items in Cart</h2>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\sl_projects\dev-sl-admin-3133b5cfd61dd554 (3)\resources\views/client/cart.blade.php ENDPATH**/ ?>