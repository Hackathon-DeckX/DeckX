<?php
session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: ../page/login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/accueil.css">
    <link rel="shortcut icon"
        href="../style/assets/logo.png"
        type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Windows XP</title>
</head>

<body>
    <div class="desktop">
        <div class="documents">

        </div>

    </div>
</body>

<footer>
    <div class="footer_container">
        <div class="startbut">
            <img src="../style/assets/logo.png">
            <p>Start</p>
        </div>
    </div>
</footer>
<script type="module" src="../js/accueil.js"></script>

</html>

<style id="style_mod">

</style>