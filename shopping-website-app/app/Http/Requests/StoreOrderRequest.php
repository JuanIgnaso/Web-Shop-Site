<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'nombreApellidos' => ['required', 'min:3'],
            'direccion' => ['required', 'max:100'],
            'ciudad' => ['required', 'regex:/^[a-zA-Z ]+$/i'],
            'estado' => ['required', 'regex:/^[a-zA-Z ]+$/i'],
            'codigo_postal' => ['nullable', 'between:10000,99999', 'numeric'],
            'tarjeta_credito.numero' => [
                'regex:/[0-9]{16} [0-9]{3}/'
            ],
            'tarjeta_credito.tarjetafecha' => ['required', 'date_format:m/y', 'after_or_equal:' . now()->format('m/y')]
        ];
    }

    public function attributes(): array
    {
        return [
            'tarjeta_credito.numero' => 'número de tarjeta',
            'tarjeta_credito.tarjetafecha' => 'fecha de caducidad',
            'codigo_postal' => 'código postal'
        ];
    }
}
