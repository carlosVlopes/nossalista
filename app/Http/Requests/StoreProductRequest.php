<?php

namespace App\Http\Requests;

use App\Enums\ProductStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'categoria' => ['required', 'string', 'max:255'],
            'nome' => ['required', 'string', 'max:255'],
            'descricao' => ['nullable', 'string'],
            'imagem' => ['nullable', 'image', 'max:4096'],
            'link' => ['nullable', 'url', 'max:2048'],
            'status' => ['required', Rule::enum(ProductStatus::class)],
            'ordem' => ['nullable', 'integer', 'min:0'],
        ];
    }
}
