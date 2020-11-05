@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-6 ">
            <h2 class="mb-4">Checkout</h2>
            <h5>Quantity : {{ $quantity ?? '' }}</h5>
            <h5>Total Tax: {{ $with_tax ?? ''}}</h5>

            <h4>Your Total for {{ $quantity ?? '' }}: INR {{ $total ?? ''}}</h4>
            <h4>Your Total for {{ $quantity ?? '' }} Tax: INR {{ $total_with_tax ?? '' }} </h4>

          <form action="{{ route('user.init') }}" method="post" class="card-body">
           <!-- <form method="post" action="{{ route('user.quick.payment')}}"> -->
                <input type="hidden" value="{{ csrf_token() }}" name="_token">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12 mb-2">


                    </div>


                </div>

                <div class="md-form mb-10">
                    <input type="hidden" id="amount" class="form-control" placeholder="" name="amount"
                           value="{{ $total_with_tax  ?? ''}}">
                    <label for="amount" class=""></label>
                </div>
                <input type="hidden" name="quantity" value="{{$quantity ?? ''}}">
                <input type="hidden" name="product_id" value="{{$product_id ?? '' }}">
                <!--address-->


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


                <button class="btn btn-primary btn-lg btn-block" type="submit">Produce to pay</button>

            </form>

        </div>
    </div>
</div>

@if(Session::has('data'))

<div class="container tex-center mx-auto">
    <form action="{{ route('user.quick.pay') }}" method="POST" class="text-center mx-auto mt-5">
        <script
            src="https://checkout.razorpay.com/v1/checkout.js"
            data-key="rzp_test_CcRYorXwUKnx5y"
            data-amount="{{Session::get('data.amount')}}"
            data-currency="INR"
            data-order_id="{{Session::get('data.order_id')}}"
            data-buttontext="Pay with Razorpay"
            data-name="Coffee"
            data-description="Test transaction"

            data-theme.color="#F37254"
        ></script>
        <input type="hidden" custom="Hidden Element" name="hidden">
    </form>

</div>

@endif

@endsection
