<?php
session_start();
//check identity


$chatId = $_GET["chatId"];
$personId = $_SESSION["personId"];
$profileId=str_replace($personId, "", $chatId);
$hostId=str_replace($profileId, "", $chatId);


if(isset($_SESSION["personId"]) && ($personId==$hostId)){
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Chat</title>
            <link rel="icon" type="image/x-icon" href = "../favicon.ico" />
            <link rel="stylesheet" href="../css/chat.css" />
      </head>
      
	<body>

            <?php include("../includes/2ndlevelheader1.php"); 
            
            $stmt = $pdo->prepare ("SELECT * FROM `person` WHERE `personId`='$profileId';"); 
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            ?>
            <main style="padding-top: 120px; padding-bottom: 0px; margin:10px;">

            <div style="padding-top: 20px;">
            <img src="../profiles/img/<?php echo($row["profilePicFile"]) ?>" width=200px/>
            </div><br>

            <input style="  background-color: white;
                              border: 2px solid #424242;
                              text-align: center;
                              font-size: 16px;
                              /* padding: 16px; */
                              display: inline-block;
                              width: 400px;
                              height: 50px;
                              cursor: pointer;
                              transition-duration: 0.4s;
                              text-decoration: none;
                              border-radius: 10px;
                              color:#424242;" name="message" id="message" type="text">

            <input name="chatId" id="chatId" value="<?php echo($chatId); ?>" type="hidden"><br>

            <div style="background-color: #4586A3; border: 1px solid #4586A3; text-align: center;
                        text-decoration: none;
                        background-color: #4586A3;
                        border: 1px solid #4586A3;
                        color: #fff;
                        padding-top: 12px;
                        padding-bottom: 12px;
                        margin-top: 25px;
                        border-radius: 10px;
                        width: 70px;" id="send">Send</div><br>

            <section id="history"></section>
            <script src="chat.js"></script>
            
            </main>

            <?php include("../includes/2ndlevelfooter.php"); ?>
       
      </body>
      
</html>

<?php } ?>