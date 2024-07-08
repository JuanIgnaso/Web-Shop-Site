                {{-- Botón del carrito --}}
                <div x-data="{show: false}" class="group shopping-cart relative scursor-pointer flex h-10 items-center px-2 rounded-lg border-2 border-shingleFawn hover:border-linen focus:outline-none hover:shadow-inner">
                    <svg
                    @click="show = !show" :aria-expanded="show ? 'true' : 'false'"
                     class="h-6 w-6 cursor-pointer leading-none text-linen group-hover:text-shingleFawn stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span class="cart-product-count pl-1 text-linen group-hover:text-shingleFawn text-md">0</span>
                    <div x-show="show"
                    x-transition:enter="ease-in-out duration-500"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in-out duration-500"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="absolute w-full top-full left-[-50%] translate-x-[-50%] mt-6 rounded-md border-t-0 z-50">
                        <div class="shadow-xl w-64 bg-white text-black">
                            <button class="p-2" @click="show = !show" :aria-expanded="show ? 'true' : 'false'">
                                <i class="fa-solid fa-xmark text-xl text-azulDianne"></i>
                            </button>
                            {{-- Elementos del carrito --}}
                            <div class="product-container">
                            </div>
                            {{--  --}}
                            <div class="p-4 justify-center  flex flex-col gap-2 bg-white">
                                <button class="end-purchase text-base  undefined  hover:scale-110 focus:outline-none flex justify-center px-4 py-2 rounded font-bold cursor-pointer

                                bg-verdeAlga
                                text-azulDianne
                                duration-200 ease-in-out
                                 transition">
                                <a href="{{route('checkout.index')}}" class="total-purchase"></a>
                                </button>

                                <button class="end-purchase text-base  undefined  hover:scale-110 focus:outline-none flex justify-center px-4 py-2 rounded font-bold cursor-pointer

                                bg-arbolCoral
                                text-white
                                 duration-200 ease-in-out
                                 transition">
                                    <a href="{{route('cart.destroy')}}">Limpiar Cesta <i class="fa-regular fa-trash-can"></i></a>
                                </button>

                                <p class="hidden cart-empty text-center">Tu cesta está vacía</p>
                            </div>
                        </div>
                    </div>
                </div>
                <script></script>
              {{--  --}}