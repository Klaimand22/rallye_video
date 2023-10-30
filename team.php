<?php
require_once "session-verif.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Session</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>

<body>
    <?php include("./components/header.php") ?>
    <h1>Equipe <?= $_GET["nom_equipe"] ?></h1>
    <main>
        <div>
            <h2>Liste des membres</h2>
            <ul>
          <!--       <?php
                /* require_once('connexion_db.php');
                $sql = "SELECT nom, prenom FROM user INNER JOIN team ON user.iduser = team.iduser WHERE team.nom_equipe = '" . $_GET["nom_equipe"] . "'";
                $result = $CONNEXION->query($sql);
                $row = $result->fetch_assoc();
                $nom = $row["nom"];
                $prenom = $row["prenom"];
                foreach ($result as $row) {
                    echo "<li>" . $row["nom"] . " " . $row["prenom"] . "</li>";
                } */


                ?> -->
            </ul>
        </div>
        <div>
            <a id=deconnexion href="./admin.php">Retour en arrière</a>
        </div>
    </main>
</body>

</html>
