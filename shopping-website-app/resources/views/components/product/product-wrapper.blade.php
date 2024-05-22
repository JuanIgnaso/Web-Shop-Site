

{{-- link,imagen,nombre,precio --}}
<a href="{{route('producto.details',$producto->id)}}" class="group">
  {{-- aspect-h-1 aspect-w-1 --}}
    <div class="aspect-square w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
      <img src="{{$src}}" alt="Imagen de muestra del producto {{$producto->nombreProducto}}" class="h-full w-full object-cover object-center group-hover:opacity-75">
    </div>
    <h3 class="mt-4 text-sm text-gray-700">{{ucfirst($producto->nombreProducto)}}</h3>
    <p class="mt-1 text-lg font-medium text-gray-900">{{'$'.$producto->precio}}</p>
</a>