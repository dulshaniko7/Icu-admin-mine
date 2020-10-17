@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.discount.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.discounts.update", [$discount->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('discount_percentage') ? 'has-error' : '' }}">
                            <label for="discount_percentage">{{ trans('cruds.discount.fields.discount_percentage') }}</label>
                            <input class="form-control" type="number" name="discount_percentage" id="discount_percentage" value="{{ old('discount_percentage', $discount->discount_percentage) }}" step="0.01">
                            @if($errors->has('discount_percentage'))
                                <span class="help-block" role="alert">{{ $errors->first('discount_percentage') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.discount.fields.discount_percentage_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('discount_name') ? 'has-error' : '' }}">
                            <label class="required" for="discount_name">{{ trans('cruds.discount.fields.discount_name') }}</label>
                            <input class="form-control" type="text" name="discount_name" id="discount_name" value="{{ old('discount_name', $discount->discount_name) }}" required>
                            @if($errors->has('discount_name'))
                                <span class="help-block" role="alert">{{ $errors->first('discount_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.discount.fields.discount_name_helper') }}</span>
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