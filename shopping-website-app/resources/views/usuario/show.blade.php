@section('title')
{{ $titulo}}
@endsection
<x-adminPanel.admin-panel-layout>
    <h1 class="mt-4 font-bold text-center">@yield('title')</h1>
    <div class="w-2/3 m-auto mb-16 md:w-1/2">
        <div class="px-4 mt-5 divide-y sm:px-0 ">
          <h3 class="font-semibold leading-7 text-center text-gray-900">Aquí se muestran los datos del Usuario <strong class="font-bold">ID - {{$user->id}}</strong></h3>
        </div>
        <div class="mt-6 border-t border-gray-100">
          <dl class="divide-y divide-gray-300">
            <x-adminPanel.property-wrapper :params="['label'=>'Nombre','data'=>$user->name]"></x-adminPanel.property-wrapper>
            <x-adminPanel.property-wrapper :params="['label'=>'Email','data'=>$user->email]"></x-adminPanel.property-wrapper>
            <x-adminPanel.property-wrapper :params="['label'=>'Clase Usuario','data'=>$user->claseUsuario]"></x-adminPanel.property-wrapper>
            <x-adminPanel.property-wrapper :params="['label'=>'Registrado en','data'=>$user->created_at]"></x-adminPanel.property-wrapper>
          </dl>
        </div>

       {{-- Acciones --}}
       <div class="flex items-center justify-end mt-6 gap-x-6">
        <button type="button" class="text-white bg-lochinvar hover:bg-dixie  focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none "><a href="{{route('user.index')}}">Volver</a></button>
        <button type="button" class="text-white bg-coldPurple hover:bg-purple-500  focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none "><a href="{{route('user.edit',$user)}}">Editar</a></button>
      </div>

      </div>
</x-adminPanel.admin-panel-layout>