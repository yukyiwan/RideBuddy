<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Ride Buddy | Login </title>
    <meta charset="utf-8">
    <meta name="description" content="Log in & Sign up to join the Ride Buddy experience">
    <meta name="keywords" content="login, log in, log on, sign in">
    <link rel="canonical" href="login.php" />
    <link rel="icon" type="image/x-icon" href = "favicon.ico" />
    <?php include("includes/db-config.php"); ?>
    <link rel="stylesheet" href="css/login.css" />
    <link rel="stylesheet" href="css/welcome.css" />

  </head>

  <body>



    <main>
      <h1>Login</h1>

    <div class="loginInfo">
      <form action="process-login.php" method="POST">
        <label for "email">Email Address: </label>
        <input type="email" name="email" autofocus="" required/>
        <label for "password">Password: </label>
        <input type="password" name="password" required/><br><br>
        <input class="submit" type="submit" value="Login" />
</form>
    </div>

      <p>Don't have an account yet? <a href="register.php">Register</a> </p>
    </main>
  </body>
</html>
