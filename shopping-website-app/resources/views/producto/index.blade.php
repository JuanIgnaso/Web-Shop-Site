@section('title')
{{ $titulo}}
@endsection
<x-adminPanel.admin-panel-layout>
    <h1 class="mt-4 text-center">Lista de Productos</h1>

    <div class="mb-16">
        <div class="w-[90%] lg:w-[80%] m-auto relative overflow-x-auto mt-4 sm:rounded-lg">

            {{-- FILTROS --}}
            <section x-data="{ show: false,open: 'v',closed: '>' }" class="mb-4">
                <h2 @click="show = !show" :aria-expanded="show ? 'true' : 'false'" class="text-2xl cursor-pointer text-turquoiseMediumDark">Filtros <span class="text-darkOrange" x-text="show ? open : closed"> </span></h2>
                <form x-show="show" x-transition action="" method="get" class="mb-8 border-b-2 border-b-gray-200/50">
                @csrf
                    <div class="grid grid-cols-1 gap-4 mb-4 sm:grid-cols-2 md:grid-cols-3">
                        <x-form.input :type="'text'" :name="'nombreProducto'" :label="'Nombre'" :value="Request::get('nombreProducto')"></x-form.input>
                        <x-form.input :type="'text'" :name="'val_minimo'" :label="'Mínimo Precio'" :value="Request::get('val_minimo')"></x-form.input>
                        <x-form.input :type="'text'" :name="'val_maximo'" :label="'Máximo Precio'" :value="Request::get('val_maximo')"></x-form.input>
                        <div>
                            {{-- Selector de categorías --}}
                            <x-form.select :label="'Categoría'" :name="'categoria'" :multiple="true" :show="'nombre_categoria'" :values="$categoria"></x-form.select>
                        </div>

                        <div>
                            {{-- Selector de proveedores --}}
                            <x-form.select :label="'Proveedor'" :name="'proveedor'" :multiple="true" :show="'nombre_proveedor'" :values="$proveedor"></x-form.select>
                        </div>
                    </div>
                    <div class="flex justify-center mb-4 space-x-2 md:justify-end">
                        <button type="submit" class="text-white bg-lochinvar hover:bg-dixie focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none ">Aplicar Filtros</button>
                        <button type="button" class="text-white bg-lochinvar hover:bg-dixie focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none "><a href="{{URL::current()}}">Limpiar Filtros</a></button>
                    </div>
                </form>
            </section>
            {{-- --}}

            <button type="button" class="text-white bg-lochinvar hover:bg-dixie  focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none "><a href="{{route('producto.create')}}">Añadir nuevo</a></button>

            <table class="w-full text-sm text-left text-gray-500 rtl:text-right ">
                <thead class="text-xs text-center text-white uppercase bg-sandrift ">
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
                    <tr class="table-row text-center">
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
                            {{$producto->nombre_proveedor}}
                        </td>
                        <td class="px-6 py-4">
                            {{$producto->precio}}
                        </td>
                        <td class="px-6 py-4">
                            {{$producto->unidades}}
                        </td>
                        <td class="px-6 py-4">
                            <x-adminPanel.actions :objPathName="'producto'" :object="$producto" :actions="['edit','show','destroy']"></x-adminPanel.actions>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Paginación --}}
        <x-ui.pagination :source="$productos"></x-ui.pagination>

    </div>
</x-adminPanel.admin-panel-layout>