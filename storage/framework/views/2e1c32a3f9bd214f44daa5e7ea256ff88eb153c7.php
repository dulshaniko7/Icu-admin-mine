<?php $__env->startSection('content'); ?>
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.customer.title_singular')); ?>

                </div>
                <div class="panel-body">
                    <form method="POST" action="<?php echo e(route("admin.customers.store")); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group <?php echo e($errors->has('customer_name') ? 'has-error' : ''); ?>">
                            <label class="required" for="customer_name"><?php echo e(trans('cruds.customer.fields.customer_name')); ?></label>
                            <input class="form-control" type="text" name="customer_name" id="customer_name" value="<?php echo e(old('customer_name', '')); ?>" required>
                            <?php if($errors->has('customer_name')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('customer_name')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.customer.fields.customer_name_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                            <label class="required" for="email"><?php echo e(trans('cruds.customer.fields.email')); ?></label>
                            <input class="form-control" type="email" name="email" id="email" value="<?php echo e(old('email')); ?>" required>
                            <?php if($errors->has('email')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('email')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.customer.fields.email_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                            <label class="required" for="password"><?php echo e(trans('cruds.customer.fields.password')); ?></label>
                            <input class="form-control" type="password" name="password" id="password" required>
                            <?php if($errors->has('password')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('password')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.customer.fields.password_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('remember_token') ? 'has-error' : ''); ?>">
                            <label for="remember_token"><?php echo e(trans('cruds.customer.fields.remember_token')); ?></label>
                            <input class="form-control" type="text" name="remember_token" id="remember_token" value="<?php echo e(old('remember_token', '')); ?>">
                            <?php if($errors->has('remember_token')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('remember_token')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.customer.fields.remember_token_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('country') ? 'has-error' : ''); ?>">
                            <label class="required" for="country_id"><?php echo e(trans('cruds.customer.fields.country')); ?></label>
                            <select class="form-control select2" name="country_id" id="country_id" required>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($id); ?>" <?php echo e(old('country_id') == $id ? 'selected' : ''); ?>><?php echo e($country); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('country')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('country')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.customer.fields.country_helper')); ?></span>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\sl_projects\dev-sl-admin-3133b5cfd61dd554 (3)\resources\views/admin/customers/create.blade.php ENDPATH**/ ?>