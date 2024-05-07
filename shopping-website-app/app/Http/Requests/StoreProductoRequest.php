<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductoRequest extends FormRequest
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
            'nombreProducto' => ['required', 'unique:productos,nombreProducto'],
            'categoria' => ['required', 'exists:categorias,id'],
            'proveedor' => ['required', 'exists:proveedores,id'],
            'unidades' => ['required', 'numeric', 'min:0'],
            'precio' => ['required', 'numeric', 'min:0'],
            'descripcion' => ['nullable', 'max:5000']
        ];
    }

    //Sobreescribir el nombre del atributo
    public function attributes(): array
    {
        return [
            'precio' => 'precio de producto',
            'nombreProducto' => 'nombre de producto',
            'categoria' => 'categoria',
            'unidades' => 'Unidades de producto',
            'descripcion' => 'Descripción del Producto'
        ];
    }
}
