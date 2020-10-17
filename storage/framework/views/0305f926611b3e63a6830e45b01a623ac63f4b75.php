<?php $__env->startSection('content'); ?>

    <button id="rzp-button1">Pay</button>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var options = {
            "key": "<?php echo e($response['razorpayId']); ?>", // Enter the Key ID generated from the Dashboard
            "amount": "<?php echo e($response['amount']); ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            "currency": "<?php echo e($response['currency']); ?>",
            "name": "<?php echo e($response['name']); ?>",
            "description": "<?php echo e($response['description']); ?>",
            "image": "https://example.com/your_logo",
            "order_id": "<?php echo e($response['orderId']); ?>", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
            "handler": function (response){
                document.getElementById('rzp_paymentid').value = response.razorpay_payment_id;
                document.getElementById('rzp_orderid').value = response.razorpay_order_id;
                document.getElementById('rzp_signature').value = response.razorpay_payment_id;


                document.getElementById('rzp-paymentresponse').click();

                alert(response.razorpay_payment_id);
                alert(response.razorpay_order_id);
                alert(response.razorpay_signature)
            },
            "prefill": {
                "name": "<?php echo e($response['name']); ?>",
                "email": "<?php echo e($response['email']); ?>",
                "contact": "<?php echo e($response['contactNumber']); ?>"
            },
            "notes": {
                "address": "<?php echo e($response['address']); ?>"
            },
            "theme": {
                "color": "#F37254"
            }
        };
        var rzp1 = new Razorpay(options);
        window.onload = function (){
            document.getElementById('rzp-button1').click();
        }
        document.getElementById('rzp-button1').onclick = function(e){
            rzp1.open();
            e.preventDefault();
        }
    </script>


    <!-- Form -->
    <form action="<?php echo e(route('user.payment')); ?>" method="POST" hidden>
        <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token" >
        <input type="text" id="rzp_paymentid" name="rzp_paymentid">
        <input type="text" id="rzp_orderid" name="rzp_orderid">
        <input type="text" id="rzp_signature" name="rzp_signature">
        <button type="submit" id="rzp-paymentresponse">Submit</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\sl_projects\dev-sl-admin-3133b5cfd61dd554 (3)\resources\views/shopping/payment.blade.php ENDPATH**/ ?>