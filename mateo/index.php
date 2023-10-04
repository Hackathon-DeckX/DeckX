<?php

//chargement des classes de l'api
spl_autoload_register(function ($class) {
    require __DIR__ . "/src/$class.php";
});

//ouverture de la base de données
$database = new Database("176.31.132.185", "3306", "kcdxbd_sqwadowe_db", "kcdxbd_sqwadowe_db", "_Bo%i0j4M!aY76U-");

$conn = $database->getConnection();

$sql = "SELECT * 
            FROM DeckX";

$stmt = $conn->query($sql);

$data = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}

function display_data($data)
{
    $output = "<table>";
    foreach ($data as $key => $var) {
        //$output .= '<tr>';
        if ($key === 0) {
            $output .= '<tr>';
            foreach ($var as $col => $val) {
                $output .= "<td><strong>" . $col . '</strong></td>';
            }
            $output .= '</tr>';
            foreach ($var as $col => $val) {
                $output .= '<td>' . $val . '</td>';
            }
            $output .= '</tr>';
        } else {
            $output .= '<tr>';
            foreach ($var as $col => $val) {
                $output .= '<td>' . $val . '</td>';
            }
            $output .= '</tr>';
        }
    }
    $output .= '</table>';
    echo $output;
}

display_data($data);

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/mateo/src/index.css">
    <title>Home page</title>
</head>

<body>
    <img src="<?php echo ($data[0]['img_path']); ?>" alt="logo">

    <div class="page">

        <div class="mydiv draggables" style="top: 23; left: 587;">
            <div class="mydivheader">Click here to move</div>
            <div class="content">
                <p>Move</p>
                <p>this</p>
                <p>DIV</p>
            </div>
        </div>

        <div class="mydiv draggables" style="top: 223; left: 487;">
            <div class="mydivheader">Click here to move</div>
            <div class="content">
                <p>Move</p>
                <p>this</p>
                <p>DIV</p>
            </div>
        </div>

        <div class="mydiv draggables" style="top: 623; left: 287;">
            <div class="mydivheader">Click here to move</div>
            <div class="content">
                <p>Move</p>
                <p>this</p>
                <p>DIV</p>
            </div>
        </div>

    </div>

</body>

</html>

<script>
    //Make the DIV element draggagle:
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
            document.getElementsByClassName("page")[0].appendChild(tempelm);
        }

        function dragMouseDown(e) {
            let tempelm = elmnt;
            elmnt.remove();
            document.getElementsByClassName("page")[0].appendChild(tempelm);
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
            if (elmnt.offsetTop >= 0 && elmnt.offsetTop <= window.innerHeight - elmnt.clientHeight - 100) {
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

            if (!moved) {
                console.log("click")
                if (elmnt.childNodes[3].hidden) {
                    elmnt.childNodes[3].hidden = false;
                } else {
                    elmnt.childNodes[3].hidden = true;
                }
            }
            moved = false;
        }
    }

    console.log(window.innerHeight)

</script>