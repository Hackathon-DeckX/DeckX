<?php

session_start();

if(isset($_SESSION)) {
    unset($_SESSION);
    session_destroy();
    session_unset();
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/login4.css">
    <link rel="shortcut icon" href="../style/assets/logo.png" type="image/x-icon">
    <title>Login</title>
</head>
<body>


    <div class="header"></div>


    <div class="content">
        <div class="soleil"></div>

        <div class="contentImg">
            <img class="img" src="../style/assets/windows.png" alt="">
            <h3>Pour commencer, cliquez sur votre <br> nom d'utilisateur</h3>
        </div>

        <div class="separation"></div>

        <div class="form">
            <div>
                <div class="contentForm">
                    <div>
                        <img class="profil" src="../style/assets/pp.jpg" alt=""></div>
                    <div class="inputForm">
                        <h4>Admin</h4>
                        <div class="inputLabel">
                            <label for="inputLogin">Mot de passe</label>
                            <form action="verif.php" method="post" class="form">
                                    <input id="inputLogin" name="passwd" type="password" class="inputLogin">
                                <p>Fr</p>
<!--                                <input type="submit" value="Se connecter">-->
                                <button class="btnArrow btn"><img src="../style/assets/arrow-right-solid.svg" alt=""></button>
                                <img class="btnQuestion btn" onclick="Modal()" src="../style/assets/question-solid.svg" alt="">
                            </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="footer">
        <div class="contentFooter">
            <img class="btnPoweroff btn" onclick="Return()" src="../style/assets/power-off-solid.svg" alt="">
            <p>Arreter l'ordinateur</p>
        </div>

        <img class="btnIndice1 btn" onclick="Indice1()" src="../style/assets/info-solid.svg" alt="">


        <div>
            <p>Apres avoir ouvert votre session, vous pouvez ajouter <br> ou modifier des comptes.</p>
            <p>Allez dans le Panneau de configuration et cliquez sur <br> Comptes d'utilisateurs.</p>
        </div>
    </div>

    <div class="indice1">
        <img class="btnExit btn" onclick="Indice1()" src="../style/assets/exit.svg" alt="">
        <h2>Indice 1</h2>
        <p>Faille SQL</p>
    </div>


    <div class="modal">
        <img class="btnExit btn" onclick="Modal()" src="../style/assets/exit.svg" alt="">
        <h2>Regles</h2>
        <p>Bonjour, votre but est simple accéder au FLAG en contournant toutes les sécurités. Vous pouvez utiliser l'inspecteur web et même dever l'utiliser.</p>
    </div>

    <div class="confirm">
        <h2>Etes-vous sur de vouloir quitter ?</h2>
        <div>
            <button class="btnConfirm" onclick="Return()">Non</button>
            <button class="btnConfirm" onclick="ouvrirFenetre()">Oui</button>
        </div>
    </div>

<script src="../js/login2.js"></script>


</body>
</html>