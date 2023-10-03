const Modal = function () {
    console.log('Modal')
    const modal = document.querySelector('.modal')
    modal.classList.toggle('modal--active')
}

const btnOff = function () {
    const confirm = document.querySelector('.confirm')
    confirm.classList.toggle('confirm--active')
}
const Exit = function () {
    const confirm = document.querySelector('.confirm')
    confirm.classList.toggle('confirm--active')
    window.close()
}

const Return = function () {
    const confirm = document.querySelector('.confirm')
    confirm.classList.toggle('confirm--active')
}


const Connect = function () {
    const inputLogin = document.querySelector('.inputLogin').value
    window.location.href = `http://localhost:5173/page/verif.php?=Password=${inputLogin}`
}



