
const documents = document.getElementsByClassName("documents")[0];
const desktop = document.getElementsByClassName("desktop")[0];
const style_mod = document.getElementById("style_mod");

let appcons = Array.from(document.getElementsByClassName("docs"));
let draggagles = Array.from(document.getElementsByClassName("draggables"));

draggagles.forEach(element => {
    dragElement(element);
});

function dragElement(elmnt) {
    var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0, moved = false;
    elmnt.childNodes[1].onmousedown = dragMouseDown;
    elmnt.onmousedown = function (e) {
        if (e.target.id != "db_submit" + elmnt.id.replace(/\D/g, '')) {
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

let windows = [new Wind("Projets pro", "../style/assets/icon_folder.png", "C:/Users/User/Desktop/Projets pro","\n fichier.txt <br> index.html", "1"),
new Wind("Travail", "../style/assets/icon_folder.png", "C:/Users/User/Desktop/Travail", "Accident_de_trvail.pdf <br> code_pour_sonar.js <br> presentation.pdf", "2"),
new Wind("Réunion", "../style/assets/icon_folder.png", "C:/Users/User/Desktop/Réunion", "Reunion_du_07/07/07.txt <br> Reunion_du_12/12/12.txt <br> Reunion_du_25/09/18.txt <br> Reunion_du_16/01/23.txt", "3"),
new Wind("Comptes rendus", "../style/assets/icon_folder.png", "C:/Users/User/Desktop/Comptes Rendus", "Compte_Rendu_du_16/05/14.odt <br> Compte_Rendu_du_03/02/20.odt <br> Compte_Rendu_du_19/05/23.odt <br> Compte_Rendu_du_05/06/23.odt", "4"),
new Wind("Commercial", "../style/assets/icon_folder.png", "C:/Users/User/Desktop/Commercial", "Echange_usa.zip <br> Echange_italie.zip <br> Commande_pour_japon.zip", "5"),
new Wind("Pause Dej", "../style/assets/icon_folder.png", "C:/Users/User/Desktop/Pause Dej", "Repas_Foxtrot <br> Repas_Lima <br> Repas_Alpha <br> Repas_Golf", "6"),
new Wind("Document", "../style/assets/icon_folder.png", "C:/Users/User/Desktop/Document", "fichier.txt <br> presentation.pdf <br> Compte_Rendu_du_16/05/14.odt", "7"),
new Wind("Docker", "../style/assets/Docker.png", "./Dockerfile", "Docker.exe <br> Docker_CLI.exe <br> Docker_Daemon.exe", "8"),
new Wind("flag", "../style/assets/flag.png", "./mainStorage/project/NdijHVS.vhj", "Alert Fichier Corrompu <br> Veuillez vérifier le fichier dans le stokage serveur", "10"),


new Wind("Database", "../style/assets/icon_database.png", "/mateo/src/img/user.svg 9", `<form id="DB_form" action="../page/solutionJs.php">
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

let db = "DB login: istrateuradmin/teuradministra"

// console.log(db)

appcons = Array.from(document.getElementsByClassName("docs"));

let casenotfree = [];

function setwindpos() {
    style_mod.innerText = "";
    appcons.forEach(element => {
        let rancol;
        let ranrow;
        do {
            let row = Math.round((window.innerWidth - (30 + 100)) / 140);
            ranrow = Math.round(Math.random() * row);
            let col = Math.round((window.innerHeight - (30 + 100)) / 140);
            rancol = Math.round(Math.random() * col);
        } while (casenotfree.filter(vendor => vendor['ranrow'] === ranrow).filter(vendor => vendor['rancol'] === rancol).length > 0)
        style_mod.innerHTML += `
        .documents div:nth-child(${element.id}) {
            grid-column: ${ranrow} / span 1;
            grid-row: ${rancol} / span 1;
        }`
        casenotfree.push({ ranrow, rancol })
    });

}

setwindpos();



