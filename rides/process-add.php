<?php

session_start();
$personId = $_SESSION["personId"];
$profileId = $_POST["profileId"];
$addBuddy = $_POST["addBuddy"];

include "../includes/db-config.php";
$stmt = $pdo->prepare ("INSERT INTO `person-profile`(`personId`, `profileId`, `addBuddy`) VALUES ('$personId','$profileId','$addBuddy');");
$stmt->execute();


?>