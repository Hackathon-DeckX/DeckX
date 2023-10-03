
let documents = document.getElementsByClassName("documents")[0];
let desktop = document.getElementsByClassName("desktop")[0];

let draggagles = Array.from(document.getElementsByClassName("draggables"));

draggagles.forEach(element => {
    dragElement(element)
    console.log(element.childNodes[1])
});

function dragElement(elmnt) {
    var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0, moved = false;
    elmnt.childNodes[1].onmousedown = dragMouseDown;
    elmnt.onmousedown = function () {
        let tempelm = elmnt;
        elmnt.remove();
        document.getElementsByClassName("desktop")[0].appendChild(tempelm);
    }

    function dragMouseDown(e) {
        let tempelm = elmnt;
        elmnt.remove();
        document.getElementsByClassName("desktop")[0].appendChild(tempelm);
        e = e || window.event;
        e.preventDefault();
        // get the mouse cursor position at startup:
        pos3 = e.clientX;
        pos4 = e.clientY;
        document.onmouseup = closeDragElement;
        // call a function whenever the cursor moves:
        document.onmousemove = elementDrag;
    }

    function elementDrag(e) {
        moved = true;
        e = e || window.event;
        e.preventDefault();
        // calculate the new cursor position:
        pos1 = pos3 - e.clientX;
        pos2 = pos4 - e.clientY;
        pos3 = e.clientX;
        pos4 = e.clientY;
        console.log(elmnt.offsetTop, elmnt.offsetLeft, pos2)
        if (elmnt.offsetTop >= 0 && elmnt.offsetTop <= window.innerHeight - elmnt.clientHeight - 50) {
            elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
        } else {
            if (pos2 > 0) {
                elmnt.style.top = (elmnt.offsetTop + (pos2 * 3)) + "px";
            } else if (pos2 < 0) {
                elmnt.style.top = (elmnt.offsetTop + (pos2 * 3)) + "px";
            }

        }
        // set the element's new position:

        if (elmnt.offsetLeft >= 0 && elmnt.offsetLeft <= window.innerWidth - elmnt.clientWidth) {
            elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
        } else {
            if (pos1 > 0) {
                elmnt.style.left = (elmnt.offsetLeft + pos1 + 3) + "px";
            } else if (pos1 < 0) {
                elmnt.style.left = (elmnt.offsetLeft + pos1 - 3) + "px";
            }

        }

    }

    function closeDragElement(e) {
        e = e || window.event;
        /* stop moving when mouse button is released:*/
        document.onmouseup = null;
        document.onmousemove = null;
        if (!moved && e.target.type != "submit") {
            console.log("click")
            if (elmnt.childNodes[3].style.display == "none") {
                elmnt.childNodes[3].style.display = "block";
            } else {
                elmnt.childNodes[3].style.display = "none";
            }
        }else if(!moved && e.target.type == "submit"){
            elmnt.remove();
        }
        moved = false;
    }
}

class Wind {
    constructor(title, icon, path, content, id) {
        this.title = title;
        this.icon = icon;
        this.path = path;
        this.content = content;
        this.id = id;
    }

    addtopage() {
        documents.innerHTML +=
            `<div class="docs" id="${this.id}">
                <img src="${this.icon}" alt="">
                <p>${this.title}</p>
            </div>`;

        let doc = document.getElementById(this.id);
        doc.addEventListener("click", () => {
            this.open();
        });
    }

    open() {
        let tempwind =
            `<div id="wind${this.id}" class="mydiv draggables" style="top: 261px; left: 784px;">
            <div class="mydivheader">${this.path}<button id="close${this.id}">❌</button></div>
            <div class="content">
                <p>${this.content}</p>
            </div>
        </div>`

        desktop.innerHTML += tempwind;
        console.log(document.getElementById(`wind${this.id}`))

        dragElement(document.getElementById(`wind${this.id}`));
    }
}

windows = [new Wind("User", "/mateo/src/img/user.svg", "/mateo/src/img/user.svg", "utilisateur: admin \n mot de passe: admin", "1"),];

windows.forEach(element => {
    element.addtopage();
});










