<a href="{{route('producto.list',$categoria->id)}}" class="block mt-2   rounded-lg shadow hover:bg-gray-100 {{$categoria->isChild() ? 'bg-teal-100 text-xl hover:bg-teal-300 p-2 before:content-["-"] before:absolute before:left-[-1%] before:font-bold before:text-2xl before:text-turquoiseMedium' : 'bg-white text-2xl p-6'}}">
    <h5 class="font-extrabold tracking-tight text-gray-900 ">{{$categoria->nombre_categoria}}</h5>
</a>
<x-categorias.categories :categories="$categoria->children"></x-categorias.categories>
