<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>
<body>
    <?php include_once './components/header.php' ?>
    <div class="title">
        <h1>Connexion</h1>
    </div>
    <form action="compte.php" method="post">
        <input type="email" name="email" placeholder="exemple@mail.fr">
        <input type="password" name="pass" placeholder="Mot de passe">
        <button>Connexion</button>
    </form>
    <?php
    require_once('./connexion_db.php');
    if (isset($_POST['email']) && isset($_POST['pass'])) {
        $email = $_POST['email'];
        $pass =  sha1($_POST['pass']);
        $requete = "SELECT * FROM user WHERE email = '$email' AND password = '$pass'";
        $resultat = mysqli_query($CONNEXION, $requete);
        if ($resultat) {
            $nb_lignes = mysqli_num_rows($resultat);
            $row = mysqli_fetch_assoc($resultat);
            if ($nb_lignes == 1) {
                $_SESSION["nom"] = $row["nom"];
                $_SESSION["prenom"] = $row["prenom"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["role"] = $row["role_idrole"];
                echo "Bonjour". " " . $_SESSION["nom"];
            } else {
                echo 'Erreur de connexion';
            }
        } else {
            echo 'Erreur SQL : ' . mysqli_error($CONNEXION);
        }
    }

    ?>

    <?php include_once './components/footer.php' ?>
</body>
</html>