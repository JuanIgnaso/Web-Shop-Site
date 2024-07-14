@section('title')
    {{$titulo}}
@endsection
<x-adminPanel.admin-panel-layout>
    <h1 class="mt-4 font-bold text-center">@yield('title')</h1>

<form class="element-form" action="{{route('proveedor.update',$proveedor)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="space-y-12">
      <div class="pb-12 border-b border-gray-900/10">
        <div class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">

          <div class="sm:col-span-3">
            <x-form.input :type="'text'" :name="'nombre_proveedor'" :value="old('nombre_proveedor',$proveedor->nombre_proveedor)" :label="'Nombre del Proveedor'"></x-form.input>
          </div>

          <div class="sm:col-span-3">
            <x-form.input :type="'text'" :name="'direccion'" :value="old('direccion',$proveedor->direccion)" :label="'Dirección'"></x-form.input>
          </div>

          <div class="sm:col-span-3">
            <x-form.input :type="'email'" :name="'email'" :value="old('email',$proveedor->email)" :label="'Dirección de correo'"></x-form.input>
          </div>

          <div class="sm:col-span-3">
            <x-form.input :type="'text'" :name="'website'" :value="old('website',$proveedor->website)" :label="'Página Web'"></x-form.input>
          </div>

          <div class="col-span-full">
            <x-form.input :type="'text'" :name="'telefono'" :value="old('telefono',$proveedor->telefono)" :label="'Número de teléfono'"></x-form.input>
          </div>

        </div>
      </div>
    </div>

    <div class="flex items-center justify-end mt-6 gap-x-6">
      <button type="button" class="form-button bg-arbolCoral"><a
              href="{{route('proveedor.index')}}">Cancelar</a></button>
      <button type="submit"
          class="form-button bg-turquoiseMedium hover:bg-turquoiseMediumDark">Guardar</button>
  </div>
  </form>

</x-adminPanel.admin-panel-layout>