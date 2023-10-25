<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/connexion.css">
    <link rel="stylesheet" href="../css/header.css">
</head>
<body>
    <?php include_once '../components/header.html' ?>
    <div class="title">
        <h1>Connexion</h1>
    </div>
    <form action="" method="post">
        <input type="email" name="email" placeholder="exemple@mail.fr">
        <input type="password" name="pass" placeholder="Mot de passe">
        <button>Connexion</button>
    </form>
</body>
</html>