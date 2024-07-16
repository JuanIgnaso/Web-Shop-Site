<label for="descripcion" class="block text-base font-bold leading-6 text-lochinvar">{{$label}}</label>
    <div class="mt-2">
        <textarea id="{{$name}}" name="{{$name}}" rows="3"
                                class="block w-full rounded-md border-none shadow-lg py-1.5 focus:ring-0 text-gray-900 ring-0  placeholder:text-gray-400 focus:bg-slate-100 sm:text-sm sm:leading-6">{{$value}}</textarea>
    </div>
            @if($errors->has($name))
                <p class="input-error">{{$errors->first($name)}}</p>
            @endif