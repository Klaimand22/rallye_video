<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rallye Vidéo</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>
<body>
    <?php
        include("./components/header.html")
        ?>


<main>
    <div class="left">
        <img src="./assets/camera_accueil.svg" alt="logo camera">

    </div>
    <div class="right">
        <h1>Le Rallye Vidéo<br> revient !</h1>
        <!-- décompte -->
        <h2 id="countdown" class="countdown-container">Loading...</h2>

    </div>
</main>

<?php
    include("./components/footer.html")
    ?>
</body>

<script src="./js/countdown.js"></script>
</html>


