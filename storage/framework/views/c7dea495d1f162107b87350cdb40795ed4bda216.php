<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 ">
                <h2>Checkout</h2>
                <h5>Total Tax: <?php echo e($with_tax); ?></h5>

                <h4>Your Total: <?php echo e($total); ?> INR</h4>
                <h4>Your Total with Tax: <?php echo e($total_with_tax); ?> INR</h4>
                <form action="<?php echo e(route('user.init')); ?>" method="post" class="card-body">
                    <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-12 mb-2">

                            <!--firstName-->
                            <div class="md-form ">
                                <input type="text" id="firstName" name="name" class="form-control">
                                <label for="firstName" class="">Name</label>
                            </div>

                        </div>
                        <!--Grid column-->

                        <!--Grid column-->

                        <!--Grid column-->

                    </div>
                    <!--Grid row-->

                    <!--Username-->

                    <!--email-->
                    <div class="md-form mb-10">
                        <input type="text" id="email" class="form-control" name="email" placeholder="youremail@example.com">
                        <label for="email" class="">Email </label>
                    </div>
                    <div class="md-form mb-10">
                        <input type="text" id="number" class="form-control" name="contactNumber" placeholder="youremail@example.com">
                        <label for="number" class="">Contact Number </label>
                    </div>
                    <!-- amount -->>
                    <div class="md-form mb-10">
                        <input type="text" id="amount" class="form-control" placeholder="" name="amount" value="<?php echo e($total_with_tax); ?>">
                        <label for="amount" class=""></label>
                    </div>
                    <!--address-->
                    <div class="md-form mb-10">
                        <input type="text" id="address" class="form-control"name="address" placeholder="1234 Main St">
                        <label for="address" class="">Address</label>
                    </div>

                    <!--address-2-->


                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->

                        <!--Grid column-->

                        <!--Grid column-->

                        <!--Grid column-->

                        <!--Grid column-->

                        <!--Grid column-->

                    </div>
                    <!--Grid row-->

                    <hr>


                    <hr>



                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>

                </form>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\sl_projects\dev-sl-admin-3133b5cfd61dd554 (3)\resources\views/shopping/checkout.blade.php ENDPATH**/ ?>