<?php
session_start();?>

<!DOCTYPE html>
    <html>
        <head>
            <title>Ride Buddy | Welcome </title>
            <meta charset="utf-8">
            <link rel="canonical" href="welcome.php" />
            <link rel="icon" type="image/x-icon" href = "favicon.ico" />
            <?php include("includes/db-config.php"); ?>
            <link rel="stylesheet" href="css/welcome.css" />

        </head>

        <body>
            <?php include("includes/header.php"); ?>

            <main>
                <section>
                    <h1>Welcome to Ride Buddy</h1>
                    <p>Here to help you on your way</p>
                    <img src="images/index.jpg" id="welcomeImg" >

                    <div class="slogan">
                      <!-- <p id ="p1">There’s nothing worse than an awkward commute companion.</p>
                      <p id = "p2">Want to send a clear “No Thanks” or discover an interactive icebreaker?</p>-->
                      <!-- <p id = "p3">Ride Buddy is here to get you on your way </p> -->
                      <p >We're sure you’ll quickly find that every Buddy can be a Ride Buddy </p>
                      </div>
                </section>

                <section class="ptravel">
                  <p id="ptravel"><strong>Today I am travelling by:</strong></p>
                </section>


            <div class = "box">
                <div>
                    <img />
                    <?php if(isset($_SESSION["personId"])){ ?>
                    <a href="rides/newride.php"><div><img src="images/plane.png"/></div></a>
                    <?php }else{ ?>
                    <section>
                    <a href="login.php"><div><img src="images/plane.png"/></div></a>
                    <section><?php } ?>
                    </div>
                <div>
                    <section>
                    <div><img src="images/bus.png"/></div>
                    <div>coming soon </div>
                    </section>
                    </div>
                <div>
                    <section>
                    <div><img src="images/cab.png"/></div>
                    <div>coming soon </div>
                    </section>
                    </div>
            </div>

          </main>
          <?php include("includes/footer.php"); ?>
        </body>
</html>
