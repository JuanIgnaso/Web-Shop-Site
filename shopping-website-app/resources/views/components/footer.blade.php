<footer class="bg-eternity  shadow py-2">
    <div class="flex justify-between p-6">
      <span class="text-sm text-gray-500 sm:text-center ">© {{ now()->year }} <a href="https://flowbite.com/" class="hover:underline">Laravel Web Shop™</a>. All Rights Reserved.
    </span>
    <ul class="flex gap-4 flex-wrap items-center mt-3 text-sm font-medium text-linen  sm:mt-0">
        <li>
            <a href="#" class="hover:underline me-4 md:me-6">Sobre Nosotros</a>
        </li>
        <li>
            <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
        </li>
        <li>
            <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
        </li>
        <li>
            <a href="{{route('contact.index')}}" class="hover:underline">Contacto</a>
        </li>
    </ul>
    </div>
</footer>