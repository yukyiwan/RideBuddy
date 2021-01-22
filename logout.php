<?php
	session_start();
 	session_destroy();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ride Buddy | Successful logout! </title>
        <meta charset="utf-8">
        <meta name="description" content="Logout from Ride Buddy">
        <meta name="keywords" content="logout, log out, sign out">
        <meta name="robots" content="noindex">
        <link rel="canonical" href="logout.php" />
        <link rel="icon" type="image/x-icon" href = "favicon.ico" />  
        <?php include("includes/db-config.php");?>
        <style>

            @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap');

            html{
                font-family: 'Montserrat';
                /* padding: 15px; */
            }
            h1{
                font-size: 22px;
                /* padding: 15px; */
                color: #706FD3; 
            }


        </style>

    </head>
    <body>
        <header>
        <img src="images/logo.png" width="300"/>
        <nav>
          <ul>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="login.php">Login</a> 
            </ul>            
        </nav>
        </header>

        <main>
                <h1>Thanks for riding with us, Buddy</h1>
        </main>
    </body
</html>
