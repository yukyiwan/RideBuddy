<?php
session_start();?>

<!DOCTYPE html>
<html>
        <head>
            <title>Ride Buddy | Home</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <link rel="stylesheet" href="css/main.css" />
            <link rel="icon" type="image/x-icon" href = "favicon.ico" />
            <?php include("includes/db-config.php"); ?>

        </head>


        <body>
            <header>
          <div id="logimg"><img src="images/logo.png"  class="logo"/></div>
            </header>
        <main>
            <div id="center"><a class="logreg" href = "login.php">Login</a></div>
        <div id="center"><a class="logreg" href = "register.php">Register</a></div>
        </main>

        </body>
</html>
