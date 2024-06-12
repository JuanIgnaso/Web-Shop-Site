// class = product-container <- donde cargar los elementos

let finishPurchase = document.querySelectorAll('.end-purchase');
let empty = document.querySelectorAll('.cart-empty');

window.onload = function(){
    get_user_cart();
}



/**
 * Elimina el producto del carrito
 * @param {*} element
 */
function remove_from_cart(element){
    $.ajax({
      url:'/removeFromCart',
      type:'GET',
      dataType:'json',
      data:{
        id:element,
      },
      success: function(response){
        document.querySelectorAll(`.id${element}`).forEach(element => {
            element.remove();
        });
        window.location.reload();
      },
      error: function(error){
        console.log(JSON.parse(error.responseText));
      }
    });
}

/**
 * Añade un elemento al carrito
 * @param {} element
 */
function add_to_cart(element){
    $.ajax({
      url:'/addToCart',
      type:'GET',
      dataType:'json',
      data:{
        mensaje:{'producto':element,'cant':Number(document.querySelector('#cant-producto').value)},
      },
      success: function(response){

        get_user_cart();

        finishPurchase.forEach(element =>{
          if(element.classList.contains('hidden')){
            element.classList.remove('hidden');
          }
        });

        empty.forEach(element =>{
          if(!element.classList.contains('hidden')){
            element.classList.add('hidden');
          }
        })
      },
      error: function(error){
        window.location.reload();
      }
    });
}

/*
Recoge el carrito del usuario
*/
function get_user_cart(){
    $.ajax({
      url:'/getUserCart',
      type:'GET',
      dataType:'json',
      success: function(response){

        let shopcart = document.querySelectorAll('.shopping-cart .product-container');

        shopcart.forEach(element => {
          element.innerHTML = '';
          loadItems(element,response);
          });

        calcTotal(document.querySelectorAll('.total-purchase'),response,' € - Finalizar Pedido');
      },
      error: function(error){

        finishPurchase.forEach(element =>{
          if(!element.classList.contains('hidden')){
            element.classList.add('hidden');
          }
        });

        empty.forEach(element =>{
          if(element.classList.contains('hidden')){
            element.classList.remove('hidden');
          }
        });

      }
    });
  }

  //Calcular total del carrito
function calcTotal(target,array,message){

    let total = 0;
    for(let key in array){
      total += array[key].cant * array[key].precio;
    }

    target.forEach(element =>{
        element.innerHTML = `${(total).toFixed(2)}${message}`;
    });
}

/**
 * Carga los elementos en el carrito.
 *
 * @param {*} e - Elemento donde cargar los productos
 * @param {*} array - array que contiene los productos
 */
function loadItems(e,array){

    let products = 0;

    for(let key in array){
      e.innerHTML+=`
      <div class="id${key} cart-element p-2 flex bg-white hover:bg-gray-100 cursor-pointer border-b border-gray-100" style="">
          <div class="p-2 w-12 h-12"><img class="object-cover w-full h-full" src="${array[key].foto}" alt="img product"></div>
          <div class="flex-auto text-sm w-32">
              <div class="font-bold">${array[key].nombre}</div>
              <div class="truncate">${(array[key].descripcion).substring(0,15)}...</div>
              <div class="text-gray-400">Ud: ${array[key].cant}</div>
          </div>
          <div class="flex flex-col w-18 font-medium items-end">
              <div onclick="remove_from_cart(${key})" class="w-4 h-4 mb-6 hover:bg-red-200 rounded-full cursor-pointer text-red-700">
                  <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 ">
                      <polyline points="3 6 5 6 21 6"></polyline>
                      <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                      <line x1="10" y1="11" x2="10" y2="17"></line>
                      <line x1="14" y1="11" x2="14" y2="17"></line>
                  </svg>
              </div>
              ${array[key].precio} €
          </div>
      </div>
      `;
      products++;
    }
    //Actualiza el contador de productos
    document.querySelectorAll('.cart-product-count').forEach(element => {
      element.innerHTML = products;
    })
}



