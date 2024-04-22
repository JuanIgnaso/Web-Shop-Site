@section('title')
    {{$titulo}}
@endsection
<x-app-layout>
    <h1 class="text-center font-bold mt-4">@yield('title')</h1>

<form class="w-2/3 md:w-1/2 m-auto" action="{{route('proveedor.update',$proveedor)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-3">
            <label for="nombre_proveedor" class="block text-sm font-medium leading-6 text-gray-900">Nombre del Proveedor</label>
            <div class="mt-2">
              <input type="text" name="nombre_proveedor" id="nombre_proveedor" value="{{old('nombre_proveedor',$proveedor->nombre_proveedor)}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="introduce un nombre...">
              @if($errors->has('nombre_proveedor'))
                <p class="input-error">{{$errors->first('nombre_proveedor')}}</p>
              @endif
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="direccion" class="block text-sm font-medium leading-6 text-gray-900">Dirección</label>
            <div class="mt-2">
              <input type="text" name="direccion" id="direccion" value="{{old('direccion',$proveedor->direccion)}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="introduce una dirección...">
              @if($errors->has('direccion'))
                <p class="input-error">{{$errors->first('direccion')}}</p>
              @endif
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Correo Electrónico</label>
            <div class="mt-2">
              <input type="email" name="email" id="email" value="{{old('email',$proveedor->email)}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="introduce un email...">
              @if($errors->has('email'))
                <p class="input-error">{{$errors->first('email')}}</p>
             @endif
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="website" class="block text-sm font-medium leading-6 text-gray-900">Página Web</label>
            <div class="mt-2">
              <input type="text" name="website" id="website" value="{{old('website',$proveedor->website)}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="https://tu-web.com...">
              @if($errors->has('website'))
                <p class="input-error">{{$errors->first('website')}}</p>
              @endif
            </div>
          </div>

          <div class="col-span-full">
            <label for="telefono" class="block text-sm font-medium leading-6 text-gray-900">Teléfono de contacto</label>
            <div class="mt-2">
              <input type="text" name="telefono" id="telefono" value="{{old('telefono',$proveedor->telefono)}}" autocomplete="telefono" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="introduce un número de telefono...">
              @if($errors->has('telefono'))
                 <p class="input-error">{{$errors->first('telefono')}}</p>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button type="button" class="text-sm font-semibold leading-6 text-gray-900"><a href="{{route('proveedor.index')}}">Cancelar</a></button>
      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar cambios</button>
    </div>
  </form>

</x-app-layout>