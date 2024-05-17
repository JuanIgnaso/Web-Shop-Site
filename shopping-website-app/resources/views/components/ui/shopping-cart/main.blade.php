                {{-- Botón del carrito --}}
                <div x-data="{show: false}" class="shopping-cart relative scursor-pointer flex h-10 items-center px-2 rounded-lg border border-gray-200 hover:border-gray-300 focus:outline-none hover:shadow-inner">
                    <svg
                    @click="show = !show" :aria-expanded="show ? 'true' : 'false'"
                     class="h-6 w-6 cursor-pointer leading-none text-gray-300 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span class="cart-product-count pl-1 text-white text-md">0</span>
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
                                <i class="fa-solid fa-xmark text-xl text-rose-500"></i>
                            </button>
                            {{-- Elementos del carrito --}}
                            <div class="product-container">
                            </div>
                            {{--  --}}
                            <div class="p-4 justify-center  flex bg-white">
                                <button class=" text-base  undefined  hover:scale-110 focus:outline-none flex justify-center px-4 py-2 rounded font-bold cursor-pointer
                                hover:bg-teal-700 hover:text-teal-100
                                bg-teal-100
                                text-teal-700
                                border duration-200 ease-in-out
                                border-teal-600 transition"><a href="" class="total-purchase"></a></button>
                            </div>
                        </div>
                    </div>
                </div>
                <script></script>
              {{--  --}}