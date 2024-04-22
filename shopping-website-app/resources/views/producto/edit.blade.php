@section('title')
{{ $titulo}}
@endsection
<x-adminPanel.admin-panel-layout>
    <h1 class="text-center font-bold mt-4">@yield('title')</h1>

    <form class="element-form" action="{{route('producto.update',$producto)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="nombreProducto"
                            class="block text-sm font-medium leading-6 text-gray-900">Nombre</label>
                        <div class="mt-2">
                            <input type="text" name="nombreProducto" id="nombreProducto"
                                value="{{old('nombreProducto',$producto->nombreProducto)}}"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                placeholder="introduce un nombre...">
                            @if($errors->has('nombreProducto'))
                            <p class="input-error">{{$errors->first('nombreProducto')}}</p>
                            @endif
                        </div>
                    </div>


                    <div class="sm:col-span-3">
                        <label for="categoria" class="block text-sm font-medium leading-6 text-gray-900">Categoría</label>
                        <div class="mt-2">
                          <select id="categoria" name="categoria"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option selected value="" disabled selected>Selecciona Una...</option>
                            @foreach($categorias as $c)
                                <option value="{{$c->id}}"{{ $producto->categoria == $c->id ? 'selected' : '' }} >{{$c->nombre_categoria}}</option>
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
                            <option value="{{$p->id}}" {{ $producto->proveedor == $p->id ? 'selected' : '' }}>{{$p->nombre_proveedor}}</option>
                        @endforeach
                        </select>
                          @if($errors->has('proveedor'))
                          <p class="input-error">{{$errors->first('proveedor')}}</p>
                        @endif
                        </div>
                      </div>

                    <div class="sm:col-span-3">
                        <label for="unidades"
                            class="block text-sm font-medium leading-6 text-gray-900">Unidades</label>
                        <div class="mt-2">
                            <input type="number" name="unidades" id="unidades"
                                value="{{old('unidades',$producto->unidades)}}"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                placeholder="introduce un número...">
                            @if($errors->has('unidades'))
                            <p class="input-error">{{$errors->first('unidades')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="precio"
                            class="block text-sm font-medium leading-6 text-gray-900">Precio</label>
                        <div class="mt-2">
                            <input type="text" name="precio" id="precio"
                                value="{{old('precio',$producto->precio)}}"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                placeholder="introduce un número...">
                            @if($errors->has('precio'))
                            <p class="input-error">{{$errors->first('precio')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="descripcion"
                            class="block text-sm font-medium leading-6 text-gray-900">Descripcion</label>
                        <div class="mt-2">
                            <textarea id="descripcion" name="descripcion" rows="3"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{old('descripcion',$producto->descripcion)}}</textarea>
                        </div>
                        @if($errors->has('descripcion'))
                        <p class="input-error">{{$errors->first('descripcion')}}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900"><a
                    href="{{route('producto.index')}}">Cancelar</a></button>
            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar</button>
        </div>
    </form>

</x-adminPanel.admin-panel-layout>