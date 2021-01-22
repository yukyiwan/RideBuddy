<?php
session_start();
$personId = $_SESSION["personId"];
?>

<!DOCTYPE html> 
<html>
<head>
    <title>Ride Buddy | Buddies </title>
    <meta charset="utf-8">
    <meta name="description" content="Buddies of the user">
    <meta name="keywords" content="buddies">
    <link rel="icon" type="image/x-icon" href = "../favicon.ico" />
    <link rel="canonical" href="buddies.php?personId=<?php echo($personId); ?>">
    <link rel="stylesheet" href="../css/buddies.css">
    <style>
          h1{
            font-family: 'Montserrat';
            font-size: 30px;
            padding-top: 20px;
            color: #706FD3;
            text-align: center;
          }
            footer{
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
      </style>

</head>
<body>
    <?php include("../includes/2ndlevelheader.php"); ?>
    <main style="margin-top: 0px;">
        <section>
            <h1>Buddies</h1>
            <ul style="padding-inline-start: 0px;">
                                    <?php
                                    include('../includes/db-config.php');
                                    $stmt = $pdo->prepare("SELECT * FROM
                                    `person-profile` WHERE (`personId` = '$personId' AND `addBuddy`=1)");
                                    $stmt->execute(); 
                                    $added=array();
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        array_push($added,$row["profileId"]);
                                        // print_r($added);
                                    }

                                    $stmt = $pdo->prepare("SELECT * FROM
                                    `person-profile` WHERE (`profileId` = '$personId' AND `addBuddy`=1)");
                                    $stmt->execute(); 
                                    $requested=array();
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    array_push($requested,$row["personId"]);
                                    // print_r($requested);
                                    }

                                    if (count($added) > count($requested) ) {
                                    $count = count($added);
                                    $push = count($added)-count($requested);
                                    for ($i=0; $i<$push; $i++) {
                                        array_push($requested,0);}
                                    } else {
                                    $count = count($requested);
                                    $push = count($requested) - count($added);
                                    for ($i=0; $i<$push; $i++) {
                                    array_push($added,0);}
                                    }

                                  
                                    $stmt = $pdo->prepare("SELECT * FROM
                                    (`person-profile` INNER JOIN `person` ON `person-profile`.`personId` = `person`.`personId`) 
                                    WHERE `person-profile`.`profileId` = '$personId';");
                                    $stmt->execute(); 
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
                  <section style="padding: 20px; border: 2px solid #89898B; border-radius: 10px;"> 
                          <div id="main"><img src="../profiles/img/<?php echo ($row['profilePicFile']); ?>" height="200px" /></div>
                          <a href="../profiles/profile.php?profileId=<?php echo($row['profileId']); ?>"><?php echo($row["fName"]." ".$row["lName"]); ?></a>
                          <br>
                          <?php
                         
                          if ($row["profileId"]<$personId) {
                            $chatId= $row["profileId"].$personId;
                          //   echo($chatId);
                          }

                          if ($row["profileId"]>$personId) {
                            $chatId= $personId.$row["profileId"];
                            // echo($chatId);
                          }

                          ?>
                          <br>
                          <div>
                            <a class="chat" href="../chats/chat.php?chatId=<?php echo($chatId);?>">Chat</a>
                          </div>
                        
                </section><br> <?php }  } ?>

              
        </ul>
    </main>
    <?php include("../includes/2ndlevelfooter.php"); ?>
</body>
</html>
