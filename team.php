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
                <?php
                require_once('connexion_db.php');

                if (isset($_GET["nom_equipe"])) {
                    $nom_equipe = $_GET["nom_equipe"];

                    $sql = "SELECT u.nom, u.prenom
            FROM user u
            JOIN user_has_team uht ON u.iduser = uht.user_iduser
            JOIN team t ON uht.team_idteam = t.idteam
            WHERE t.nom_equipe = :nom_equipe";

            foreach ($CONNEXION->query($sql) as $row) {
                echo "<li>" . $row["nom"] . " " . $row["prenom"] . "</li>";

                }
            }
            else {
                echo "Aucune équipe sélectionnée";
            }




?>

            </ul>
        </div>
        <div>
            <a id=deconnexion href="./admin.php">Retour en arrière</a>
        </div>
    </main>
</body>

</html>