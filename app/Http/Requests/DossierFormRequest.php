<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DossierFormRequest extends FormRequest
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
            'date_saisie'=>'required|date',
            'code_tma' => 'required|integer',
            'type_tma'=> 'required|string',
            'type_dossier_tma'=> 'required|string',
            'type_document_tma'=> 'required|string',
            'document_tma'=> 'file|mimes:pdf,png,jpg,jpeg,bmp,svg',
        ];
    }
}
