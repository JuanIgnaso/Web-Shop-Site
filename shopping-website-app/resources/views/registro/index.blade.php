
@section('title')
    {{ $titulo}}
@endsection

<x-adminPanel.admin-panel-layout>
    <h1 class="text-center mt-4 mb-6">@yield('title')</h1>

        <div class="mb-16">
            <div class="w-[90%] lg:w-[80%] m-auto relative overflow-x-auto mt-4 sm:rounded-lg">

                {{-- Filtros --}}

                <section x-data="{ show: false,open: 'v',closed: '>' }" class="mb-4">
                    <h2 @click="show = !show" :aria-expanded="show ? 'true' : 'false'" class="text-2xl cursor-pointer text-turquoiseMediumDark">Filtros <span class="text-darkOrange" x-text="show ? open : closed"> </span></h2>
                    <form x-show="show" x-transition action="" method="get" class="mb-8 border-b-2 border-b-gray-200/50">
                    @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-4">
                            <x-form.input :type="'text'" :name="'tabla'" :label="'Tabla'" :value="Request::get('tabla')"></x-form.input>
                            <div>
                                <x-form.select :label="'Usuario'" :name="'usuario'" :multiple="true" :show="'name'" :values="$usuarios"></x-form.select>
                            </div>
                            <x-form.input :type="'text'" :name="'operacion'" :label="'Operación'" :value="Request::get('operacion')"></x-form.input>
                        </div>
                        <div class="flex justify-center md:justify-end space-x-2 mb-4">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none ">Aplicar Filtros</button>
                            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none "><a href="{{URL::current()}}">Limpiar Filtros</a></button>
                        </div>
                    </form>
                </section>

                <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Operación
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tabla
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Usuario
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Ocurrido en
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registros as $registro)
                        <tr class="table-row ">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                {{$registro->id}}
                            </th>

                            <td class="px-6 py-4">
                                {{$registro->operacion}}
                            </td>

                            <td class="px-6 py-4">
                                {{$registro->tabla}}
                            </td>

                            <td class="px-6 py-4">
                                {{$registro->name}}
                            </td>

                            <td class="px-6 py-4">
                                {{$registro->ocurrido_en}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Paginación --}}
            <x-ui.pagination :source="$registros"></x-ui.pagination>

        </div>
</x-adminPanel.admin-panel-layout>