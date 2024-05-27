<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function cfgetData(Request $request)
    {
        // Your logic to fetch the data goes here
        // For example, you could fetch data from the database
        $request->session()->put('mensaje' . \Auth::id(), $request->mensaje);
        return response()->json($request->session()->get('mensaje' . \Auth::id()));

        /*Manipular Session*/
        //crear -> put('key',data)
        //obtener -> get('key')
        //borrar -> forget('key')
        //añadir valores ->push('key','value to add')
        //existe? -> has('key')
    }

    /**
     * Añadir objeto a carrito del usuario
     */
    public function addToCart(Request $request)
    {
        //session()->forget('user_' . \Auth::id() . '_cart');
        if (!session()->has('user_' . \Auth::id() . '_cart')) {
            session()->put('user_' . \Auth::id() . '_cart', collect([$request->mensaje]));
        } else {
            session()->push('user_' . \Auth::id() . '_cart', $request->mensaje);
        }
        return response()->json(session()->get('user_' . \Auth::id() . '_cart'));

    }

    /**
     * Eliminar del carrito del usuario
     */
    public function removeFromCart(Request $request)
    {

        $filtered = session()->get('user_' . \Auth::id() . '_cart')->filter(function ($value, $key) use ($request) {
            return $value['producto']['id'] != $request->id;
        });

        session()->put('user_' . \Auth::id() . '_cart', collect($filtered));
        return response()->json(session()->get('user_' . \Auth::id() . '_cart'));

    }

    /**
     * Enviar el carrito del usuario para cargar en la vista
     */
    public function getUserCart(Request $request)
    {
        if (!session()->has('user_' . \Auth::id() . '_cart')) {
            return response()->json($request->session()->get('user_' . \Auth::id() . '_cart'));
        }
    }
}
