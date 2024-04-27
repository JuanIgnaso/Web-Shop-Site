<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function contactUs()
    {
        $titulo = 'Contáctanos';
        return view('contact.index', ['titulo' => $titulo]);
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => ['required', 'min:4'],
                'apellidos' => ['required'],
                'telefono' => ['nullable', 'regex:/[0-9]{9}/'],
                'email' => ['email', 'required'],
                'mensaje' => ['required', 'max:3000']
            ]
        );
        return to_route('dashboard')->with('message', 'Gracias por contactar con nosotros!');
    }
}
