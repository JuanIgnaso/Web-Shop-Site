@section('title')
    {{ $titulo}}
@endsection
<x-app-layout>

{{-- Slider de Filtros --}}

<x-product.filter-slider :proveedores="$proveedores"></x-product.filter-slider>

{{-- Productos --}}

<div class="bg-white pb-4 min-h-screen">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
<h1 class="p-3 text-center mb-3"  id="open">Categoría del Producto</h1>

        <h2 class="sr-only">Products</h2>
        <div class="flex items-center justify-start mb-3">

          <div x-data="{id: 1}">
            <button type="button" " @click="$dispatch('open-dropdown',{id})" class="text-white bg-turquoiseMedium hover:bg-turquoiseMediumDark focus:ring-4 focus:ring-turquoiseSemiLight font-medium rounded-lg text-sm px-5 py-2.5 me-2   focus:outline-none ">Filtrar</button>
          </div>

          {{-- Buscador --}}

          <form class="flex items-center max-w-sm mx-auto">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-turquoiseSemiLight focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Buscar producto..." required />
            </div>
            <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-turquoiseMedium rounded-lg  hover:bg-turquoiseMediumDark focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
                <span class="sr-only">Search</span>
            </button>
          </form>
        </div>

      <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">

      {{-- Mostrar productos --}}

      @if (!$productos->isEmpty())
            @foreach($productos as $p)
              <x-product.product-wrapper :producto="$p" :src="'https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg'"></x-product.product-wrapper>
           @endforeach
      @else
        <p class="text-center text-rose-700">No se encuentran resultados</p>
      @endif
      </div>
    </div>

    {{-- Paginación --}}
    <x-ui.pagination :source="$productos"></x-ui.pagination>

  </div>

</x-app-layout>