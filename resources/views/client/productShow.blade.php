@extends('layouts.user')

@section('content')
    <h1 class="text-center">Product Description</h1>
    <div class="container row">

        <div class="col-lg-12">
        <div class="card mt-4">
            <div class="card-body">
                <h1 class="cart-title text-center"> {{ $product->product_name }}</h1>
                <h5>description - {{ $product->description }}</h5>
                <hr>
                <h3>price {{$product->product_price}}</h3>

                <h4>Quantity {{ $o->quantity }}</h4>
                <div class="float-right"><a class="btn btn-primary" href="{{ route('upload.import',$product->id) }}">Assign Students</a></div>
            </div>
        </div>
    </div>
    </div>
@endsection
