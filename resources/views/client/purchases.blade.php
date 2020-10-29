@extends('layouts.admin')

@section('content')
    <div class="row container">
        <div class="col-lg-8">

            <h3>My Purchases Orders</h3>
            @foreach($orders as $order)

                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">{{ $order->product->product_name }}</h1>

                        <p class="card-text">{{ $order->product->description  }}</p>
                        <h4>Purchases Amount : {{ $order->quantity }}</h4>

                        <div class="float-right"><a class="btn btn-primary" href="{{ route('user.product.details',$order) }}">Products Details</a></div>

                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection
