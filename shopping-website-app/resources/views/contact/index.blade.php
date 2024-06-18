@section('title')
{{$titulo}}
@endsection
<x-app-layout>
    <section class="grid  grid-cols-1 md:grid-cols-2 items-center  auto-cols-max">
      <div class="flex justify-center">
        <div class="w-2/3">
          <img src="{{Vite::asset('resources/images/email-photo.png')}}" alt="">
        </div>
      </div>
        <!-- Container -->
        <div class="mx-auto w-full px-5 py-16 text-center md:px-10 md:py-24 lg:py-32">
          <!-- Component -->
          <h2 class="text-3xl font-bold md:text-5xl">Contacta con nosotros!</h2>
          <p class="mx-auto mb-8 mt-4 max-w-lg text-[#636262] md:mb-12 lg:mb-16">Lorem ipsum dolor sit amet consectetur adipiscing elit ut aliquam,purus sit amet luctus magna fringilla urna</p>
          <!-- Form -->
          <form name="wf-form-name" method="POST" class="mb-4 text-left sm:px-4 md:px-10" action="{{route('contact.store')}}">
            @csrf
            <div class="mb-4 grid w-full grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <label for="nombre" class="mb-1 font-bold text-turquoiseMedium">Nombre</label>
                <input type="text" name="nombre" value="{{old('nombre')}}" class="mb-4 block h-9 w-full rounded-md border-none shadow-lg px-3 py-6 text-sm text-[#333333]" placeholder="" />
                @if($errors->has('nombre'))
                <p class="input-error">{{$errors->first('nombre')}}</p>
              @endif
              </div>

              <div>
                <label for="apellidos" class="mb-1 font-bold text-turquoiseMedium">Apellidos</label>
                <input type="text" name="apellidos" value="{{old('apellidos')}}" class="mb-4 block h-9 w-full rounded-md border-none shadow-lg  px-3 py-6 text-sm text-[#333333]" placeholder=""  />
                @if($errors->has('apellidos'))
                   <p class="input-error">{{$errors->first('apellidos')}}</p>
                @endif
              </div>
            </div>

            <div class="mb-4">
              <label for="telefono" class="mb-1 font-bold text-turquoiseMedium">Teléfono</label>
              <input type="text" name="telefono" value="{{old('telefono')}}" class="mb-4 block h-9 w-full rounded-md  border-none shadow-lg  px-3 py-6 text-sm text-[#333333]" />
            @if ($errors->has('telefono'))
                <p class="input-error">{{$errors->first('telefono')}}</p>
            @endif
            </div>
            <div class="mb-4">
              <label for="email" class="mb-1 font-bold text-turquoiseMedium">Email</label>
              <input type="text" name="email" value="{{old('email')}}" class="mb-4 block h-9 w-full rounded-md  border-none shadow-lg  px-3 py-6 text-sm text-[#333333]" />
              @if ($errors->has('email'))
                  <p class="input-error">{{$errors->first('email')}}</p>
              @endif
            </div>
            <div class="mb-5 md:mb-6 lg:mb-8">
              <label for="mensaje" class="mb-1 font-bold text-turquoiseMedium">Tu mensaje</label>
              <textarea placeholder="" name="mensaje" maxlength="5000" name="field" class="mb-2.5 block h-auto min-h-[186px] w-full rounded-md  border-none shadow-lg outline-none px-3 py-2 text-sm text-[#333333]"> {{old('mensaje')}}</textarea>
              @if ($errors->has('mensaje'))
                  <p class="input-error">{{$errors->first('mensaje')}}</p>
              @endif
            </div>

            <label class="font-mediume mb-1 flex items-center justify-start pb-4 pl-5">
              <input type="checkbox" name="terminos" class="-ml-[20px] mt-1 h-4 w-4 rounded border-gray-300 text-turquoiseSemiLight focus:ring-turquoiseMedium" />
              <span class="ml-4 inline-block cursor-pointer text-sm" for="checkbox-2">Acepto los <a href="#" class="text-turquoiseMediumDark font-black">términos y condiciones</a>
              </span>
            </label>
            @if ($errors->has('terminos'))
                   <p class="input-error mb-6">{{$errors->first('terminos')}}</p>
              @endif
            <input type="submit" value="Enviar Mensaje" class="bg-turquoiseMedium hover:bg-turquoiseMediumDark text-white shadow-lg shadow-gray-500/40 inline-block w-full cursor-pointer  px-6 py-3  rounded-lg text-center font-semibold " />
          </form>
        </div>
      </section>

</x-app-layout>