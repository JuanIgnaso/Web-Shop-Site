@section('title')
{{ $titulo}}
@endsection
<x-adminPanel.admin-panel-layout>
    <h1 class="text-center mt-4">Lista de Proveedores</h1>

    <!-- INDEX -->
<main>
<div class="w-[90%] lg:w-[80%] m-auto relative overflow-x-auto mt-4 mb-16 sm:rounded-lg">
    <form action="" method="get" class="mb-8 border-b-2 border-b-gray-200/50">
        <h2 class="text-2xl">Filtros</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-4">
            <x-form.input :type="'text'" :name="'nombre_proveedor'" :label="'Nombre'" :value="Request::get('nombre_proveedor')"></x-form.input>
            <x-form.input :type="'text'" :name="'email'" :label="'Dirección de correo'" :value="Request::get('email')"></x-form.input>
            <x-form.input :type="'text'" :name="'website'" :label="'Página Web'" :value="Request::get('web')"></x-form.input>
        </div>
        <div class="flex justify-center md:justify-end space-x-2">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none ">Aplicar Filtros</button>
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none "><a href="{{URL::current()}}">Limpiar Filtros</a></button>
        </div>
    </form>
    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none "><a href="{{route('proveedor.create')}}">Añadir nuevo</a></button>
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
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Website
                </th>
                <th scope="col" class="px-6 py-3">
                    Telefono
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
            @foreach ($proveedores as $proveedor)
            <tr class="table-row ">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                    {{$proveedor->id}}
                </th>
                <td class="px-6 py-4">
                    {{$proveedor->nombre_proveedor}}
                </td>
                <td class="px-6 py-4">
                    {{$proveedor->email}}
                </td>
                <td class="px-6 py-4">
                    {{$proveedor->website}}
                </td>
                <td class="px-6 py-4">
                    {{$proveedor->telefono}}
                </td>
                <td class="px-6 py-4">
                    {{$proveedor->created_at}}
                </td>
                <td class="px-6 py-4">
                    <div class=" flex justify-center gap-2">
                        <a href="{{route('proveedor.edit',$proveedor)}}" class="admin-panel-action-button blue-gradient shadow-blue-600/40"><i class="fa-solid fa-pen-nib"></i></a>
                            <a href="{{route('proveedor.show',$proveedor)}}" class="admin-panel-action-button emerald-gradient shadow-emerald-500/40"><i class="fa-solid fa-eye"></i></a>
                            <form action="{{route('proveedor.destroy',$proveedor)}}" method="POST">
                                @csrf
                                @method('DELETE') <!-- Modificamos método del formulario -->
                                <button class="admin-panel-action-button rose-gradient shadow-rose-500/40"><i class="fa-solid fa-minus"></i></button>
                            </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

 {{-- Paginación --}}
 <x-ui.pagination :source="$proveedores"></x-ui.pagination>

</main>

</x-adminPanel.admin-panel-layout>