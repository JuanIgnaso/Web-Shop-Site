@session('message')
<div class="p-4 mb-4 w-2/3 m-auto text-sm mt-4 text-green-800 rounded-lg bg-green-50 " role="alert">
    <span class="font-medium">Acción completada!</span> {{session('message')}}
</div>
@endsession

@session('error')
<div class="p-4 mb-4 w-2/3 m-auto text-sm mt-4 text-red-800 rounded-lg bg-red-50 " role="alert">
    <span class="font-medium">Oh vaya!</span> {{session('error')}}
</div>
@endsession