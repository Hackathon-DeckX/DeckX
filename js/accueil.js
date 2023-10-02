let docs = Array.from(document.getElementsByClassName("docs"))

docs.forEach(elm => {
    elm.childNodes[1].onclick = function (){
        alert("click")
    }
})