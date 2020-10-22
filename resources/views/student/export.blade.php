@extends('layouts.admin')
@section('content')
hiiii
    @foreach($students as $student)
        {{$student->first_name}}
    @endforeach

@endsection
