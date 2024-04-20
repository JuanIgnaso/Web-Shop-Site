@section('title')
{{ $titulo}}
@endsection
<x-app-layout>
    <h1 class="text-center font-bold mt-4">@yield('title')</h1>

    <div class="w-2/3 md:w-1/2 m-auto">
        <div class="px-4 sm:px-0 mt-5  divide-y ">
          <h3 class="text-center font-semibold leading-7 text-gray-900">Aquí se muestran los datos de la categoría <strong class="font-bold">ID - {{$categoria->id}}</strong></h3>
        </div>
        <div class="mt-6 border-t border-gray-100">
          <dl class="divide-y divide-gray-300">
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
              <dt class="text-sm font-medium leading-6 text-gray-900">Nombre</dt>
              <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$categoria->nombre}}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
              <dt class="text-sm font-medium leading-6 text-gray-900">Categoría Padre</dt>
              <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$categoria->categoriaPadre}}</dd>
            </div>
          </dl>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="rounded-md bg-yellow-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><a href="{{route('categoria.index')}}">Volver</a></button>
            <form action="{{route('categoria.destroy',$categoria)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="button" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Borrar</button>
            </form>
            <button type="button" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><a href="{{route('categoria.edit',$categoria)}}">Editar</a></button>
          </div>
      </div>

</x-app-layout>