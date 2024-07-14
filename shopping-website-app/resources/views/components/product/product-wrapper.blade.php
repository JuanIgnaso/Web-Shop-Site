

{{-- link,imagen,nombre,precio --}}
<a href="{{route('producto.details',$producto->id)}}" class="group">
  {{-- aspect-h-1 aspect-w-1 --}}
    <div class="w-full overflow-hidden bg-gray-200 rounded-lg aspect-square hover:grow xl:aspect-h-8 xl:aspect-w-7">
      <img src="{{$src}}" alt="Imagen de muestra del producto {{$producto->nombreProducto}}" class="object-cover object-center w-full h-full group-hover:opacity-75">
    </div>
    <h3 class="mt-4 text-xl text-lochinvar">{{ucfirst($producto->nombreProducto)}}</h3>
    <p class="flex justify-between mt-1 text-lg font-medium text-gray-900">{{'$'.$producto->precio}}<span class="flex items-center gap-2 text-sm">{{$producto->puntuacion_total == null ? 0 : $producto->puntuacion_total}}<x-ui.star :color="'text-yellow-300'" :attr="''"></x-ui.star></span></p>
</a>