<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeDossierFormRequest extends FormRequest
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
            'date_saisie' => 'required|date',
            'type_dossier_tma' => 'required|string',
        ];
    }
}
