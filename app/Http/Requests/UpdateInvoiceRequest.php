<?php

namespace App\Http\Requests;

use App\Invoice;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('invoice_edit');
    }

    public function rules()
    {
        return [
            'price'       => [
                'required',
            ],
            'total_price' => [
                'required',
            ],
            'products.*'  => [
                'integer',
            ],
            'products'    => [
                'required',
                'array',
            ],
        ];
    }
}
