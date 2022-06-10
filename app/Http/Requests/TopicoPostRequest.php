<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopicoPostRequest extends FormRequest
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
            "topico" => "required"
        ];
    }

    public function messages()
    {
        return[
            "topico.required"=>"Campo tópico está vazio."
        ];
    }
}
