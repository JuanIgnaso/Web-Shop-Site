/*
Función del script: actualizar los valores de los inputs cuando el usuario maneja
los inputs tipo 'range' en el filtro de productos.
*/

let minimo = document.querySelector("#minimo");
let maximo = document.querySelector("#maximo");

minimo.addEventListener('change',function(){
showNumber('#val_minimo',this.value);
})

maximo.addEventListener('change',function(){
showNumber('#val_maximo',this.value);
})

document.querySelector('#val_maximo').addEventListener('keyup',function(){
maximo.value = this.value;
})

document.querySelector('#val_minimo').addEventListener('keyup',function(){
minimo.value = this.value;
})

function showNumber(element,val){
document.querySelector(element).value = val;
}