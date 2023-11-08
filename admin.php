<?php
require_once "session-verif.php";
if (!isset($_SESSION["role"]) || $_SESSION["role"] != 'admin') {
    header("Location: session.php?error=3");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>

<body>
    <?php include("./components/header.php")
    ?>
    <h1>Dashboard</h1>
    <main>
        <!-- listes des équipes -->
        <?php
        require_once('connexion_db.php');
        $sql = "SELECT nom_equipe FROM rallyevideo_team";
        $result = $CONNEXION->query($sql);
        $row = $result->fetch_assoc();
        $nom_equipe = $row["nom_equipe"];
        ?>
        <div>
            <h2>Liste des équipes</h2>
            <ul>
                <?php foreach ($result as $row) {
                    echo "<a id=test href='team.php?nom_equipe=" . $row["nom_equipe"] . "'><li>" . $row["nom_equipe"] . "</li></a>";
                } ?>
            </ul>
        </div>
        <div class="flex-main">
            <div class="flex-child">
            </div>
            <div class="flex-child">
            </div>
            <div class="flex-child"></div>
            <div class="flex-child"></div>
        </div>
    </main>


</body>

</html>