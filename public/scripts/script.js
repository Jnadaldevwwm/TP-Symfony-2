const burger = document.getElementById('burger');
const menuDeroule = document.getElementById('menuDeroule');
var state=0;
burger.addEventListener('click', function(){
    if(state === 0){
        menuDeroule.setAttribute('style','visibility: visible');
        burger.setAttribute('src','images/fleche.png');
        state=1;
    } else if(state === 1){
        menuDeroule.setAttribute('style','visibility: hidden');
        burger.setAttribute('src','images/burger2.png');
        state=0;
    }
});