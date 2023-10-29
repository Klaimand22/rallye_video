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
</head>
<form action="session-login.php" method="post">
    <input type="text" name="login" placeholder="exemple@univ-smb.fr">
    <input type="password" name="mdp" placeholder="Votre mot de passe">
    <input type="submit" value="Se connecter">
</form>

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

<body>

</body>

</html>