<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/solution.css">
    <link rel="shortcut icon" href="../style/assets/logo.png" type="image/x-icon">

    <title>Solution 2</title>
</head>
<body>
<div class="header"></div>


<div class="solution1">

    <h1>Solution 2</h1>
    <p>Intégrer la protection des données, y compris la sécurité, dès le début de la conception de l'application ou du service est crucial. Cela peut influencer le choix de l'architecture (centrale ou décentralisée) et des fonctionnalités.</p>
    <button class="prochainement">Étape suivante</button>

</div>


<div class="footer"></div>



<script>
    const prochainement = document.querySelector('.prochainement');
    prochainement.addEventListener('click', () => {
        window.location.href = 'db_loging.php?db_user=istrateuradmin&db_passwd=teuradministra';
    });
</script>

</body>
</html>