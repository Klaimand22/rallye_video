<?php
session_start();
if (!isset($_SESSION["logged"]) || $_SESSION["logged"] != true) {
    header("Location: session.php?error=3");
}

$login = $_SESSION["login"] ? $_SESSION["login"] : "";
$mdp = $_SESSION["mdp"] ? $_SESSION["mdp"] : "";
$role = $_SESSION["role"] ? $_SESSION["role"] : "";

?>