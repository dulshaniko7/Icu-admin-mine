@extends('layouts.admin')

@section('content')
    <div class="container">
<div class="row mt-4">
    <div class="col-md-4 col-sm-6 ">
        <h2>Checkout</h2>
        <h5>Total Tax: {{ $tax1}}</h5>
        <h5>Total Tax: {{ $tax2}}</h5>
        <h4>Your Total: {{ $total }}$</h4>

        <form action=""></form>
    </div>
</div>
    </div>
@endsection
