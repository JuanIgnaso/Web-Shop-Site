
@section('title')
    {{ $titulo}}
@endsection

<x-adminPanel.admin-panel-layout>
    <h1 class="mt-4 mb-6 text-center">@yield('title')</h1>

        <div class="mb-16">
            <div class="w-[90%] lg:w-[80%] m-auto relative overflow-x-auto mt-4 sm:rounded-lg">

                {{-- Fitros --}}
                <section x-data="{ show: false}" class="mb-6">
                    <h2 @click="show = !show" :aria-expanded="show ? 'true' : 'false'" class="text-2xl cursor-pointer text-lochinvar">Filtros <i :class="show ? 'fa-solid fa-caret-right text-dixie' : 'fa-solid fa-caret-down text-dixie' "></i></h2>
                    <form x-show="show" x-transition action="" method="get" class="mb-8 border-b-2 border-b-gray-200/50">
                    @csrf
                        <div class="grid grid-cols-1 gap-4 mb-4 sm:grid-cols-2 md:grid-cols-3">
                            <x-form.input :type="'text'" :name="'name'" :label="'Nombre'" :value="Request::get('name')"></x-form.input>
                            <x-form.input :type="'text'" :name="'email'" :label="'Dirección de correo'" :value="Request::get('email')"></x-form.input>
                            <div>
                                {{-- Selector de proveedores --}}
                                <x-form.select :label="'Clase de usuario'" :name="'clase'" :multiple="true" :show="'clase'" :values="$clases"></x-form.select>
                            </div>
                        </div>
                        <div class="flex justify-center mb-4 space-x-2 md:justify-end">
                            <button type="submit" class="primary-button">Aplicar Filtros</button>
                            <button type="button" class="primary-button"><a href="{{URL::current()}}">Limpiar Filtros</a></button>
                        </div>
                    </form>
                </section>


                <table class="w-full text-sm text-left text-gray-500 rtl:text-right ">
                    <thead class="text-xs text-center text-white uppercase bg-sandrift ">
                        <tr>
                            <!-- id,nombre,email,clase,created_at -->
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                               Nombre usuario
                            </th>
                            <th scope="col" class="px-6 py-3">
                               Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                               Clase
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Registrado en
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                        <tr class="table-row text-center">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                {{$usuario->id}}
                            </th>

                            <td class="px-6 py-4">
                                {{$usuario->name}}
                            </td>

                            <td class="px-6 py-4">
                                {{$usuario->email}}
                            </td>

                            <td class="px-6 py-4">
                                {{$usuario->claseUsuario}}
                            </td>

                            <td class="px-6 py-4">
                                {{$usuario->created_at}}
                            </td>
                            <td class="px-6 py-4">
                                @if(Auth::user()->id != $usuario->id)
                                <div class="flex justify-center gap-2 ">
                                    <a class="admin-panel-action-button bg-emerald-500 hover:bg-emerald-400" href="{{route('user.show',$usuario)}}"><i class="fa-solid fa-eye"></i></a>

                                    {{-- Si el usuario se encuentra o no activo --}}

                                    @if($usuario->activo == 1)
                                        <form action="{{route('user.toggle',$usuario->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="bg-yellow-500 admin-panel-action-button hover:bg-yellow-400" href=""><i class="fa-solid fa-toggle-on"></i></button>
                                        </form>
                                    @else
                                        <form action="{{route('user.toggle',$usuario->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                        <button type="submit" class="admin-panel-action-button bg-neutral-600 hover:bg-neutral-500" href=""><i class="fa-solid fa-toggle-off"></i></button>
                                        </form>
                                    @endif

                                    <a class="bg-blue-500 admin-panel-action-button hover:bg-blue-400" href="{{route('user.edit',$usuario)}}"><i class="fa-solid fa-pen-nib"></i></a>

                                </div>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Paginación --}}
            <x-ui.pagination :source="$usuarios"></x-ui.pagination>

        </div>
</x-adminPanel.admin-panel-layout>