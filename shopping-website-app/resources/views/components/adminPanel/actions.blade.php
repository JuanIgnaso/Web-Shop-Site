
{{--
    BOTONES DE ACCIÓN
    Parametros: ruta de objeto y objeto
    esto siempre va a tener un edit, show y destroy
    --}}
<div class=" flex justify-center gap-2">
    @if(in_array('edit',$actions) && Route::has($objPathName.'.edit'))
        <a href="{{route($objPathName.'.edit',$object)}}" class="admin-panel-action-button blue-gradient shadow-blue-600/40"><i class="fa-solid fa-pen-nib"></i></a>
    @endif

    @if(in_array('show',$actions) && Route::has($objPathName.'.show'))
    <a href="{{route($objPathName.'.show',$object)}}" class="admin-panel-action-button emerald-gradient shadow-emerald-500/40"><i class="fa-solid fa-eye"></i></a>
    @endif

    @if (in_array('destroy',$actions) && Route::has($objPathName.'.destroy'))
    <form action="{{route($objPathName.'.destroy',$object)}}" method="POST">
        @csrf
        @method('DELETE') <!-- Modificamos método del formulario -->
        <button class="admin-panel-action-button rose-gradient shadow-rose-500/40"><i class="fa-solid fa-minus"></i></button>
    </form>
    @endif


</div>