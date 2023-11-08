<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partenaire</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/evenement-partenaire.css">
    <link rel="stylesheet" href="./css/footer.css">

</head>

<body>
    <?php include_once('./components/header.php') ?>
    <main>
        <div class="title">
            <h1>Les partenaires</h1>
        </div>
        <div class="container-partenaire">
            <div>
                <img src="./assets/MMI-Chambery-Noir.svg" alt="logo-partenaire-mmi-chambery">
                <h2>MMI Chambéry</h2>
                <a href="https://mmi.univ-smb.fr/">mmi.univ-smb.fr</a>
            </div>
            <div>
                <img src="./assets/sigma.svg" alt="logo-partenaire-sigma">
                <h2>Sigma France</h2>
                <a href="https://www.sigma.fr/">sigma.fr</a>

            </div>
            <div>
                <img src="./assets/Logo IUT CHAMBERY.svg" alt="logo-partenaire-iut-chambery">
                <h2>IUT Chambéry</h2>
                <a href="https://iut-chy.univ-smb.fr/">iut-chy.univ-smb.fr</a>
            </div> 


        </div>


    </main>



    <?php include_once('./components/footer.php') ?>
</body>

</html>