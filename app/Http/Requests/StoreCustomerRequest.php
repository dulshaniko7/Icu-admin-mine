<?php

namespace App\Http\Requests;

use App\Customer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('customer_create');
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
                'unique:customers',
            ],
            'password'       => [
                'required',
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
