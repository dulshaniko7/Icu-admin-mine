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
                    <div class="float-right"><a class="btn btn-primary" href="{{ route('upload.import',$o->id) }}">Assign
                            Students</a></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container row">

        <div class="col-lg-12">
            <div class="card mt-4 mb-4">
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
@endsection
