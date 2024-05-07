<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProveedorRequest extends FormRequest
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
            'nombre_proveedor' => ['required', 'unique:proveedores,nombre', 'between:2,50'],
            'direccion' => ['required', 'unique:proveedores,direccion', 'between:3,100'],
            'email' => ['required', 'unique:proveedores,email', 'email'],
            'website' => ['url'],
            'telefono' => ['regex:/[0-9]{9}/']
        ];
    }

    //Sobreescribir el nombre del atributo
    public function attributes(): array
    {
        return [
            'nombre_proveedor' => 'Nombre del Proveedor'
        ];
    }
}
