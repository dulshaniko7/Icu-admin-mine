@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <h2>CSV upload Page</h2>
            <p>Please Upload {{$order_qty}} students data as per order quantity.sample download is given below </p>
            <form action="{{route('user.import.store')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="order_qty" value="{{$order_qty}}">
                @if(session('errors'))
                    @foreach($errors as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                @endif
                @if(session('success'))
                    {{ session('success') }}
                @endif

                <br><br><br>

                <input type="file" name="file" id="file">
                <br>
                <button type="submit">Upload</button>
                <br><br><br>

                <a href="{{ url('/sample/students.csv') }}">Download sample</a>
            </form>
        </div>
    </div>
@endsection
