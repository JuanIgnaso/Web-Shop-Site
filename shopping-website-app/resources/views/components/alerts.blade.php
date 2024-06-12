@session('message')
<div class="absolute p-4 mb-4 w-full m-auto text-sm mt-4 text-green-800 rounded-lg bg-green-100 " role="alert">
    <span class="font-medium"><i class="fa-solid fa-check"></i></span> {{session('message')}}
</div>
@endsession

@session('info')
<div class="absolute p-4 mb-4 w-full m-auto text-sm mt-4 text-blue-800 rounded-lg bg-blue-100 " role="alert">
    <span class="font-medium"><i class="fa-solid fa-circle-info"></i></span> {{session('info')}}
</div>
@endsession

@session('warning')
<div class="absolute p-4 mb-4 w-full m-auto text-sm mt-4 text-yellow-600 rounded-lg bg-yellow-100 " role="alert">
    <span class="font-medium"><i class="fa-solid fa-triangle-exclamation"></i></span> {{session('warning')}}
</div>
@endsession

@session('error')
<div class="absolute p-4 mb-4 w-full m-auto text-sm mt-4 text-red-800 rounded-lg bg-red-100 " role="alert">
    <span class="font-medium"><i class="fa-solid fa-xmark"></i></span> {{session('error')}}
</div>
@endsession