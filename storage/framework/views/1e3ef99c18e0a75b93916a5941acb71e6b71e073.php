<?php $__env->startSection('content'); ?>
    <div class="content">
        <h2>Products</h2>


        <div style="margin-bottom: 10px;" class="row">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 mb-5">
                    <div class="card" style="width: 25rem;">
                        <div class="card-body">
                            <?php if($product->image): ?>
                                <a href="<?php echo e($product->image->getUrl()); ?>" target="_blank" style="display: block">
                                    <img class="card-img-top" src="<?php echo e($product->image->getUrl('preview')); ?>"
                                         alt="no image">
                                </a>
                            <?php endif; ?>
                            <h5 class="card-title"><?php echo e($product->product_name); ?></h5>
                            <p class="card-text"><?php echo e($product->description); ?></p>
                            <h5><?php echo e($product->product_price); ?>INR</h5>
                            <h6><?php echo e($product->tax); ?></h6>
                            <a href="<?php echo e(route('user.cart.add',$product->id)); ?>" class="btn btn-primary float-right">Add to Card
                            </a>
                        </div>

                    </div>
                </div>


            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\sl_projects\dev-sl-admin-3133b5cfd61dd554 (3)\resources\views/shopping/index.blade.php ENDPATH**/ ?>