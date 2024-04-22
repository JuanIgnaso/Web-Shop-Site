
@section('title')
    {{ $titulo}}
@endsection

<x-adminPanel.admin-panel-layout>
    <h1 class="text-center mt-4">@yield('title')</h1>

    <!-- INDEX -->
<main>
<div class="w-2/3 m-auto relative overflow-x-auto mt-4 mb-16 sm:rounded-lg">
    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none "><a href="{{route('categoria.create')}}">Añadir nuevo</a></button>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Categoría Padre
                </th>
                <th scope="col" class="px-6 py-3">
                    Creado
                </th>
                <th scope="col" class="px-6 py-3">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
            <tr class="odd:bg-white  even:bg-gray-50  border-b ">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                    {{$categoria->id}}
                </th>
                <td class="px-6 py-4">
                    {{$categoria->nombre_categoria}}
                </td>
                <td class="px-6 py-4">
                    {{$categoria->categoriaPadre}}
                </td>
                <td class="px-6 py-4">
                    {{$categoria->created_at}}
                </td>
                <td class="px-6 py-4 flex gap-2">
                    <a href="{{route('categoria.edit',$categoria)}}" class="font-medium text-blue-600  hover:underline">Editar</a>
                    <a href="{{route('categoria.show',$categoria)}}" class="font-medium text-yellow-600  hover:underline">Ver</a>
                    <form action="{{route('categoria.destroy',$categoria)}}" method="POST">
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


</x-adminPanel.admin-panel-layout>