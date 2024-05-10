
<!-- Genera un input:
name -> usado en la id y name
value -> valor del input
label -> texto del label
type -> tipo del input
-->
    <label for="{{$name}}" class="block text-base font-bold leading-6 text-turquoiseMedium">{{$label}}
    <div class="mt-2">
        <input type="{{$type}}" name="{{$name}}" id="{{$name}}" value="{{$value}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        @if($errors->has($name))
            <p class="input-error">{{$errors->first($name)}}</p>
        @endif
    </div>
</label>