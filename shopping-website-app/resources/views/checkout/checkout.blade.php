        @section('title')
    {{$titulo}}
@endsection
<x-app-layout>
    <h1 class="p-3 px-12 text-darkBlue">{{$titulo}}</h1>
    <div class="grid min-h-screen grid-cols-3">
        <div class="order-2 col-span-3 p-2 pb-6 space-y-8 lg:col-span-2 sm:px-12 lg:order-1">
            {{-- Alerta de información --}}

            @if ($errors->any())
            <div class="w-full p-4 m-auto mt-4 mb-4 text-sm text-red-800 bg-red-100 rounded-lg " role="alert">
                <span class="font-base"><i class="fa-solid fa-xmark"></i></span> Error al rellenar el formulario, revisa abajo los posibles errores.
            </div>
            @else
            <div class="w-full p-4 m-auto mt-4 mb-4 text-sm text-blue-800 bg-blue-100 rounded-lg " role="alert">
                <span class="font-medium"><i class="fa-solid fa-circle-info"></i></span>  Completa tus detalles de pago y envío aquí abajo
            </div>
            @endif
            {{-- Formulario de envío --}}
            <div class="rounded-md">
                <form id="payment-form" method="POST" action="{{route('checkout.store')}}">
                    @csrf
                    <section>
                        <h2 class="my-2 text-lg font-semibold tracking-wide uppercase text-turquoiseMedium">Información de envío y facturación</h2>
                        <fieldset class="mb-3 text-gray-600 bg-white rounded shadow-lg">
                            <label class="flex items-center h-12 py-3 border-b border-gray-200">
                                <span class="px-2 font-bold text-right">Nombre</span>
                                <input name="nombreApellidos" value="{{old('nombreApellidos')}}" class="px-3 border-none focus:outline-none" placeholder="Nombre Apellido">
                            </label>
                            <label class="flex items-center h-12 py-3 border-b border-gray-200">
                                <span class="px-2 font-bold text-right">Email</span>
                                <p class="px-3 border-none focus:outline-none">{{Auth::user()->email}}</p>
                            </label>
                            <label class="flex items-center h-12 py-3 border-b border-gray-200">
                                <span class="px-2 font-bold text-right">Dirección</span>
                                <input name="direccion" value="{{old('direccion')}}" class="px-3 border-none focus:outline-none" placeholder="10 Street XYZ 654">
                            </label>
                            <label class="flex items-center h-12 py-3 border-b border-gray-200">
                                <span class="px-2 font-bold text-right">Ciudad</span>
                                <input name="ciudad" value="{{old('ciudad')}}" class="px-3 border-none focus:outline-none" placeholder="San Francisco">
                            </label>
                            <label class="inline-flex w-2/4 py-3 border-gray-200">
                                <span class="px-2 font-bold text-right">Estado/Provincia</span>
                                <input name="estado" value="{{old('estado')}}" class="px-3 border-none focus:outline-none" placeholder="CA">
                            </label>
                            <label class="flex items-center gap-2 py-3 border-t border-gray-200 xl:w-1/4 xl:inline-flex xl:border-none">
                                <span class="px-2 font-bold text-right xl:px-0 xl:text-none">Código Postal</span>
                                <input name="codigo_postal" value="{{old('codigo_postal')}}" class="px-3 border-none focus:outline-none" placeholder="98603">
                            </label>
                            <label class="relative flex items-center h-12 py-3 border-t border-gray-200 select">
                                <span class="px-2 font-bold text-right">País</span>
                                <div id="pais" class="flex items-center w-full px-3 focus:outline-none">
                                    <select name="pais" class="flex-1 bg-transparent border-none appearance-none cursor-pointer focus:outline-none">
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

            </div>
            {{--  --}}

            <div class="rounded-md">
                <section>
                    <h2 class="my-2 text-lg font-bold tracking-wide uppercase text-turquoiseMedium">Información de Pago</h2>
                    <fieldset class="mb-3 text-gray-600 bg-white rounded shadow-lg">
                        <label class="flex items-center h-12 py-3 border-b border-gray-200">
                            <span class="px-2 font-bold text-right">Tarjeta de Crédito</span>
                            <input name="tarjeta_credito[numero]" value="{{old('tarjeta_credito.numero')}}" class="w-full px-3 border-none focus:outline-none" placeholder="Numero targeta y CVC">
                            <input class="border-none focus:outline-none" type="text" name="tarjeta_credito[tarjetafecha]" value="{{old('tarjeta_credito.tarjetafecha')}}" id="" placeholder="Fecha de caducidad MM/YY">
                        </label>
                    </fieldset>
                </section>
            </div>



            @if(count($errors) != 0)
            <div class="p-4 text-sm text-red-800 bg-red-100 rounded-md">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif



            <button type="submit" onclick="complete_checkout()" id="pagar" class="w-full px-4 py-3 text-xl font-semibold transition-colors rounded-full primary-button focus:outline-none">
                Pagar €846.98
            </button>
        </div>
    </form>
        {{-- Resumen de la compra --}}
        <div class="order-1 col-span-3 bg-white lg:col-span-1 lg:order-2">
            <h2 class="px-8 py-6 text-xl border-b-2 text-turquoiseMedium">Resumen del Pedido</h2>
            <ul class="px-8 py-6 space-y-6 border-b" id="resumen-compra">
                {{-- Mostrar los elementos del carrito aquí --}}

            </ul>
            <div class="px-8 border-b">
                <div class="flex justify-between py-4 text-gray-600">
                    <span>Subtotal</span>
                    <span class="font-semibold text-eternity" id="subtotal">€846.98</span>
                </div>
                <div class="flex justify-between py-4 text-gray-600">
                    <span>Gastos Envío</span>
                    <span class="font-semibold text-eternity">Gratis</span>
                </div>
            </div>
            <div class="flex justify-between px-8 py-8 text-xl font-semibold text-gray-600">
                <span class="berkshire text-eternity">Total</span>
                <span id="precio-final">€846.98</span>
            </div>
        </div>
    </div>
    <script src="{{Vite::asset('resources/js/purchaseResume.js')}}"></script>
</x-app-layout>