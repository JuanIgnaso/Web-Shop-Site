
@section('title')
    {{ $titulo}}
@endsection
<x-adminPanel.admin-panel-layout>
    <h1 class="text-center">{{$titulo}}</h1>
    <section class="mb-8 border-b-2 border-b-gray-200/50 grid grid-cols-2 gap-2">
        <form enctype="multipart/form-data" action="{{route('files.store')}}" method="POST">
            @csrf
            @method('PUT')
            <h2 class="text-center">Subir Archivos</h2>
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
        </form>

        <form x-show="show" x-transition action="" method="get" >
            @csrf
            <h2 class="text-center">Filtrar Fotos</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-4">
                </div>
        </form>
    </section>
    <section>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-2 mb-6">
            @foreach($imagenes as $imagen)
            <div class="group relative">
                <img src="{{ url('storage/'.$imagen->imagen) }}" class="h-auto max-w-full rounded-lg" alt="{{$imagen->alt}}">
                <p class="group-hover:block group-hover:bg-slate-800/75 rounded-b-lg hidden absolute bottom-0 text-sm w-full text-center text-white">{{$imagen->alt}}</p>

                <form action="{{route('files.destroy',$imagen->id)}}" method="POST">
                    @csrf
                    @method('DELETE') <!-- Modificamos método del formulario -->
                    <button class="absolute top-1 right-1 hidden group-hover:block admin-panel-action-button rose-gradient shadow-rose-500/40"><i class="fa-solid fa-minus"></i></button>
                </form>
            </div>
            @endforeach

        </div>

    </section>
</x-adminPanel.admin-panel-layout>