<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/login.css">
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
                            <div>
                            <form action="verif.php" method="post">
                                    <input id="inputLogin" name="passwd" type="password" class="inputLogin">
                                <p>Fr</p>
                                <input type="submit" value="Se connecter">
                            </form>
                                <!-- <img class="btnArrow btn"  onclick="Connect()" src="../style/assets/arrow-right-solid.svg" alt=""> -->
                                <img class="btnQuestion btn" onclick="Modal()" src="../style/assets/question-solid.svg" alt="">
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="footer">
        <div class="contentFooter">
            <img class="btnPoweroff btn" onclick="btnOff()" src="../style/assets/power-off-solid.svg" alt="">
            <p>Arreter l'ordinateur</p>
        </div>

        <div>
            <p>Apres avoir ouvert votre session, vous pouvez ajouter <br> ou modifier des comptes.</p>
            <p>Allez dans le Panneau de configuration et cliquez sur <br> Comptes d'utilisateurs.</p>
        </div>
    </div>


    <div class="modal">
        <img class="btnExit btn" onclick="Modal()" src="../style/assets/exit.svg" alt="">
        <h2>Regles</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque autem commodi doloremque ea enim error inventore natus pariatur praesentium, quia recusandae rerum tempora veniam vero voluptatum. A aliquam consequuntur molestiae.</p>
    </div>

    <div class="confirm">
        <h2>Etes-vous sur de vouloir quitter ?</h2>
        <div>
            <button class="btnConfirm" onclick="Return()">Non</button>
            <button class="btnConfirm" onclick="Exit()">Oui</button>
        </div>
    </div>

<script src="../js/login.js"></script>


</body>
</html>