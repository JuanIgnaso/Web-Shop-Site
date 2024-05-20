
@section('title')
    {{ $titulo}}
@endsection
<x-adminPanel.admin-panel-layout>
    <h1 class="mb-6">{{$titulo}}</h1>
    <section class="mb-8  grid grid-cols-1 md:grid-cols-2 gap-4">

        {{-- Subir Fotos --}}
        <form x-data="{ show: false,open: 'v',closed: '>' }" enctype="multipart/form-data" action="{{route('files.store')}}" method="POST">
            @csrf
            @method('PUT')
            <h2 @click="show = !show" :aria-expanded="show ? 'true' : 'false'" class="text-2xl cursor-pointer text-turquoiseMediumDark">Subir Archivos <span class="text-darkOrange" x-text="show ? open : closed"> </span></h2>
            <div  x-show="show" x-transition>
                <div class="grid grid-cols-1 space-y-3 mb-4">
                    <div class="mt-2">
                        <label class="block mb-2 text-base font-bold leading-6 text-turquoiseMedium" for="imagen">Subir Imagen</label>
                        <input name="imagen" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none x" id="imagen" type="file">

                        @if($errors->has('imagen'))
                            <p class="input-error">{{$errors->first('imagen')}}</p>
                        @endif
                        <div>
                            <x-form.select :name="'producto'" :multiple="false" :label="'Producto'" :values="$productos" :show="'nombreProducto'"></x-form.select>
                            @if($errors->has('producto'))
                                <p class="input-error">{{$errors->first('producto')}}</p>
                            @endif
                        </div>
                    </div>
                <x-form.input :type="'text'" :name="'alt'" :value="old('alt')" :label="'Descripción'"></x-form.input>
            </div>
            <button type="submit" class="form-button bg-turquoiseMedium  hover:bg-turquoiseMediumDark">Subir Imagen</button>
            </div>
        </form>

        {{-- Filtrar --}}
        <form x-data="{ show: false,open: 'v',closed: '>' }"  action="" method="get" >
            @csrf
            <h2 @click="show = !show" :aria-expanded="show ? 'true' : 'false'" class="text-2xl cursor-pointer text-turquoiseMediumDark">Filtros <span class="text-darkOrange" x-text="show ? open : closed"> </span></h2>
            <div x-show="show" x-transition>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-4 justify-center">
                    <div>
                        <x-form.select :name="'producto'" :multiple="true" :label="'Producto'" :values="$productos" :show="'nombreProducto'"></x-form.select>
                        @if($errors->has('producto'))
                            <p class="input-error">{{$errors->first('producto')}}</p>
                        @endif
                    </div>
                </div>
                <div class="flex justify-start  space-x-2">
                    <button type="submit" class="text-white bg-turquoiseMedium hover:bg-turquoiseMediumDark focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none ">Aplicar Filtros</button>
                    <button type="button" class="text-white bg-turquoiseMedium hover:bg-turquoiseMediumDark focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none "><a href="{{URL::current()}}">Limpiar Filtros</a></button>
                </div>
            </div>
        </form>
    </section>

    {{-- Lista de Fotos --}}
    <section>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-2 mb-6">
            @foreach($imagenes as $imagen)
            <div class="group relative ">
                <img src="{{ url('storage/'.$imagen->imagen) }}" class="group-hover:border-4 group-hover:border-darkBlue h-auto max-w-full rounded-lg" alt="{{$imagen->alt}}">
                <p class="group-hover:block group-hover:bg-slate-800/75 rounded-lg hidden absolute bottom-0 text-sm w-full text-center text-white">{{$imagen->alt}}</p>

                <div class="absolute top-2 right-2 space-y-2 hidden group-hover:block">
                    <form action="{{route('files.destroy',$imagen->id)}}" method="POST">
                        @csrf
                        @method('DELETE') <!-- Modificamos método del formulario -->
                        <button class=" admin-panel-action-button rose-gradient shadow-rose-500/40"><i class="fa-solid fa-minus"></i></button>
                    </form>
                    <a href="" class="admin-panel-action-button emerald-gradient shadow-emerald-500/40"><i class="fa-solid fa-eye"></i></a>
                </div>

            </div>
            @endforeach
        </div>
    </section>

    {{-- Paginación --}}
    <x-ui.pagination :source="$imagenes"></x-ui.pagination>
</x-adminPanel.admin-panel-layout>