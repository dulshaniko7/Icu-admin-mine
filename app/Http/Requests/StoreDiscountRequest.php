<?php

namespace App\Http\Requests;

use App\Discount;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDiscountRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('discount_create');
    }

    public function rules()
    {
        return [
            'discount_percentage' => [
                'numeric',
            ],
            'discount_name'       => [
                'string',
                'required',
            ],
        ];
    }
}
