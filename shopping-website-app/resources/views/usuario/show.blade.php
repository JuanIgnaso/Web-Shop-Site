@section('title')
{{ $titulo}}
@endsection
<x-adminPanel.admin-panel-layout>
    <h1 class="text-center font-bold mt-4">@yield('title')</h1>

    <div class="w-2/3 md:w-1/2 m-auto mb-16">
        <div class="px-4 sm:px-0 mt-5  divide-y ">
          <h3 class="text-center font-semibold leading-7 text-gray-900">Aquí se muestran los datos del Usuario <strong class="font-bold">ID - {{$user->id}}</strong></h3>
        </div>
        <div class="mt-6 border-t border-gray-100">
          <dl class="divide-y divide-gray-300">
            <x-adminPanel.property-wrapper :params="['label'=>'Nombre','data'=>$user->name]"></x-adminPanel.property-wrapper>
            <x-adminPanel.property-wrapper :params="['label'=>'Email','data'=>$user->email]"></x-adminPanel.property-wrapper>
            <x-adminPanel.property-wrapper :params="['label'=>'Clase Usuario','data'=>$user->claseUsuario]"></x-adminPanel.property-wrapper>
            <x-adminPanel.property-wrapper :params="['label'=>'Registrado en','data'=>$user->created_at]"></x-adminPanel.property-wrapper>
          </dl>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="rounded-md bg-yellow-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><a href="{{route('user.index')}}">Volver</a></button>

            <button type="button" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><a href="{{route('user.edit',$user)}}">Editar</a></button>
          </div>
      </div>

</x-adminPanel.admin-panel-layout>