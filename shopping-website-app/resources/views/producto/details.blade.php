@section('title')
    {{ $titulo}}
@endsection

<x-app-layout>
<!-- component -->
<!-- This is an example component -->
<div>
  <div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">

        {{-- BreadCrumb --}}
        <nav class="flex mb-4" aria-label="Breadcrumb">
          <ol class="justify-self-center inline-flex items-center space-x-2 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
              <a href="{{route('dashboard')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 ">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
                Inicio
              </a>
            </li>
            <li>
              <x-ui.breadcrumb-element :text="'Productos'" :url="route('listaProductos')"></x-ui.breadcrumb-element>
            </li>
            <li aria-current="page">
              <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ucfirst($producto->nombreProducto)}}</span>
              </div>
            </li>
          </ol>
        </nav>


      <section class="flex flex-col md:flex-row -mx-4">
        <div class="md:flex-1 px-4">
          <div x-data="{ image: 1 }" x-cloak>
            <div class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4">

              <div x-show="image === 1" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg" class="h-full w-full object-cover rounded-lg" alt="">
              </div>

              <div x-show="image === 2" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-02.jpg" class="h-full w-full object-cover rounded-lg" alt="">
              </div>

              <div x-show="image === 3" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-03.jpg" class="h-full w-full object-cover rounded-lg" alt="">
              </div>

              <div x-show="image === 4" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-04.jpg" class="h-full w-full object-cover rounded-lg" alt="">
              </div>
            </div>

            <div class="flex -mx-2 mb-4">
              <template x-for="i in 4">
                <div class="flex-1 px-2">
                  <button x-on:click="image = i" :class="{ 'ring-2 ring-darkBlue ring-inset': image === i }" class="focus:outline-none w-full rounded-lg h-24 md:h-32 bg-gray-200 flex items-center justify-center">
                    <span x-text="i" class="text-2xl"></span>
                  </button>
                </div>
              </template>
            </div>
          </div>
        </div>
        <div class="md:flex-1 px-4">
          <h2 class="mb-2 leading-tight tracking-tight font-extrabold text-turquoiseDark text-2xl md:text-3xl">{{ucfirst($producto->nombreProducto)}}</h2>


          {{-- Rating --}}
          <x-ui.element-rating :review="$reviews"></x-ui.element-rating>
          {{-- ------ --}}

          <p class="text-gray-500 text-sm">By <a href="#" class="text-turquoiseMedium hover:underline">{{ucfirst($producto->nombre_proveedor)}}</a></p>

          <div class="flex items-center space-x-4 my-4">
            <div>
              <div class="rounded-lg bg-gray-100 flex py-2 px-3">
                <span class="text-darkBlue mr-1 mt-1">$</span>
                <span class="font-bold text-darkBlue text-3xl">{{$producto->precio}}</span>
              </div>
            </div>
            <div class="flex-1">
              <p class="text-[#E39005] text-xl font-semibold">Ahorra 12%</p>
              <p class="text-gray-400 text-sm">Incluyendo impuestos</p>
            </div>
          </div>

          <p class="text-gray-500">{{$producto->descripcion}}</p>

          <div class="flex py-4 space-x-4">
            <div class="relative">
              <div class="text-center left-0 pt-2 right-0 absolute block text-xs uppercase text-gray-400 tracking-wide font-semibold">Ud.</div>
              <select class="cursor-pointer appearance-none rounded-xl border border-gray-200 pl-4 pr-8 h-14 flex items-end pb-1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>

              <svg class="w-5 h-5 text-gray-400 absolute right-0 bottom-0 mb-2 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
              </svg>
            </div>

            <button type="button" class="h-14 px-6 py-2 font-semibold rounded-xl bg-turquoiseSemiLight hover:bg-turquoiseMedium text-white">
              Añadir al carrito
            </button>
          </div>
        </div>
      </section>

      {{-- Sección de Reviews --}}
      <section class="space-y-8">

        <h2 class="mt-8 mb-6">Opiniones del Producto</h2>
        <div  x-data="{ show: false }">
              <div class="flex flex-col md:flex-row justify-start items-start gap-6">
                <div class="bg-turquoiseLight aspect-square w-24 md:w-36 rounded-lg grid place-items-center">
                  <p class="text-center text-3xl md:text-4xl font-black">{{$reviews->sum('puntuacion') / $reviews->count()}}</p>
                  <div class="flex justify-center">
                    <svg class="w-3 h-3 md:w-4 md:h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                      <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    <svg class="w-3 h-3 md:w-4 md:h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                      <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    <svg class="w-3 h-3 md:w-4 md:h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                      <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    <svg class="w-3 h-3 md:w-4 md:h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                      <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    <svg class="w-3 h-3 md:w-4 md:h-4 text-gray-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                      <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                  </div>
                  <p class="text-xs md:text-sm">{{$reviews->count()}} Opiniones</p>
                </div>

                <div>
                    <ol class="space-y-3 ">
                      <li><h3>Déjanos tu opinión.</h3></li>
                      <li>Tu opinión nos interesa, solo te llevará un par de minutos!</li>
                      <li>
                        <button @click="show = !show" :aria-expanded="show ? 'true' : 'false'" type="button" class="text-white bg-turquoiseSemiLight hover:bg-turquoiseMedium focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none "><a href="">Añadir Opinión</a></button>
                      </li>
                    </ol>
                </div>
            </div>

            <div x-show="show" x-transition class="bg-gray-200 p-2 rounded-lg mt-2">
              {{-- Formulario para crear review --}}
              <form action="{{route('review.store',$producto->id)}}" method="POST" class="space-y-2">
                @csrf
                <h3 class="mt-4">Qué te parece el producto?</h3>
                <h4>Cual es tu puntuación?</h4>
                <div class="flex items-center" id="user-rating">
                  <label>
                    <input type="radio" value="1" class="peer hidden" name="puntuacion">
                    <svg class="w-3 h-3 md:w-4 md:h-4 text-gray-300 peer-checked:text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                      <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                  </label>

                  <label>
                    <input type="radio" value="2" class="peer hidden" name="puntuacion">
                    <svg class="w-3 h-3 md:w-4 md:h-4 text-gray-300 peer-checked:text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                      <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                  </label>

                  <label>
                    <input type="radio" value="3" class="peer hidden" name="puntuacion">
                    <svg class="w-3 h-3 md:w-4 md:h-4 text-gray-300 peer-checked:text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                      <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                  </label>

                  <label>
                    <input type="radio" value="4" class="peer hidden" name="puntuacion">
                    <svg class="w-3 h-3 md:w-4 md:h-4 text-gray-300 peer-checked:text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                      <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                  </label>

                  <label>
                    <input type="radio" value="5" class="peer hidden" name="puntuacion">
                    <svg class="w-3 h-3 md:w-4 md:h-4 text-gray-300 peer-checked:text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                      <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                  </label>

                </div>



                <script src="{{Vite::asset('resources/js/aaa.js')}}"></script>

                <x-form.input :name="'cabecera'" :type="'text'" :value="old('cabecera')" :label="'Cabecera de la review'"></x-form.input>
                <x-form.textarea :name="'review'" :value="old('review')" :label="'Tu opinión'" ></x-form.textarea>
                <h4>Recomendarías el producto?</h4>
                <div class="flex gap-4">
                  <x-form.checkbox :type="'radio'" :name="'recomendado'" :label="'Si'" value="'1'"></x-form.checkbox>
                  <x-form.checkbox :type="'radio'" :name="'recomendado'" :label="'No'" value="'0'"></x-form.checkbox>
                </div>
                <button type="submit" class="text-white bg-turquoiseSemiLight hover:bg-turquoiseMedium focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none">Enviar mi Opinión</button>
              </form>
            </div>
        </div>


        {{-- Reviews de los usuarios --}}
        <div>
        <h3 class="text-2xl mb-6">Opiniones de los Usuarios</h3>
          {{-- Hacer aquí foreach de la tabla de reviews que coincidan con la id del producto --}}
          @if($reviews->count() != 0)
                  @foreach ($reviews as $review)
                    <x-product.user-review :review="$review"></x-product.user-review>
                  @endforeach
          @else
              <p class="text-turquoiseMediumDark font-black text-center text-xl">No hay ninguna review aún, se tú el primero!</p>
          @endif
        </div>
      </section>

      {{-- Paginación --}}

    </div>
  </div>
  </div>


</x-app-layout>