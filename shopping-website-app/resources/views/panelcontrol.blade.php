
@section('title')
{{ 'Panel de Control'}}
@endsection

<x-adminPanel.admin-panel-layout>
    <!-- Panel de control -->
    <div class="mb-12 grid gap-y-10 gap-x-6 md:grid-cols-2 xl:grid-cols-4">

        <!-- Elemento -->
        <div class="relative flex flex-col bg-clip-border rounded-xl bg-turquoiseLight text-gray-800 shadow-md">
          <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-blue-600 to-blue-400 text-white shadow-blue-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
            <i class="fa-solid fa-cube text-2xl"></i>
          </div>
          <div class="p-4 text-right">
            <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Productos Totales</p>
            <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">{{$data['productos']['totales']}}</h4>
          </div>
          <div class="border-t border-blue-gray-50 p-4">
            <p class="block antialiased font-sans text-sm leading-relaxed font-normal text-blue-gray-600">
              <strong class="text-green-500">Último registro </strong>&nbsp;{{$data['productos']['ultimo'][0]['created_at']}}
            </p>
          </div>
        </div>

        <div class="relative flex flex-col bg-clip-border rounded-xl bg-turquoiseLight text-gray-800 shadow-md">
          <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-pink-600 to-pink-400 text-white shadow-pink-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
            <i class="fa-solid fa-icons text-2xl"></i>
          </div>
          <div class="p-4 text-right">
            <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Categorías existentes</p>
            <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">{{$data['categorias']['totales']}}</h4>
          </div>
          <div class="border-t border-blue-gray-50 p-4">
            <p class="block antialiased font-sans text-sm leading-relaxed font-normal text-blue-gray-600">
              <strong class="text-green-500">Último registro </strong>&nbsp;{{$data['categorias']['ultimo'][0]['created_at']}}
            </p>
          </div>
        </div>

        <div class="relative flex flex-col bg-clip-border rounded-xl bg-turquoiseLight text-gray-800 shadow-md">
          <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-green-600 to-green-400 text-white shadow-green-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
            <i class="fa-solid fa-truck-ramp-box text-2xl"></i>
          </div>
          <div class="p-4 text-right">
            <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Proveedores actuales</p>
            <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">{{$data['proveedores']['totales']}}</h4>
          </div>
          <div class="border-t border-blue-gray-50 p-4">
            <p class="block antialiased font-sans text-sm leading-relaxed font-normal text-blue-gray-600">
              <strong class="text-green-500">Último registro </strong>&nbsp;{{$data['proveedores']['ultimo'][0]['created_at']}}
            </p>
          </div>
        </div>

        <div class="relative flex flex-col bg-clip-border rounded-xl bg-turquoiseLight text-gray-800 shadow-md">
          <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-orange-600 to-orange-400 text-white shadow-orange-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
            <i class="fa-solid fa-user text-2xl"></i>
          </div>
          <div class="p-4 text-right">
            <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Usuarios registrados</p>
            <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">{{$data['usuarios']['totales']}}</h4>
          </div>
          <div class="border-t border-blue-gray-50 p-4">
            <p class="block antialiased font-sans text-sm leading-relaxed font-normal text-blue-gray-600">
              <strong class="text-green-500">Último registro </strong>&nbsp;{{$data['usuarios']['ultimo'][0]['created_at']}}
            </p>
          </div>
        </div>
      </div>

      <div class="mb-16 grid grid-cols-1 gap-6 xl:grid-cols-3">
        <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md overflow-hidden xl:col-span-2">
          <div class="relative bg-clip-border rounded-xl overflow-hidden bg-transparent text-gray-700 shadow-none m-0 flex items-center justify-between p-6">
            <div>
              <h6 class="block antialiased tracking-normal font-sans text-xl font-semibold leading-relaxed text-blue-gray-900 mb-1">Actividad Reciente</h6>
              <p class="antialiased font-sans text-sm leading-normal flex items-center gap-1 font-normal text-blue-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" aria-hidden="true" class="h-4 w-4 text-blue-500">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                </svg>
                <strong>{{ $data['registros']['totalesMes'] }} Nuevos registros</strong> este mes
              </p>
            </div>

          </div>
          <div class="p-6 overflow-x-scroll px-0 pt-0 pb-2">
            <table class="w-full min-w-[640px] table-auto">
              <thead class="bg-turquoiseWhite">
                <tr>
                  <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                    <p class="block antialiased font-sans text-sm font-medium uppercase text-blue-gray-400">Operación</p>
                  </th>
                  <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                    <p class="block antialiased font-sans text-sm font-medium uppercase text-blue-gray-400">Tabla</p>
                  </th>
                  <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                    <p class="block antialiased font-sans text-sm font-medium uppercase text-blue-gray-400">Usuario</p>
                  </th>
                  <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                    <p class="block antialiased font-sans text-sm font-medium uppercase text-blue-gray-400">Fecha</p>
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data['registros']['ultimos'] as $registro)
                <tr class="odd:bg-white  even:bg-turquoiseLight">
                    <td class="py-3 px-5 border-b border-blue-gray-50">
                      <div class="flex items-center gap-4">
                        <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-bold">{{$registro->operacion}}</p>
                      </div>
                    </td>

                    <td class="py-3 px-5 border-b border-blue-gray-50">
                      <p class="block antialiased font-sans text-xs font-medium text-blue-gray-600">{{$registro->tabla}}</p>
                    </td>
                    <td class="py-3 px-5 border-b border-blue-gray-50">
                        <p class="block antialiased font-sans text-xs font-medium text-blue-gray-600">{{$registro->name}}</p>
                    </td>
                    <td class="py-3 px-5 border-b border-blue-gray-50">
                      <p class="block antialiased font-sans text-xs font-medium text-blue-gray-600">{{$registro->ocurrido_en}}</p>
                  </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
            <a href="{{route('registros.index')}}" class="text-sm self-end font-bold p-6 hover:text-blue-400">Ver tabla de registros...</a>
        </div>
      </div>

</x-adminPanel.admin-panel-layout>