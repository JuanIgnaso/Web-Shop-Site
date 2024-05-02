<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, $id)
    {
        //validar
        $data = $request->validate(
            [
                'puntuacion' => ['required', 'min:1', 'max:5'],
                'cabecera' => ['required', 'max:120'],
                'review' => ['required', 'max:2000'],
                'recomendado' => ['required'],
                'producto' => ['exists:productos,id']
            ]
        );

        $review = Review::create(['cabecera' => $request->input('cabecera'), 'review' => $request->input('review'), 'producto' => $id, 'usuario' => \Auth::id(), 'recomendado' => (int) $request->input('recomendado'), 'puntuacion' => $request->input('puntuacion'), 'fecha_review' => Carbon::now()->toDateTimeString()]);
        return to_route('producto.details', $id)->with('message', 'Gracias por compartir tu opinión!');

    }
}
