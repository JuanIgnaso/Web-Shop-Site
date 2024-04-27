@section('title')
    {{$titulo}}
@endsection
<x-adminPanel.admin-panel-layout>
    <h1 class="text-center font-bold mt-4">@yield('title')</h1>

<form class="element-form" action="{{route('proveedor.update',$proveedor)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

          <div class="sm:col-span-3">
            <x-form.inputfield :params="['type'=>'text','name'=>'nombre_proveedor','value'=>old('nombre_proveedor',$proveedor->nombre_proveedor),'label'=>'Nombre del Proveedor']"></x-form.inputfield>
          </div>

          <div class="sm:col-span-3">
            <x-form.inputfield :params="['type'=>'text','name'=>'direccion','value'=>old('direccion',$proveedor->direccion),'label'=>'Dirección']"></x-form.inputfield>
          </div>

          <div class="sm:col-span-3">
            <x-form.inputfield :params="['type'=>'email','name'=>'email','value'=>old('email',$proveedor->email),'label'=>'Dirección de correo']"></x-form.inputfield>
          </div>

          <div class="sm:col-span-3">
            <x-form.inputfield :params="['type'=>'text','name'=>'website','value'=>old('website',$proveedor->website),'label'=>'Página Web']"></x-form.inputfield>
          </div>

          <div class="col-span-full">
            <x-form.inputfield :params="['type'=>'text','name'=>'telefono','value'=>old('telefono',$proveedor->telefono),'label'=>'Número de teléfono']"></x-form.inputfield>
          </div>

        </div>
      </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button type="button" class="text-sm font-semibold leading-6 text-gray-900"><a href="{{route('proveedor.index')}}">Cancelar</a></button>
      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar cambios</button>
    </div>
  </form>

</x-adminPanel.admin-panel-layout>