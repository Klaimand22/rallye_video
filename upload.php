<?php
require_once "session-verif.php";
include_once("connexion_db.php");

if(isset($_POST['submit'])){
    $maxsize = 5242880; // 5mb en bytes

    if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ''){
        $name = $_FILES['file']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir.$name;

        // extension
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // valid file extension 
        $extension_arr = array('mp4', 'avi', '3gp', 'mov', 'mpeg');

        // check extension
        if(in_array($extension, $extension_arr)){

            if($_FILES['file']['size'] >= $maxsize){
                echo "Fichier trop lourd, max 5MB";
            }else {
                // upload
                if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file)){
                    mysqli_query($CONNEXION, "INSERT INTO rallyevideo_depot VALUES('46', '$name', '$target_file')");
                    echo "Envoi effectué !";
                }
            }

        }else {
            echo "Extension du fichier non prise en compte : mp4, avi, 3gp, mov, mpeg";
        }

    }else {
        echo'Séléctionnez un fichier';
    }
    // header('location: session-bienvenue.php');
    exit;
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déposer mon film</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>
<body>
<?php include("./components/header.php");


    $iduser = intval($_SESSION["iduser"]);
    ?>
    <h1>Déposer mon film</h1>
    <p>500mb MAX</p>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file" id="file">
        <input type="submit" name="submit" value="Envoyer">
    </form>
    
</body>
</html>