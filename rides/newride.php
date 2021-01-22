<?php
session_start();
if(isset($_SESSION["personId"])){
  include('../includes/db-config.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title> Ride Buddy | New Ride </title>
    <meta charset="utf-8">
    <meta name="description" content="new ride creation">
    <meta name="keywords" content="ride creation">
    <link rel="canonical" href="newride.php" />
    <link rel="icon" type="image/x-icon" href = "../favicon.ico" />
    <link rel="stylesheet" href="../css/newride.css" />

</head>
<body>
    <?php include("../includes/2ndlevelheader1.php"); ?>
    <main>

<h1>Create Ride</h1>

<form action="process-newride.php" method="POST" enctype="multipart/form-data">
<div class = "scanTix">
    <h2>Scan or upload your ticket</h2>

      <input class="submit" type="file" name="tickImageFile" required ></input>

    <img src="../images/ticketsample.jpg" id="ticsamp">

    <p id="scanText">This image is for internal verification purposes ONLY. Personal details
    (full name, passport number, etc) should be masked before scanning your travel date, class and flight number</p><br>
</div>

<br><br>

<div class="fltInfo">
    <h2>Create a new ride</h2>

    <label for="">Flight Number</label><br>
    <input type="text" name="flightNum" required /><br><br>

    <label for="">Airline</label><br>
    <input type="text" name="airline" required /><br><br>

    <label for="">Departure Date</label><br>
    <input type="date" name="departDate" required /><br><br>

    <label for="">Departure Time (EST) </label><br>
    <input type="time" name="departTime" required /><br><br>

    <label for="">From</label><br>
    <input type="text" name="origin" required /><br><br>

    <label for="">To</label><br>
    <input type="text" name="destination" required /><br><br>

    <label for="">Select Class</label><br>

    <!-- <div class="custom-select"> -->
      <select class="selectClass" name="classId">
    <option value="1">First</option>
    <option value="2">Business</option>
    <option value="3">Premium Economy</option>
    <option value="3">Economy</option>
    </select><br><br>
    <!-- </div> -->

    <label for="">Seat Number</label><br>
    <input type="text" name="seatNum" required /><br><br>

    <input class="submit" type="submit" value="Take Off">

</div>

</form>
</main>
    <?php include("../includes/2ndlevelfooter.php"); ?>

</body>
</html>


<?php
}
?>
