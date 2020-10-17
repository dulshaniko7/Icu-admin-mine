<?php $__env->startSection('content'); ?>
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo e(trans('global.show')); ?> <?php echo e(trans('cruds.role.title')); ?>

                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="<?php echo e(route('admin.roles.index')); ?>">
                                <?php echo e(trans('global.back_to_list')); ?>

                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        <?php echo e(trans('cruds.role.fields.id')); ?>

                                    </th>
                                    <td>
                                        <?php echo e($role->id); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?php echo e(trans('cruds.role.fields.title')); ?>

                                    </th>
                                    <td>
                                        <?php echo e($role->title); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?php echo e(trans('cruds.role.fields.permissions')); ?>

                                    </th>
                                    <td>
                                        <?php $__currentLoopData = $role->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $permissions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span class="label label-info"><?php echo e($permissions->title); ?></span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="<?php echo e(route('admin.roles.index')); ?>">
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\sl_projects\dev-sl-admin-3133b5cfd61dd554 (3)\resources\views/admin/roles/show.blade.php ENDPATH**/ ?>