@extends('layouts.client')

@section('content')
    <div class="container mt-4">
        @if(Session::has('cart'))
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <ul class="list-group">
                        @foreach($products as $product)
                            <li class="list-group-item">
                                <span class="badge-success badge float-right">{{ $product['qty'] }}</span>
                                <storng>{{ $product['item']['product_name'] }}</storng>
                                <span class="label-success">{{$product['item']['product_price']}}</span>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle"
                                            data-toggle="dropdown">Action
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="">Reduce by 1</a></li>
                                        <li><a href="">Reduce All</a></li>
                                    </ul>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <strong>Total: {{$totalPrice}} $</strong>
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
