@section('title')
    {{ $titulo}}
@endsection
<x-adminPanel.admin-panel-layout>
    <h1 class="mt-4 font-bold text-center">@yield('title')</h1>

<form class="element-form" action="{{route('categoria.store')}}" method="POST">
    @csrf
    <div class="space-y-12">
      <div class="pb-12 border-b border-gray-900/10">
        <div class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">

          <div class="sm:col-span-3">
            <x-form.input :type="'text'" :name="'nombre_categoria'" :value="old('nombre_categoria')" :label="'Nombre de Categoría'"></x-form.input>
          </div>

          <div class="sm:col-span-3">
            <label for="categoria" class="block text-sm font-medium leading-6 text-gray-900">Categoría Padre</label>
            <div class="mt-2">
              <select id="categoriaPadre" name="categoriaPadre"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 border-none shadow-lg outline-none focus:ring-0 focus:bg-slate-100 sm:max-w-xs sm:text-sm sm:leading-6">
                <option selected value=""  selected>Selecciona Una...</option>
                @foreach($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->nombre_categoria}}</option>
                @endforeach
              </select>
              @if($errors->has('categoriaPadre'))
              <p class="input-error">{{$errors->first('categoriaPadre')}}</p>
            @endif
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="flex items-center justify-end mt-6 gap-x-6">
      <button type="button" class="form-button bg-arbolCoral "><a href="{{route('categoria.index')}}">Cancelar</a></button>
      <button type="submit" class="form-button bg-turquoiseMedium hover:bg-turquoiseMediumDark">Guardar</button>
    </div>
  </form>

</x-adminPanel.admin-panel-layout>