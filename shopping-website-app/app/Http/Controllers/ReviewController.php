<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;

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
        $review->create(['cabecera' => $request->input('cabecera'), 'review' => $request->input('review'), 'producto' => $id, 'usuario' => \Auth::id(), 'recomendado' => $request->input('recomendado'), 'puntuacion' => $request->input('puntuacion')]);
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

    /**
     * Actualiza la review del usuario
     * @param Request $request - Petición entrante
     * @param $id - ID de la review a modificars
     */
    public function update(Request $request, $id)
    {
        $review = Review::find($id);
        if ($review->usuario == \Auth::id()) {
            $data = $request->validate(
                [
                    'cabecera' => ['required', 'max:120'],
                    'review' => ['required', 'max:2000'],
                    'recomendado' => ['required'],
                    'puntuacion' => ['required', 'min:1', 'max:5']
                ]
            );
            $review->update($data);
            return redirect(\URL::previous())->with('message', 'Review actualizada!');
        } else {
            return redirect(\URL::previous())->with('error', 'No puedes modificar reviews hechas por otros usuarios!.');
        }

    }

    public function index(Request $request)
    {
        //cabecera,review,usuario,producto

        $titulo = 'Panel de reviews';
        return view('review.index', [
            'titulo' => $titulo,
            'reviews' => $this->filter($request, ['reviews.*', 'users.name', 'productos.nombreProducto']),
            'usuarios' => User::select()->get(),
            'productos' => Producto::select()->get()
        ]);
    }

    private function filter(Request $request, $fields)
    {
        return Review::select($fields)->when(isset($request->cabecera), function ($query) use ($request) {
            return $query->where('cabecera', 'LIKE', "%{$request->cabecera}%");
        })->when(isset($request->review), function ($query) use ($request) {
            return $query->where('review', 'LIKE', "%{$request->review}%");
        })->when(isset($request->usuario), function ($query) use ($request) {
            return $query->whereIn('usuario', $request->usuario);
        })->when(isset($request->producto), function ($query) use ($request) {
            return $query->whereIn('producto', $request->producto);
        })->leftJoin('users', 'reviews.usuario', '=', 'users.id')->leftJoin('productos', 'reviews.producto', '=', 'productos.id')->orderBy('id', 'desc')->paginate(env('PAGINATION_LENGTH'));
    }

}
