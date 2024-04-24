
@section('title')
    {{ $titulo}}
@endsection

<x-adminPanel.admin-panel-layout>
    <h1 class="text-center mt-4 mb-6">@yield('title')</h1>
        <!-- INDEX -->
        <button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar" aria-controls="sidebar-multi-level-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
         </button>
        <div class="mb-16">
            <div class="w-[90%] lg:w-[80%] m-auto relative overflow-x-auto mt-4 sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
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
                        <tr class="table-row ">
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
                                <div class=" flex justify-center gap-2">
                                    <a class="grid h-10 w-10 place-items-center rounded-xl bg-gradient-to-tr from-emerald-600 to-emerald-400 shadow-emerald-500/40 text-white  md:text-xl" href="{{route('user.show',$usuario)}}"><i class="fa-solid fa-eye"></i></a>
                                    <a class="grid h-10 w-10 place-items-center rounded-xl bg-gradient-to-tr from-yellow-600 to-yellow-400 shadow-yellow-500/40 text-white md:text-xl" href=""><i class="fa-solid fa-toggle-on"></i></a>
                                    <a class="grid h-10 w-10 place-items-center rounded-xl bg-gradient-to-tr from-blue-800 to-blue-600 shadow-blue-600/40 text-white  md:text-xl" href=""><i class="fa-solid fa-pen-nib"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
</x-adminPanel.admin-panel-layout>