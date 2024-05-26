<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function contactUs()
    {
        $titulo = 'Contáctanos';
        return view('contact.index', ['titulo' => $titulo]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate(
            [
                'nombre' => ['required', 'min:4'],
                'apellidos' => ['required'],
                'telefono' => ['nullable', 'regex:/[0-9]{9}/'],
                'email' => ['email', 'required'],
                'mensaje' => ['required', 'max:3000'],
                'terminos' => ['required']
            ]
        );
        return to_route('dashboard')->with('message', 'Gracias por contactar con nosotros!');
    }
}
