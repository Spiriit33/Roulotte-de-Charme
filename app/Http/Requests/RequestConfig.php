<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestConfig extends FormRequest
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
            'titre'=>'nullable',
            'email'=>'nullable|email',
            'telephone'=>'string|nullable',
            'logo'=>'nullable',
            'message_acceuil'=>'nullable',
            'images.*'=>'nullable|image|max:2048',
            'afficher_actu'=>'nullable',
        ];
    }
}
