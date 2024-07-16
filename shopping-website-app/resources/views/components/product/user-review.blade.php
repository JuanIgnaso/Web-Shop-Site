    {{-- Artículo de la review --}}
    <article class="mb-12" x-data="{edit: false,show: true}">
        {{-- Review --}}
            <div id="userReview" x-show="show">
                <div class="flex items-center mb-4">
                    <img class="object-cover w-10 h-10 rounded-full me-4" src="{{Vite::asset('resources/images/pfp_example_foto.jpg')}}" alt="">
                    <div class="font-medium ">
                        <p class="font-black text-coldPurple">{{$review->name}} <time datetime="2014-08-16 19:00" class="block text-sm text-lochinvar ">Miembro desde {{Carbon\Carbon::parse($review->registro_usuario)->isoFormat('LL')}}</time></p>
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
                    <h4  class="font-semibold text-gray-900 ms-2">{{$review->cabecera}}</h4>
                </div>
                {{--
                    Si se quiere poner en un formato como: ej dia mes y año  Carbon\Carbon::parse($obj->fecha)->isoFormat('LL')
                    Si se quiere poner la diferencia de la fecha con el tiempo de ahora se usa ->diffForHumans()
                    --}}
                <footer class="mb-3 text-sm text-gray-600 "><p><span>{{Carbon\Carbon::parse($review->editado_en)->diffForHumans()}}</span> - <span class="italic">{{$review->editado_en != $review->fecha_review ? ' Editado: '. Carbon\Carbon::parse($review->editado_en)->diffForHumans() : ''}}</span></p></footer>
                <p class="mb-2 text-gray-900 ">{{$review->review}}</p>

                {{-- Recomendación del usuario --}}
                @if ((int)$review->recomendado == 1)
                    <p class="text-green-500"><i class="text-xl fa-solid fa-thumbs-up"></i> Recomienda este producto</p>
                @else
                    <p class="text-red-500"><i class="text-xl fa-solid fa-thumbs-down"></i>  No recomienda este producto</p>
                @endif

                {{-- Acción del usuario en función de si es el autor de la review --}}
                @if(\Auth::check() && (\Auth::id() == $review->usuario || \Auth::user()->claseUsuario == 3))
                <aside>
                    <div class="flex items-center gap-2 mt-3">
                        @if(\Auth::id() == $review->usuario)
                        <button x-on:click="[show = false, edit = true]" class="p-2 text-sm font-medium text-white transition rounded-lg duration-120 hover:scale-105 bg-arbolCoral">Editar</button>
                        @endif
                        <form action="{{route('review.destroy',$review->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="p-2 text-sm font-medium text-white transition rounded-lg duration-120 bg-lochinvar hover:scale-105">Borrar</button>
                        </form>
                    </div>
                </aside>
                @endif
            </div>
            {{-- Editar review --}}
            <div x-show="edit" id="editUserReview">
                <form action="{{route('review.update',$review->id)}}" method="POST" class="space-y-2">
                    @csrf
                    @method('PUT')
                    <h3 class="mt-4">Editando tu review</h3>

                    <h4>Puntuación de la review.</h4>

                    <div class="flex items-center" id="user-rating">
                      @for ($i = 1; $i <= 5; $i++)
                      <label>
                        <input type="radio" value="{{$i}}" class="hidden peer" {{$i == $review->puntuacion ? 'checked' : ''}} name="puntuacion">
                        <x-ui.star :color="'text-gray-300'" :attr="'peer-checked:text-yellow-300'"></x-ui.star>
                      </label>
                      @endfor
                      <p class="ml-2" id="score"></p>
                    </div>

                    <script src="{{Vite::asset('resources/js/aaa.js')}}"></script>

                    <x-form.input :name="'cabecera'" :type="'text'" :value="old('cabecera',$review->cabecera)" :label="'Cabecera de la review'"></x-form.input>

                    <x-form.textarea :name="'review'" :value="old('review',$review->review)" :label="'Tu opinión'" ></x-form.textarea>

                    <h4>Recomendarías el producto?</h4>
                    <div class="flex gap-4">
                        <label for="recomendado" class="flex items-center gap-3 text-base font-bold leading-6 text-turquoiseMedium">
                            Sí
                            <input type="radio" name="recomendado" id="recomendado" value="1" {{$review->recomendado == 1 ? 'checked' : ''}} class="block rounded-md border-0 py-1.5 text-turquoiseMedium shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400  sm:text-sm sm:leading-6">
                        </label>
                        <label for="recomendado" class="flex items-center gap-3 text-base font-bold leading-6 text-turquoiseMedium">
                            No
                            <input type="radio" name="recomendado" id="recomendado" value="0" {{$review->recomendado == 0 ? 'checked' : ''}} class="block rounded-md border-0 py-1.5 text-turquoiseMedium shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400  sm:text-sm sm:leading-6">
                        </label>
                        @if($errors->has('recomendado'))
                            <p class="input-error">{{$errors->first('recomendado')}}</p>
                        @endif
                    </div>
                    <footer>
                        <button type="submit" class="text-white bg-turquoiseSemiLight hover:bg-turquoiseMedium focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none">Enviar mi Opinión</button>
                        <button  x-on:click="[show = true, edit = !edit]" type="button" class="text-white bg-turquoiseSemiLight hover:bg-turquoiseMedium focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none">Cancelar</button>
                    </footer>
                </form>
            </div>
        </article>
    {{-- fin del artículo --}}