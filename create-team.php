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
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>
    <?php
    include("./components/header.php");
    require_once('connexion_db.php');
    $sql = "SELECT iduser, nom, prenom FROM rallyevideo_user";
    $result = $CONNEXION->query($sql);
    $row = $result->fetch_assoc();
    $nom = $row["nom"];
    $prenom = $row["prenom"];

    ?>
    <h1>Créer une équipe</h1>
    <main>

        <div>
            <form action="" method="post">
                <label for="nom">Nom de l'équipe</label>
                <input type="text" name="nom" id="nom" required>
                <label for="membre">Membres (max:8)</label>

                <select class="js-example-basic-multiple js-states form-control" name="membres[]" multiple="multiple">
                    <?php foreach ($result as $row) {
                        echo "<option data-selected='false' value='".$row["iduser"]."'>" . $row["nom"] . " " . $row["prenom"] . "</option>";
                    } ?>
                </select>
                <input type="submit" value="Créer l'équipe" name="button">
            </form>
        </div>
        <div>

            <?php if ($role == "admin") {
                echo "<a id=deconnexion href='admin.php'>Admin</a>";
            } ?>
            <a id=deconnexion href="./session-bienvenue.php">Retour en arrière</a>
        </div>
    </main>
</body>

<?php
require_once('connexion_db.php');
if (isset($_POST['button'])) {
if (isset($_POST['nom']) && isset($_POST['membres'])) {
    $nom = $_POST['nom'];
    $membres = $_POST['membres'];
    $iduser =  intval($_SESSION["iduser"]);
    echo $iduser;
    $requeteequipe = "INSERT INTO rallyevideo_team VALUES(NULL, '$nom', 0, '$iduser'";
    $creationteam = mysqli_query($CONNEXION, $requeteequipe);
    $lastequipe = "SELECT idteam FROM rallyevideo_team ORDER BY idteam DESC LIMIT 1";
    $lastequiperesult = mysqli_query($CONNEXION, $lastequipe);
    $resultequipe = mysqli_fetch_assoc($lastequiperesult);
    $idequipe = $resultequipe['idteam'];
    echo $idequipe;
    foreach ($membres as $value) {
        $requeteuserteam = "INSERT INTO rallyevideo_user_has_team VALUES('$value', '$idequipe', 0)";
        $sqlquery = mysqli_query($CONNEXION, $requeteuserteam);
    }
    unset($value);
    echo 'Inscription réussie';
    echo '<a href="index.php">Accueil</a>';

}
}
?>


<script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2({
        maximumSelectionLength: '8'
    });
});
</script>

</html>