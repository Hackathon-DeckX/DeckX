const Modal = function () {
    console.log('Modal')
    const modal = document.querySelector('.modal')
    modal.classList.toggle('modal--active')
}

let maFenetre;

function ouvrirFenetre() {
    maFenetre = window.open('', 'MaFenetre', 'width=400,height=400');
    maFenetre.document.write('<h1>Fenêtre ouverte par JavaScript</h1>');
}

const btnOff = function () {
    const confirm = document.querySelector('.confirm')
    confirm.classList.toggle('confirm--active')
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




