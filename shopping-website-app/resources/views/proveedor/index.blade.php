@section('title')
{{ $titulo}}
@endsection
<x-adminPanel.admin-panel-layout>
    <h1 class="mt-4 text-center">Lista de Proveedores</h1>
<main>
<div class="w-[90%] lg:w-[80%] m-auto relative overflow-x-auto mt-4 mb-16 sm:rounded-lg">

    {{-- Fitros --}}
    <section x-data="{ show: false,open: 'v',closed: '>' }" class="mb-4">
        <h2 @click="show = !show" :aria-expanded="show ? 'true' : 'false'" class="text-2xl cursor-pointer text-turquoiseMediumDark">Filtros <span class="text-darkOrange" x-text="show ? open : closed"> </span></h2>
        <form x-show="show" x-transition action="" method="get" class="mb-8 border-b-2 border-b-gray-200/50">
        @csrf
            <div class="grid grid-cols-1 gap-4 mb-4 sm:grid-cols-2 md:grid-cols-3">
                <x-form.input :type="'text'" :name="'nombre_proveedor'" :label="'Nombre'" :value="Request::get('nombre_proveedor')"></x-form.input>
                <x-form.input :type="'text'" :name="'email'" :label="'Dirección de correo'" :value="Request::get('email')"></x-form.input>
                <x-form.input :type="'text'" :name="'website'" :label="'Página Web'" :value="Request::get('website')"></x-form.input>
            </div>
            <div class="flex justify-center mb-4 space-x-2 md:justify-end">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none ">Aplicar Filtros</button>
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none "><a href="{{URL::current()}}">Limpiar Filtros</a></button>
            </div>
        </form>
    </section>
    <button type="button" class="text-white bg-lochinvar hover:bg-dixie  focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none "><a href="{{route('proveedor.create')}}">Añadir nuevo</a></button>

    <table class="w-full text-sm text-left text-gray-500 rtl:text-right ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
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
                    {{-- ACCIONES --}}
                   <x-adminPanel.actions :objPathName="'proveedor'" :object="$proveedor" :actions="['edit','show','destroy']"></x-adminPanel.actions>
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