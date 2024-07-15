
@section('title')
    {{ $titulo}}
@endsection

<x-adminPanel.admin-panel-layout>
    <h1 class="mt-4 mb-6 text-center">@yield('title')</h1>

        <div class="mb-16">
            <div class="w-[90%] lg:w-[80%] m-auto relative overflow-x-auto mt-4 sm:rounded-lg">

                {{-- Filtros --}}

                <section  x-data="{ show: false,open: 'v',closed: '>' }" class="mb-4">
                    <h2 @click="show = !show" :aria-expanded="show ? 'true' : 'false'" class="text-2xl cursor-pointer text-turquoiseMediumDark">Filtros <span class="text-darkOrange" x-text="show ? open : closed"> </span></h2>
                    <form x-show="show" x-transition action="" method="get" class="mb-8 border-b-2 border-b-gray-200/50">
                    @csrf
                        <div class="grid grid-cols-1 gap-4 mb-4 sm:grid-cols-2 md:grid-cols-3">
                            <x-form.input :type="'text'" :name="'cabecera'" :label="'Cabecera'" :value="Request::get('cabecera')"></x-form.input>
                            <div>
                                <x-form.select :label="'Usuario'" :name="'usuario'" :multiple="true" :show="'name'" :values="$usuarios"></x-form.select>
                            </div>
                            <div>
                                <x-form.select :label="'Producto'" :name="'producto'" :multiple="true" :show="'nombreProducto'" :values="$productos"></x-form.select>
                            </div>
                            <x-form.input :type="'text'" :name="'review'" :label="'Cuerpo Review'" :value="Request::get('review')"></x-form.input>
                        </div>
                        <div class="flex justify-center mb-4 space-x-2 md:justify-end">
                            <button type="submit" class="text-white bg-lochinvar hover:bg-dixie focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none ">Aplicar Filtros</button>
                            <button type="button" class="text-white bg-lochinvar hover:bg-dixie focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none "><a href="{{URL::current()}}">Limpiar Filtros</a></button>
                        </div>
                    </form>
                </section>

                <table class="w-full text-sm text-left text-gray-500 rtl:text-right ">
                    <thead class="text-xs text-center text-white uppercase bg-sandrift">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Cabecera
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Review
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Producto
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Usuario
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Puntuación
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Recomendado
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Fecha
                            </th>
                            <th>
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($reviews as $review)
                                <tr  class="table-row">
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">{{$review->id}}</td>
                                    <td class="px-6 py-4">{{Str::words($review->cabecera,5)}}</td>
                                    <td class="px-6 py-4">{{Str::words($review->review,10)}}</td>
                                    <td class="px-6 py-4">{{$review->nombreProducto}}</td>
                                    <td class="px-6 py-4">{{$review->name}}</td>
                                    <td class="px-6 py-4">{{$review->puntuacion}}</td>
                                    <td class="px-6 py-4">
                                        @if ($review->recomendado == 1)
                                        <i class="text-xl text-green-400 fa-solid fa-thumbs-up"></i>
                                        @else
                                        <i class="text-xl text-red-400 fa-solid fa-thumbs-down"></i>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">{{$review->created_at}}</td>
                                    <td class="px-6 py-4">
                                        <x-adminPanel.actions :objPathName="'review'" :object="$review" :actions="['destroy']"></x-adminPanel.actions>
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Paginación --}}
            <x-ui.pagination :source="$reviews"></x-ui.pagination>

        </div>
</x-adminPanel.admin-panel-layout>