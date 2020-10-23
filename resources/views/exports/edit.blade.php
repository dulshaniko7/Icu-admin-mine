@extends('layouts.admin')
@section('content')
    <div class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route("user.upload.update", [$product->id]) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                <label class="required" for="title">{{ trans('cruds.role.fields.title') }}</label>
                                <input class="form-control" type="text" name="title" id="title" value="{{ old('product_name', $product->product_name) }}" required>

                            </div>
                            <div class="form-group {{ $errors->has('permissions') ? 'has-error' : '' }}">
                                <label class="required" for="permissions">Students</label>
                                <div style="padding-bottom: 4px">
                                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                                </div>
                                <select class="form-control select2" name="permissions[]" id="permissions" multiple required>
                                    @foreach($students as $id => $students)
                                        <option value="{{ $id }}" {{ (in_array($id, old('students', [])) || $product->students->contains($id)) ? 'selected' : '' }}>{{ $students }}</option>
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


