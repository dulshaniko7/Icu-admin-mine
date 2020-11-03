@extends('layouts.admin')

@section('content')

<div class="content">
    <h1 class="text-center" style="margin-bottom: 2rem;">Product Description</h1>
    <div style="margin-bottom: 2rem;" class="row">
    <div class="col-lg-12">

        <div class="card" style="margin-bottom: 50px;margin-left: 2rem;margin-right: 2rem">
            <div class="card-body">
                <h1 class="cart-title text-center"> {{ $product->product_name }}</h1>
                <p class="card-text" style="margin-bottom: 4rem">description - {{ $product->description }}</p>
                <hr>
                <h3 style="margin-top: 4rem">price - {{$product->product_price}}</h3>

                <h4>Quantity - {{ $o->quantity }}</h4>
                <div class="col-lg-12 col-lg-push-10 col-md-12 col-md-push-9 col-sm-12 col-sm-push-9 col-xs-12 col-xs-push-8"><a class="btn btn-primary"
                                                                                 href="{{ route('upload.import',$o->id) }}">Assign
                        Students</a></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card" style="margin-bottom: 50px;margin-left: 2rem;margin-right: 2rem">
            <div class="card-body">
                <h1 class="cart-title text-center"> Students assign for this product</h1>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact</th>
                        <th scope="col">School</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $index => $s)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$s->first_name}}</td>
                        <td>{{$s->last_name}}</td>
                        <td>{{$s->email}}</td>
                        <td>{{$s->contact}}</td>
                        <td>{{$s->school_name}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
</div>
@endsection
