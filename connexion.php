<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rallye Vidéo</title>
</head>
<body>
    <h1>Rallye</h1>

    <!-- formulaire de connexion au site -->

   <form method="POST" action="connexion.php">
        <label for="username">username</label>
        <input type="text" name="username" id="username" required>
        <label for="mdp">Mot de passe</label>
        <input type="password" name="mdp" id="mdp" required>
        <input type="submit" value="Se connecter">
    </form>

    <?php
    require_once('connexion_db.php');
    if (isset($_POST['username']) && isset($_POST['mdp'])) {
        $username = $_POST['username'];
        $mdp = $_POST['mdp'];
        $requete = "SELECT * FROM users WHERE username = '$username' AND password = '$mdp'";
        $resultat = mysqli_query($CONNEXION, $requete);
        if ($resultat) {
            $nb_lignes = mysqli_num_rows($resultat);
            if ($nb_lignes == 1) {
                echo 'Connexion réussie';
                $etat_connexion = true;
                echo '<a href="index.php">Accueil</a>';
            } else {
                echo 'Erreur de connexion';
            }
        } else {
            echo 'Erreur SQL : ' . mysqli_error($CONNEXION);
        }
    }

    ?>

</body>
</html>
