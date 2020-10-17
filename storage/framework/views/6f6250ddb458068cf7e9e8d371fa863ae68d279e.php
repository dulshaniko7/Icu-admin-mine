<?php $__env->startSection('content'); ?>
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.permission.title_singular')); ?>

                </div>
                <div class="panel-body">
                    <form method="POST" action="<?php echo e(route("admin.permissions.store")); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
                            <label class="required" for="title"><?php echo e(trans('cruds.permission.fields.title')); ?></label>
                            <input class="form-control" type="text" name="title" id="title" value="<?php echo e(old('title', '')); ?>" required>
                            <?php if($errors->has('title')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('title')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.permission.fields.title_helper')); ?></span>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\sl_projects\dev-sl-admin-3133b5cfd61dd554 (3)\resources\views/admin/permissions/create.blade.php ENDPATH**/ ?>