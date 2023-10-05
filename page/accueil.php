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
    <link rel="stylesheet" href="../style/accueil2.css">
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

    <footer>
        <div class="footer_container">
            <div class="startbut">
                <img src="../style/assets/logo.png" alt="">
                <p>Start</p>

                <img class="btnIndice2 btn" id="indice2" onclick="Indice2()" src="../style/assets/info-solid.svg" alt="">
            </div>
        </div>
    </footer>



    <div class="indice2">
        <img class="btnExit btn" onclick="Indice2()" src="../style/assets/exit.svg" alt="">
        <h2>Indice 2</h2>
        <p>Chercher dans le code js</p>
    </div>

</body>

<script>
    const timeout2 = function () {
        const btnIndice2 = document.querySelector('.btnIndice2')
        btnIndice2.classList.toggle('btnIndice2--active')
    }

    setTimeout(() => {
        timeout2()
    }, 200000)


    function Indice2() {
        const indice2 = document.querySelector(".indice2")
        indice2.classList.toggle('indice2--active')
        console.log('ok')
    }
</script>

<script type="module" src="../js/accueil.js"></script>

</html>

<style id="style_mod">

</style>