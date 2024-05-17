// class = product-container <- donde cargar los elementos


/*--- Variables ---*/
let add = document.querySelector('#add-to-cart');
const shopCartStorage = window.localStorage;
let productList = [];
let cantidad = document.querySelector('#cant-producto');
let error = document.querySelector('#error');
let productCount = document.querySelectorAll('.cart-product-count');


//Cargar el localStorage si este existe
window.onload = function(){
    // shopCartStorage.removeItem('cart');
    if(shopCartStorage.getItem('cart') != null){
        productList = JSON.parse(shopCartStorage.getItem('cart'));
        calcTotal(productList);
    }
}

//Cargar elementos dentro del carrito al cargar la página
if(window.localStorage.getItem('cart') != null){
    let products = JSON.parse(window.localStorage.getItem('cart'));
    let shopcart = document.querySelectorAll('.shopping-cart .product-container');
    shopcart.forEach(element => {
            for (let index = 0; index < products.length; index++) {
                loadProduct(element,products[index]);
            }
    });
    document.querySelectorAll('.cart-product-count').forEach(element => {
       element.innerHTML = JSON.parse(window.localStorage.getItem('cart')).length;
    });

}


/*ACCIONES----------------------------------------------------*/

//Guardar producto en Array
function storeProduct(producto){

    let found = productList.find(ob => ob.producto.id == producto.id);

    if(found == undefined){
        if(Number(cantidad.value) <= producto.unidades){
            productList.push({producto:producto,cant: Number(cantidad.value)});
            saveInStorage();
            error.innerHTML = '';
            productCount.forEach(element => {
                element.innerHTML = JSON.parse(window.localStorage.getItem('cart')).length;
            });


        }else{
            error.innerHTML = 'El producto no tiene suficientes unidades en stock ahora mismo';
        }
    }else{
        let index = productList.indexOf(found);
        if(productList[index].cant + Number(cantidad.value) <= producto.unidades){
            productList[index].cant = productList[index].cant + Number(cantidad.value);
            saveInStorage();
            document.querySelector('#error').innerHTML = '';
        }else{
            document.querySelector('#error').innerHTML = 'El producto no tiene suficientes unidades en stock ahora mismo';
        }
    }
    calcTotal(productList);
}


//Eliminar elemento del carrito
function removeFromCart(id){
    document.querySelector(`#id${id}`).remove();
    productList = (JSON.parse(window.localStorage.getItem('cart')).filter((obj) => obj.producto.id != id));
    saveInStorage();
    document.querySelectorAll('.cart-product-count').forEach(element => {
        element.innerHTML = JSON.parse(window.localStorage.getItem('cart')).length;
     });
     calcTotal(productList);
}

//Guardar en localStorage
function saveInStorage(){
    shopCartStorage.setItem('cart',JSON.stringify(productList));
}

//Cargar elemento HTML del producto en el carrito
function loadProduct(target,element){
    target.innerHTML +=
    `
    <div id="id${element.producto.id}" class="cart-element p-2 flex bg-white hover:bg-gray-100 cursor-pointer border-b border-gray-100" style="">
    <div class="p-2 w-12"><img src="https://dummyimage.com/50x50/bababa/0011ff&amp;text=50x50" alt="img product"></div>
    <div class="flex-auto text-sm w-32">
        <div class="font-bold">${element.producto.nombreProducto}</div>
        <div class="truncate">${(element.producto.descripcion).substring(0,15)}...</div>
        <div class="text-gray-400">Ud: ${element.cant}</div>
    </div>
    <div class="flex flex-col w-18 font-medium items-end">
        <div onclick="removeFromCart(${element.producto.id})" class="w-4 h-4 mb-6 hover:bg-red-200 rounded-full cursor-pointer text-red-700">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 ">
                <polyline points="3 6 5 6 21 6"></polyline>
                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                <line x1="10" y1="11" x2="10" y2="17"></line>
                <line x1="14" y1="11" x2="14" y2="17"></line>
            </svg>
        </div>
        ${element.producto.precio} €</div>
</div>
    `;
}

//Calcular total del carrito
function calcTotal(array){
    document.querySelectorAll('.total-purchase').forEach(element =>{
        element.innerHTML = `${array.reduce(function (acc, obj) { return acc + obj.producto.precio * obj.cant; }, 0)} € - Finalizar Pedido`;
    });
}