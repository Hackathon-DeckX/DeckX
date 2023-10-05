<?php

// propriété pour l'ouverture de la db
class Database
{
    public function __construct(
        private string $host,
        private string $port,
        private string $name,
        private string $user,
        private string $password
    ) {
    }

    //ouverture de la db avec les paramètres attribués
    public function getConnection(): PDO
    {
        $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->name};charset=utf8";
        return new PDO($dsn, $this->user, $this->password, [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_STRINGIFY_FETCHES => false
        ]);
    }
}

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

if (
    isset($_GET["db_user"]) && isset($_GET["db_passwd"]) &&
    $_GET["db_user"] == "istrateuradmin" && $_GET["db_passwd"] == "teuradministra"
) {
    display_data($data);
} else {
    header("Location: ../page/accueil.php");
}

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
    <link rel="stylesheet" href="../style/accueil2.css">

    <title>Home page</title>
</head>

<body>

<img class="btnIndice2 btn" id="indice2" onclick="Indice2()" src="../style/assets/info-solid.svg" alt="">

<img class="home btn" id="indice2" onclick="home()" src="../style/assets/home.svg" alt="">



        <div class="indice2">
            <img class="btnExit btn" onclick="Indice2()" src="../style/assets/exit.svg" alt="">
            <h2>Indice 3</h2>
            <p>Utiliser l'URL pour acceder au flag</p>
        </div>




        <script>
            const timeout2 = function () {
                const btnIndice2 = document.querySelector('.btnIndice2')
                btnIndice2.classList.toggle('btnIndice2--active')
            }

            setTimeout(() => {
                timeout2()
            }, 1000)


           const Indice2 = function () {
                const indice2 = document.querySelector(".indice2")
                indice2.classList.toggle('indice2--active')
                console.log('ok')
            }


          const home = function () {
                window.location.href = "../page/accueil.php";
            }
        </script>
</body>

</html>

<style>
    body {
        margin: 0;
        padding: 0;
        max-height: 100vh;
        max-width: 100vw;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    table,
    td {
        border: 1px solid black;
    }

    table {
        border-collapse: collapse;
        text-align: center;
    }
</style>