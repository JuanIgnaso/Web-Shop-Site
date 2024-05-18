
@section('title')
    {{ $titulo}}
@endsection
<x-adminPanel.admin-panel-layout>
    <h1 class="text-center">{{$titulo}}</h1>
    <form enctype="multipart/form-data" action="{{route('files.store')}}" method="POST"  class="element-form">
        @csrf
        @method('PUT')
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
    <section>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-2 mb-6">
            @foreach($imagenes as $imagen)
            <div class="group relative">
                <img src="{{ url('storage/'.$imagen->imagen) }}" class="h-auto max-w-full rounded-lg" alt="{{$imagen->alt}}">
                <p class="group-hover:block group-hover:bg-slate-800/75 rounded-b-lg hidden absolute bottom-0 text-sm w-full text-center text-white">{{$imagen->alt}}</p>
            </div>
            @endforeach

        </div>

    </section>
</x-adminPanel.admin-panel-layout>