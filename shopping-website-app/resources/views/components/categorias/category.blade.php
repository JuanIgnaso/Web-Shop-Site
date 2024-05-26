<a href="{{route('producto.list',$categoria->id)}}" class="block mt-2 hover:scale-105 transition duration-300 rounded-lg shadow hover:bg-gray-100 {{$categoria->isChild() ? 'bg-teal-100 text-xl hover:bg-teal-300 p-2' : 'bg-white text-2xl p-6'}}">
    @if($categoria->isChild())<i class="fa-solid fa-reply absolute left-[-1%] rotate-180 text-darkBlue"></i>@endif
    <h5 class="font-extrabold tracking-tight text-gray-900 pl-2">{{$categoria->nombre_categoria}}</h5>
</a>
<x-categorias.categories :categories="$categoria->children"></x-categorias.categories>
