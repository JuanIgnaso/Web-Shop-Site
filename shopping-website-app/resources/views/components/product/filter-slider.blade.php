{{-- Slider de Filtros --}}
<div
@open-dropdown.window="if ($event.detail.id == 1) isOpen = true"
x-data="{ isOpen: false }" :class="{'':isOpen,'pointer-events-none':!isOpen}" class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true" id="filter-bar">

    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity "
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
        <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10 ">

          <div class="pointer-events-auto relative w-screen max-w-md"
          x-show="isOpen"
          x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
          x-transition:enter-start="translate-x-full"
          x-transition:enter-end="translate-x-0"
          x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
          x-transition:leave-start="translate-x-0"
          x-transition:leave-end="translate-x-full"
          >

            <div class="absolute left-0 top-0 -ml-8 flex pr-2 pt-4 sm:-ml-10 sm:pr-4"
            x-show="isOpen"
            x-transition:enter="ease-in-out duration-500"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in-out duration-500"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            >
              <button type="button" class="relative rounded-md text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-white"  type="button" @click="isOpen = !isOpen">
                <span class="absolute -inset-2.5"></span>
                <span class="sr-only">Close panel</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>

            <div class="flex h-full flex-col overflow-y-scroll bg-white py-6 shadow-xl">
              <div class="px-4 sm:px-6">
                <h2 class=" font-semibold leading-6 text-gray-900" id="slide-over-title">Panel de Filtros</h2>
              </div>
              <div class="relative mt-6 flex-1 px-4 sm:px-6">
                {{-- Provisional --}}
                <form action="">

                  <h3 class="border-b-2 border-gray-300 pb-1 mb-2">Rango de Precio</h3>
                  <ol class="mb-4 space-y-2">
                    <li><label class="flex items-center gap-2"><input type="range" name="" id="">Mínimo</label></li>
                    <li><label class="flex items-center gap-2"><input type="range" name="" id="">Máximo</label></li>
                  </ol>

                  <h3 class="border-b-2 border-gray-300 pb-1 mb-2">Marca</h3>
                  <ol class="mb-4 space-y-2">
                    <li><label ><input type="checkbox" name="" id="" class="h-4 w-4 rounded border-gray-300 text-turquoiseSemiLight focus:ring-turquoiseMedium"> Marca Uno</label></li>
                    <li><label ><input type="checkbox" name="" id="" class="h-4 w-4 rounded border-gray-300 text-turquoiseSemiLight focus:ring-turquoiseMedium"> Marca Dos</label></li>
                    <li><label ><input type="checkbox" name="" id="" class="h-4 w-4 rounded border-gray-300 text-turquoiseSemiLight focus:ring-turquoiseMedium"> Marca Tres</label></li>
                  </ol>

                  <h3  class="border-b-2 border-gray-300 pb-1 mb-2">Disponibilidad</h3>
                  <ol class="mb-4 space-y-2">
                    <li><label ><input type="checkbox" name="" id="" class="h-4 w-4 rounded border-gray-300 text-turquoiseSemiLight focus:ring-turquoiseMedium"> Sin Stock</label></li>
                    <li><label ><input type="checkbox" name="" id="" class="h-4 w-4 rounded border-gray-300 text-turquoiseSemiLight focus:ring-turquoiseMedium"> Ultimas unidades</label></li>
                    <li><label ><input type="checkbox" name="" id="" class="h-4 w-4 rounded border-gray-300 text-turquoiseSemiLight focus:ring-turquoiseMedium"> En Stock</label></li>
                  </ol>

                  <h3  class="border-b-2 border-gray-300 pb-1 mb-2">Proveedores</h3>
                  @if (!$proveedores->isEmpty())
                  <ol class="mb-4 space-y-2">
                    @foreach ($proveedores as $p)
                    <li><label><input type="checkbox" value="{{$p->id}}" name="" id="" class="h-4 w-4 rounded border-gray-300 text-turquoiseSemiLight focus:ring-turquoiseMedium"> {{ucfirst($p->nombre_proveedor)}}</label></li>
                    @endforeach
                  </ol>
                  @endif

                  <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Aplicar Filtros</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>