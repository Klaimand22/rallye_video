<?php
require_once "session-verif.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/footer.css">

</head>
<body>
<?php        include("../components/header.php")
        ?>
    <h1 style="color: green;">Bienvenue <?= $_SESSION["prenom"] ?> <?= $_SESSION["nom"] ?></h1>
    <p> Vous etes connecté avec l'adresse <?= $login ?></p>
    <p>Vous êtes connecté en tant que <?= $role ?></p>
    <p> Vous avez l'identifiants <?= $_SESSION["iduser"] ?></p>


</body>
</html>