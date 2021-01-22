<?php 
  session_start();
  if(isset($_SESSION["personId"])){
    $flightId = $_GET["flightId"];
    $personId = $_SESSION["personId"];
    include('../includes/db-config.php');
    $stmt = $pdo->prepare("SELECT * FROM ((`flight-person` 
    INNER JOIN `flight` ON `flight-person`.`flightId` = `flight`.`flightId`) 
    INNER JOIN `person` ON `flight-person`.`personId` = `person`.`personId`) WHERE `flight-person`.`flightId`='$flightId'");         
    $stmt->execute(); 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

      <!DOCTYPE html>
       <html>
        <head>
            <title> Ride Buddy | <?php echo($row["flightNum"]);?></title>
            <meta charset="utf-8">
            <meta name="description" content="<?php echo($row["flightNum"]);?>">
            <meta name="keywords" content="<?php echo($row["flightNum"]);echo($row["destination"]);echo($row["origin"]);?>">
            <link rel="canonical" href="rides.php?flightId=<?php echo($row["flightId"]); ?>" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="icon" type="image/x-icon" href = "../favicon.ico" />
            <link rel="stylesheet" href="../css/header.css">
            <!-- <link rel="stylesheet" href="../css/contact.css" /> -->
            <style>
              footer{
              font-family:roboto;
              position: fixed;
              left:0;
              bottom:0;
              width: 100%;

            }
            .botnav {
              width: 100%;
              background-color: #706FD3;
              overflow: auto;
              height: 50px;
            }

            .botnav a {
              float: left;
              display: inline;
              padding-top: 16px;
              padding-bottom: 12px;
              color: white;
              text-decoration: none;
              font-size: 16px;
              width: 20%;
              text-align: center;
            }

            .botnav a:hover {
              background-color: white;
              color: #706FD3;
            }

            h1{
              font-family: 'Montserrat';
              font-size: 22px;
              /* padding: 15px; */
              color: #706FD3;
              text-align: center;
            }

            h3{
              font-family: 'Montserrat';
              font-size: 20px;
              color: #89898B;
              text-align: center;
            }

            p{
              font-size: 16px;
              line-height: 1.6;
              color: #89898B;
              text-align: center;
            }

            main{
              margin-bottom: 100px;
            }

            #sp{
              width:100vw
            }
            </style>
        </head>

        <body>  

          <!-- Header -->
          <div id="body-content-wrapper" class="offline">
          <?php 
          include("../includes/2ndlevelheader.php");
          ?>

          <main class="main_new">

          <?php                   
            $stmt = $pdo->prepare("SELECT * FROM `person-profile` WHERE (`personId` = '$personId' AND `addBuddy`=1)");
            $stmt->execute();

            $added=array();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              array_push($added,$row["profileId"]);
              // print_r($added);}
            }

            $stmt = $pdo->prepare("SELECT * FROM `person-profile` WHERE (`profileId` = '$personId' AND `addBuddy`=1)");
            $stmt->execute();

            $requested=array();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                
              array_push($requested,$row["personId"]);
              // print_r($requested);
            }

            $stmt = $pdo->prepare("SELECT * FROM
                              `person-profile` WHERE (`personId` = '$personId' AND `blocked`=1)");
                              $stmt->execute(); 
                              $blocked=array();
                              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                
                              array_push($blocked,$row["profileId"]);
                              // print_r($blocked);
                            }


                            if (count($added) >= count($requested) && count($added) >= count($blocked)) {
                              $count = count($added);
                              $push = count($added)-count($requested);
                              $push2 = count($added)-count($blocked);
                              for ($i=0; $i<$push; $i++) {
                                array_push($requested,0);}
                              for ($i=0; $i<$push2; $i++) {
                                  array_push($blocked,0);}
                            } else if (count($requested) >= count($added) && count($requested) >=count($blocked)) {
                              $count = count($requested);
                              $push = count($requested) - count($added);
                              $push2 = count($requested)-count($blocked);
                              for ($i=0; $i<$push; $i++) {
                              array_push($added,0);}
                              for ($i=0; $i<$push2; $i++) {
                              array_push($blocked,0);}
                            } else {
                              $count = count($blocked);
                              $push = count($blocked) - count($added);
                              $push2 = count($blocked)-count($requested);
                              for ($i=0; $i<$push; $i++) {
                              array_push($added,0);}
                              for ($i=0; $i<$push2; $i++) {
                              array_push($requested,0);}
                            }

                            // print_r($requested);
                            // print_r($added);
                            // print_r($blocked);
                            // print_r($count);


              $stmt = $pdo->prepare("SELECT * FROM ((`flight-person` INNER JOIN `flight` ON `flight-person`.`flightId` = `flight`.`flightId`) 
              INNER JOIN `person` ON `flight-person`.`personId` = `person`.`personId`) WHERE `flight-person`.`flightId`='$flightId'");
                
              $stmt->execute(); 
                              
              $row = $stmt->fetch(PDO::FETCH_ASSOC);
          ?>


                <h1> 
                    <?php
                     echo($row["flightNum"]);
                    ?>
                  <br>
                </h1>



                <h3> 
                    <?php
                      echo("From ".$row["origin"]." to ".$row["destination"]);
                    ?>
                    <br>
                </h2>



                <h3>
                    <?php
                        echo($row["departDate"]." at ".$row["departTime"]. "(EST)");
                    ?>
                    <br>
                </h3>

                <img id="sp" src="../images/seatingplan.jpg"/>


          <div class="main-content-wrapper">


          <h2>Add</h2>
                    <?php

                      $stmt = $pdo->prepare("SELECT *
                      FROM ((`flight-person`
                      INNER JOIN `flight` ON `flight-person`.`flightId` = `flight`.`flightId`)
                      INNER JOIN `person` ON `flight-person`.`personId` = `person`.`personId`) 
                      WHERE `flight-person`.`flightId`='$flightId'");

                      $stmt->execute();   
                      
                      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                        $entries =0;

                            for ($i=0; $i<$count; $i++) {

                            if (($blocked[$i]==$row["profileId"])  || ($added[$i]==$row["profileId"]) || (($requested[$i]==$row["profileId"]) || ($personId==$row["profileId"]))) {

                              $entries++;}

                            }

                          if ($entries==0)

                          { 

                    ?>

              <section style="padding: 20px;">
            
              <div><img src="../profiles/img/<?php echo ($row['profilePicFile']); ?>" height="200px" /></div>

              <a href="../profiles/profile.php?profileId=<?php echo($row['profileId']); ?>"><?php echo($row["fName"]." ".$row["lName"]); ?></a>
              <br>
            
              <?php
              echo($row["seatNum"]);
              ?>

              <br>

              <form class="aForm" action = "process.php" method="POST">
              <input  type="hidden" class="profileId" name="profileId" value="<?php echo($row['profileId']); ?>"> 
              <input type="submit" class="add dynamic-theme" name="submit" value="add"> 
            <hr>
            </form> 
            </section><br>


          <?php }  }  ?>




                      <h2>Buddies</h2>
                      <?php 
                      $stmt = $pdo->prepare("SELECT *
                      FROM ((`flight-person`
                      INNER JOIN `flight` ON `flight-person`.`flightId` = `flight`.`flightId`)
                      INNER JOIN `person` ON `flight-person`.`personId` = `person`.`personId`) 
                      WHERE `flight-person`.`flightId`='$flightId'");

                      $stmt->execute();  ?> 

                      <h3>Requests</h3><?php
                      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $entries1 =0;
                        $entries2 =0;
                            for ($i=0; $i<$count; $i++) {
                              if ($added[$i]==$row["profileId"] || ($blocked[$i]==$row["profileId"])) {
                              $entries1++;}
                              if ($requested[$i]==$row["profileId"]) {
                                $entries2++;}
                            }

                          if ($entries1==0 && $entries2==1) {
                            ?>
                          <section style="padding: 20px;">
                      
                          <div><img src="../profiles/img/<?php echo ($row['profilePicFile']); ?>" height="200px" /></div>
                          <a href="../profiles/profile.php?profileId=<?php echo($row['profileId']); ?>"><?php echo($row["fName"]." ".$row["lName"]); ?></a>
                          <br>
                          <?php
                          echo($row["seatNum"]);
                          ?>
                          <br>
                      <form class="aForm" action = "process.php" method="POST"> 
                          <input type="hidden" class="profileId" name="profileId" value="<?php echo($row['profileId']); ?>"> 
                          <input class="accept dynamic-theme" type="submit" name="submit" value="accept"> 
                      </form>
                      <form class="bForm" action = "process.php" method="POST"> 
                          <input type="hidden" class="bProfileId" name="bProfileId" value="<?php echo($row['profileId']); ?>">
                          <input class="remove btn-remove" type="submit" name="submit" value="block"> 
                      </form>
                    <hr>


                          </section><br>
   
                <?php 
                }  
              } 
                ?>


              <?php
              $stmt = $pdo->prepare("SELECT *
              FROM ((`flight-person`
              INNER JOIN `flight` ON `flight-person`.`flightId` = `flight`.`flightId`)
              INNER JOIN `person` ON `flight-person`.`personId` = `person`.`personId`) WHERE `flight-person`.`flightId`='$flightId'");

              $stmt->execute();   ?> 
          <!-- <section class="chart-wrapper">             -->
                              
                              
                              <h3>Connections</h3><?php
                            
                              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                              $entries1 =0;
                              $entries2 =0;
                                  for ($i=0; $i<$count; $i++) {
                                    if ($added[$i]==$row["profileId"]) {
                                    $entries1++;}
                                    if ($requested[$i]==$row["profileId"]) {
                                      $entries2++;}
                                  }

                                if ($entries1==1 && $entries2==1) {
                                  ?>
                          <section style="padding: 20px;">
                          <div><img src="../profiles/img/<?php echo ($row['profilePicFile']); ?>" height="200px" /></div>
                          <a href="../profiles/profile.php?profileId=<?php echo($row['profileId']); ?>"><?php echo($row["fName"]." ".$row["lName"]); ?></a>
                          <br>
                          <?php
                          echo($row["seatNum"]);
                          
                          if ($row["profileId"]<$personId) {
                            $chatId= $row["profileId"].$personId;
                          //   echo($chatId);
                          }

                          if ($row["profileId"]>$personId) {
                            $chatId= $personId.$row["profileId"];
                            // echo($chatId);
                          } ?>
                          
                          <br><br>
                          <a class="chat  dynamic-theme" href="../chats/chat.php?chatId=<?php echo($chatId);?>">Chat</a><br>
                          </section><br>

                <?php 
              }  
              } 
              
              ?>

    </div>




        </main>
        <?php include("../includes/2ndlevelfooter.php"); ?>
        
        <script src="../header.js"></script>
      </div>
    </body>
    <script src="add.js"></script>
    <script src="remove.js"></script>

</html>

<?php
  }
  ?>