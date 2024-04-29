<label for="descripcion" class="block text-base font-bold leading-6 text-turquoiseMedium">{{$label}}</label>
    <div class="mt-2">
        <textarea id="{{$name}}" name="{{$name}}" rows="3"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{$value}}</textarea>
    </div>
            @if($errors->has($name))
                <p class="input-error">{{$errors->first($name)}}</p>
            @endif