
<!-- Genera un input:
name -> usado en la id y name
value -> valor del input
label -> texto del label
type -> tipo del input
-->
    <label for="{{$name}}" class="block text-base font-bold leading-6 text-lochinvar">{{$label}}
    <div class="mt-2">
        <input type="{{$type}}" name="{{$name}}" id="{{$name}}" value="{{$value}}" class="block bg-white w-full rounded-md border-none shadow-lg py-1.5 text-gray-900  ring-0 focus:ring-0  placeholder:text-gray-400  focus:bg-slate-100 sm:text-sm sm:leading-6">
        @if($errors->has($name))
            <p class="input-error">{{$errors->first($name)}}</p>
        @endif
    </div>
</label>