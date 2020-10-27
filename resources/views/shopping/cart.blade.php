@extends('layouts.user')

@section('content')
    <div class="container">
        <h2>Your Shopping Cart</h2>
        @if(Session::has('cart'))
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <ul class="list-group">
                        @foreach($products as $product)
                            <li class="list-group-item">
                                <span class="badge-success badge float-right">{{ $product['qty'] }}</span>
                                <storng>{{ $product['item']['product_name'] }}</storng>
                                <span class="label-success ml-3">INR {{$product['item']['product_price']}} </span>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-xs dropdown-toogle ml-5" data-toggle="dropdown">Action <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('user.reduce',['id' => $product['item']['id']]) }}">Reduce by 1</a></li>
                                        <li><a href="{{ route('user.remove',['id' => $product['item']['id']]) }}">Reduce All</a></li>
                                    </ul>
                                </div>

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
