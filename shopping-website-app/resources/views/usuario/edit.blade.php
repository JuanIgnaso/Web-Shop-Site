@section('title')
{{ $titulo}}
@endsection
<x-adminPanel.admin-panel-layout>
    <h1 class="mt-4 font-bold text-center">@yield('title')</h1>

    <form class="element-form" action="{{ route('user.update',$user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="space-y-12">
            <div class="pb-12 border-b border-gray-900/10">
                <div class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <div class="sm:col-span-3">
                        <x-form.input :type="'text'" :name="'name'" :value="old('name',$user->name)" :label="'Nombre'"></x-form.input>
                    </div>

                    <div class="sm:col-span-3">
                        <x-form.input :type="'email'" :name="'email'" :value="old('email',$user->email)" :label="'Correo electrónico'"></x-form.input>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="clases" class="block text-sm font-medium leading-6 text-gray-900">Clase</label>
                        <div class="mt-2">
                          <select id="claseUsuario" name="claseUsuario"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option selected value="" disabled>Selecciona Una...</option>
                            @foreach($clases as $c)
                            <option value="{{$c->id}}" {{$c->id == $user->claseUsuario ? 'selected' : ''}}>{{$c->clase}}</option>
                            @endforeach
                          </select>
                          @if($errors->has('claseUsuario'))
                          <p class="input-error">{{$errors->first('claseUsuario')}}</p>
                        @endif
                        </div>
                      </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end mt-6 gap-x-6">
            <button type="button" class="form-button bg-arbolCoral"><a
                    href="{{route('user.index')}}">Cancelar</a></button>
            <button type="submit"
                class="form-button bg-turquoiseMedium hover:bg-turquoiseMediumDark">Guardar</button>
        </div>
    </form>

</x-adminPanel.admin-panel-layout>