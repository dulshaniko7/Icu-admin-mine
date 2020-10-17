<?php $__env->startSection('content'); ?>
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo e(trans('global.edit')); ?> <?php echo e(trans('cruds.product.title_singular')); ?>

                </div>
                <div class="panel-body">
                    <form method="POST" action="<?php echo e(route("admin.products.update", [$product->id])); ?>" enctype="multipart/form-data">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="form-group <?php echo e($errors->has('product_name') ? 'has-error' : ''); ?>">
                            <label class="required" for="product_name"><?php echo e(trans('cruds.product.fields.product_name')); ?></label>
                            <input class="form-control" type="text" name="product_name" id="product_name" value="<?php echo e(old('product_name', $product->product_name)); ?>" required>
                            <?php if($errors->has('product_name')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('product_name')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.product.fields.product_name_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('product_code') ? 'has-error' : ''); ?>">
                            <label class="required" for="product_code"><?php echo e(trans('cruds.product.fields.product_code')); ?></label>
                            <input class="form-control" type="text" name="product_code" id="product_code" value="<?php echo e(old('product_code', $product->product_code)); ?>" required>
                            <?php if($errors->has('product_code')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('product_code')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.product.fields.product_code_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
                            <label for="description"><?php echo e(trans('cruds.product.fields.description')); ?></label>
                            <textarea class="form-control" name="description" id="description"><?php echo e(old('description', $product->description)); ?></textarea>
                            <?php if($errors->has('description')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('description')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.product.fields.description_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('product_price') ? 'has-error' : ''); ?>">
                            <label for="product_price"><?php echo e(trans('cruds.product.fields.product_price')); ?></label>
                            <input class="form-control" type="number" name="product_price" id="product_price" value="<?php echo e(old('product_price', $product->product_price)); ?>" step="0.01">
                            <?php if($errors->has('product_price')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('product_price')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.product.fields.product_price_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
                            <label><?php echo e(trans('cruds.product.fields.status')); ?></label>
                            <?php $__currentLoopData = App\Product::STATUS_RADIO; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div>
                                    <input type="radio" id="status_<?php echo e($key); ?>" name="status" value="<?php echo e($key); ?>" <?php echo e(old('status', $product->status) === (string) $key ? 'checked' : ''); ?>>
                                    <label for="status_<?php echo e($key); ?>" style="font-weight: 400"><?php echo e($label); ?></label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($errors->has('status')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('status')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.product.fields.status_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('image') ? 'has-error' : ''); ?>">
                            <label for="image"><?php echo e(trans('cruds.product.fields.image')); ?></label>
                            <div class="needsclick dropzone" id="image-dropzone">
                            </div>
                            <?php if($errors->has('image')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('image')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.product.fields.image_helper')); ?></span>
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

<?php $__env->startSection('scripts'); ?>
<script>
    Dropzone.options.imageDropzone = {
    url: '<?php echo e(route('admin.products.storeMedia')); ?>',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
<?php if(isset($product) && $product->image): ?>
      var file = <?php echo json_encode($product->image); ?>

          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
<?php endif; ?>
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\sl_projects\dev-sl-admin-3133b5cfd61dd554 (3)\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>