<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\OrderConfirmation;
use App\Mail\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /*
    Para enviar emails se le necesita configurar un proveedor
    email provider -> mailtrap
    */
    public function sendMail()
    {
        Mail::to('juanford55@gmail.com')->send(new OrderConfirmation());
    }
}
