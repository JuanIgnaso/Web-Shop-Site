@section('title')
{{ $titulo}}
@endsection
<x-adminPanel.admin-panel-layout>
    <h1 class="mt-4 font-bold text-center">@yield('title')</h1>

    <div class="w-2/3 m-auto mb-16 md:w-1/2">
        <div class="px-4 mt-5 divide-y sm:px-0 ">
          <h3 class="font-semibold leading-7 text-center text-gray-900">Aquí se muestran los datos del producto <strong class="font-bold">ID - {{$producto->id}}</strong></h3>
        </div>
        <div class="mt-6 border-t border-gray-100">
          <dl class="divide-y divide-gray-300">
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
              <dt class="text-sm font-medium leading-6 text-gray-900">Nombre</dt>
              <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$producto->nombreProducto}}</dd>
            </div>

            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-gray-900">Descripción del Producto</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$producto->descripcion}}</dd>
            </div>

            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-gray-900">Categoría</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$producto->categoria}}</dd>
            </div>

            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-gray-900">Proveedor</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$producto->proveedor}}</dd>
            </div>

           <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
              <dt class="text-sm font-medium leading-6 text-gray-900">Marca</dt>
              <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ucfirst($producto->marca)}}</dd>
          </div>

            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-gray-900">Precio</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$producto->precio.'€'}}</dd>
            </div>

            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-gray-900">Unidades</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$producto->unidades.' ud'}}</dd>
            </div>

            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-gray-900">Creado en:</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$producto->created_at}}</dd>
            </div>

          </dl>
        </div>

            {{-- Acciones --}}
            <div class="flex items-center justify-end mt-6 gap-x-6">
              <button type="button" class="text-white bg-lochinvar hover:bg-dixie  focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none "><a href="{{route('producto.index')}}">Volver</a></button>
              <form action="{{route('producto.destroy',$producto)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="text-white bg-arbolCoral  focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none ">Borrar</button>
              </form>
              <button type="button" class="text-white bg-coldPurple hover:bg-purple-500  focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none "><a href="{{route('producto.edit',$producto)}}">Editar</a></button>
            </div>

      </div>

</x-adminPanel.admin-panel-layout>