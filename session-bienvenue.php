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
    <main>

        <div>

            <h2>Bienvenue <?= $_SESSION["prenom"] ?> <?= $_SESSION["nom"] ?></h2>
            <h2> Vous etes connecté avec l'adresse <?= $login ?></h2>
            <h2>Vous êtes connecté en tant que <?= $role ?></h2>
            <h2> Vous avez l'identifiants <?= $_SESSION["iduser"] ?></h2>
        </div>
        <div>

            <?php if($role == "admin") {
                echo "<a id=deconnexion href='admin.php'>Admin</a>";
            } ?>
            <a id=deconnexion href="#" onclick="deconnexion()">Deconnexion</a>
            <a id=create-team href="create-team.php">Créer une équipe</a>
        </div>
    </main>
</body>

</html>