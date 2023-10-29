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