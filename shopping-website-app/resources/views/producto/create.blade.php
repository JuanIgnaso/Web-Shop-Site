

@section('title')
{{ $titulo}}
@endsection

<x-adminPanel.admin-panel-layout>
    <h1 class="text-center font-bold mt-4">@yield('title')</h1>

    <form class="element-form" action="{{route('producto.store')}}" method="POST">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <div class="sm:col-span-3">
                        <!-- nombreProducto -->
                        <x-form.input :type="'text'" :name="'nombreProducto'" :value="old('nombreProducto')" :label="'Nombre del Producto'"></x-form.input>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="categoria" class="block text-sm font-medium leading-6 text-gray-900">Categoría</label>
                        <div class="mt-2">
                          <select id="categoria" name="categoria"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option selected value="" disabled selected>Selecciona Una...</option>
                            @foreach($categorias as $c)
                            <option value="{{$c->id}}" {{$c->id == old('categoria') ? 'selected' : ''}}>{{$c->nombre_categoria}}</option>
                            @endforeach
                          </select>
                          @if($errors->has('categoria'))
                          <p class="input-error">{{$errors->first('categoria')}}</p>
                        @endif
                        </div>
                      </div>


                      <div class="sm:col-span-3">
                        <label for="proveedor" class="block text-sm font-medium leading-6 text-gray-900">Proveedor</label>
                        <div class="mt-2">
                          <select id="proveedor" name="proveedor"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option selected value="" disabled selected>Selecciona Uno...</option>
                        @foreach ($proveedores as $p)
                            <option value="{{$p->id}}" {{$p->id == old('proveedor') ? 'selected' : ''}}>{{$p->nombre_proveedor}}</option>
                        @endforeach
                        </select>
                          @if($errors->has('proveedor'))
                          <p class="input-error">{{$errors->first('proveedor')}}</p>
                        @endif
                        </div>
                      </div>

                      <div class="sm:col-span-3">
                        <!-- Precio -->
                        <x-form.input :type="'text'" :name="'marca'" :value="old('marca')" :label="'Marca'"></x-form.input>
                    </div>


                    <div class="sm:col-span-3">
                        <!-- Unidades  -->
                        <x-form.input :type="'number'" :name="'unidades'" :value="old('unidades')" :label="'Unidades'"></x-form.input>
                    </div>

                    <div class="sm:col-span-3">
                        <!-- Precio -->
                        <x-form.input :type="'text'" :name="'precio'" :value="old('precio')" :label="'Precio'"></x-form.input>
                    </div>

                    <div class="col-span-full">
                        <!-- Descripción -->
                        <x-form.textarea :label="'Descripción del producto'" :name="'descripcion'" :value="old('descripcion')"></x-form.textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="form-button bg-darkOrange hover:bg-orange-500 "><a
                    href="{{route('producto.index')}}">Cancelar</a></button>
            <button type="submit"
                class="form-button bg-turquoiseMedium  hover:bg-turquoiseMediumDark">Guardar</button>
        </div>
    </form>

</x-adminPanel.admin-panel-layout>