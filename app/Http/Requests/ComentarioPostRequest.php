<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComentarioPostRequest extends FormRequest
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
            "email" => "required|max:255",
            "comentario" => "required|max:255"
        ];
    }

    public function messages()
    {
        return [
            "email.required" => "Campo e-mail está vazio.",
            "email.max" => "Campo e-mail tem tamanho máximo de 255 caracteres.",
            "comentario.required" => "Campo comentário está vazio.",
            "comentario.max" => "Campo comentário tem tamanho máximo de 255 caracteres.",
        ];
    }
}
