<?php
session_start();
if(isset($_SESSION["personId"])){
 $personId = $_SESSION["personId"];
 $profileId = $_GET["profileId"];
//  echo($personId);
//  echo($profileId);
 include('../includes/db-config.php');
 $stmt = $pdo->prepare("SELECT * FROM `person` WHERE `profileId`= $profileId;");
 $stmt->execute();
 $row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
​
<!DOCTYPE html>
<html>
        <head>
            <title> Ride Buddy | <?php echo($row["fName"]);echo($row["lName"]);?></title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="The Profile of <?php echo($row["fName"]);echo($row["lName"]);?>">
            <meta name="keywords" content="<?php echo($row["fName"]);echo($row["lName"]);?>">
            <link rel="canonical" href="profile.php?profileId=<?php echo($row["profileId"]); ?>" />
            <link rel="icon" type="image/x-icon" href = "../favicon.ico" />
            <link rel="stylesheet" href="../css/profile.css"/>

        </head>

        </head>
        <body>
                <?php include("../includes/2ndlevelheader1.php");
                $stmt = $pdo->prepare("SELECT *
                FROM (((((`person`
                INNER JOIN `country` ON `person`.`countryId` = `country`.`countryId`)
                INNER JOIN `gender` ON `person`.`genderId` = `gender`.`genderId`)
                INNER JOIN `relationship` ON `person`.`relationshipId` = `relationship`.`relationshipId`)
                INNER JOIN `education` ON `person`.`eduId` = `education`.`eduId`)
                INNER JOIN `status` ON `person`.`statusId` = `status`.`statusId`)
                WHERE `profileId`= $profileId;");
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $statusId=$row["statusId"];?>

                <main>

                <?php if ($personId!==$profileId) { ?>
                <h1><?php echo($row["statusName"]) ?></h1>
                <?php }

                    $stmt = $pdo->prepare("SELECT *
                        FROM (((((`person`
                        INNER JOIN `country` ON `person`.`countryId` = `country`.`countryId`)
                        INNER JOIN `gender` ON `person`.`genderId` = `gender`.`genderId`)
                        INNER JOIN `relationship` ON `person`.`relationshipId` = `relationship`.`relationshipId`)
                        INNER JOIN `education` ON `person`.`eduId` = `education`.`eduId`)
                        INNER JOIN `status` ON `person`.`statusId` = `status`.`statusId`)
                        WHERE `profileId`= $profileId;");
                        $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC); ?>

                    <?php if ($personId!==$profileId) { ?>
                    <div><?php echo($row["statusNote"]) ?></div>
                    <?php }?>

                    <?php if ($personId==$profileId) { ?>
                        <div id="editprofile"><a class="editprofile" href="edit-profile.php">Edit profile</a></div>
                    <?php } ?>
                  <br><br>

                  <div class="clearfix">
                    <img class="profimg" src="../profiles/img/<?php echo($row["profilePicFile"]); ?>" width="100"/></div>
                    <h2><?php echo($row["fName"]." ".$row["lName"]);?></h2>

                    <section>
                        <h1>About</h1>
​
                        <div id="cont"> <p>Country:</p> <?php echo($row["countryName"]) ?></div>
​
                        <?php if ($personId==$profileId) { ?>

                            <div id="abt"><p> Day of birth:</p> <?php echo date('m-d', strtotime($row["DOB"])) ?>
                            <?php echo ("-".date('y', strtotime($row["DOB"]))) ?></div>

                        <?php } else { ?>


                        <?php if (($row["showDOB"]) && ($row["showYOB"])) { ?>

                        <div id="abt"><p>Birthday:</p> <?php echo date('m-d', strtotime($row["DOB"])) ?>
                        <?php echo ("-".date('y', strtotime($row["DOB"]))) ?></div>

                        <?php } else if ($row["showDOB"]){ ?>

                        <div id="abt"><p>Birthday:</p> <?php echo date('m-d', strtotime($row["DOB"])) ?>

                        <?php } }?>
​
                        <?php if ($personId==$profileId or $row["showEm"]==1) { ?>
                        <div id="eml"><p>Email:</p> <?php echo($row["email"]) ?></div>
                        <?php }?>

                        <?php if ($personId==$profileId || $row["showGen"]==1) { ?>
                        <div id="abt"><p>Gender:</p> <?php echo($row["genderName"]); ?>,

                        <?php if(isset($row["genderNote"])){ ?>
                        <?php echo($row["genderNote"]);} ?></div>
                        <?php }?>

                        <?php if ($personId==$profileId || $row["showRe"]==1) { ?>
                        <div id="abt"><p>Relationship:</p> <?php echo($row["relationshipName"]); ?>,

                        <?php if(isset($row["relationshipNote"])){ ?>
                        <?php echo($row["relationshipNote"]);} ?></div>
                        <?php } ?>


                    </section>
​
                    <section>
                        <h1>Education and Occupation</h1>
                        <?php if ($personId==$profileId || $row["showEd"]==1) { ?>
                        <div>
                        <p>Education:</p> <?php echo($row["eduName"]);  ?> </div>

                        <?php if (isset($row["eduNote"])) { ?>
                        <div>  <?php echo($row["eduNote"]);} ?>
                        </div>
                        <?php }?>
​
                        <?php if ($personId==$profileId || $row["showJob"]==1) { ?>
                        <div id="job">
                        <p>Day Job:</p> <?php echo($row["job"]); ?> </div>

                        <?php if(isset($row["jobNote"])){ ?>
                        <div><?php  echo($row["jobNote"]);} ?> </div>

                        <?php } ?>
                    </section>
​
                    <section>
                        <h1>Interests</h1>
                        <?php
                        $stmt = $pdo->prepare("SELECT *
                        FROM (`person-interest`
                        INNER JOIN `interest` ON `person-interest`.`interestId` = `interest`.`interestId`)
                        WHERE `personId`= $profileId;");
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
                        <div id="interest"><li>
                        <?php echo($row["interestName"]); }?></li></div>
                    </section>
​

                    <section>
                        <h1>Deal Breakers to me are ...</h1>
                        <?php
                        $stmt = $pdo->prepare("SELECT *
                        FROM (`person-dealbreaker`
                        INNER JOIN `dealbreaker` ON `person-dealbreaker`.`dealBreakerId` = `dealbreaker`.`dealBreakerId`)
                        WHERE `personId`= $profileId;");
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
                        <div id="dealbreaker"><li>
                        <?php echo($row["dealBreakerName"]); }?></li></div>
                    </section>
​
​
        </main>
        <?php include("../includes/2ndlevelfooter.php"); ?>
    </body>
​
</html>

<?php } ?>
