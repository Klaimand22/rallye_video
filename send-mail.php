<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<?php
require_once "session-verif.php";
if (!isset($_SESSION["role"]) || $_SESSION["role"] != 'admin') {
    header("Location: session.php?error=3");
}
?>
<?php include("./components/header.php") ?>

<h1>Envoie de mail</h1>

<body>

    <h2>Liste des membres</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">email</th>
                <th scope="col">Réinitialiser mot de passe</th>

            </tr>
        </thead>
        <tbody>
            <?php
            require_once('connexion_db.php');
            $sql = mysqli_query($CONNEXION, "SELECT iduser, nom, prenom, email FROM rallyevideo_user");
            if (mysqli_num_rows($sql) > 0) {
                while ($row = mysqli_fetch_assoc($sql)) {
                    $user_id = $row["iduser"];
                    $nom = $row["nom"];
                    $prenom = $row["prenom"];
                    $email = $row["email"];
            ?>
                    <tr>
                        <td><?= $nom ?></td>
                        <td><?= $prenom ?></td>
                        <td><?= $email ?></td>
                        <td>
                            <form action="send-mail.php" method="post">
                                <input type="hidden" name="iduser" value="<?= $user_id ?>">
                                <input type="submit" value="réinitialiser mot de passe" name="submit">
                            </form>
                        </td>

                    </tr>
                <?php
                }
            } else {
                ?>
                <h2>Aucun membre.</h2>
            <?php
            }
            ?>
        </tbody>

    </table>

    <?php
    function randomPassword()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 6; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
    $new_mdp = randomPassword();
    $hash_mdp = hash("sha256", $new_mdp);
    echo "<h2>$new_mdp</h2>";

    if (isset($_POST['submit'])) {
        $iduser = $_POST['iduser'];
        $request = "UPDATE rallyevideo_user SET password = '$hash_mdp' WHERE iduser = $iduser";
        $sql = mysqli_query($CONNEXION, $request);
        if ($sql) {
            echo 'Mot de passe réinitialisé';
        } else {
            echo 'Erreur SQL : ' . mysqli_error($CONNEXION);
        }
        echo $request;
    }
    ?>

</body>