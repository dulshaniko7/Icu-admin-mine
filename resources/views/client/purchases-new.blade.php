@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="text-center" style="margin-bottom: 2rem">My Purchases</h1>


    <div class="col-lg-12 col-md-12">
        <div class="card" style="margin-bottom: 10px">
            <div class="card-body">

                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                           <b>Assessment Name</b>
                        </th>
                        <th>
                            <b>Description</b>
                        </th>

                        <th>
                            <b>Quantity</b>
                        </th>
                        <th>
                            <b>Action</b>
                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>

                        </td>
                        <td>
                            {{ $order->product->product_name ?? '' }}
                        </td>
                        <td>
                            {{ $order->product->description ?? '' }}
                        </td>

                        <td>
                             {{ $order->quantity ?? '' }}
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('user.product.details',$order) }}">Details</a>

                        </td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>


</div>
@endsection
