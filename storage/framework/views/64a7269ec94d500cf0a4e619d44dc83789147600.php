<?php $__env->startSection('content'); ?>
<div class="content">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_create')): ?>
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="<?php echo e(route('admin.customers.create')); ?>">
                    <?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.customer.title_singular')); ?>

                </a>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo e(trans('cruds.customer.title_singular')); ?> <?php echo e(trans('global.list')); ?>

                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Customer">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        <?php echo e(trans('cruds.customer.fields.customer_name')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(trans('cruds.customer.fields.email')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(trans('cruds.customer.fields.remember_token')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(trans('cruds.customer.fields.country')); ?>

                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-entry-id="<?php echo e($customer->id); ?>">
                                        <td>

                                        </td>
                                        <td>
                                            <?php echo e($customer->customer_name ?? ''); ?>

                                        </td>
                                        <td>
                                            <?php echo e($customer->email ?? ''); ?>

                                        </td>
                                        <td>
                                            <?php echo e($customer->remember_token ?? ''); ?>

                                        </td>
                                        <td>
                                            <?php echo e($customer->country->short_code ?? ''); ?>

                                        </td>
                                        <td>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_show')): ?>
                                                <a class="btn btn-xs btn-primary" href="<?php echo e(route('admin.customers.show', $customer->id)); ?>">
                                                    <?php echo e(trans('global.view')); ?>

                                                </a>
                                            <?php endif; ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_edit')): ?>
                                                <a class="btn btn-xs btn-info" href="<?php echo e(route('admin.customers.edit', $customer->id)); ?>">
                                                    <?php echo e(trans('global.edit')); ?>

                                                </a>
                                            <?php endif; ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_delete')): ?>
                                                <form action="<?php echo e(route('admin.customers.destroy', $customer->id)); ?>" method="POST" onsubmit="return confirm('<?php echo e(trans('global.areYouSure')); ?>');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="<?php echo e(trans('global.delete')); ?>">
                                                </form>
                                            <?php endif; ?>

                                        </td>

                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_delete')): ?>
  let deleteButtonTrans = '<?php echo e(trans('global.datatables.delete')); ?>'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "<?php echo e(route('admin.customers.massDestroy')); ?>",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('<?php echo e(trans('global.datatables.zero_selected')); ?>')

        return
      }

      if (confirm('<?php echo e(trans('global.areYouSure')); ?>')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
<?php endif; ?>

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Customer:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\sl_projects\dev-sl-admin-3133b5cfd61dd554 (3)\resources\views/admin/customers/index.blade.php ENDPATH**/ ?>