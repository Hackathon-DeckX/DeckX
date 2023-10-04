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
    
    header('Location: http://localhost:8000/page/accueil.php');
    exit();
} else {
    
    echo "Nom d'utilisateur ou mot de passe incorrect.";
}
?>