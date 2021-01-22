<?php

session_start();
if(isset($_SESSION["personId"])){
$personId = $_SESSION["personId"];

$uploaddir = "./img/";
$uploadfile = $uploaddir.basename($_FILES["tickImageFile"]["name"]);
move_uploaded_file($_FILES["tickImageFile"]["tmp_name"], $uploadfile);


//receive POST data from HTML form for flight table
$flightNum = $_POST["flightNum"];
$airline = $_POST["airline"];
$departDate = $_POST["departDate"];
$departTime = $_POST["departTime"];
$origin = $_POST["origin"];
$destination = $_POST["destination"];

//receive POST data from HTML form for flight-person table
$classId = $_POST["classId"];

$seatNum = $_POST["seatNum"];
$tickImageFile = $_FILES["tickImageFile"]['name'];


include('../includes/db-config.php');


$stmt = $pdo->prepare("SELECT * FROM `flight` WHERE ((`flightNum`= '$flightNum') AND (`departDate` = '$departDate'));");
    $stmt->execute();
    $entries=0;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $flightId = $row["flightId"];             
        $entries +=1;}

if ($entries==0){

$stmt = $pdo->prepare("INSERT INTO `flight` (`flightId`, `flightNum`, `airline`, `departDate`, `departTime`, `origin`, `destination`) 
VALUES (NULL, '$flightNum', '$airline', '$departDate', '$departTime', '$origin', '$destination');");
$stmt->execute();

    $stmt = $pdo->prepare ("SELECT * FROM `flight` WHERE `flightId`= LAST_INSERT_ID()");
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $flightId = $row["flightId"];

    }

$stmt = $pdo->prepare("SELECT * FROM `flight-person` WHERE ((`flightId`= '$flightId') AND (`personId`='$personId'));");
$stmt->execute();
$dEntries=0;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){            
    $dEntries +=1;}

if ($dEntries==0) { 

$stmt = $pdo->prepare("INSERT INTO `flight-person` (`flightId`, `personId`, `classId`, `seatNum`, `tickImageFile`) 
VALUES ('$flightId', '$personId', '$classId', '$seatNum', '$tickImageFile');");
$stmt->execute();

header("Location: newride.php"); 

} else { ?>

<!DOCTYPE html>
        <html>
            <head> 
                <title> Ride Buddy | Ride Creation Failure! </title>    
                <meta charset="utf-8">
                <meta name="description" content="Ride Creation failure page">
                <meta name="keywords" content="registration failure, ride creation fail">
                <meta name="robots" content="noindex">
                <link rel="canonical" href="process-register.php" />
                <link rel="icon" type="image/x-icon" href = "../favicon.ico" />
            </head>  
            
            <body>
                <?php include("../includes/2ndlevelheader.php"); ?> 
                <main>
                    <h1> You have already created this ride! </h1>
                    <a href="rides.php">Find it in your rides page!</a>
                </main> 
                <?php include("../includes/2ndlevelfooter.php"); ?>
            </body>
        </html>

<?php }

}

?>


