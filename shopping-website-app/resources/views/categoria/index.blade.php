
@section('title')
    {{ $titulo}}
@endsection

<x-adminPanel.admin-panel-layout>
    <h1 class="mt-4 text-center">@yield('title')</h1>

    <!-- INDEX -->
<main>
<div class="w-[90%] lg:w-[80%] m-auto relative overflow-x-auto mt-4 mb-16 sm:rounded-lg">
<section x-data="{ show: false,open: 'v',closed: '>' }" class="mb-4">
    <h2 @click="show = !show" :aria-expanded="show ? 'true' : 'false'" class="text-2xl cursor-pointer text-turquoiseMediumDark">Filtros <span class="text-darkOrange" x-text="show ? open : closed"> </span></h2>
    <form x-show="show" action="" method="get" class="mb-8 border-b-2 border-b-gray-200/50">
        @csrf
        <div class="grid grid-cols-1 gap-4 mb-4 sm:grid-cols-2 md:grid-cols-3">
            <x-form.input :type="'text'" :name="'nombre_categoria'" :label="'Nombre'" :value="Request::get('nombre_categoria')"></x-form.input>
            <div>
                <label for="categoria" class="block text-sm font-medium leading-6 text-gray-900">Categoría Padre</label>
                <div class="mt-2">
                  <select id="categoriaPadre" name="categoriaPadre[]" multiple  class="block w-full rounded-md border-0 py-1.5 text-gray-900 border-none shadow-lg outline-none focus:ring-0 focus:bg-slate-100 sm:max-w-xs sm:text-sm sm:leading-6">
                    <option selected value="" disabled>Selecciona Una...</option>
                    @foreach($categoriaPadre as $categoria)
                    <option value="{{$categoria->id}}" {{Request::get('categoriaPadre') !== null && in_array($categoria->id,Request::get('categoriaPadre')) ? 'selected' : ''}}>{{$categoria->nombre_categoria}}</option>
                    @endforeach
                  </select>
                  @if($errors->has('categoriaPadre'))
                  <p class="input-error">{{$errors->first('categoriaPadre')}}</p>
                @endif
                </div>
              </div>
        </div>
        <div class="flex justify-center space-x-2 md:justify-end">
            <button type="submit" class="text-white bg-lochinvar hover:bg-dixie  focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none ">Aplicar Filtros</button>
            <button type="button" class="text-white bg-lochinvar hover:bg-dixie  focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none "><a href="{{URL::current()}}">Limpiar Filtros</a></button>
        </div>
    </form>
</section>

    <button type="button" class="text-white bg-lochinvar hover:bg-dixie  focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none "><a href="{{route('categoria.create')}}">Añadir nuevo</a></button>
    <table class="w-full text-sm text-left text-gray-500 rtl:text-right ">
        <thead class="text-xs text-white uppercase bg-sandrift ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Categoría Padre
                </th>
                <th scope="col" class="px-6 py-3">
                    Creado
                </th>
                <th scope="col" class="px-6 py-3">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
            <tr class="table-row">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                    {{$categoria->id}}
                </th>
                <td class="px-6 py-4">
                    {{$categoria->nombre_categoria}}
                </td>
                <td class="px-6 py-4">
                    {{$categoria->categoriaPadre}}
                </td>
                <td class="px-6 py-4">
                    {{$categoria->created_at}}
                </td>
                <td class="px-6 py-4">
                    <div class="flex justify-center gap-2 ">
                        <a href="{{route('categoria.edit',$categoria->id)}}" class="admin-panel-action-button blue-gradient shadow-blue-600/40"><i class="fa-solid fa-pen-nib"></i></a>
                            <a href="{{route('categoria.show',$categoria->id)}}" class="admin-panel-action-button emerald-gradient shadow-emerald-500/40"><i class="fa-solid fa-eye"></i></a>
                            <form action="{{route('categoria.destroy',$categoria)}}" method="POST">
                                @csrf
                                @method('DELETE') <!-- Modificamos método del formulario -->
                                <button type="submit" class="admin-panel-action-button rose-gradient shadow-rose-500/40"><i class="fa-solid fa-minus"></i></button>
                            </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Paginación --}}
    <x-ui.pagination :source="$categorias"></x-ui.pagination>

</div>

</main>


</x-adminPanel.admin-panel-layout>