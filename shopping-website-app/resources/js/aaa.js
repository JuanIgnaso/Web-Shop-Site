var c = document.querySelectorAll('#user-rating input[type="radio"]');

c.forEach(element => {
    element.addEventListener('click',function(){
        var index = [].indexOf.call(c, element);
        console.log(element.value);
    });
});

// function fill(index){

//     for(let i = 0; i < c.length; i++){
//         if(!c[i].nextElementSibling.classList.contains('gray')){
//             c[i].nextElementSibling.classList.add('gray');
//             c[i].nextElementSibling.classList.remove('yellow');
//         }
//     }

//     for (let i = 0; i <= index; i++) {
//         if(c[i].nextElementSibling.classList.contains('gray')){
//             c[i].nextElementSibling.classList.remove('gray');
//             c[i].nextElementSibling.classList.add('yellow');
//         }
//     }
// }