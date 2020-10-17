@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.invoice.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.invoices.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                            <label class="required" for="price">{{ trans('cruds.invoice.fields.price') }}</label>
                            <input class="form-control" type="number" name="price" id="price" value="{{ old('price', '') }}" step="0.01" required>
                            @if($errors->has('price'))
                                <span class="help-block" role="alert">{{ $errors->first('price') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.price_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('total_tax') ? 'has-error' : '' }}">
                            <label for="total_tax">{{ trans('cruds.invoice.fields.total_tax') }}</label>
                            <input class="form-control" type="number" name="total_tax" id="total_tax" value="{{ old('total_tax', '') }}" step="0.01">
                            @if($errors->has('total_tax'))
                                <span class="help-block" role="alert">{{ $errors->first('total_tax') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.total_tax_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('total_price') ? 'has-error' : '' }}">
                            <label class="required" for="total_price">{{ trans('cruds.invoice.fields.total_price') }}</label>
                            <input class="form-control" type="number" name="total_price" id="total_price" value="{{ old('total_price', '') }}" step="0.01" required>
                            @if($errors->has('total_price'))
                                <span class="help-block" role="alert">{{ $errors->first('total_price') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.total_price_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('products') ? 'has-error' : '' }}">
                            <label class="required" for="products">{{ trans('cruds.invoice.fields.product') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="products[]" id="products" multiple required>
                                @foreach($products as $id => $product)
                                    <option value="{{ $id }}" {{ in_array($id, old('products', [])) ? 'selected' : '' }}>{{ $product }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('products'))
                                <span class="help-block" role="alert">{{ $errors->first('products') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.product_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('customer') ? 'has-error' : '' }}">
                            <label for="customer_id">{{ trans('cruds.invoice.fields.customer') }}</label>
                            <select class="form-control select2" name="customer_id" id="customer_id">
                                @foreach($customers as $id => $customer)
                                    <option value="{{ $id }}" {{ old('customer_id') == $id ? 'selected' : '' }}>{{ $customer }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('customer'))
                                <span class="help-block" role="alert">{{ $errors->first('customer') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.customer_helper') }}</span>
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