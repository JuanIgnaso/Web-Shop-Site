
@section('title')
{{ 'Panel de Control'}}
@endsection

<x-adminPanel.admin-panel-layout>
    <!-- Panel de control -->
    <div class="grid mb-12 gap-y-10 gap-x-6 md:grid-cols-2 xl:grid-cols-4">

        <!-- Elemento -->
        <div class="relative flex flex-col text-gray-800 bg-white shadow-md bg-clip-border rounded-xl">
          <div class="absolute grid w-16 h-16 mx-4 -mt-4 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl bg-gradient-to-tr from-blue-600 to-blue-400 shadow-blue-500/40 place-items-center">
            <i class="text-2xl fa-solid fa-cube"></i>
          </div>
          <div class="p-4 text-right">
            <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-600">Productos Totales</p>
            <h4 class="block font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">{{$data['productos']['totales']}}</h4>
          </div>
          <div class="p-4 border-t border-azulMargarita">
            <p class="block font-sans text-sm antialiased font-normal leading-relaxed text-blue-gray-600">
              <strong class="text-green-500">Último registro </strong>&nbsp;{{!isset($data['productos']['ultimo'])  ? 'Sin registros' : $data['productos']['ultimo']}}
            </p>
          </div>
        </div>

        <div class="relative flex flex-col text-gray-800 bg-white shadow-md bg-clip-border rounded-xl">
          <div class="absolute grid w-16 h-16 mx-4 -mt-4 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl bg-gradient-to-tr from-pink-600 to-pink-400 shadow-pink-500/40 place-items-center">
            <i class="text-2xl fa-solid fa-icons"></i>
          </div>
          <div class="p-4 text-right">
            <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-600">Categorías existentes</p>
            <h4 class="block font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">{{$data['categorias']['totales']}}</h4>
          </div>
          <div class="p-4 border-t border-azulMargarita">
            <p class="block font-sans text-sm antialiased font-normal leading-relaxed text-blue-gray-600">
              <strong class="text-green-500">Último registro </strong>&nbsp;{{!isset($data['categorias']['ultimo'])  ? 'Sin registros' : $data['categorias']['ultimo']}}
            </p>
          </div>
        </div>

        <div class="relative flex flex-col text-gray-800 bg-white shadow-md bg-clip-border rounded-xl">
          <div class="absolute grid w-16 h-16 mx-4 -mt-4 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl bg-gradient-to-tr from-green-600 to-green-400 shadow-green-500/40 place-items-center">
            <i class="text-2xl fa-solid fa-truck-ramp-box"></i>
          </div>
          <div class="p-4 text-right">
            <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-600">Proveedores actuales</p>
            <h4 class="block font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">{{$data['proveedores']['totales']}}</h4>
          </div>
          <div class="p-4 border-t border-azulMargarita">
            <p class="block font-sans text-sm antialiased font-normal leading-relaxed text-blue-gray-600">
              <strong class="text-green-500">Último registro </strong>&nbsp;{{!isset($data['proveedores']['ultimo'])  ? 'Sin registros' : $data['proveedores']['ultimo']}}
            </p>
          </div>
        </div>

        <div class="relative flex flex-col text-gray-800 bg-white shadow-md bg-clip-border rounded-xl">
          <div class="absolute grid w-16 h-16 mx-4 -mt-4 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl bg-gradient-to-tr from-orange-600 to-orange-400 shadow-orange-500/40 place-items-center">
            <i class="text-2xl fa-solid fa-user"></i>
          </div>
          <div class="p-4 text-right">
            <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-600">Usuarios registrados</p>
            <h4 class="block font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">{{$data['usuarios']['totales']}}</h4>
          </div>
          <div class="p-4 border-t border-azulMargarita">
            <p class="block font-sans text-sm antialiased font-normal leading-relaxed text-blue-gray-600">
              <strong class="text-green-500">Último registro </strong>&nbsp;{{!isset($data['usuarios']['ultimo'])  ? 'Sin registros' : $data['usuarios']['ultimo']}}
            </p>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-1 gap-6 mb-16 xl:grid-cols-3">
        <div class="relative flex flex-col overflow-hidden text-gray-700 bg-white shadow-md bg-clip-border rounded-xl xl:col-span-2">
          <div class="relative flex items-center justify-between p-6 m-0 overflow-hidden text-gray-700 bg-transparent shadow-none bg-clip-border rounded-xl">
            <div>
              <h5 class="block mb-1 text-xl antialiased font-semibold leading-relaxed tracking-normal text-eternity">Actividad Reciente</h5>
              <p class="flex items-center gap-1 font-sans text-sm antialiased font-normal leading-normal text-blue-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" aria-hidden="true" class="w-4 h-4 text-blue-500">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                </svg>
                <strong class="text-coldPurple">{{ $data['registros']['totalesMes'] }} Nuevos registros</strong> los últimos 30 días
              </p>
            </div>

          </div>
          <div class="p-6 px-0 pt-0 pb-2 overflow-x-scroll">
            <table class="w-full min-w-[640px] table-auto">
              <thead class="bg-turquoiseWhite text-shingleFawn">
                <tr>
                  <th class="px-6 py-3 text-left border-b border-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-medium uppercase text-blue-gray-400">Operación</p>
                  </th>
                  <th class="px-6 py-3 text-left border-b border-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-medium uppercase text-blue-gray-400">Tabla</p>
                  </th>
                  <th class="px-6 py-3 text-left border-b border-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-medium uppercase text-blue-gray-400">Usuario</p>
                  </th>
                  <th class="px-6 py-3 text-left border-b border-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-medium uppercase text-blue-gray-400">Fecha</p>
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data['registros']['ultimos'] as $registro)
                <tr class="odd:bg-white even:bg-linen">
                    <td class="px-5 py-3 border-b border-blue-gray-50">
                      <div class="flex items-center gap-4">
                        <p class="block font-sans text-sm antialiased font-bold leading-normal text-blue-gray-900">{{$registro->operacion}}</p>
                      </div>
                    </td>

                    <td class="px-5 py-3 border-b border-blue-gray-50">
                      <p class="block font-sans text-xs antialiased font-medium text-blue-gray-600">{{$registro->tabla}}</p>
                    </td>
                    <td class="px-5 py-3 border-b border-blue-gray-50">
                        <p class="block font-sans text-xs antialiased font-medium text-blue-gray-600">{{$registro->name}}</p>
                    </td>
                    <td class="px-5 py-3 border-b border-blue-gray-50">
                      <p class="block font-sans text-xs antialiased font-medium text-blue-gray-600">{{$registro->ocurrido_en}}</p>
                  </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
            <a href="{{route('registros.index')}}" class="self-end p-6 text-sm font-bold hover:text-lochinvar">Ver tabla de registros...</a>
        </div>
      </div>

</x-adminPanel.admin-panel-layout>