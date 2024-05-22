var c = document.querySelectorAll('#user-rating input[type="radio"]');

c.forEach(element => {
    element.addEventListener('click',function(){
        var index = [].indexOf.call(c, element);
        document.querySelector('#score').innerHTML = `${element.value} Estrella/s`;
    });
});
