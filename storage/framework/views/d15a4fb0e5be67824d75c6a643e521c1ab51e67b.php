<?php $__env->startSection('content'); ?>
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo e(trans('global.edit')); ?> <?php echo e(trans('cruds.country.title_singular')); ?>

                </div>
                <div class="panel-body">
                    <form method="POST" action="<?php echo e(route("admin.countries.update", [$country->id])); ?>" enctype="multipart/form-data">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                            <label class="required" for="name"><?php echo e(trans('cruds.country.fields.name')); ?></label>
                            <input class="form-control" type="text" name="name" id="name" value="<?php echo e(old('name', $country->name)); ?>" required>
                            <?php if($errors->has('name')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('name')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.country.fields.name_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('short_code') ? 'has-error' : ''); ?>">
                            <label class="required" for="short_code"><?php echo e(trans('cruds.country.fields.short_code')); ?></label>
                            <input class="form-control" type="text" name="short_code" id="short_code" value="<?php echo e(old('short_code', $country->short_code)); ?>" required>
                            <?php if($errors->has('short_code')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('short_code')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.country.fields.short_code_helper')); ?></span>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\sl_projects\dev-sl-admin-3133b5cfd61dd554 (3)\resources\views/admin/countries/edit.blade.php ENDPATH**/ ?>