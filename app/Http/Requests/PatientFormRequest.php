<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'Date_de_Naissance'=>'required|date',
        ];
    }
}
