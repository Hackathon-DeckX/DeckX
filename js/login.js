const Modal = function () {
    console.log('Modal')
    const modal = document.querySelector('.modal')
    modal.classList.toggle('modal--active')
}
const Exit = function () {
    console.log('Exit')
    window.close()
}


