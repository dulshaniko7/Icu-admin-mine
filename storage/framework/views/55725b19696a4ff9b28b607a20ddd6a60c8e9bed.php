<?php $__env->startSection('content'); ?>
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.invoice.title_singular')); ?>

                </div>
                <div class="panel-body">
                    <form method="POST" action="<?php echo e(route("admin.invoices.store")); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group <?php echo e($errors->has('price') ? 'has-error' : ''); ?>">
                            <label class="required" for="price"><?php echo e(trans('cruds.invoice.fields.price')); ?></label>
                            <input class="form-control" type="number" name="price" id="price" value="<?php echo e(old('price', '')); ?>" step="0.01" required>
                            <?php if($errors->has('price')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('price')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.invoice.fields.price_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('total_tax') ? 'has-error' : ''); ?>">
                            <label for="total_tax"><?php echo e(trans('cruds.invoice.fields.total_tax')); ?></label>
                            <input class="form-control" type="number" name="total_tax" id="total_tax" value="<?php echo e(old('total_tax', '')); ?>" step="0.01">
                            <?php if($errors->has('total_tax')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('total_tax')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.invoice.fields.total_tax_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('total_price') ? 'has-error' : ''); ?>">
                            <label class="required" for="total_price"><?php echo e(trans('cruds.invoice.fields.total_price')); ?></label>
                            <input class="form-control" type="number" name="total_price" id="total_price" value="<?php echo e(old('total_price', '')); ?>" step="0.01" required>
                            <?php if($errors->has('total_price')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('total_price')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.invoice.fields.total_price_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('products') ? 'has-error' : ''); ?>">
                            <label class="required" for="products"><?php echo e(trans('cruds.invoice.fields.product')); ?></label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0"><?php echo e(trans('global.select_all')); ?></span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0"><?php echo e(trans('global.deselect_all')); ?></span>
                            </div>
                            <select class="form-control select2" name="products[]" id="products" multiple required>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($id); ?>" <?php echo e(in_array($id, old('products', [])) ? 'selected' : ''); ?>><?php echo e($product); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('products')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('products')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.invoice.fields.product_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('customer') ? 'has-error' : ''); ?>">
                            <label for="customer_id"><?php echo e(trans('cruds.invoice.fields.customer')); ?></label>
                            <select class="form-control select2" name="customer_id" id="customer_id">
                                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($id); ?>" <?php echo e(old('customer_id') == $id ? 'selected' : ''); ?>><?php echo e($customer); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('customer')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('customer')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.invoice.fields.customer_helper')); ?></span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                <?php echo e(trans('global.save')); ?>

                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\sl_projects\dev-sl-admin-3133b5cfd61dd554 (3)\resources\views/admin/invoices/create.blade.php ENDPATH**/ ?>