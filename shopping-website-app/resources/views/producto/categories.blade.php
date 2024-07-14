@section('title')
    {{ $titulo}}
@endsection

<x-app-layout>
    <div class="max-w-2xl px-4 py-16 mx-auto sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">


            {{-- BreadCrumb --}}
    <nav class="flex mb-3" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-2 justify-self-center md:space-x-2 rtl:space-x-reverse">
          <li class="inline-flex items-center">
            <a href="{{route('dashboard')}}" class="inline-flex items-center text-sm font-medium text-shingleFawn hover:text-eternity ">
              <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
              </svg>
              Inicio
            </a>
          </li>

          <li aria-current="page">
            <div class="flex items-center">
              <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
              </svg>
              <span class="text-sm font-medium text-gray-500 ms-1 md:ms-2 dark:text-gray-400">Categorías</span>
            </div>
          </li>
        </ol>
      </nav>


        <h1 class="pb-3 text-5xl border-b-2 text-eternity border-sandrift/50">{{$titulo}}</h1>
        <section class="grid grid-cols-1 mt-3 space-y-3">
            <x-categorias.categories :categories="$categorias"></x-categorias.categories>
        </section>
    </div>
</x-app-layout>