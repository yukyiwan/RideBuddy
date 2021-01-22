<?php

session_start();
$personId = $_SESSION["personId"];
$profileId = $_POST["bProfileId"];
$blocked = $_POST["blocked"];

include "../includes/db-config.php";
$stmt = $pdo->prepare ("INSERT INTO `person-profile`(`personId`, `profileId`, `blocked`) VALUES ('$personId','$profileId','$blocked');");
$stmt->execute();


?>