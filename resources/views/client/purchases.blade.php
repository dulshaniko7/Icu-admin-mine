@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h1 class="text-center" style="margin-bottom: 2rem">My Purchases</h1>


            @foreach($orders as $order)
        <div class="col-lg-3">
                <div class="card" style="margin-bottom: 10px">
                    <div class="card-body">
                        <h1 class="card-title text-center">{{ $order->product->product_name }}</h1>

                        <p class="card-text">{{ $order->product->description  }}</p>
                        <h3  class="text-center" style="margin-top: 2rem; margin-bottom: 5rem;">Quantity : {{ $order->quantity }}</h3>
                        <hr>
                        <div class="float-right text-center" style="margin-top: 2rem; margin-bottom: 2rem;"><a class="btn btn-primary" href="{{ route('user.product.details',$order) }}">Details</a></div>

                    </div>
                </div>
                </div>
            @endforeach

    </div>
@endsection
