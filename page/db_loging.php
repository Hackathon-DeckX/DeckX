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

if (isset($_GET["db_user"]) && isset($_GET["db_passwd"]) && $_GET["db_user"] != "" && $_GET["db_passwd"] != "") {
    
    display_data($data);
}




$user = $_GET["db_user"];
$passwd = $_GET["db_passwd"];

echo ($user . "    " . $passwd);

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
    <title>Home page</title>
</head>

<style>
    body {
        margin: 0;
        padding: 0;
        max-height: 100vh;
        max-width: 100vw;
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