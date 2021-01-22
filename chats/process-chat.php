<?php
session_start();
$chatId = $_POST["chatId"];
$personId = $_SESSION["personId"];


include('../includes/db-config.php');
$stmt = $pdo->prepare ("SELECT * FROM (`chat`
INNER JOIN `person` ON `chat`.`personId`=`person`.`personId`) WHERE `chatId`='$chatId' ORDER BY `chat`.`timeStamp` DESC "); 

$stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($results);
    echo($json);

?>
