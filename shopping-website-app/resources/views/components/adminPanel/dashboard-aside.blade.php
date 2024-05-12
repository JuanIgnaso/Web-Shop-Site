<!-- Page Content -->
<aside class="bg-gradient-to-br from-gray-800 to-gray-900 -translate-x-80 fixed inset-0 z-50 my-4 ml-4 h-[calc(100vh-32px)] w-72 rounded-xl transition-transform duration-300 xl:translate-x-0">
    <div class="relative border-b border-white/20">
      <a class="flex items-center gap-4 py-6 px-8" href="#/">
        <h6 class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-white">Panel de Control</h6>
      </a>
      <button class="middle none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-8 max-w-[32px] h-8 max-h-[32px] rounded-lg text-xs text-white hover:bg-white/10 active:bg-white/30 absolute right-0 top-0 grid rounded-br-none rounded-tl-none xl:hidden" type="button">
        <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" aria-hidden="true" class="h-5 w-5 text-white">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </span>
      </button>
    </div>
    <div class="m-4">
      <ul class="mb-4 flex flex-col gap-1">
        <li>
          <x-adminPanel.list-element :params="['url'=>route('panel.index'),'text'=>'Dashboard','icono'=>'fa-solid fa-house']"></x-adminPanel.list-element>
        </li>
      </ul>
      <ul class="mb-4 flex flex-col gap-1">
        <li class="mx-3.5 mt-4 mb-2">
          <p class="block antialiased font-sans text-sm leading-normal text-white font-black uppercase opacity-75">Elementos</p>
        </li>
        <li>
          <x-adminPanel.list-element :params="['url'=>route('producto.index'),'text'=>'Productos','icono'=>'fa-solid fa-boxes-packing']"></x-adminPanel.list-element>
        </li>
        <li>
          <x-adminPanel.list-element :params="['url'=>route('categoria.index'),'text'=>'Categorias','icono'=>'fa-solid fa-icons']"></x-adminPanel.list-element>
        </li>
        <li>
          <x-adminPanel.list-element :params="['url'=>route('proveedor.index'),'text'=>'Proveedores','icono'=>'fa-solid fa-truck-ramp-box']"></x-adminPanel.list-element>
        </li>
        {{-- Mostrar solo para los admins --}}
        @if(Auth::user()->claseUsuario == 3)
        <li>
          <x-adminPanel.list-element :params="['url'=>route('user.index'),'text'=>'Usuarios','icono'=>'fa-solid fa-user']"></x-adminPanel.list-element>
        </li>
        @endif
      </ul>


      <!-- REGISTROS ------->
      <ul class="mb-4 flex flex-col gap-1">
        <li class="mx-3.5 mt-4 mb-2">
          <p class="block antialiased font-sans text-sm leading-normal text-white font-black uppercase opacity-75">Registros</p>
        </li>
        <li>
          <x-adminPanel.list-element :params="['url'=>route('registros.index'),'text'=>'Tabla de registros','icono'=>'fa-solid fa-clipboard-list']"></x-adminPanel.list-element>
        </li>
      </ul>
      <!-- --------------- -->

      @if (Auth::user()->claseUsuario == 3)
          <!-- REVIEWS ------->
          <ul class="mb-4 flex flex-col gap-1">
            <li class="mx-3.5 mt-4 mb-2">
              <p class="block antialiased font-sans text-sm leading-normal text-white font-black uppercase opacity-75">Reviews de productos</p>
            </li>
            <li>
              <x-adminPanel.list-element :params="['url'=>route('review.index'),'text'=>'Reviews','icono'=>'fa-solid fa-gavel']"></x-adminPanel.list-element>
            </li>
          </ul>
      <!-- --------------- -->
      @endif

    </div>
  </aside>
