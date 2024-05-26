<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate(
            [
                'nombreApellidos' => ['required', 'min:3'],
                'email' => ['required', 'email'],
                'direccion' => ['required', 'max:100'],
                'ciudad' => ['required', 'regex:/^[a-zA-Z ]+$/i'],
                'estado' => ['required', 'regex:/^[a-zA-Z ]+$/i'],
                'codigo_postal' => ['nullable', 'size:5', 'numeric'],
                'targeta_credito' => [
                    'regex:/[0-9]{16} (0[1-9]|1[1,2])(\/|-)(19|20)\d{2} [0-9]{3}/'
                ]
            ]
        );

        return to_route('dashboard')->with('message', 'Su orden ha sido procesada correctamente.');
    }
}
