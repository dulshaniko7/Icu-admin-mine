@extends('layouts.user')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 ">
                <h2 class="mb-4">Checkout</h2>
                <h5>Quantity : {{ $quantity }}</h5>
                <h5>Total Tax: {{ $with_tax}}</h5>

                <h4>Your Total for {{ $quantity }}: INR {{ $total }}</h4>
                <h4>Your Total for {{ $quantity }} Tax: INR {{ $total_with_tax }} </h4>
                <form action="{{ route('user.init') }}" method="post" class="card-body">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-12 mb-2">

                            <!--firstName-->


                        </div>
                        <!--Grid column-->

                        <!--Grid column-->

                        <!--Grid column-->

                    </div>
                    <!--Grid row-->

                    <!--Username-->

                    <!--email-->

                    <!-- amount -->
                    <div class="md-form mb-10">
                        <input type="text" id="amount" class="form-control" placeholder="" name="amount" value="{{ $total_with_tax }}">
                        <label for="amount" class=""></label>
                    </div>
                    <input type="hidden" name="quantity" value="{{$quantity}}">
                    <input type="hidden" name="product_id" value="{{$product_id}}">
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



                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>

                </form>

            </div>
        </div>
    </div>
@endsection
