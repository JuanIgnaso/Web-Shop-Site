<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ContactWebSite;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        $this->sendContactMail($request);

        return to_route('dashboard')->with('success', 'Gracias por contactar con nosotros!');
    }

    private function sendContactMail(Request $request)
    {
        $message = [
            'usuario' => $request->nombre . ' ' . $request->apellidos,
            'mensaje' => $request->mensaje,
            'email' => $request->email
        ];
        \Mail::to(env('MAIL_CONTACT_TO'))->send(new ContactWebSite($message));
    }
}
