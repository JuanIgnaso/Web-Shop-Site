@section('title')
    {{ $titulo}}
@endsection
<x-adminPanel.admin-panel-layout>
    <h1 class="text-center font-bold mt-4">@yield('title')</h1>

<form class="element-form" action="{{route('proveedor.store')}}" method="POST">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

          <div class="sm:col-span-3">
            <x-form.input :type="'text'" :name="'nombre_proveedor'" :value="old('nombre_proveedor')" :label="'Nombre del Proveedor'"></x-form.input>
          </div>

          <div class="sm:col-span-3">
            <x-form.input :type="'text'" :name="'direccion'" :value="old('direccion')" :label="'Dirección'"></x-form.input>
          </div>

          <div class="sm:col-span-3">
            <x-form.input :type="'email'" :name="'email'" :value="old('email')" :label="'Dirección de correo'"></x-form.input>
          </div>

          <div class="sm:col-span-3">
            <x-form.input :type="'text'" :name="'website'" :value="old('website')" :label="'Página Web'"></x-form.input>
          </div>

          <div class="col-span-full">
            <x-form.input :type="'text'" :name="'telefono'" :value="old('telefono')" :label="'Número de teléfono'"></x-form.input>
          </div>

        </div>
      </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button type="button" class="form-button bg-darkOrange hover:bg-orange-500 "><a href="{{route('proveedor.index')}}">Cancelar</a></button>
      <button type="submit" class="form-button bg-turquoiseMedium  hover:bg-turquoiseMediumDark">Guardar</button>
    </div>
  </form>
</x-adminPanel.admin-panel-layout>