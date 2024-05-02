    {{-- Artículo de la review --}}
    <article class="mb-12">
        <div class="flex items-center mb-4">
            <img class="w-10 h-10 me-4 rounded-full object-cover" src="{{Vite::asset('resources/images/pfp_example_foto.jpg')}}" alt="">
            <div class="font-medium ">
                <p>{{$review->name}} <time datetime="2014-08-16 19:00" class="block text-sm text-gray-500 ">Miembro desde {{$review->created_at}}</time></p>
            </div>
        </div>
        <div class="flex items-center mb-1 space-x-1 rtl:space-x-reverse">
            {{-- Printar el rating del usuario --}}
            @for ($i = 0; $i < 5; $i++)
                @if ($i < $review->puntuacion)
                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                </svg>
                @else
                <svg class="w-4 h-4 text-gray-300 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                </svg>
                @endif
            @endfor

            {{-- -- --}}
            <h3 class="ms-2 text-sm font-semibold text-gray-900 ">{{$review->cabecera}}</h3>
        </div>
        <footer class="mb-3 text-sm text-gray-500 "><p>Opinión hecha en <time datetime="2017-03-03 19:00">{{$review->fecha_review}}</time></p></footer>
        <p class="mb-2 text-gray-500 ">{{$review->review}}</p>
        {{-- Recomendación del usuario --}}
        @if ($review->recomendado == 1)
            <p class="text-green-400"><i class="fa-solid fa-thumbs-up text-xl"></i> Recomienda este producto</p>
        @else
            <p class="text-red-400"><i class="fa-solid fa-thumbs-down text-xl"></i>  No recomienda este producto</p>
        @endif

        {{-- Acción del usuario en función de si es el autor de la review --}}
        @if(\Auth::id() == $review->usuario)
        <aside>
            <div class="flex items-center gap-2 mt-3">
                <a href="#" class="px-2 py-1.5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border-2 border-darkBlue hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 ">Editar</a>
                <a href="#" class="px-2 py-1.5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border-2 border-red-500 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 ">Borrar</a>
            </div>
        </aside>
         @endif
        </article>
    {{-- fin del artículo --}}