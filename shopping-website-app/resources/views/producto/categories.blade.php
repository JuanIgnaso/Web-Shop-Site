@section('title')
    {{ $titulo}}
@endsection

<x-app-layout>
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <h1 class="text-5xl pb-3 text-turquoiseMediumDark border-b-2 border-gray-400/50">{{$titulo}}</h1>
        @dump($tree)
        <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 mt-3 gap-2">
            @foreach ($categorias as $categoria)
            <a href="{{route('producto.list',$categoria->id)}}" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 ">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{$categoria->nombre_categoria}}</h5>
            </a>
            @endforeach
        </section>
    </div>
</x-app-layout>