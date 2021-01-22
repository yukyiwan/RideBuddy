<?php
session_start();

$fName = $_POST["fName"];
$aFName = addslashes ($fName);
$lName = $_POST["lName"];
  $aLName = addslashes ($lName);
$email = $_POST["email"];
$message = $_POST["message"];
  $aMessage = addslashes ($message);

include "includes/db-config.php";
$stmt = $pdo->prepare ("INSERT INTO `contact` (`contactId`, `fName`, `lName`, `email`, `message`) VALUES (NULL, '$aFName', '$aLName', '$email', '$aMessage');");
$stmt->execute();


?>
<!DOCTYPE html>
<html>
<head>
    <title>RB | Thanks for contacting Ride Buddy!</title>
    <meta charset="utf-8">
    <meta name="description" content="Contact form processing page">
    <meta name="keywords" content="contact form processing, contact form handling">
    <meta name="robots" content="noindex">
    <link rel="canonical" href="process-contact.php" />
    <?php include("includes/db-config.php"); ?>
</head>

<body>
  <?php include("includes/header.php"); ?>
    <main>
        <h1> Thanks for reaching out!</h1>
        <p>A Buddy will be in touch with you soon. </p>
    </main>
    <?php include("includes/footer.php"); ?>
</body>
</html>
