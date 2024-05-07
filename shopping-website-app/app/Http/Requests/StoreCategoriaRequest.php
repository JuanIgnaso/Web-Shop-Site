<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoriaRequest extends FormRequest
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
            'nombre_categoria' => ['required', 'unique:categorias,nombre'],
            'categoriaPadre' => ['exists:categorias,id', 'nullable']
        ];
    }

    public function attributes(): array
    {
        return [
            'nombre_categoria' => 'Nombre de Categoría',
            'categoriaPadre' => 'Categoría Padre'
        ];
    }
}
