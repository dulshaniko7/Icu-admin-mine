@extends('layouts.admin')
@section('content')
    <div class="row container">
<h3>Assign students for {{ $product->product_name }} </h3>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <form method="POST" action="{{route('user.upload.store',$product->id)}}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label class="required" for="product">Product</label>
                                <input class="form-control" type="text" name="product" id="title" value="{{ $product->product_name }}" required>
                                <input class="form-control" type="hidden" name="product_id" id="title" value="{{ $product->id }}" >
                            </div>

                            <div class="form-group">
                                <label class="required" for="students">Students</label>
                                <div style="padding-bottom: 4px">
                                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                                </div>
                                <select class="form-control select2" name="students[]" id="students" multiple required>
                                    @foreach($students as $id => $students)
                                        <option value="{{ $id }}">{{ $students->email}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <button class="btn btn-danger" type="submit">
                                    {{ trans('global.save') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection
