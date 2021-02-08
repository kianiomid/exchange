<?php

namespace App\Http\Requests;

use App\Helpers\Util;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules = [
            'email' => 'required|string|email|max:255',
            'source_currency' => 'required|string',
            'destination_currency' => 'required|string',
            'price_source_currency' => 'required|numeric',
        ];

        return $rules;
    }

    /**
     *
     */
    public function prepareForValidation()
    {
        $this->merge([
            'price_source_currency' => Util::convert_to_english_numbers($this->input('price_source_currency'))
        ]);
    }
}
