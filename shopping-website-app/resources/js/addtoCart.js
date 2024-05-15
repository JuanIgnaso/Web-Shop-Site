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
    }
}

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
    console.log(productList);
}

//Guardar en localStorage
function saveInStorage(){
    shopCartStorage.setItem('cart',JSON.stringify(productList));
}