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
    $sql = "SELECT iduser, nom, prenom FROM user";
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
    foreach ($membres as &$value) {
        $requete = "INSERT INTO user_has_team VALUES('$value', '$value') SELECT ";
    }
    unset($value);
    $requete = "INSERT INTO team (nom_equipe) VALUES ('$nom')";
    $resultat = mysqli_query($CONNEXION, $requete);
    $requete_joueur = "INSERT INTO user_has_team (user_iduser, team_idteam) VALUES ('$membre1', '$nom')";
    $resultat_joueur = mysqli_query($CONNEXION, $requete_joueur);
    $requete_joueur = "INSERT INTO user_has_team (user_iduser, team_idteam) VALUES ('$membre2', '$nom')";
    $resultat_joueur = mysqli_query($CONNEXION, $requete_joueur);
    $requete_joueur = "INSERT INTO user_has_team (user_iduser, team_idteam) VALUES ('$membre3', '$nom')";
    $resultat_joueur = mysqli_query($CONNEXION, $requete_joueur);
    $requete_joueur = "INSERT INTO user_has_team (user_iduser, team_idteam) VALUES ('$membre4', '$nom')";
    $resultat_joueur = mysqli_query($CONNEXION, $requete_joueur);
    if ($resultat) {
        echo 'Inscription réussie';
        echo '<a href="index.php">Accueil</a>';
        $_SESSION['nom'] = $nom;
        $_SESSION['membre1'] = $membre1;
        $_SESSION['membre2'] = $membre2;
        $_SESSION['membre3'] = $membre3;
        $_SESSION['membre4'] = $membre4;
    } else {
        echo 'Erreur SQL : ' . mysqli_error($CONNEXION);
    }

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