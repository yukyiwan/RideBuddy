<?php
session_start();
$personId = $_SESSION["personId"];
$chatId = $_POST["chatId"];
$message = $_POST["message"];

include('../includes/db-config.php');

$stmt = $pdo -> prepare ("INSERT INTO `chat` (`chatId`, `personId`, `message`, `timeStamp`) VALUES ('$chatId','$personId','$message', NULL);");
$stmt->execute();
?>