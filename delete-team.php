<?php
session_start();
$iduser = $_SESSION["iduser"];
include_once('connexion_db.php');
$requete = mysqli_query($CONNEXION, "DELETE FROM rallyevideo_team WHERE idcreateur = '$iduser'");
if($requete){
    header('location: session-bienvenue.php');
}else {
    echo "Erreur dans la suppresion de l'équipe.";
}


?>