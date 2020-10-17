@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.customer.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.customers.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('customer_name') ? 'has-error' : '' }}">
                            <label class="required" for="customer_name">{{ trans('cruds.customer.fields.customer_name') }}</label>
                            <input class="form-control" type="text" name="customer_name" id="customer_name" value="{{ old('customer_name', '') }}" required>
                            @if($errors->has('customer_name'))
                                <span class="help-block" role="alert">{{ $errors->first('customer_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.customer.fields.customer_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label class="required" for="email">{{ trans('cruds.customer.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" required>
                            @if($errors->has('email'))
                                <span class="help-block" role="alert">{{ $errors->first('email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.customer.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label class="required" for="password">{{ trans('cruds.customer.fields.password') }}</label>
                            <input class="form-control" type="password" name="password" id="password" required>
                            @if($errors->has('password'))
                                <span class="help-block" role="alert">{{ $errors->first('password') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.customer.fields.password_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('remember_token') ? 'has-error' : '' }}">
                            <label for="remember_token">{{ trans('cruds.customer.fields.remember_token') }}</label>
                            <input class="form-control" type="text" name="remember_token" id="remember_token" value="{{ old('remember_token', '') }}">
                            @if($errors->has('remember_token'))
                                <span class="help-block" role="alert">{{ $errors->first('remember_token') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.customer.fields.remember_token_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
                            <label class="required" for="country_id">{{ trans('cruds.customer.fields.country') }}</label>
                            <select class="form-control select2" name="country_id" id="country_id" required>
                                @foreach($countries as $id => $country)
                                    <option value="{{ $id }}" {{ old('country_id') == $id ? 'selected' : '' }}>{{ $country }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('country'))
                                <span class="help-block" role="alert">{{ $errors->first('country') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.customer.fields.country_helper') }}</span>
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