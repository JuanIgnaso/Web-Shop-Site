<!--
    Tenemos:
    - enlace
    - icono
    - texto
-->
    <a class="" href="{{$params['url']}}"><!-- enlance -->
      <button class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg {{ Request::url() === $params['url'] ? 'bg-gradient-to-tr from-blue-600 to-blue-400 text-white shadow-md shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85] w-full flex items-center gap-4 px-4 capitalize' : 'text-white hover:bg-white/10 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize' }}" type="button">
        <i class="{{$params['icono']}} text-xl"></i> <!-- icono -->
        <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">{{$params['text']}}</p>
      </button>
    </a>