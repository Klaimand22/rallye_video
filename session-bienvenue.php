<?php
require_once "session-verif.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session </title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>

<body>
    <?php include("./components/header.php")
    ?>
    <h1>Mon profil</h1>
    <div class="center">
        <h2>Bonjour <?= $_SESSION["prenom"] ?> <?= $_SESSION["nom"] ?></h2>
    </div>
    <div>
    <div class="center-div">
        <?php if($role == "admin") {
            echo "<a id=deconnexion href='admin.php'>Admin</a>";
        } ?>
    </div>

    <!-- Si l'utilisateur à aucune proposition = -->
    <div class="center-div noprop">
        <p>Tu n'as reçu aucune proposition d'équipe</p>
    </div>


    <!-- Sinon = -->
    <div class="center-div team-card">
        <div class="card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707A.996.996 0 0 0 3 16v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2a.996.996 0 0 0-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707A.996.996 0 0 0 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zm-7 5a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22z"></path></svg>
        </div>
        <div class="card-text">
            <p>Clément Michellod te propose de rejoindre son équipe avec Nom Prénom, Nom Prénom et Nom Prénom</p>
        </div>
        <div class="card-buttons">
            <a href="" class="button-main btn-card">Accepter</a>
            <a href="" class="button-main-variant btn-card">Decliner</a>
        </div>
    </div>
    </div>
    <!-- Si aucune équipe = -->
    <div class="center-div">
            <a href="create-team.php" class="button-main">Créer une équipe</a>
        </div>
</body>

</html>