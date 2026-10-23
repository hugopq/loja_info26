<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->isAdmin;
    }

    public function rules(): array
    {
        return [
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'cost'        => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'img'         => 'required|url', // O widget do Cloudinary devolve uma URL
        ];
    }

    public function messages(): array
    {
        return [
            'Name.required'        => 'O nome do produto é obrigatório.',
            'Description.required' => 'A descrição do produto é obrigatória.',
            'Cost.required'        => 'O preço é obrigatório.',
            'Cost.numeric'         => 'O preço deve ser um valor numérico.',
            'category_id.exists'   => 'A categoria selecionada não é válida.',
            'img.required'         => 'A imagem do produto é obrigatória.',
            'img.url'              => 'O formato da imagem não é válido.',
        ];
    }
}
