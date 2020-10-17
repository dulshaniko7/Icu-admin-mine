<?php

namespace App\Http\Requests;

use App\Customer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('customer_edit');
    }

    public function rules()
    {
        return [
            'customer_name'  => [
                'string',
                'required',
            ],
            'email'          => [
                'required',
                'unique:customers,email,' . request()->route('customer')->id,
            ],
            'remember_token' => [
                'string',
                'nullable',
            ],
            'country_id'     => [
                'required',
                'integer',
            ],
        ];
    }
}
