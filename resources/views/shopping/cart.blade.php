@extends('layouts.user')

@section('content')
    <div class="container">
        @if(Session::has('cart'))
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <ul class="list-group">
                        @foreach($products as $product)
                            <li class="list-group-item">
                                <span class="badge-success badge float-right">{{ $product['qty'] }}</span>
                                <storng>{{ $product['item']['product_name'] }}</storng>
                                <span class="label-success">{{$product['item']['product_price']}} INR</span>


                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <strong>Total: {{$totalPrice}} INR</strong>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <a href="{{ route('user.checkout') }}" type="button" class="btn btn-success">Checkout</a>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <h2>No Items in Cart</h2>
                </div>
            </div>
        @endif
    </div>
@endsection
