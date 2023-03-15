// const btMobile = document.getElementById('bt-mobile');

// function descemenu(event){
//     if(event.type == 'touchstart') event.preventDefault();
//     const nav = document.getElementById('nav');
//     nav.classList.toggle('active');
//     const active = nav.classList.contains('active');
//     event.currentTarget.setAttribute('aria-expended', active);
//     if(active) {
//         event.currentTarget.setAttribute('aria-label','Fechar menu'); 
//     }
//     else {
//         event.currentTarget.setAttribute('aria-label', 'Abrir menu');
//     }
// }
// btMobile.addEventListener('click', descemenu);
// btMobile.addEventListener('touchstart', descemenu); 

const button = document.querySelector("button")
const modal = document.querySelector("dialog")
const buttonClose = document.querySelector("dialog button")

function buttonClick(id){
    document.getElementById(id).showModal();
    console.log("Abriu");
}
function buttonCloseModal(id){
    document.getElementById(id).close();
    console.log("Abriu");
}