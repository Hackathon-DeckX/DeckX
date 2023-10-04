
let documents = document.getElementsByClassName("documents")[0];
let desktop = document.getElementsByClassName("desktop")[0];

let appcons = Array.from(document.getElementsByClassName("docs"));
let draggagles = Array.from(document.getElementsByClassName("draggables"));

draggagles.forEach(element => {
    dragElement(element);
});

function dragElement(elmnt) {
    var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0, moved = false;
    elmnt.childNodes[1].onmousedown = dragMouseDown;
    elmnt.onmousedown = function (e) {
        console.log(e.target.id, elmnt);
        if (e.target.id == "db_submit" + elmnt.id.replace(/\D/g, '')) {
            console.log("submit")
            console.log(document.getElementById("db_user" + elmnt.id.replace(/\D/g, '')).value, document.getElementById("db_passwd" + elmnt.id.replace(/\D/g, '')).value);
        } else {
            let tempelm = elmnt;
            elmnt.remove();
            document.getElementsByClassName("desktop")[0].appendChild(tempelm);
        }

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
                elmnt.style.left = (elmnt.offsetLeft + (pos1 * 3)) + "px";
            } else if (pos1 < 0) {
                elmnt.style.left = (elmnt.offsetLeft + (pos1 * 3)) + "px";
            }

        }

    }

    function closeDragElement(e) {
        e = e || window.event;
        /* stop moving when mouse button is released:*/
        document.onmouseup = null;
        document.onmousemove = null;
        if (!moved && e.target.type != "submit") {
            if (elmnt.childNodes[3].style.display == "none") {
                elmnt.childNodes[3].style.display = "block";
            } else {
                elmnt.childNodes[3].style.display = "none";
            }
        } else if (!moved && e.target.type == "submit") {
            elmnt.remove();
            draggagles.splice(draggagles.indexOf(elmnt), 1);
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

    }

    open() {
        if (!document.getElementById(`wind${this.id}`)) {
            let tempwind =
                `<div id="wind${this.id}" class="mydiv draggables" style="top: ${event.clientY}px; left: ${event.clientX}px;">
                    <div class="mydivheader">${this.path}<button id="close${this.id}">❌</button></div>
                    <div class="content">
                        ${this.content}
                    </div>
                </div>`

            desktop.innerHTML += tempwind;

            refresh();
        }
    }
}

function refresh() {

    windows.forEach(element => {
        let doc = document.getElementById(element.id);
        doc.addEventListener("click", () => {
            element.open();
        });
    });

    draggagles = Array.from(document.getElementsByClassName("draggables"));

    draggagles.forEach(element => {
        dragElement(element);
    });
}

windows = [new Wind("User1", "/mateo/src/img/user.svg", "/mateo/src/img/user.svg 1", "utilisateur: admin \n mot de passe: admin", "1"),
new Wind("User2", "/mateo/src/img/user.svg", "/mateo/src/img/user.svg 2", "utilisateur: admin \n mot de passe: admin", "2"),
new Wind("User3", "/mateo/src/img/user.svg", "/mateo/src/img/user.svg 1", "utilisateur: admin \n mot de passe: admin", "3"),
new Wind("User4", "/mateo/src/img/user.svg", "/mateo/src/img/user.svg 1", "utilisateur: admin \n mot de passe: admin", "4"),
new Wind("User5", "/mateo/src/img/user.svg", "/mateo/src/img/user.svg 1", "utilisateur: admin \n mot de passe: admin", "5"),
new Wind("User6", "/mateo/src/img/user.svg", "/mateo/src/img/user.svg 1", "utilisateur: admin \n mot de passe: admin", "6"),
new Wind("User7", "/mateo/src/img/user.svg", "/mateo/src/img/user.svg 1", "utilisateur: admin \n mot de passe: admin", "7"),
new Wind("User8", "/mateo/src/img/user.svg", "/mateo/src/img/user.svg 1", "utilisateur: admin \n mot de passe: admin", "8"),
new Wind("User9", "/mateo/src/img/user.svg", "/mateo/src/img/user.svg 9", `<form id="DB_form" action="db_loging.php">
<label for="db_user9">DB User :</label>
<input type="text" id="db_user9" name="db_user" value=""><br><br>
<label for="db_passwd9">DB Passwd :</label>
<input type="text" id="db_passwd9" name="db_passwd" value=""><br><br>
<input id="db_submit9" type="submit" value="Open DB">
</form>`, "9"),];

windows.forEach(element => {
    element.addtopage();
});

refresh();

for (var i = documents.children.length; i >= 0; i--) {
    documents.appendChild(documents.children[Math.random() * i | 0])
}

let rowpx = window.innerWidth - (30 + 100)
let row = Math.round(rowpx / 140);

let colpx = window.innerHeight - (30 + 100)
let col = Math.round(colpx / 140);
console.log(row, col);


// document.getElementById("DB_form").addEventListener("submit", (e) => {
//     e.preventDefault();
//     console.log("test");
// });

let db = "DB login: istrateuradmin/teuradministra"

// console.log(db)






