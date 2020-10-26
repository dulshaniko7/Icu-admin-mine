@extends('layouts.admin')
@section('content')
    <div class="row container">
        <div class="col-lg-8">
            <h2>User Profile</h2>
            <h3>My Orders</h3>
            @foreach($orders as $order)

                @foreach($order->cart->items as $item)
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{ $item['item']['product_name'] }}</h3>
                            <p class="card-text">{{ $item['item']['description'] }}</p>
                           <!-- <h4>Purchase Quantity -: {{ $item['qty'] }}</h4> -->

                            <h4><a class="btn btn-primary" href="{{ route('user.upload.create',$item['item']['id']) }}">Assign Student to Product</a></h4>

                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>

@endsection
