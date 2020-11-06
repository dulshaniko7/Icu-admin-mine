@extends('layouts.admin')

@section('content')

<div class="content">
    <h1 class="text-center" style="margin-bottom: 2rem;">Product Description</h1>
    <div style="margin-bottom: 2rem;" class="row">
        <div class="col-lg-12">

            <div class="card" style="margin-bottom: 2rem;margin-left: 2rem;margin-right: 2rem">
                <div class="card-body">
                    <table class="table">
                        <tr>

                            <td><h4><b> Assessment Name : </b></h4></td>
                            <td><h4> {{ $product->product_name }} </h4></td>


                            <td><h4><b> Cost (Per Item) : </b></h4></td>
                            <td><h4> {{$product->product_price}} </h4></td>

                        </tr>

                        <tr>
                            <td><h4><b> Quantity : </b></h4></td>
                            <td><h4> {{ $o->quantity }} </h4></td>


                            <td><h4><b> Total Cost : </b></h4></td>
                            <td><h4> {{ $product->product_price * $o->quantity }} </h4></td>
                        </tr>

                        <tr>
                            <td><h4><b> Purchased At : </b></h4></td>
                            <td><h4> {{ $o->created_at }} </h4></td>

                            <td><h4><b> Transaction ID : </b></h4></td>
                            <td><h4> {{ $o->payment_id }} </h4></td>
                        </tr>

                    </table>
                </div>
            </div>

            <div
                class="col-lg-12 col-lg-push-10 col-md-12 col-md-push-9 col-sm-12 col-sm-push-9 col-xs-12 col-xs-push-8">
                <a class="btn btn-primary"
                   href="{{ route('upload.import',$o->id) }}">Student List</a></div>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card" style="margin-bottom: 50px;margin-left: 2rem;margin-right: 2rem">
                <div class="card-body">
                    <h1 class="cart-title text-center"> Student List </h1>

                    <form action="{{ route('upload.email',$o->id)}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">Resend Email</button>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col"><input type="checkbox" id="selectAll"></th>
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
                                <td><input type="checkbox" name="select[]" value="{{ $s->id }}"></td>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>

        $(document).ready(function () {
            $('#selectAll').click(function () {
                $("input[type='checkbox']").prop('checked', this.checked);
            })
        })

    </script>


    @endsection
