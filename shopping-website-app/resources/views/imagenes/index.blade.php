
@section('title')
    {{ $titulo}}
@endsection
<x-adminPanel.admin-panel-layout>
    <h1 class="mb-6">{{$titulo}}</h1>
    <section class="grid grid-cols-1 gap-4 mb-8 md:grid-cols-2">

        {{-- Subir Fotos --}}
        <form x-data="{ show: false}" enctype="multipart/form-data" action="{{route('files.store')}}" method="POST">
            @csrf
            @method('PUT')
            <h2 @click="show = !show" :aria-expanded="show ? 'true' : 'false'" class="text-2xl cursor-pointer text-lochinvar">Subir Archivos <i :class="show ? 'fa-solid fa-caret-right text-dixie' : 'fa-solid fa-caret-down text-dixie' "></i></h2>
            <div  x-show="show" x-transition>
                <div class="grid grid-cols-1 mb-4 space-y-3">
                    <div class="mt-2">
                        <label class="block mb-2 text-base font-bold leading-6 text-lochinvar" for="imagen">Subir Imagen</label>
                        <input name="imagen" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none x" id="imagen" type="file">

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
            <button type="submit" class="primary-button">Subir Imagen</button>
            </div>
        </form>

        {{-- Filtrar imágenes--}}
        <form x-data="{ show: false}"  action="" method="get" >
            @csrf
            <h2 @click="show = !show" :aria-expanded="show ? 'true' : 'false'" class="text-2xl cursor-pointer text-lochinvar">Filtros <i :class="show ? 'fa-solid fa-caret-right text-dixie' : 'fa-solid fa-caret-down text-dixie' "></i></h2>
            <div x-show="show" x-transition>
                <div class="grid justify-center grid-cols-1 gap-4 mb-4 sm:grid-cols-2 md:grid-cols-3">
                    <div>
                        <x-form.select :name="'producto'" :multiple="true" :label="'Producto'" :values="$productos" :show="'nombreProducto'"></x-form.select>
                        @if($errors->has('producto'))
                            <p class="input-error">{{$errors->first('producto')}}</p>
                        @endif
                    </div>
                </div>
                <div class="flex justify-start space-x-2">
                    <button type="submit" class="primary-button">Aplicar Filtros</button>
                    <button type="button" class="primary-button"><a href="{{URL::current()}}">Limpiar Filtros</a></button>
                </div>
            </div>
        </form>
    </section>

    {{-- Lista de Fotos --}}
    <section>
        <div class="grid grid-cols-2 gap-2 mb-6 md:grid-cols-3 lg:grid-cols-5">
            @foreach($imagenes as $imagen)
            <div class="relative group ">
                <img src="{{ url('storage/'.$imagen->imagen) }}" class="h-auto max-w-full rounded-lg group-hover:border-4 group-hover:border-darkBlue" alt="{{$imagen->alt}}">
                <p class="absolute bottom-0 hidden w-full text-sm text-center text-white rounded-lg group-hover:block group-hover:bg-slate-800/75">{{$imagen->alt}}</p>

                <div class="absolute hidden space-y-2 top-2 right-2 group-hover:block">
                    <form action="{{route('files.destroy',$imagen->id)}}" method="POST">
                        @csrf
                        @method('DELETE') <!-- Modificamos método del formulario -->
                        <button class=" admin-panel-action-button bg-rose-500 hover:bg-rose-400"><i class="fa-solid fa-minus"></i></button>
                    </form>
                    <a href="" class="admin-panel-action-button bg-emerald-500 hover:bg-emerald-400"><i class="fa-solid fa-eye"></i></a>
                </div>

            </div>
            @endforeach
        </div>
    </section>

    {{-- Paginación --}}
    <x-ui.pagination :source="$imagenes"></x-ui.pagination>
</x-adminPanel.admin-panel-layout>