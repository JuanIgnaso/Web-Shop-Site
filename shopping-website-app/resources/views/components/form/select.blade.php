{{--
    name - nombre del input
    multiple(bool) - si el selector acepta o no múltiples valores
    values - array de valores a usar
    show - columna del array de valores que se quiere mostrar en el selector
    --}}
<label for="{{$name}}" class="block text-base font-bold leading-6 text-turquoiseMedium">{{$label}}
    <div class="mt-2">
    <select id="{{$name}}" name="{{$multiple ? $name.'[]' : $name}}" {{$multiple == true ? 'multiple' : ''}}  class="font-normal block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
        <option selected disabled value=""  selected>Selecciona Uno/a...</option>
        @foreach($values as $v)
        <option value="{{$v->id}}" {{Request::get($name) !== null && in_array($v->id,Request::get($name)) ? 'selected' : ''}}>{{$v->$show}}</option>
        @endforeach
    </select>
    </div>
</label>