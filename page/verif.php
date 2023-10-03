<?php

//ouverture de la base de données
$database = new Database("176.31.132.185", "3306", "kcdxbd_sqwadowe_db", "kcdxbd_sqwadowe_db", "_Bo%i0j4M!aY76U-");

$conn = $database->getConnection();

$sql = "SELECT * 
            FROM DeckX WHERE passwd = '$_POST[passwd]'";

$stmt = $conn->query($sql);

$url = $_SERVER['REQUEST_URI'];
echo $url;



?>