<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestReservation extends FormRequest
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
            'date_debut'=>'required_with:date_fin|date|after:'.now().'',
            'date_fin'=>'required_with:date_debut|date|after:date_debut,'.now().'',
            'nom'=>'required|string|max:255,',
            'email'=>'required|email|max:255',
            'commentaire'=>'required',
            'nombre_personnes'=>'required',
            'g-recaptcha-response' => 'required|captcha',
        ];
    }
}
