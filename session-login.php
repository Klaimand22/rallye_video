<?php
    require_once('connexion_db.php');

$login = isset($_POST["login"]) ? $_POST["login"] : "";
$mdp = isset($_POST["mdp"]) ? $_POST["mdp"] : "";

if ($login == ''){
    header("Location: session.php?error=1");
} else {

    // Crypter le mot de passe
    $mdp = hash("sha256", $mdp);

    // pour vérif les identifiants dans la BDD
    $sql = "SELECT iduser, role_idrole FROM user WHERE email = '$login' AND password = '$mdp'";
    $result = $CONNEXION->query($sql);

    if ($result->num_rows > 0) {
        // Utilisateur trouvé
        $row = $result->fetch_assoc();
        $role_id = $row["role_idrole"];

        // Récupérer les informations de l'utilisateur
        $sql = "SELECT nom, prenom, iduser FROM user WHERE iduser = " . $row["iduser"];
        $result = $CONNEXION->query($sql);
        $row = $result->fetch_assoc();
        $nom = $row["nom"];
        $prenom = $row["prenom"];
        $iduser = $row["iduser"];


        // Démarrer la session avec les informations de l'utilisateur

        session_start();
        $_SESSION["login"] = $login;
        $_SESSION["mdp"] = $mdp;
        $_SESSION["iduser"] = $iduser;
        $_SESSION["nom"] = $nom;
        $_SESSION["prenom"] = $prenom;
        $_SESSION["role"] = ($role_id == 1) ? "membre" : "admin"; // 1 = membre, 2 = admin
        $_SESSION["logged"] = true;
        header("Location: session-bienvenue.php");
    } else {
        // Aucun utilisateur trouvé
        header("Location: session.php?error=2");
    }
}

$CONNEXION->close();
?>
