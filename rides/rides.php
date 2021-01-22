<?php
session_start();
$personId = $_SESSION["personId"];
?>

<!DOCTYPE html> 
<html>
<head>
    <title>Ride Buddy | Rides </title>
    <meta charset="utf-8">
    <meta name="description" content="Rides of the user">
    <meta name="keywords" content="rides">
    <link rel="canonical" href="rides.php?personId=<?php echo($personId); ?>">
    <link rel="icon" type="image/x-icon" href = "../favicon.ico" />
    <link rel="stylesheet" href="../css/rides.css" />
    

</head>
<body>
<div id="body-content-wrapper" class="offline">
    <?php include("../includes/2ndlevelheader1.php"); ?>

    <main>
    <h1>Rides</h1>
        <section>
            
            <ul>
            <?php
            include('../includes/db-config.php');
            $stmt = $pdo->prepare("SELECT *
            FROM ((`flight-person`
            INNER JOIN `flight` ON `flight-person`.`flightId` = `flight`.`flightId`)
            INNER JOIN `person` ON `flight-person`.`personId` = `person`.`personId`) WHERE `flight-person`.`personId`='$personId'");

            $stmt->execute(); 

            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <ol>
                    <h3><a href="flight.php?flightId=<?php echo($row["flightId"]);?>"><?php echo($row["flightNum"]." | From ".$row["origin"]." to ".$row["destination"]." | ".$row["departDate"]." at ".$row["departTime"]. "(EST)"); ?></a></h3>
                </ol>
                <?php } ?>   
        </ul>
            </section>
    </main>
    <?php include("../includes/2ndlevelfooter.php"); ?>
    </div>
</body>
</html>

