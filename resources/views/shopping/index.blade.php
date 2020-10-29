@extends('layouts.user')
@section('content')
    <div class="content">
        <h2>Products</h2>


        <div style="margin-bottom: 10px;" class="row">
            @foreach($products as $product)
                <div class="col-lg-3 col-md-6 col-sm-12 mb-5">
                    <div class="card" style="">
                        <div class="card-body">
                            @if($product->image)
                                <a href="{{ $product->image->getUrl() }}" target="_blank" style="display: block">
                                    <img class="card-img-top" src="{{ $product->image->getUrl('preview') }}"
                                         alt="no image">
                                </a>
                            @endif
                            <h5 class="card-title">{{$product->product_name}}</h5>
                            <p class="card-text">{{$product->description}}</p>
                            <h5 class="float-right">Product Price - {{ $product->product_price }}INR</h5>
                                <br>
                                <hr>
                        <!-- <a href="{{ route('user.cart.add',$product->id) }}" class="btn btn-primary float-right">Add to Card  </a> -->

                            <form action="{{route('user.checkout.new.store')}}" method="post">
                                @csrf
                                <div class="form-group row float-right">
                                <div class="col-xs-1">
                                    <input class="form-control" name="qty" type="text" placeholder="quantity">
                                </div>
                                </div>
                                <input type="hidden" name="price" value="{{ $product->product_price }}">
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <button type="submit" class="btn btn-primary">Buy</button>
                            </form>
                        </div>

                    </div>
                </div>


            @endforeach
        </div>
    </div>

@endsection
