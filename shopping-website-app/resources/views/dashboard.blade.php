
@section('title')
{{'Inicio'}}
@endsection
<x-app-layout>
    <h1 class="p-2 mt-4 mb-4 text-4xl font-extrabold leading-none tracking-tight text-center text-eternity md:text-5xl lg:text-6xl ">Dulces y refrescos de Juan Laravel Shop</h1>
{{-- <body class="text-base leading-normal tracking-normal text-gray-600 bg-white work-sans"> --}}
    <div class="container relative mx-auto carousel" style="max-width:1600px;">
        <div class="relative w-full overflow-hidden carousel-inner">


            <!--Slide 1-->
            <input class="hidden carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
            <div class="absolute opacity-0 carousel-item" style="height:50vh;">
                <div class="flex block w-full h-full pt-6 mx-auto bg-right bg-cover md:pt-0 md:items-center bg-full" style='background-image: url("{{ Vite::asset('resources/images/category_image_example_1.jpg') }}");'>

                    <div class="absolute w-full h-full bg-white/25"></div> {{-- Para crear contraste --}}

                    <div class="container z-10 mx-auto">
                        <div class="flex flex-col items-center w-full px-6 tracking-wide lg:w-1/2 md:ml-16 md:items-start">
                            <p class="my-4 text-2xl text-eternity berkshire">Buscas alguna bebida para hacerte entrar en calor? hecha un vistazo a nuestros Cafés.</p>
                            <a class="inline-block text-xl leading-relaxed no-underline transition duration-150 border-b border-gray-600 hover:border-black hover:scale-110 hover:text-white" href="#">mirar productos</a>
                        </div>
                    </div>

                </div>
            </div>
            <label for="carousel-3" class="absolute inset-y-0 left-0 z-10 hidden w-10 h-10 my-auto ml-2 text-3xl font-bold leading-tight text-center text-black bg-white rounded-full cursor-pointer prev control-1 md:ml-10 hover:text-white hover:bg-gray-900">‹</label>
            <label for="carousel-2" class="absolute inset-y-0 right-0 z-10 hidden w-10 h-10 my-auto mr-2 text-3xl font-bold leading-tight text-center text-black bg-white rounded-full cursor-pointer next control-1 md:mr-10 hover:text-white hover:bg-gray-900">›</label>

            <!--Slide 2-->
            <input class="hidden carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
            <div class="absolute bg-right bg-cover opacity-0 carousel-item" style="height:50vh;">
                <div class="flex block w-full h-full pt-6 mx-auto bg-right bg-cover md:pt-0 md:items-center"  style='background-image: url("{{ Vite::asset('resources/images/category_image_example_2.jpg') }}");'>

                    <div class="absolute w-full h-full bg-white/25"></div> {{-- Para crear contraste --}}

                    <div class="container z-10 mx-auto">
                        <div class="flex flex-col items-center w-full px-6 tracking-wide lg:w-1/2 md:ml-16 md:items-start">
                            <p class="my-4 text-2xl text-eternity berkshire">Dulce, dulce tentenpié, tenemos galletas que te harán la boca agua.</p>
                            <a class="z-10 inline-block text-xl leading-relaxed no-underline transition duration-150 border-b border-gray-600 hover:border-black hover:scale-110 hover:text-white" href="#">mirar productos</a>
                        </div>
                    </div>

                </div>
            </div>
            <label for="carousel-1" class="absolute inset-y-0 left-0 z-10 hidden w-10 h-10 my-auto ml-2 text-3xl font-bold leading-tight text-center text-black bg-white rounded-full cursor-pointer prev control-2 md:ml-10 hover:text-white hover:bg-gray-900">‹</label>
            <label for="carousel-3" class="absolute inset-y-0 right-0 z-10 hidden w-10 h-10 my-auto mr-2 text-3xl font-bold leading-tight text-center text-black bg-white rounded-full cursor-pointer next control-2 md:mr-10 hover:text-white hover:bg-gray-900">›</label>

            <!--Slide 3-->
            <input class="hidden carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
            <div class="absolute opacity-0 carousel-item" style="height:50vh;">
                <div class="flex block w-full h-full pt-6 mx-auto bg-bottom bg-cover md:pt-0 md:items-center" style='background-image: url("{{ Vite::asset('resources/images/category_image_example_3.jpg') }}");'>

                    <div class="absolute w-full h-full bg-white/25"></div> {{-- Para crear contraste --}}

                    <div class="container z-10 mx-auto">
                        <div class="flex flex-col items-center w-full px-6 tracking-wide lg:w-1/2 md:ml-16 md:items-start">
                            <p class="my-4 text-2xl berkshire text-eternity">Tenemos una nueva sección para los amantes del Té, para todos los gustos.</p>
                            <a class="z-10 inline-block text-xl leading-relaxed no-underline transition duration-150 border-b border-gray-600 hover:border-black hover:scale-110 hover:text-white" href="#">mirar productos</a>
                        </div>
                    </div>

                </div>
            </div>

            <label for="carousel-2" class="absolute inset-y-0 left-0 z-10 hidden w-10 h-10 my-auto ml-2 text-3xl font-bold leading-tight text-center text-black bg-white rounded-full cursor-pointer prev control-3 md:ml-10 hover:text-white hover:bg-gray-900">‹</label>
            <label for="carousel-1" class="absolute inset-y-0 right-0 z-10 hidden w-10 h-10 my-auto mr-2 text-3xl font-bold leading-tight text-center text-black bg-white rounded-full cursor-pointer next control-3 md:mr-10 hover:text-white hover:bg-gray-900">›</label>


            <!--Slide 3-->
            <input class="hidden carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
            <div class="absolute opacity-0 carousel-item" style="height:50vh;">
                <div class="flex block w-full h-full pt-6 mx-auto bg-bottom bg-cover md:pt-0 md:items-center" style='background-image: url("{{ Vite::asset('resources/images/category_image_example_3.jpg') }}");'>

                    <div class="absolute w-full h-full bg-white/25"></div> {{-- Para crear contraste --}}

                    <div class="container z-10 mx-auto">
                        <div class="flex flex-col items-center w-full px-6 tracking-wide lg:w-1/2 md:ml-16 md:items-start">
                            <p class="my-4 text-2xl berkshire text-eternity">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis nemo sequi, corrupti doloribus ad quidem maiores neque dolores itaque natus ipsum soluta? Hic voluptate sapiente officia officiis sit, labore laborum!.</p>
                            <a class="z-10 inline-block text-xl leading-relaxed no-underline transition duration-150 border-b border-gray-600 hover:border-black hover:scale-110 hover:text-white" href="#">mirar productos</a>
                        </div>
                    </div>

                </div>
            </div>

            <label for="carousel-2" class="absolute inset-y-0 left-0 z-10 hidden w-10 h-10 my-auto ml-2 text-3xl font-bold leading-tight text-center text-black bg-white rounded-full cursor-pointer prev control-3 md:ml-10 hover:text-white hover:bg-gray-900">‹</label>
            <label for="carousel-1" class="absolute inset-y-0 right-0 z-10 hidden w-10 h-10 my-auto mr-2 text-3xl font-bold leading-tight text-center text-black bg-white rounded-full cursor-pointer next control-3 md:mr-10 hover:text-white hover:bg-gray-900">›</label>



            <!-- Add additional indicators for each slide-->
            <ol class="carousel-indicators">
                <li class="inline-block mr-3">
                    <label for="carousel-1" class="block text-4xl text-gray-400 cursor-pointer carousel-bullet hover:text-gray-900">•</label>
                </li>
                <li class="inline-block mr-3">
                    <label for="carousel-2" class="block text-4xl text-gray-400 cursor-pointer carousel-bullet hover:text-gray-900">•</label>
                </li>
                <li class="inline-block mr-3">
                    <label for="carousel-3" class="block text-4xl text-gray-400 cursor-pointer carousel-bullet hover:text-gray-900">•</label>
                </li>
            </ol>

        </div>
    </div>


