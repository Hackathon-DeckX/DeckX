let maFenetre;

const btnIndice1 = document.querySelector('.btn-indice1')

// setTimeout(() => {
//     btnIndice1.classList.toggle('.btnIndice1--active')
// }, 2000)

const Modal = function () {
    console.log('Modal')
    const modal = document.querySelector('.modal')
    modal.classList.toggle('modal--active')
}

// Eteindre la page
function ouvrirFenetre() {
    maFenetre = window.open('', 'MaFenetre', 'width=400,height=400');
    maFenetre.document.write('<h1>Fenêtre ouverte par JavaScript</h1>');
}
const Exit = function () {
    const confirm = document.querySelector('.confirm')
    confirm.classList.toggle('confirm--active')
    if (maFenetre) {
        maFenetre.close();
    }}

const Return = function () {
    const confirm = document.querySelector('.confirm')
    confirm.classList.toggle('confirm--active')

}

//Indice 1
const Indice1 = function () {
    const indice1 = document.querySelector('.indice1')
    indice1.classList.toggle('indice1--active')
}



