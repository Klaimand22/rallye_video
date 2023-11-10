<!-- fichier de connexion -->
<?php

// Connexion à la base de données
define('SERVEUR_BD', 'localhost');
define('LOGIN_BD', 'root');
define('PASS_BD', '');
define('NOM_BD', 'rallye_video');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rallye_video";



$CONNEXION = mysqli_connect(SERVEUR_BD, LOGIN_BD, PASS_BD);

if (mysqli_connect_errno()) {
  echo 'Désolé, connexion au serveur ' . SERVEUR_BD . ' impossible, ' . mysqli_connect_error(), "\n";
  exit();
}

mysqli_select_db($CONNEXION, NOM_BD);

if (mysqli_connect_errno()) {
  echo 'Désolé, accès à la base ' . NOM_BD . ' impossible, ' . mysqli_connect_error(), "\n";
  exit();
}

if (!mysqli_set_charset($CONNEXION, 'UTF8')) {
  echo 'Error loading character set UTF8: ', mysqli_connect_error(), "\n";
}



?>