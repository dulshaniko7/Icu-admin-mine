<?php $__env->startSection('content'); ?>
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo e(trans('global.edit')); ?> <?php echo e(trans('cruds.tax.title_singular')); ?>

                </div>
                <div class="panel-body">
                    <form method="POST" action="<?php echo e(route("admin.taxes.update", [$tax->id])); ?>" enctype="multipart/form-data">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="form-group <?php echo e($errors->has('tax_name') ? 'has-error' : ''); ?>">
                            <label class="required" for="tax_name"><?php echo e(trans('cruds.tax.fields.tax_name')); ?></label>
                            <input class="form-control" type="text" name="tax_name" id="tax_name" value="<?php echo e(old('tax_name', $tax->tax_name)); ?>" required>
                            <?php if($errors->has('tax_name')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('tax_name')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.tax.fields.tax_name_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('tax_percentage') ? 'has-error' : ''); ?>">
                            <label for="tax_percentage"><?php echo e(trans('cruds.tax.fields.tax_percentage')); ?></label>
                            <input class="form-control" type="number" name="tax_percentage" id="tax_percentage" value="<?php echo e(old('tax_percentage', $tax->tax_percentage)); ?>" step="0.01">
                            <?php if($errors->has('tax_percentage')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('tax_percentage')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.tax.fields.tax_percentage_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('countries') ? 'has-error' : ''); ?>">
                            <label for="countries"><?php echo e(trans('cruds.tax.fields.country')); ?></label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0"><?php echo e(trans('global.select_all')); ?></span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0"><?php echo e(trans('global.deselect_all')); ?></span>
                            </div>
                            <select class="form-control select2" name="countries[]" id="countries" multiple>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($id); ?>" <?php echo e((in_array($id, old('countries', [])) || $tax->countries->contains($id)) ? 'selected' : ''); ?>><?php echo e($country); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('countries')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('countries')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.tax.fields.country_helper')); ?></span>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\sl_projects\dev-sl-admin-3133b5cfd61dd554 (3)\resources\views/admin/taxes/edit.blade.php ENDPATH**/ ?>