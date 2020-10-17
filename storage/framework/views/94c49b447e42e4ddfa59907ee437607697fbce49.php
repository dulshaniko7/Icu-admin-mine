<?php $__env->startSection('content'); ?>
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo e(trans('global.show')); ?> <?php echo e(trans('cruds.product.title')); ?>

                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="<?php echo e(route('admin.products.index')); ?>">
                                <?php echo e(trans('global.back_to_list')); ?>

                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        <?php echo e(trans('cruds.product.fields.id')); ?>

                                    </th>
                                    <td>
                                        <?php echo e($product->id); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?php echo e(trans('cruds.product.fields.product_name')); ?>

                                    </th>
                                    <td>
                                        <?php echo e($product->product_name); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?php echo e(trans('cruds.product.fields.product_code')); ?>

                                    </th>
                                    <td>
                                        <?php echo e($product->product_code); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?php echo e(trans('cruds.product.fields.description')); ?>

                                    </th>
                                    <td>
                                        <?php echo e($product->description); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?php echo e(trans('cruds.product.fields.product_price')); ?>

                                    </th>
                                    <td>
                                        <?php echo e($product->product_price); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?php echo e(trans('cruds.product.fields.status')); ?>

                                    </th>
                                    <td>
                                        <?php echo e(App\Product::STATUS_RADIO[$product->status] ?? ''); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?php echo e(trans('cruds.product.fields.image')); ?>

                                    </th>
                                    <td>
                                        <?php if($product->image): ?>
                                            <a href="<?php echo e($product->image->getUrl()); ?>" target="_blank" style="display: inline-block">
                                                <img src="<?php echo e($product->image->getUrl('thumb')); ?>">
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="<?php echo e(route('admin.products.index')); ?>">
                                <?php echo e(trans('global.back_to_list')); ?>

                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\sl_projects\dev-sl-admin-3133b5cfd61dd554 (3)\resources\views/admin/products/show.blade.php ENDPATH**/ ?>