<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/solution.css">
    <link rel="shortcut icon" href="../style/assets/logo.png" type="image/x-icon">

    <title>Solution 1</title>
</head>
<body>
<div class="header"></div>


    <div class="solution1">
        <h1>Solution 1</h1>
        <p>Pour contrer une faille SQL, il existe plusieurs méthodes, mais la plus courante consiste à préparer sa requête SQL avant de l'exécuter. Il est essentiel de bien séparer ces deux étapes et de ne pas les réaliser en une seule fois.</p>
        <button class="prochainement">Étape suivante</button>

    </div>


    <div class="footer"></div>



    <script>
        const prochainement = document.querySelector('.prochainement');
        prochainement.addEventListener('click', () => {
            window.location.href = 'accueil.php';
        });
    </script>
</body>
</html>