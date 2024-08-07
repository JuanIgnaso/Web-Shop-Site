@section('title')
    {{ $titulo}}
@endsection

<x-app-layout>
<!-- component -->
<!-- This is an example component -->
<div>
  <div class="py-6">
    <div class="px-4 mx-auto mt-6 max-w-7xl sm:px-6 lg:px-8">

        {{-- BreadCrumb --}}
        <nav class="flex mb-4" aria-label="Breadcrumb">
          <ol class="inline-flex items-center space-x-2 justify-self-center md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
              <a href="{{route('dashboard')}}" class="inline-flex items-center text-sm font-medium text-shingleFawn hover:text-eternity">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
                Inicio
              </a>
            </li>
            <li>
              <x-breadcrumb.list-element :text="'Productos'" :url="route('producto.list',$producto->categoria)"></x-breadcrumb.list-element>
            </li>
            <li aria-current="page">
              <div class="flex items-center">
                <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="text-sm font-medium text-gray-500 ms-1 md:ms-2 dark:text-gray-400">{{ucfirst($producto->nombreProducto)}}</span>
              </div>
            </li>
          </ol>
        </nav>


      <section class="flex flex-col -mx-4 md:flex-row">
        <div class="px-4 md:flex-1">
          <div x-data="{ image: 1 }" x-cloak>
            <div class="h-64 mb-4 bg-gray-100 rounded-lg md:h-80">

              {{-- Aquí se muestran las fotos del producto --}}

              <div x-show="image === 1" class="flex items-center justify-center h-64 mb-4 bg-gray-100 rounded-lg md:h-80">
                <img src="{{isset($imagenes[0]) ? url('storage/'.$imagenes[0]['imagen']) : Vite::asset('resources/images/web-logo.png') }}" class="object-cover w-full h-full rounded-lg" alt="{{isset($imagenes[0]['alt']) ? $imagenes[0]['alt'] : 'foto de ejemplo'}}">
              </div>

              <div x-show="image === 2" class="flex items-center justify-center h-64 mb-4 bg-gray-100 rounded-lg md:h-80">
                <img src="{{ isset($imagenes[1]['imagen']) ? url('storage/'.$imagenes[1]['imagen']) : Vite::asset('resources/images/web-logo.png') }}" class="object-cover w-full h-full rounded-lg" alt="{{isset($imagenes[1]['alt']) ? $imagenes[1]['alt'] : 'foto de ejemplo'}}">
              </div>

              <div x-show="image === 3" class="flex items-center justify-center h-64 mb-4 bg-gray-100 rounded-lg md:h-80">
                <img src="{{ isset($imagenes[2]) ? url('storage/'.$imagenes[2]['imagen']) : Vite::asset('resources/images/web-logo.png') }}" class="object-cover w-full h-full rounded-lg" alt="{{isset($imagenes[2]['alt']) ? $imagenes[2]['alt'] : 'foto de ejemplo'}}">
              </div>

              <div x-show="image === 4" class="flex items-center justify-center h-64 mb-4 bg-gray-100 rounded-lg md:h-80">
                <img src="{{ isset($imagenes[3]) ? url('storage/'.$imagenes[3]['imagen']) : Vite::asset('resources/images/web-logo.png') }}" class="object-cover w-full h-full rounded-lg" alt="{{isset($imagenes[3]['alt']) ? $imagenes[3]['alt'] : 'foto de ejemplo'}}">
              </div>


            </div>

            <div class="flex mb-4 -mx-2">
              <template x-for="i in 4">
                <div class="flex-1 px-2">
                  <button x-on:click="image = i" :class="{ 'ring-4 ring-coldPurple ring-inset': image === i }" class="flex items-center justify-center w-full h-24 bg-white rounded-lg shadow-lg focus:outline-none md:h-32">
                    <span x-text="i" class="text-2xl"></span>
                  </button>
                </div>
              </template>
            </div>
          </div>
        </div>
        <div class="px-4 md:flex-1">
          <h2 class="mb-2 text-2xl font-extrabold leading-tight tracking-tight text-lochinvar md:text-3xl">{{ucfirst($producto->nombreProducto)}}</h2>


          {{-- Rating --}}
          <x-ui.element-rating :review="$reviews"></x-ui.element-rating>
          {{-- ------ --}}

          <p class="text-sm text-gray-500">By <a href="{{$producto->website == NULL ? '' : $producto->website}}" class="text-turquoiseMedium hover:underline">{{ucfirst($producto->nombre_proveedor)}}</a> | Marca del Producto</p>

          <div class="flex items-center my-4 space-x-4">
            <div>
              <div class="flex px-3 py-2 rounded-lg">
                <span class="mt-1 mr-1 text-darkBlue">$</span>
                <span class="text-3xl font-bold text-eternity">{{round($producto->precio + $producto->precio * env('PORCENTAJE_IVA') / 100,2)}}</span>
              </div>
            </div>
            <div class="flex-1">
              <p class="text-[#E39005] text-xl font-semibold">Ahorra 12%</p>
              <p class="text-sm text-gray-400" onclick="remove_from_cart({{$producto->id}})">Incluyendo impuestos</p>
            </div>
          </div>

          <p class="text-gray-500">{{$producto->descripcion}}</p>

          <div class="flex py-4 space-x-4">
            <div class="relative">
              <div class="absolute left-0 right-0 block pt-2 text-xs font-semibold tracking-wide text-center text-gray-400 uppercase">Ud.</div>
              <select id="cant-producto" class="flex items-end pb-1 pl-4 pr-8 border border-gray-200 appearance-none cursor-pointer rounded-xl h-14">
                 @for($i = 1; $i < 11; $i++)
                 <option value="{{$i}}">{{$i}}</option>
                 @endfor
              </select>
            </div>
            <button id="add-to-cart" type="button" onclick="add_to_cart({{$producto->id}})" class="px-6 py-2 font-semibold text-white transition duration-150 ease-in-out h-14 rounded-xl bg-coldPurple hover:bg-eternity">
              Añadir al carrito
            </button>
            {{--  Añadir productos al carro de compra --}}
          </div>
        <p class="text-sm text-red-500" id="error"></p>

        </div>

      </section>

      {{-- SECCIÓN DE REVIEWS DE LOS USUARIOS --}}
      <section class="space-y-8">

        <h2 class="mt-8 mb-6">Opiniones del Producto</h2>
        <div  x-data="{ show: false }">
              <div class="flex flex-col items-start justify-start gap-6 pb-6 border-b-2 md:flex-row border-gray-300/50">
                <div class="grid w-24 text-white rounded-lg bg-lochinvar/50 aspect-square md:w-36 place-items-center">
                  <p class="text-3xl font-black text-center md:text-4xl">@if($reviews->count() == 0) {{'0'}} @else {{$reviews->sum('puntuacion') / $reviews->count()}}@endif</p>
                  <div class="flex justify-center">
                    {{-- Printar las estrellas --}}

                    @if ($reviews->count() > 0)
                    @for ($i = 0; $i < 5; $i++)
                        @if ($i < $reviews->sum('puntuacion') / $reviews->count())
                            <x-ui.star :color="'text-yellow-300'" :attr="''"></x-ui.star>
                        @else
                            <x-ui.star :color="'text-gray-300'" :attr="''"></x-ui.star>
                        @endif
                    @endfor
                    @else
                        <x-ui.star :color="'text-gray-300'" :attr="''"></x-ui.star>
                        <x-ui.star :color="'text-gray-300'" :attr="''"></x-ui.star>
                        <x-ui.star :color="'text-gray-300'" :attr="''"></x-ui.star>
                        <x-ui.star :color="'text-gray-300'" :attr="''"></x-ui.star>
                        <x-ui.star :color="'text-gray-300'" :attr="''"></x-ui.star>
                        @endif
                  </div>
                  <p class="text-xs md:text-sm">{{$reviews->count()}} Opiniones</p>
                </div>

                <div>
                    <ol class="space-y-3 ">
                      <li><h3>Déjanos tu opinión.</h3></li>
                      <li>Tu opinión nos interesa, solo te llevará un par de minutos!</li>
                      <li>
                        {{-- Si el usuario está o no logueado --}}
                        @if(Auth::check())
                            <button @click="show = !show" :aria-expanded="show ? 'true' : 'false'" type="button" class="primary-button"><a href="">Añadir Opinión</a></button>
                        @else
                            <button type="button" class=" primary-button focus:outline-none"><a href="{{route('register')}}">Regístrate y opina</a></button>
                        @endif
                      </li>
                    </ol>
                </div>
            </div>

            <div x-show="show" x-transition class="p-2 mt-2 bg-indigo-100 rounded-lg shadow-lg">

              {{-- FORMULARIO CREAR REVIEW --}}
              <form action="{{route('review.store',$producto->id)}}" method="POST" class="space-y-4">
                @csrf
                <h3 class="mt-4">Qué te parece el producto?</h3>

                <h4>Cual es tu puntuación?</h4>

                <div class="flex items-center" id="user-rating">
                  @for ($i = 1; $i <= 5; $i++)
                  <label>
                    <input type="radio" value="{{$i}}" class="hidden peer" name="puntuacion">
                    <x-ui.star :color="'text-gray-300'" :attr="'peer-checked:text-yellow-300'"></x-ui.star>
                  </label>
                  @endfor
                  <p class="ml-2" id="score"></p>
                </div>

                <script src="{{Vite::asset('resources/js/aaa.js')}}"></script>

                <x-form.input :name="'cabecera'" :type="'text'" :value="old('cabecera')" :label="'Cabecera de la review'"></x-form.input>

                <x-form.textarea :name="'review'" :value="old('review')" :label="'Tu opinión'" ></x-form.textarea>

                <h4>Recomendarías el producto?</h4>
                <div class="flex gap-4">
                  <x-form.checkbox :type="'radio'" :name="'recomendado'" :label="'Si'" :value="1"></x-form.checkbox>
                  <x-form.checkbox :type="'radio'" :name="'recomendado'" :label="'No'" :value="0"></x-form.checkbox>
                </div>
                <button type="submit" class="primary-button font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none">Enviar mi Opinión</button>
                <button @click="show = !show" :aria-expanded="show ? 'true' : 'false'" type="button" class="primary-button font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none">Cancelar</button>

              </form>
              {{--  --}}

            </div>
        </div>


        {{-- SE MUESTRAN LAS REVIEWS AQUÍ --}}
        <div>
        <h3 class="mb-6 text-2xl">Opiniones de los Usuarios</h3>
          {{-- Hacer aquí foreach de la tabla de reviews que coincidan con la id del producto --}}
          @if($reviews->count() != 0)
                  @foreach ($reviews as $review)
                    <x-product.user-review :review="$review"></x-product.user-review>
                  @endforeach
          @else
              <p class="text-xl font-bold text-center text-turquoiseMediumDark">No hay ninguna review aún, se tú el primero!</p>
          @endif
        </div>
      </section>

      {{-- Paginación --}}
      {{-- <x-ui.pagination :source="$reviews"></x-ui.pagination> --}}

    </div>
  </div>
  </div>
</x-app-layout>