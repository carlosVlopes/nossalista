<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LookupReservationsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'telefone' => ['required', 'string', 'max:30'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'telefone.required' => 'Por favor, informe seu telefone.',
        ];
    }
}
