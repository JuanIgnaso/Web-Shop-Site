@section('title')
{{'Inicio'}}
@endsection
<x-app-layout>
    <section>
        <!-- Container -->
        <div class="mx-auto max-w-7xl px-5 py-16 text-center md:px-10 md:py-24 lg:py-32">
          <!-- Component -->
          <h2 class="text-3xl font-bold md:text-5xl">Contacta con nosotros!</h2>
          <p class="mx-auto mb-8 mt-4 max-w-lg text-[#636262] md:mb-12 lg:mb-16">Lorem ipsum dolor sit amet consectetur adipiscing elit ut aliquam,purus sit amet luctus magna fringilla urna</p>
          <!-- Form -->
          <form name="wf-form-name" method="post" class="mx-auto mb-4 text-left sm:px-4 md:px-20" action="{{route('contact.store')}}">
            @csrf
            <div class="mb-4 grid w-full grid-cols-2 gap-6">
              <div>
                <label for="name" class="mb-1 font-bold text-turquoiseMedium">Nombre</label>
                <input type="text" name="name" value="{{old('name')}}" class="mb-4 block h-9 w-full rounded-md border border-solid border-gray-500/50 px-3 py-6 text-sm text-[#333333]" placeholder="" required="" />
                @if($errors->has('name'))
                <p class="input-error">{{$errors->first('name')}}</p>
              @endif
              </div>
              <div>
                <label for="apellidos" class="mb-1 font-bold text-turquoiseMedium">Apellidos</label>
                <input type="text" name="apellidos" value="{{old('apellidos')}}" class="mb-4 block h-9 w-full rounded-md border border-solid border-gray-500/50 px-3 py-6 text-sm text-[#333333]" placeholder="" required="" />
                @if($errors->has('apellidos'))
                <p class="input-error">{{$errors->first('apellidos')}}</p>
              @endif
              </div>
            </div>
            <div class="mb-4">
              <label for="telefono" class="mb-1 font-bold text-turquoiseMedium">Teléfono</label>
              <input type="text" name="telefono" value="{{old('telefono')}}" class="mb-4 block h-9 w-full rounded-md border border-solid border-gray-500/50 px-3 py-6 text-sm text-[#333333]" />
            </div>
            <div class="mb-4">
              <label for="email" class="mb-1 font-bold text-turquoiseMedium">Email</label>
              <input type="text" name="email" value="{{old('email')}}" class="mb-4 block h-9 w-full rounded-md border border-solid border-gray-500/50 px-3 py-6 text-sm text-[#333333]" />
            </div>
            <div class="mb-5 md:mb-6 lg:mb-8">
              <label for="mensaje" class="mb-1 font-bold text-turquoiseMedium">Tu mensaje</label>
              <textarea placeholder="" name="mensaje" maxlength="5000" name="field" class="mb-2.5 block h-auto min-h-[186px] w-full rounded-md border border-solid border-gray-500/50 px-3 py-2 text-sm text-[#333333]"> {{old('mensaje')}}</textarea>
            </div>
            <label class="font-mediume mb-1 flex items-center justify-start pb-4 pl-5">
              <input type="checkbox" name="checkbox-2" class="-ml-[20px] mt-1" />
              <span class="ml-4 inline-block cursor-pointer text-sm" for="checkbox-2">Marcando esto aceptas nuestros <a href="#">términos y condiciones</a>
              </span>
            </label>
            <input type="submit" value="Enviar Mensaje" class=" shadow-lg shadow-gray-500/40 inline-block w-full cursor-pointer bg-white px-6 py-3 hover:text-turquoiseMedium rounded-lg text-center font-semibold text-gray-800 hover:bg-turquoiseDark" />
          </form>
        </div>
      </section>

</x-app-layout>