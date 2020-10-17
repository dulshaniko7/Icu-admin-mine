@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.tax.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.taxes.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('tax_name') ? 'has-error' : '' }}">
                            <label class="required" for="tax_name">{{ trans('cruds.tax.fields.tax_name') }}</label>
                            <input class="form-control" type="text" name="tax_name" id="tax_name" value="{{ old('tax_name', '') }}" required>
                            @if($errors->has('tax_name'))
                                <span class="help-block" role="alert">{{ $errors->first('tax_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tax.fields.tax_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tax_percentage') ? 'has-error' : '' }}">
                            <label for="tax_percentage">{{ trans('cruds.tax.fields.tax_percentage') }}</label>
                            <input class="form-control" type="number" name="tax_percentage" id="tax_percentage" value="{{ old('tax_percentage', '') }}" step="0.01">
                            @if($errors->has('tax_percentage'))
                                <span class="help-block" role="alert">{{ $errors->first('tax_percentage') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tax.fields.tax_percentage_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('countries') ? 'has-error' : '' }}">
                            <label for="countries">{{ trans('cruds.tax.fields.country') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="countries[]" id="countries" multiple>
                                @foreach($countries as $id => $country)
                                    <option value="{{ $id }}" {{ in_array($id, old('countries', [])) ? 'selected' : '' }}>{{ $country }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('countries'))
                                <span class="help-block" role="alert">{{ $errors->first('countries') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.tax.fields.country_helper') }}</span>
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