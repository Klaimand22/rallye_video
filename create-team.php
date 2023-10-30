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
    <?php
    include("./components/header.php");
    require_once('connexion_db.php');
    $sql = "SELECT nom, prenom FROM user";
    $result = $CONNEXION->query($sql);
    $row = $result->fetch_assoc();
    $nom = $row["nom"];
    $prenom = $row["prenom"];

    ?>
    <h1>Créer une équipe</h1>
    <main>

        <div>
            <form action="create-team.php" method="post">
                <label for="nom">Nom de l'équipe</label>
                <input type="text" name="nom" id="nom" required>
                <label for="membre">Membre 1</label>
                <select name="membre1" id="membre">
                    <option value="">Sélectionnez un membre</option>
                    <?php foreach ($result as $row) {
                        echo "<option value=" . $row["nom"] . $row["prenom"] . ">" . $row["nom"] . " " . $row["prenom"] . "</option>";
                    } ?>
                </select>
                <label for="membre">Membre 2</label>
                <select name="membre2" id="membre">
                    <option value="">Sélectionnez un membre</option>
                    <?php foreach ($result as $row) {
                        echo "<option value=" . $row["nom"] . $row["prenom"] . ">" . $row["nom"] . " " . $row["prenom"] . "</option>";
                    } ?>
                </select>
                <label for="membre">Membre 3</label>
                <select name="membre3" class="membre" id="membre3">
                    <option value="">Sélectionnez un membre</option>
                    <?php foreach ($result as $row) {
                        echo "<option data-selected='false' value='" . $row["nom"] . $row["prenom"] . "'>" . $row["nom"] . " " . $row["prenom"] . "</option>";
                    } ?>
                </select>

                <label for="membre">Membre 4</label>
                <select name="membre4" class="membre" id="membre4">
                    <option value="">Sélectionnez un membre</option>
                    <?php foreach ($result as $row) {
                        echo "<option data-selected='false' value='" . $row["nom"] . $row["prenom"] . "'>" . $row["nom"] . " " . $row["prenom"] . "</option>";
                    } ?>
                </select>
                <input type="submit" value="Créer l'équipe">
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
session_start();

if (isset($_POST['nom']) && isset($_POST['membre1']) && isset($_POST['membre2']) && isset($_POST['membre3']) && isset($_POST['membre4'])) {
    $nom = $_POST['nom'];
    $membre1 = $_POST['membre1'];
    $membre2 = $_POST['membre2'];
    $membre3 = $_POST['membre3'];
    $membre4 = $_POST['membre4'];
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
?>

</html>