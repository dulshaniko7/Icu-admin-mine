@extends('layouts.admin')

@section('content')
    <div class="container row">

        <div class="col-lg-12">
            <h1 class="text-center mt-2 mb-2"><u>My Purchases </u></h1>
            @foreach($orders as $order)

                <div class="card mb-2 mt-4" style="margin-bottom: 10px">
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
