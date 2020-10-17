@extends('layouts.client')

@section('content')
    <div class="container-fluid mt-3">

        <div class="row">

            @foreach($products as $product)
                <div class="col-lg-3 mb-5">
                    <div class="card" style="width: 20rem;">
                        <div class="card-body">
                            @if($product->image)
                                <a href="{{ $product->image->getUrl() }}" target="_blank" style="display: block">
                                    <img class="card-img-top" src="{{ $product->image->getUrl('preview') }}"
                                         alt="no image">
                                </a>
                            @endif
                            <h5 class="card-title">{{$product->product_name}}</h5>
                            <p class="card-text">{{$product->description}}</p>
                            <h5>{{ $product->product_price }}</h5>
                                <h6>{{ $product->tax }}</h6>
                            <a href="{{ route('user.cart.add',$product->id) }}" class="btn btn-primary float-right">Add to Card
                            </a>
                        </div>

                    </div>
                </div>


            @endforeach
        </div>
    </div>

@endsection
