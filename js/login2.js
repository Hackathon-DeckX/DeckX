let maFenetre;


const timeout = function () {
    const btnIndice1 = document.querySelector('.btnIndice1')
    btnIndice1.classList.toggle('btnIndice1--active')
}

setTimeout(() => {
    timeout()
}, 200000)

const Modal = function () {
    console.log('Modal')
    const modal = document.querySelector('.modal')
    modal.classList.toggle('modal--active')
}

// Eteindre la page
function ouvrirFenetre() {
    maFenetre = window.open('', 'MaFenetre', 'width=100,height=980,toolbar=no,menubar=no,scrollbars=no,resizable=yes');
    maFenetre.document.body.background = "black";
    //Image de fond
    maFenetre.document.body.style.backgroundImage = "url('../style/assets/ecrantExit.jpeg')";
    maFenetre.document.body.style.backgroundSize = "cover";
    maFenetre.document.body.style.backgroundRepeat = "no-repeat";
    maFenetre.document.body.style.backgroundPosition = "center";


}
const Exit = function () {
    const confirm = document.querySelector('.confirm')
    confirm.classList.toggle('confirm--active')
    if (maFenetre) {
        maFenetre.close();
    }
}

const Return = function () {
    const confirm = document.querySelector('.confirm')
    confirm.classList.toggle('confirm--active')

}

//Indice 1
const Indice1 = function () {
    const indice1 = document.querySelector('.indice1')
    indice1.classList.toggle('indice1--active')
}



