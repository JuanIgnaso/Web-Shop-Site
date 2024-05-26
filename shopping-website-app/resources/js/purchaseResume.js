let list = JSON.parse(window.localStorage.getItem('cart'));

if(list.length != 0){
    list.forEach(element => {
        document.querySelector('#resumen-compra').innerHTML +=
        `
        <li class="id${element.producto.id} grid grid-cols-6 gap-2 border-b-1 relative">
            <div class="col-span-1 self-center">
                <img src="${element.imagen}" alt="imagen del producto ${element.producto.nombreProducto}" class="rounded w-full">
            </div>
            <div class="flex flex-col col-span-3 pt-2">
                <span class="text-gray-600 text-md font-semi-bold">${element.producto.nombreProducto}</span>
                <span class="text-gray-400 text-sm inline-block pt-2">${(element.producto.descripcion).substring(0,15)}...</span>
            </div>
            <div class="col-span-2 pt-3">
                <div class="flex items-center space-x-2 text-sm justify-between">
                    <span class="text-gray-400">${element.cant} x ${element.producto.precio}€</span>
                    <span class="text-pink-400 font-semibold inline-block">${element.cant * element.producto.precio}€</span>
                </div>
                <div onclick="removeFromCart(${element.producto.id})" class="w-4 h-4 mb-6 hover:bg-red-200 rounded-full cursor-pointer text-red-700">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 ">
                    <polyline points="3 6 5 6 21 6"></polyline>
                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                    <line x1="10" y1="11" x2="10" y2="17"></line>
                    <line x1="14" y1="11" x2="14" y2="17"></line>
                </svg>
            </div>
            </div>

        </li>
        `;
    });
}


document.querySelector('#precio-final').innerHTML = `${(list.reduce(function (acc, obj) { return acc + obj.producto.precio * obj.cant; }, 0)).toFixed(2)} €`;
document.querySelector('#pagar').innerHTML = `Pagar ${(list.reduce(function (acc, obj) { return acc + obj.producto.precio * obj.cant; }, 0)).toFixed(2)} €`;