{{-- Proveedores  Introduce tus proveedores aquí--}}

        <section class="py-24 bg-white sm:py-32">
            <div class="px-6 mx-auto max-w-7xl lg:px-8">
            <h2 class="text-3xl font-semibold leading-8 text-center text-eternity">Confiado por proveedores de gran calidad.</h2>
            <div class="grid items-center max-w-lg grid-cols-4 mx-auto mt-10 gap-x-8 gap-y-10 sm:max-w-xl sm:grid-cols-6 sm:gap-x-10 lg:mx-0 lg:max-w-none lg:grid-cols-5">
                <img class="object-contain w-full col-span-2 max-h-12 lg:col-span-1" src="https://tailwindui.com/img/logos/158x48/transistor-logo-gray-900.svg" alt="Transistor" width="158" height="48">
                <img class="object-contain w-full col-span-2 max-h-12 lg:col-span-1" src="https://tailwindui.com/img/logos/158x48/reform-logo-gray-900.svg" alt="Reform" width="158" height="48">
                <img class="object-contain w-full col-span-2 max-h-12 lg:col-span-1" src="https://tailwindui.com/img/logos/158x48/tuple-logo-gray-900.svg" alt="Tuple" width="158" height="48">
                <img class="object-contain w-full col-span-2 max-h-12 sm:col-start-2 lg:col-span-1" src="https://tailwindui.com/img/logos/158x48/savvycal-logo-gray-900.svg" alt="SavvyCal" width="158" height="48">
                <img class="object-contain w-full col-span-2 col-start-2 max-h-12 sm:col-start-auto lg:col-span-1" src="https://tailwindui.com/img/logos/158x48/statamic-logo-gray-900.svg" alt="Statamic" width="158" height="48">
            </div>
            </div>
        </section>


