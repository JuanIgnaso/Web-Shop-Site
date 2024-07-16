{{-- Slider de Filtros --}}
<div
@open-dropdown.window="if ($event.detail.id == 1) isOpen = true"
x-data="{ isOpen: false }" :class="{'':isOpen,'pointer-events-none':!isOpen}" class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true" id="filter-bar">

    <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75 "
    x-show="isOpen"
    x-transition:enter="ease-in-out duration-500"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="ease-in-out duration-500"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    ></div>

    <div class="fixed inset-0 overflow-hidden">
      <div class="absolute inset-0 overflow-hidden">
        <div class="fixed inset-y-0 right-0 flex max-w-full pl-10 pointer-events-none ">

          <div class="relative w-screen max-w-md pointer-events-auto"
          x-show="isOpen"
          x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
          x-transition:enter-start="translate-x-full"
          x-transition:enter-end="translate-x-0"
          x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
          x-transition:leave-start="translate-x-0"
          x-transition:leave-end="translate-x-full"
          >

            <div class="absolute top-0 left-0 flex pt-4 pr-2 -ml-8 sm:-ml-10 sm:pr-4"
            x-show="isOpen"
            x-transition:enter="ease-in-out duration-500"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in-out duration-500"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            >
            {{-- Cerrar panel de filtros --}}
              <button type="button" class="relative text-gray-300 rounded-md hover:text-white focus:outline-none focus:ring-2 focus:ring-white"  type="button" @click="isOpen = !isOpen">
                <span class="absolute -inset-2.5"></span>
                <span class="sr-only">Close panel</span>
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>

            <div class="flex flex-col h-full py-6 overflow-y-scroll shadow-xl bg-linen">
              <div class="px-4 sm:px-6">
                <h2 class="font-semibold leading-6 text-gray-900 " id="slide-over-title">Panel de Filtros</h2>
              </div>
              <div class="relative flex-1 px-4 mt-6 sm:px-6">

                <form action="" method="get">
                  @csrf
                  <h3 class="pb-1 mb-2 border-b-2 border-gray-300">Rango de Precio</h3>
                  <ol class="mb-4 space-y-2">
                    {{-- Precio mínimo y máximo --}}
                    <li><label class="flex items-center gap-2 font-bold text-lochinvar"><input class="w-2/3 accent-coldPurple" type="range"  id="minimo" min="0" max="9999">Mínimo <input type="text" class="w-1/3 font-black border-0 text-dixie bg-linen" id="val_minimo" name="val_minimo" value="{{Request::get('val_minimo') ?? '' }}"></input></label></li>
                    <li><label class="flex items-center gap-2 font-bold text-lochinvar"><input class="w-2/3 accent-coldPurple" type="range"  id="maximo" min="0" max="9999">Máximo <input type="text" class="w-1/3 font-black border-0 text-dixie bg-linen" id="val_maximo" name="val_maximo" value="{{Request::get('val_maximo') ?? '' }}"></input></label></li>
                    {{-- Actualizar valores de mínimo y máximo --}}
                    <script src="{{Vite::asset('resources/js/updateFilterPrice.js')}}"></script>
                  </ol>

                  <h3 class="pb-1 mb-2 border-b-2 border-gray-300">Marca</h3>
                  @if (!$marcas->isEmpty())
                  <ol class="mb-4 space-y-2">
                    @foreach ($marcas as $m)
                    <li><label><input type="checkbox" value="{{$m->marca}}" {{Request::get('marca') !== null && in_array($m->marca,Request::get('marca')) ? 'checked' : ''}} name="marca[]" id="" class="w-4 h-4 border-gray-300 rounded text-turquoiseSemiLight focus:ring-turquoiseMedium"> {{ucfirst($m->marca)}}</label></li>
                    @endforeach
                  </ol>
                  @endif

                  {{-- Buscar por nombre --}}
                  <h3  class="pb-1 mb-2 border-b-2 border-gray-300">Nombre</h3>
                  <input type="text" id="nombreProducto" value="{{Request::get('nombreProducto') ?? ''}}" name="nombreProducto" class="mb-4 block h-9 w-full rounded-md border-none shadow-lg  px-3 py-6 text-sm text-[#333333] placeholder:italic placeholder:text-slate-400 placeholder:text-base outline-none focus:ring-0 focus:bg-slate-100" placeholder="Buscar producto..."  />

                  <h3  class="pb-1 mb-2 border-b-2 border-gray-300">Disponibilidad</h3>
                  <ol class="mb-4 space-y-2">
                    <li><label ><input type="checkbox" name="" id="" class="w-4 h-4 border-gray-300 rounded text-lochinvar focus:ring-lochinvar"> Sin Stock</label></li>
                    <li><label ><input type="checkbox" name="" id="" class="w-4 h-4 border-gray-300 rounded text-lochinvar focus:ring-lochinvar"> Ultimas unidades</label></li>
                    <li><label ><input type="checkbox" name="" id="" class="w-4 h-4 border-gray-300 rounded text-lochinvar focus:ring-lochinvar"> En Stock</label></li>
                  </ol>

                  <h3  class="pb-1 mb-2 border-b-2 border-gray-300">Proveedores</h3>
                  @if (!$proveedores->isEmpty())
                  <ol class="mb-4 space-y-2">
                    @foreach ($proveedores as $p)
                    <li><label><input type="checkbox" value={{$p->id}} {{Request::get('proveedor') !== null && in_array($p->id,Request::get('proveedor')) ? 'checked' : ''}}  name="proveedor[]"  id="" class="w-4 h-4 border-gray-300 rounded text-lochinvar focus:ring-lochinvar"> {{ucfirst($p->nombre_proveedor)}}</label></li>
                    @endforeach
                  </ol>
                  @endif

                  {{-- Aplicar filtros --}}
                  <button type="submit" class="text-white bg-coldPurple focus:ring-0 focus:bg-eternity hover:bg-eternity transition duration-150 font-medium rounded-lg text-sm px-5 py-2.5 me-2 focus:outline-none">Aplicar Filtros</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>