<!--
    Tenemos:
    - enlace
    - icono
    - texto
-->
    <a class="" href="{{$params['url']}}"><!-- enlance -->
      <button class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg {{ Request::url() === $params['url'] ? 'bg-gradient-to-tr from-indigo-800 to-indigo-600 text-white shadow-md shadow-indigo-600/20 hover:shadow-lg hover:shadow-turquoiseSemiLight/40 active:opacity-[0.85] w-full flex items-center gap-4 px-4 capitalize' : 'text-white hover:bg-white/10 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize' }}" type="button">
        <i class="{{$params['icono']}} text-xl"></i> <!-- icono -->
        <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">{{$params['text']}}</p>
      </button>
    </a>