@session('message')
<div class="p-4 mb-4 w-2/3 m-auto text-sm mt-4 text-green-800 rounded-lg bg-green-50 " role="alert">
    <span class="font-medium">Acción completada!</span> {{session('message')}}
</div>
@endsession

@session('info')
<div class="p-4 mb-4 w-2/3 m-auto text-sm mt-4 text-blue-800 rounded-lg bg-blue-50 " role="alert">
    <span class="font-medium">Acción completada!</span> {{session('info')}}
</div>
@endsession

@session('warning')
<div class="p-4 mb-4 w-2/3 m-auto text-sm mt-4 text-yellow-600 rounded-lg bg-yellow-50 " role="alert">
    <span class="font-medium">Atención!</span> {{session('warning')}}
</div>
@endsession

@session('error')
<div class="p-4 mb-4 w-2/3 m-auto text-sm mt-4 text-red-800 rounded-lg bg-red-50 " role="alert">
    <span class="font-medium">Oh vaya!</span> {{session('error')}}
</div>
@endsession