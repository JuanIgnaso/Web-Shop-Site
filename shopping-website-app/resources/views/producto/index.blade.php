@section('title')
{{ $titulo}}
@endsection
<x-adminPanel.admin-panel-layout>
    <h1 class="text-center mt-4">Lista de Productos</h1>

    <!-- INDEX -->

    <button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar" aria-controls="sidebar-multi-level-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
     </button>
    <div class="mb-16">
        <div class="w-[90%] lg:w-[80%] m-auto relative overflow-x-auto mt-4 sm:rounded-lg">
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none "><a href="{{route('producto.create')}}">Añadir nuevo</a></button>

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre Producto
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Descripción
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Categoría
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Proveedor
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Precio
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Unidades
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                    <tr class="table-row">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                            {{$producto->id}}
                        </th>
                        <td class="px-6 py-4">
                            {{$producto->nombreProducto}}
                        </td>
                        <td class="px-6 py-4">
                            {{Str::words($producto->descripcion,10) }}
                        </td>
                        <td class="px-6 py-4">
                            {{$producto->nombre_categoria}}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{route('proveedor.show',$producto->proveedor)}}">{{$producto->proveedor}}</a>
                        </td>
                        <td class="px-6 py-4">
                            {{$producto->precio}}
                        </td>
                        <td class="px-6 py-4">
                            {{$producto->unidades}}
                        </td>
                        <td class="px-6 py-4">
                            <div class=" flex justify-center gap-2">
                                <a href="{{route('producto.edit',$producto)}}" class="font-medium text-blue-600  hover:underline">Editar</a>
                            <a href="{{route('producto.show',$producto)}}" class="font-medium text-yellow-600  hover:underline">Ver</a>
                            <form action="{{route('producto.destroy',$producto)}}" method="POST">
                                @csrf
                                @method('DELETE') <!-- Modificamos método del formulario -->
                                <button class="font-medium text-red-600  hover:underline">Borrar</button>
                            </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-adminPanel.admin-panel-layout>