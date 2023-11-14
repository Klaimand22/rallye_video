<?php
$error = isset($_GET["error"]) ? $_GET["error"] : "";
$password = isset($_GET["mdp"]) ? $_GET["mdp"] : "";
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
    <?php include_once './components/header.php' ?>
    <div class="title">
        <h1>Connexion</h1>
    </div>
    <form action="session-login.php" method="post">
        <input type="email" name="login" placeholder="exemple@univ-smb.fr">
        <input type="password" name="mdp" placeholder="Votre mot de passe">
        <input type="submit" value="Se connecter">
    </form>

</body>

<?php
switch ($error) {
    case 1:
        echo "<p style='color:red'>Veuillez saisir votre login</p>";
        break;
    case 2:
        echo "<p style='color:red'>Veuillez saisir un mot de passe correct</p>";
        break;
    case 3:
        echo "<p style='color:red'>Veuillez vous connecter</p>";
        break;
}


?>

</html>