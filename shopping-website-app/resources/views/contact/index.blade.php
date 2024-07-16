@section('title')
{{$titulo}}
@endsection
<x-app-layout>


    <!-- Container -->



    <section class="grid items-center grid-cols-1 px-2 py-20 lg:grid-cols-2 xl:px-20 auto-cols-max">

      {{-- Imagen de decoración --}}
      <div class="flex justify-center max-lg:hidden">
        <div class="w-2/3">
          <img src="{{Vite::asset('resources/images/email-photo.png')}}" alt="" aria-hidden="true">
        </div>
      </div>

        <div class="w-full px-5 pt-4 pb-16 mx-auto text-center md:px-10 ">

          <h2 class="text-3xl font-bold md:text-5xl text-lochinvar">Contacta con nosotros!</h2>
          <p class="mx-auto mb-8 mt-4 max-w-lg  text-[#636262] md:mb-12 lg:mb-16">Conocer tus opiniones o dudas acerca de nuestro negocio nos interesa, si se te ocurre algo lo cual quieres hacernoslo saber, porfavor rellena este formulario.</p>

        {{-- Formulario --}}
          <form name="wf-form-name" method="POST" class="flex flex-col mb-4 text-left sm:px-4 md:px-10" action="{{route('contact.store')}}">
            @csrf
            <div class="grid w-full grid-cols-1 gap-6 mb-4 md:grid-cols-2">

              {{-- Input --}}
              <div class="space-y-2">
                  <label for="nombre" class="mb-1 text-lg font-bold text-lochinvar">Nombre</label>
                  <input type="text" placeholder="Tu nombre..." name="nombre" value="{{old('nombre')}}" class="mb-4 block h-9 w-full rounded-md border-none shadow-lg px-3 py-6 text-sm text-[#333333] placeholder:italic placeholder:text-slate-400 placeholder:text-base outline-none focus:ring-0 focus:bg-slate-100" />
                  @if($errors->has('nombre'))
                    <p class="input-error">{{$errors->first('nombre')}}</p>
                  @endif
              </div>

              <div class="space-y-2">
                <label for="apellidos" class="mb-1 text-lg font-bold text-lochinvar">Apellidos</label>
                  <input type="text" placeholder="Tus apellidos..." name="apellidos" value="{{old('apellidos')}}" class="mb-4 block h-9 w-full rounded-md border-none shadow-lg  px-3 py-6 text-sm text-[#333333] placeholder:italic placeholder:text-slate-400 placeholder:text-base outline-none focus:ring-0 focus:bg-slate-100"  />
                  @if($errors->has('apellidos'))
                    <p class="input-error">{{$errors->first('apellidos')}}</p>
                  @endif
                </div>
              </div>

              <div class="mb-4 space-y-2">
                  <label for="telefono" class="mb-1 text-lg font-bold text-lochinvar">Teléfono</label>
                  <input type="text" name="telefono" placeholder="Tu número de teléfono aquí..." value="{{old('telefono')}}" class="mb-4 block h-9 w-full rounded-md  border-none shadow-lg  px-3 py-6 text-sm text-[#333333] placeholder:italic placeholder:text-slate-400 placeholder:text-base outline-none focus:ring-0 focus:bg-slate-100" />
                  @if ($errors->has('telefono'))
                    <p class="input-error">{{$errors->first('telefono')}}</p>
                  @endif
              </div>

              <div class="mb-4 space-y-2">
                  <label for="email" class="mb-1 text-lg font-bold text-lochinvar">Email</label>
                  <input type="text" name="email" placeholder="Tu email aquí..." value="{{old('email')}}" class="mb-4 block h-9 w-full rounded-md  border-none shadow-lg  px-3 py-6 text-sm text-[#333333] placeholder:italic placeholder:text-slate-400 placeholder:text-base outline-none focus:ring-0 focus:bg-slate-100" />
                  @if ($errors->has('email'))
                      <p class="input-error">{{$errors->first('email')}}</p>
                  @endif
              </div>

              <div class="mb-5 space-y-2 md:mb-6 lg:mb-8">
                  <label for="mensaje" class="mb-1 text-lg font-bold text-lochinvar">Tu mensaje</label>
                  <textarea name="mensaje" maxlength="5000" placeholder="Escribe tu mensaje aquí..." name="field" class="mb-2.5 block h-auto min-h-[186px] w-full rounded-md  border-none shadow-lg outline-none px-3 py-2 text-sm text-[#333333] focus:ring-0 focus:bg-slate-100"> {{old('mensaje')}}</textarea>
                  @if ($errors->has('mensaje'))
                      <p class="input-error">{{$errors->first('mensaje')}}</p>
                  @endif
              </div>

              {{-- Terminos y condiciones --}}
              <label class="flex items-center justify-start pb-4 pl-5 mb-1 font-mediume">
                  <input type="checkbox" name="terminos" class="-ml-[20px] mt-1 h-4 w-4 rounded border-gray-300 text-lochinvar focus:ring-lochinvar" />
                  <span class="inline-block ml-4 text-sm cursor-pointer" for="checkbox-2">Acepto los <a href="#" class="font-black text-turquoiseMediumDark">términos y condiciones</a>
                  </span>
              </label>

              @if ($errors->has('terminos'))
                   <p class="mb-6 input-error">{{$errors->first('terminos')}}</p>
              @endif

              <input type="submit" value="Enviar Mensaje" class="self-center inline-block px-6 py-3 font-semibold text-center text-white transition duration-150 ease-in-out rounded-lg shadow-lg cursor-pointer bg-coldPurple hover:bg-eternity focus:bg-eternity shadow-gray-500/40 " />

          </form>
        </div>
      </section>

</x-app-layout>