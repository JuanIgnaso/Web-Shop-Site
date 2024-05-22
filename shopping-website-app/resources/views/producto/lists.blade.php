@section('title')
    {{ $data['titulo']}}
@endsection

<x-app-layout>

{{-- Slider de Filtros --}}

<x-product.filter-slider :categoria="$data['categoria']" :proveedores="$data['proveedores']" :marcas="$data['marcas']"></x-product.filter-slider>

{{-- Productos --}}

<div class="bg-indigo-50 pb-6 min-h-screen">





    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">


    {{-- BreadCrumb --}}
    <nav class="flex mb-3" aria-label="Breadcrumb">
      <ol class="justify-self-center inline-flex items-center space-x-2 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
          <a href="{{route('dashboard')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 ">
            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
            </svg>
            Inicio
          </a>
        </li>
        <li>
          <x-breadcrumb.list-element :text="'Categorías'" :url="route('producto.categorias')"></x-breadcrumb.list-element>
        </li>

        <li aria-current="page">
          <div class="flex items-center">
            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $data['titulo']}}</span>
          </div>
        </li>
      </ol>
    </nav>


    <h1 class="text-5xl pb-3 text-turquoiseMediumDark border-b-2 border-gray-400/50"  id="open"> {{ $data['titulo']}}</h1>

        <h2 class="sr-only">Products</h2>
        <div class="flex mt-3 items-center justify-start mb-6">

          <div x-data="{id: 1}">
            <button type="button" " @click="$dispatch('open-dropdown',{id})" class="text-white bg-turquoiseMedium hover:bg-turquoiseMediumDark focus:ring-4 focus:ring-turquoiseSemiLight font-medium rounded-lg text-sm px-5 py-2.5 me-2   focus:outline-none ">Filtrar</button>
            <button type="button" class="text-white bg-turquoiseMedium hover:bg-turquoiseMediumDark focus:ring-4 focus:ring-turquoiseSemiLight font-medium rounded-lg text-sm px-5 py-2.5 me-2 focus:outline-none"><a href="{{URL::current()}}">Limpiar Filtros</a></button>
          </div>
        </div>

      {{-- Mostrar productos --}}

      @if (!$data['productos']->isEmpty())
      <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
            @foreach($data['productos'] as $p)
            {{-- <img src="{{$p->imagen != null ? url('storage/'.$p->imagen) : Vite::asset('resources/images/web-logo.png')}}" alt=""> --}}
              <x-product.product-wrapper :producto="$p" :src="$p->imagen != null ? url('storage/'.$p->imagen) : Vite::asset('resources/images/web-logo.png')"></x-product.product-wrapper>
            @endforeach
      </div>
      @else
      <div>
        <p class="text-center font-black text-2xl text-turquoiseMediumDark self-center">No se encuentran resultados</p>
      </div>
      @endif

    </div>

    @if(isset($data['filters']))
    @dump($data['filters'])
    @endif

    {{-- Paginación --}}
    <x-ui.pagination :source="$data['productos']"></x-ui.pagination>

  </div>


</x-app-layout>