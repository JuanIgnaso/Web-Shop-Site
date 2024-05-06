@foreach($categories as $category)
<div  class="block relative {{$category->isChild() ? "ml-10" : ''}}">
        <x-categorias.category  :categoria="$category"></x-categorias.category>
</div>
@endforeach