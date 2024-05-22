        @section('title')
    {{$titulo}}
@endsection
<x-app-layout>
    <h1 class="px-12 p-3 text-darkBlue">{{$titulo}}</h1>
    <div class="min-h-screen grid grid-cols-3">
        <div class="lg:col-span-2 col-span-3 space-y-8 p-2 sm:px-12 pb-6 order-2 lg:order-1">
            {{-- Alerta de información --}}
            <div class="p-4 mb-4 w-full m-auto text-sm mt-4 text-blue-800 rounded-lg bg-blue-100 " role="alert">
                <span class="font-medium"><i class="fa-solid fa-circle-info"></i></span>  Completa tus detalles de pago y envío aquí abajo
            </div>

            {{-- Formulario de envío --}}
            <div class="rounded-md">
                <form id="payment-form" method="POST" action="">
                    @csrf
                    <section>
                        <h2 class="uppercase tracking-wide text-lg font-semibold text-turquoiseMedium my-2">Información de envío y facturación</h2>
                        <fieldset class="mb-3 bg-white shadow-lg rounded text-gray-600">
                            <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                                <span class="text-right px-2 font-bold">Nombre</span>
                                <input name="nombreApellidos" class="focus:outline-none border-none px-3" placeholder="Nombre Apellido" required="">
                            </label>
                            <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                                <span class="text-right px-2 font-bold">Email</span>
                                <input name="email" type="email" class="focus:outline-none border-none px-3" placeholder="prueba@example.com" required="">
                            </label>
                            <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                                <span class="text-right px-2 font-bold">Dirección</span>
                                <input name="direccion" class="focus:outline-none px-3 border-none" placeholder="10 Street XYZ 654">
                            </label>
                            <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                                <span class="text-right px-2 font-bold">Ciudad</span>
                                <input name="ciudad" class="focus:outline-none px-3 border-none" placeholder="San Francisco">
                            </label>
                            <label class="inline-flex w-2/4 border-gray-200 py-3">
                                <span class="text-right px-2 font-bold">Estado/Provincia</span>
                                <input name="estado" class="focus:outline-none px-3 border-none" placeholder="CA">
                            </label>
                            <label class="xl:w-1/4 xl:inline-flex gap-2 items-center flex xl:border-none border-t border-gray-200 py-3">
                                <span class="text-right px-2 xl:px-0 xl:text-none font-bold">Código Postal</span>
                                <input name="codigo_postal" class="focus:outline-none px-3 border-none" placeholder="98603">
                            </label>
                            <label class="flex border-t border-gray-200 h-12 py-3 items-center select relative">
                                <span class="text-right px-2 font-bold">País</span>
                                <div id="pais" class="focus:outline-none px-3 w-full flex items-center">
                                    <select name="pais" class="border-none bg-transparent flex-1 cursor-pointer appearance-none focus:outline-none">
                                        <option value="AU">Australia</option>
                                        <option value="BE">Belgium</option>
                                        <option value="BR">Brazil</option>
                                        <option value="CA">Canada</option>
                                        <option value="CN">China</option>
                                        <option value="DK">Denmark</option>
                                        <option value="FI">Finland</option>
                                        <option value="FR">France</option>
                                        <option value="DE">Germany</option>
                                        <option value="HK">Hong Kong</option>
                                        <option value="IE">Ireland</option>
                                        <option value="IT">Italy</option>
                                        <option value="JP">Japan</option>
                                        <option value="LU">Luxembourg</option>
                                        <option value="MX">Mexico</option>
                                        <option value="NL">Netherlands</option>
                                        <option value="PL">Poland</option>
                                        <option value="PT">Portugal</option>
                                        <option value="SG">Singapore</option>
                                        <option value="ES">Spain</option>
                                        <option value="TN">Tunisia</option>
                                        <option value="GB">United Kingdom</option>
                                        <option value="US" selected="selected">United States</option>
                                    </select>
                                </div>
                            </label>
                        </fieldset>
                    </section>
                </form>
            </div>
            {{--  --}}

            <div class="rounded-md">
                <section>
                    <h2 class="uppercase tracking-wide text-lg font-bold text-turquoiseMedium my-2">Información de Pago</h2>
                    <fieldset class="mb-3 bg-white shadow-lg rounded text-gray-600">
                        <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                            <span class="text-right px-2 font-bold">Tarjeta de Crédito</span>
                            <input name="card" class="focus:outline-none border-none px-3 w-full" placeholder="Card number MM/YY CVC" required="">
                        </label>
                    </fieldset>
                </section>
            </div>
            <button type="submit" id="pagar" class="submit-button px-4 py-3 rounded-full bg-darkOrange hover:bg-orange-500 text-white focus:ring focus:outline-none w-full text-xl font-semibold transition-colors">
                Pagar €846.98
            </button>
        </div>

        {{-- Resumen de la compra --}}
        <div class="col-span-3 lg:col-span-1 bg-white order-1 lg:order-2">
            <h2 class="py-6 border-b-2 text-xl text-turquoiseMedium px-8">Resumen del Pedido</h2>
            <ul class="py-6 border-b space-y-6 px-8" id="resumen-compra">
                {{-- Mostrar los elementos del carrito aquí --}}

            </ul>
            <div class="px-8 border-b">
                <div class="flex justify-between py-4 text-gray-600">
                    <span>Subtotal</span>
                    <span class="font-semibold text-pink-500">€846.98</span>
                </div>
                <div class="flex justify-between py-4 text-gray-600">
                    <span>Shipping</span>
                    <span class="font-semibold text-pink-500">Free</span>
                </div>
            </div>
            <div class="font-semibold text-xl px-8 flex justify-between py-8 text-gray-600">
                <span>Total</span>
                <span id="precio-final">€846.98</span>
            </div>
        </div>
    </div>
    <script src="{{Vite::asset('resources/js/purchaseResume.js')}}"></script>
</x-app-layout>