{{-- Productos destacados --}}
    <section class="py-8 bg-white">

        <div class="container flex flex-wrap items-center pt-4 pb-12 mx-auto">

            <nav id="store" class="top-0 z-30 w-full px-6 py-1">
                <div class="container flex flex-wrap items-center justify-between w-full px-2 mx-auto mt-0">

                    <h2 class="w-full p-2 font-bold tracking-wide no-underline bg-gradient-to-r from-sandrift to-white text-eternity hover:no-underline" >
				        Productos Destacados
			        </h2>

                /div>
            </nav>

            @if (isset($ultimos))
            <div class="grid grid-cols-1 p-6 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                  @foreach($ultimos as $p)
                    <x-product.product-wrapper :producto="$p" :src="$p->imagen != null ? url('storage/'.$p->imagen) : Vite::asset('resources/images/web-logo.png')"></x-product.product-wrapper>
                  @endforeach
            </div>
            @endif
            </div>

    </section>

    <section class="py-8 bg-coldPurple">

            <div class="container px-6 py-8 mx-auto">

                <h2 class="mb-8 font-bold tracking-wide no-underline text-eternity hover:no-underline" href="#">
                Sobre Nosotros
                </h2>

                <p class="mt-8 mb-8">This template is inspired by the stunning nordic minimalist design - in particular:
                    <br>
                    <a class="text-gray-800 underline hover:text-gray-900" href="http://savoy.nordicmade.com/" target="_blank">Savoy Theme</a> created by <a class="text-gray-800 underline hover:text-gray-900" href="https://nordicmade.com/">https://nordicmade.com/</a> and <a class="text-gray-800 underline hover:text-gray-900" href="https://www.metricdesign.no/" target="_blank">https://www.metricdesign.no/</a></p>

                <p class="mb-8">Lorem ipsum dolor sit amet, consectetur <a href="#">random link</a> adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vel risus commodo viverra maecenas accumsan lacus vel facilisis volutpat. Vitae aliquet nec ullamcorper sit. Nullam eget felis eget nunc lobortis mattis aliquam. In est ante in nibh mauris. Egestas congue quisque egestas diam in. Facilisi nullam vehicula ipsum a arcu. Nec nam aliquam sem et tortor consequat. Eget mi proin sed libero enim sed faucibus turpis in. Hac habitasse platea dictumst quisque. In aliquam sem fringilla ut. Gravida rutrum quisque non tellus orci ac auctor augue mauris. Accumsan lacus vel facilisis volutpat est velit egestas dui id. At tempor commodo ullamcorper a. Volutpat commodo sed egestas egestas fringilla. Vitae congue eu consequat ac.</p>

            </div>

    </section>

</x-app-layout>
