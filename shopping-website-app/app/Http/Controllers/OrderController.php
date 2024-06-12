<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
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
                'codigo_postal' => ['nullable', 'between:10000,99999', 'numeric'],
                'targeta_credito' => [
                    'regex:/[0-9]{16} (0[1-9]|1[1,2])(\/|-)(19|20)\d{2} [0-9]{3}/'
                ]
            ]
        );

        return to_route('dashboard')->with('message', 'Su orden ha sido procesada correctamente.');
    }

    /*Manipular Session*/
    //crear -> put('key',data)
    //obtener -> get('key')
    //borrar -> forget('key') Ej: session()->forget('key');
    //añadir valores ->push('key','value to add')
    //existe? -> has('key')

    /**
     * Añadir objeto a carrito del usuario
     */
    public function addToCart(Request $request)
    {
        //Lanzar error 404 si no encuentra el producto
        if (!Producto::find($request->mensaje['producto'])) {
            session()->flash('error', 'El producto especificado no existe!.');
            abort(400);
        }

        $producto = Producto::select(['productos.*', \DB::raw('(select imagen from fotosProducto where producto  =   productos.id limit 1) as imagen'), 'categorias.nombre_categoria', 'proveedores.nombre_proveedor', 'proveedores.website'])->leftJoin('proveedores', 'productos.proveedor', '=', 'proveedores.id')->leftJoin('categorias', 'productos.categoria', '=', 'categorias.id')->find($request->mensaje['producto']);

        $cart = session()->get('user_' . \Auth::id() . '_cart');

        if (!$cart) {
            //Si no existe se crea con el primero objeto
            $cart = [
                $producto->id => [
                    "nombre" => $producto->nombreProducto,
                    "cant" => $request->mensaje['cant'],
                    "precio" => $producto->precio,
                    "foto" => $producto->imagen == NULL ? \Vite::asset('resources/images/web-logo.png') : url('storage/' . $producto->imagen),
                    'descripcion' => $producto->descripcion
                ]
            ];
        } else {
            $cart[$producto->id] =
                [
                    "nombre" => $producto->nombreProducto,
                    "cant" => isset($cart[$producto->id]) ? $cart[$producto->id]['cant'] + (int) $request->mensaje['cant'] : $request->mensaje['cant'],
                    "precio" => $producto->precio,
                    "foto" => $producto->imagen == NULL ? \Vite::asset('resources/images/web-logo.png') : url('storage/' . $producto->imagen),
                    'descripcion' => $producto->descripcion
                ];
        }



        session()->put('user_' . \Auth::id() . '_cart', $cart);

        return response()->json(session()->get('user_' . \Auth::id() . '_cart'));
    }

    /**
     * Eliminar del carrito del usuario
     */
    public function removeFromCart(Request $request)
    {
        //Se busca dentro del array por la clave que coincida y se hace un unset
        if ($request->id) {
            $cart = session()->get('user_' . \Auth::id() . '_cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('user_' . \Auth::id() . '_cart', $cart);
            }

        }
        return response()->json(session()->get('user_' . \Auth::id() . '_cart'));
    }


    /**
     * Enviar el carrito del usuario para cargar en la vista
     */
    public function getUserCart()
    {
        if (session()->has('user_' . \Auth::id() . '_cart')) {
            if (count(session()->get('user_' . \Auth::id() . '_cart')) == 0) {
                session()->forget('user_' . \Auth::id() . '_cart');
            } else {
                return response()->json(session()->get('user_' . \Auth::id() . '_cart'));
            }
        } else {
            return response()->json(["hola" => "algo salió mal."], 404); //texto de error o array de errores que quieres mostrarle al usuario (se lo  envias a Ajax)
        }
    }

    public function checkout()
    {
        if (!session()->has('user_' . \Auth::id() . '_cart')) {
            return redirect(url()->previous())->with('error', 'No puedes acceder al Checkout mientras tu cesta esté vacía.');
        }
        return view('checkout.checkout', ['titulo' => 'Finalizar Compra']);
    }
}
