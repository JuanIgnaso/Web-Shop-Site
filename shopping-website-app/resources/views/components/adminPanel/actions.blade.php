
{{--
    GENERAR BOTONES DE ACCIÓN

    -actions - array de acciones: debe tener 'edit'(editar), 'show'(mostrar) o 'destroy'(eliminar)

    -objPathName - nombre del path del objeto(preferiblemente que tenga un resource creado en el archivo de rutas)

    -object - objecto sobre el cual se van a realizar las acciones.

    --}}
<div class="flex justify-center gap-2 ">
    @if(in_array('edit',$actions) && Route::has($objPathName.'.edit'))
        <a href="{{route($objPathName.'.edit',$object)}}" class="bg-blue-500 admin-panel-action-button hover:bg-blue-400"><i class="fa-solid fa-pen-nib"></i></a>
    @endif

    @if(in_array('show',$actions) && Route::has($objPathName.'.show'))
    <a href="{{route($objPathName.'.show',$object)}}" class="admin-panel-action-button bg-emerald-500 hover:bg-emerald-400"><i class="fa-solid fa-eye"></i></a>
    @endif

    @if (in_array('destroy',$actions) && Route::has($objPathName.'.destroy'))
    <form action="{{route($objPathName.'.destroy',$object)}}" method="POST">
        @csrf
        @method('DELETE') <!-- Modificamos método del formulario -->
        <button class="admin-panel-action-button bg-rose-500 hover:bg-rose-400"><i class="fa-solid fa-minus"></i></button>
    </form>
    @endif


</div>