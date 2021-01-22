<?php
session_start();
$personId=$_SESSION["personId"];
$statusNote = $_POST["statusNote"];
    $aStatusNote = addslashes ($statusNote);
$statusId = $_POST["statusId"];


include('includes/db-config.php');
$stmt = $pdo->prepare ("UPDATE `person` SET `statusId`='$statusId',`statusNote`='$aStatusNote' WHERE `personId`='$personId';");
$stmt->execute();

?>