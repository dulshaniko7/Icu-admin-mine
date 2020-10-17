<?php $__env->startSection('content'); ?>
<div class="login-box">
    <div class="login-logo">
        <a href="<?php echo e(route('admin.home')); ?>">
            <?php echo e(trans('panel.site_title')); ?>

        </a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">
            <?php echo e(trans('global.register')); ?>

        </p>
        <form method="POST" action="<?php echo e(route('register')); ?>">
            <?php echo e(csrf_field()); ?>


            <div>
                <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                    <input type="text" name="name" class="form-control" required autofocus placeholder="<?php echo e(trans('global.user_name')); ?>" value="<?php echo e(old('name', null)); ?>">
                    <?php if($errors->has('name')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('name')); ?>

                        </p>
                    <?php endif; ?>
                </div>
                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                    <input type="email" name="email" class="form-control" required placeholder="<?php echo e(trans('global.login_email')); ?>" value="<?php echo e(old('email', null)); ?>">
                    <?php if($errors->has('email')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('email')); ?>

                        </p>
                    <?php endif; ?>
                </div>

                <div class="form-group <?php echo e($errors->has('country') ? 'has-error' : ''); ?>">
                    <label class="required" for="country_id"><?php echo e(trans('cruds.customer.fields.country')); ?></label>
                    <select class="form-control select2" name="country_id" id="country_id" required>
                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($id); ?>" <?php echo e(old('country_id') == $id ? 'selected' : ''); ?>><?php echo e($country->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php if($errors->has('country')): ?>
                        <span class="help-block" role="alert"><?php echo e($errors->first('country')); ?></span>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.customer.fields.country_helper')); ?></span>
                </div>

                <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                    <input type="password" name="password" class="form-control" required placeholder="<?php echo e(trans('global.login_password')); ?>">
                    <?php if($errors->has('password')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('password')); ?>

                        </p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-control" required placeholder="<?php echo e(trans('global.login_password_confirmation')); ?>">
                </div>
                <div class="row">
                    <div class="col-xs-8">

                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                            <?php echo e(trans('global.register')); ?>

                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\sl_projects\dev-sl-admin-3133b5cfd61dd554 (3)\resources\views/auth/register.blade.php ENDPATH**/ ?>