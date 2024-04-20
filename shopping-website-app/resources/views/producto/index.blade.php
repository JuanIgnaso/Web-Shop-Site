<x-app-layout>
    <h1 class="text-center mt-4">Lista de Proveedores</h1>

    <!-- INDEX -->
<main>
<div class="w-2/3 m-auto relative overflow-x-auto mt-4 sm:rounded-lg">
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
            <tr class="odd:bg-white  even:bg-gray-50  border-b ">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                    {{$producto->id}}
                </th>
                <td class="px-6 py-4">
                    {{$producto->nombreProducto}}
                </td>
                <td class="px-6 py-4">
                    {{Str::words($producto->descripcion,20) }}
                </td>
                <td class="px-6 py-4">
                    {{$producto->categoria}}
                </td>
                <td class="px-6 py-4">
                    {{$producto->proveedor}}
                </td>
                <td class="px-6 py-4">
                    {{$producto->precio}}
                </td>
                <td class="px-6 py-4">
                    {{$producto->unidades}}
                </td>
                <td class="px-6 py-4 flex gap-2">
                    <a href="{{route('producto.edit',$producto)}}" class="font-medium text-blue-600  hover:underline">Editar</a>
                    <a href="{{route('producto.show',$producto)}}" class="font-medium text-yellow-600  hover:underline">Ver</a>
                    <form action="{{route('producto.destroy',$producto)}}" method="POST">
                        @csrf
                        @method('DELETE') <!-- Modificamos método del formulario -->
                        <button class="font-medium text-red-600  hover:underline">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</main>


</x-app-layout>