<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvertsRequest extends FormRequest
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
        return [
            'description' => 'required|string|max:150',
        ];
    }
    public function messages()
    {
        return [
            'description.required' => 'esse campo é obrigatório',
            'description.min' => 'campo deve ter no minimo 5 caracteres',
        ];
    }
}
