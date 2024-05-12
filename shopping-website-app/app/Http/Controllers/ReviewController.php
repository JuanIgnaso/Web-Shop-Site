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
        $data = $request->validate(
            [
                'puntuacion' => ['required', 'min:1', 'max:5'],
                'cabecera' => ['required', 'max:120'],
                'review' => ['required', 'max:2000'],
                'recomendado' => ['required'],
                'producto' => ['exists:productos,id']
            ]
        );

        $review = new Review();

        //Si el producto ya tiene una review del usuario se le notifica al usuario con un error.
        if ($review->isProductReviewed($id)) {
            return to_route('producto.details', $id)->with('error', 'Ya has opinado sobre este producto!');
        }

        //Si el usuario aún no ha opinado sobre el producto
        $review->create(['cabecera' => $request->input('cabecera'), 'review' => $request->input('review'), 'producto' => $id, 'usuario' => \Auth::id(), 'recomendado' => $request->input('recomendado'), 'puntuacion' => $request->input('puntuacion'), 'fecha_review' => Carbon::now()->toDateTimeString()]);
        return to_route('producto.details', $id)->with('message', 'Gracias por compartir tu opinión!');

    }

    public function destroy($id)
    {
        $review = Review::find($id);
        if ($review->usuario == \Auth::id() || \Auth::user()->claseUsuario == 3) {
            $review->delete();
            return redirect(\URL::previous())->with('message', 'Review ha sido borrada');
        } else {
            abort(403);
        }
    }

    public function index(Request $request)
    {
        $titulo = 'Panel de reviews';
        return view('review.index', [
            'titulo' => $titulo,
            'reviews' => Review::select('reviews.*', 'users.name', 'productos.nombreProducto')->leftJoin('users', 'reviews.usuario', '=', 'users.id')->leftJoin('productos', 'reviews.producto', '=', 'productos.id')->orderBy('id', 'desc')->paginate(env('PAGINATION_LENGTH'))
        ]);
    }

}
