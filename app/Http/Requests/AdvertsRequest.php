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
           'email'=>'required|email|max:100',
           'phone'=>'required|min:11|max:30',
        ];
    }
    public function messages(){
        return [
            'description.required' => 'esse campo é obrigatório',
            'description.min' => 'campo deve ter no minimo 5 caracteres',
            'email.required' => 'esse campo é obrigatório',
            'email.email' => 'campo deve seguir este formato example@email.com',
            'email.max' => 'campo deve ter no máximo 100 caracteres',
            'phone.required' => 'esse campo é obrigatório', 
            'phone.min' => 'campo deve ter no mínimo 11 caracteres',
            'phone.max' => 'campo deve ter no máximo 30 caracteres',
        ];
    } 
}
