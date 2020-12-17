<?php

namespace App\Http\Requests;

use Dotenv\Regex\Regex;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
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
        $id = $this->segment(2);
        return [
            'name' => "required|min:3|max:255|unique:products,name,{$id},id",
            'description' => 'required|min:3|max:10000',
            'price' =>"required|regex:/^\d+(\.\d{1,2}?$)/",
            'image' => 'nullable|image',
        ];

    }
    public function messages()
        {
            return[
                'name.required' => 'Nome obrigatoio!!!',
                'name.min' => 'Precisa Informar pelo Menos 5 caracteres!!!',
                'photo.required' => 'Precisa informar uma imagem!!!',
                'description.min' => 'Precisa Informar Pelo Menos 3 caracter'
            ];
        }
}

