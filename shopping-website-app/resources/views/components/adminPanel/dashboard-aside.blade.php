<!-- Page Content -->

        <!-- INDEX -->
        <button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar" aria-controls="sidebar-multi-level-sidebar" type="button" class="absolute bottom-0 mb-1 z-50 inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
          <span class="sr-only">Open sidebar</span>
          <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
          </svg>
       </button>

{{-- -translate-x-80 afecta a que el elemento se oculte --}}
<aside class="bg-gradient-to-br from-gray-800 to-gray-900 -translate-x-80 fixed inset-0 z-50 my-4 ml-4 h-[calc(100vh-32px)] w-72 rounded-xl transition-transform duration-300 xl:translate-x-0">
    <div class="relative border-b border-white/20">
      <a class="flex items-center gap-4 py-6 px-8" href="#/">
        <h6 class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-white">Panel de Control</h6>
      </a>
      {{-- Botón para cerrar menú en modo smartphone --}}
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
      <ul x-data="{show : false}" class="mb-4 flex flex-col gap-1">
        <li class="mx-3.5 mt-4 mb-2">
          <p @click="show = !show" class="cursor-pointer block antialiased font-sans text-sm leading-normal text-white font-black uppercase opacity-75">Elementos</p>
        </li>
        <li>
            <ul x-show="show">
                <li>
                  <x-adminPanel.list-element :params="['url'=>route('producto.index'),'text'=>'Productos','icono'=>'fa-solid fa-boxes-packing']"></x-adminPanel.list-element>
                </li>
                <li>
                  <x-adminPanel.list-element :params="['url'=>route('categoria.index'),'text'=>'Categorias','icono'=>'fa-solid fa-icons']"></x-adminPanel.list-element>
                </li>
                <li>
                  <x-adminPanel.list-element :params="['url'=>route('proveedor.index'),'text'=>'Proveedores','icono'=>'fa-solid fa-truck-ramp-box']"></x-adminPanel.list-element>
                </li>
                <li>
                  <x-adminPanel.list-element :params="['url'=>route('files.index'),'text'=>'Fotos','icono'=>'fa-solid fa-photo-film']"></x-adminPanel.list-element>
                </li>
                {{-- Mostrar solo para los admins --}}
                @if(Auth::user()->claseUsuario == 3)
                <li>
                  <x-adminPanel.list-element :params="['url'=>route('user.index'),'text'=>'Usuarios','icono'=>'fa-solid fa-user']"></x-adminPanel.list-element>
                </li>
                @endif
            </ul>
        </li>

      </ul>


      <!-- REGISTROS ------->
      <ul x-data="{show : false}" class="mb-4 flex flex-col gap-1">
        <li class="mx-3.5 mt-4 mb-2">
          <p @click="show = !show" class="cursor-pointer block antialiased font-sans text-sm leading-normal text-white font-black uppercase opacity-75">Registros</p>
        </li>
        <li>
          <ul x-show="show">
            <li>
              <x-adminPanel.list-element :params="['url'=>route('registros.index'),'text'=>'Tabla de registros','icono'=>'fa-solid fa-clipboard-list']"></x-adminPanel.list-element>
            </li>
          </ul>
        </li>
      </ul>
      <!-- --------------- -->

      @if (Auth::user()->claseUsuario == 3)
          <!-- REVIEWS ------->
          <ul x-data="{show : false}" class="mb-4 flex flex-col gap-1">
            <li class="mx-3.5 mt-4 mb-2">
              <p @click="show = !show" class="cursor-pointer block antialiased font-sans text-sm leading-normal text-white font-black uppercase opacity-75 ">Reviews de productos</p>
            </li>
            <li>
              <ul x-show="show">
                <li>
                  <x-adminPanel.list-element :params="['url'=>route('review.index'),'text'=>'Reviews','icono'=>'fa-solid fa-gavel']"></x-adminPanel.list-element>
                </li>
              </ul>
            </li>
          </ul>
      <!-- --------------- -->
      @endif

    </div>
  </aside>
