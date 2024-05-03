<div class="flex items-center mb-2" id="aaa">

  @if ($review->count() > 0)
      @for ($i = 0; $i < 5; $i++)
          @if ($i < $review->sum('puntuacion') / $review->count())
          <x-ui.star :color="'text-yellow-300'" :attr="''"></x-ui.star>
          @else
          <x-ui.star :color="'text-gray-300'" :attr="''"></x-ui.star>
          @endif
    @endfor
  <p class="ms-2 text-sm font-bold text-gray-900">{{$review->sum('puntuacion') / $review->count()}}</p>
  @else
  <x-ui.star :color="'text-gray-300'" :attr="''"></x-ui.star>
  <x-ui.star :color="'text-gray-300'" :attr="''"></x-ui.star>
  <x-ui.star :color="'text-gray-300'" :attr="''"></x-ui.star>
  <x-ui.star :color="'text-gray-300'" :attr="''"></x-ui.star>
  <x-ui.star :color="'text-gray-300'" :attr="''"></x-ui.star>

  <p class="ms-2 text-sm font-bold text-gray-900">0</p>
  @endif


  <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full"></span>
  <a href="#" class="text-sm font-medium text-gray-900 underline hover:no-underline">{{$review->count()}} opiniones</a>
</div>
