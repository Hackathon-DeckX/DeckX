<?php

session_start();

// propriété pour l'ouverture de la db
class Database
{
    private string $host;
    private string $port;
    private string $name;
    private string $user;
    private string $password;

    public function __construct($host, $port, $name, $user, $password)
    {
        $this->host = $host;
        $this->port = $port;
        $this->name = $name;
        $this->user = $user;
        $this->password = $password;
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

// Vérification de la connexion
try {
    $database = new Database("176.31.132.185", "3306", "kcdxbd_sqwadowe_db", "kcdxbd_sqwadowe_db", "_Bo%i0j4M!aY76U-");

    $conn = $database->getConnection();
} catch (PDOException $e) {
    echo "Erreur de base de données : " . $e->getMessage();
}


$name = 'admin';
$passwd = $_POST['passwd'];

// Requête SQL pour vérifier les informations de connexion
$sql = "SELECT * FROM DeckX WHERE name = '$name' AND passwd = '$passwd'";
$result = $conn->query($sql);

if ($result->rowCount() == 1) {

    $_SESSION['user_id'] = $name;

    header('Location: ../page/solution.php');
    exit();
} else {
    header('Location: ../page/login.php');
    exit();
}
?>