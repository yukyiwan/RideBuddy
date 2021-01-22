<?php
session_start();
if(isset($_SESSION["personId"])){

    $personId = $_SESSION["personId"];
    include('../includes/db-config.php');
    $stmt = $pdo->prepare("SELECT * FROM `person` WHERE `profileId`= $personId;");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt = $pdo->prepare("SELECT *
                FROM (((((`person`
                INNER JOIN `country` ON `person`.`countryId` = `country`.`countryId`)
                INNER JOIN `gender` ON `person`.`genderId` = `gender`.`genderId`)
                INNER JOIN `relationship` ON `person`.`relationshipId` = `relationship`.`relationshipId`)
                INNER JOIN `education` ON `person`.`eduId` = `education`.`eduId`)
                INNER JOIN `status` ON `person`.`statusId` = `status`.`statusId`)
                WHERE `profileId`= $personId;");
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $fName = $row["fName"];
                $lName = $row["lName"];
                $email = $row["email"];
                $showEm = $row["showEm"];
                $DOB=$row["DOB"];
                $showDOB = $row["showDOB"];
                $showYOB = $row["showYOB"];
                $countryId = $row ["countryId"];
                $genderId=$row["genderId"];
                $genderNote = $row["genderNote"];
                $showGen=$row["showGen"];
                $relationshipNote = $row["relationshipNote"];
                $relationshipId=$row["relationshipId"];
                $showRe=$row["showRe"];
                $eduId=$row["eduId"];
                $eduNote = $row["eduNote"];
                $showEd= $row["showEd"];
                $job = $row["job"];
                $jobNote = $row["jobNote"];
                $showJob=$row["showJob"];
                $password=$row["password"];
                $regTime=$row["regTime"];
                $userId=$row["userId"];
                $statusId=$row["statusId"];
                $statusNote = $row["statusNote"];

                // echo($DOB."</br>");
                // echo($password."</br>");
                // echo($regTime."</br>");
                // echo($userId."</br>");
                // echo($statusId."</br>");
                // echo($statusNote."</br>");


        ?>

        <!DOCTYPE html>
        <html>
        <head>
            <title> Ride Buddy | <?php echo($row["fName"]);echo($row["lName"]);?></title>
            <meta charset="utf-8">
            <meta name="description" content="Edit; profile; <?php echo($row["fName"]);echo($row["lName"]);?>">
            <meta name="keywords" content="<?php echo($row["fName"]);echo($row["lName"]);?>">
            <link rel="canonical" href="profile.php?profileId=<?php echo($row["profileId"]); ?>" />
            <link rel="icon" type="image/x-icon" href = "../favicon.ico" />
            <link rel="stylesheet" href="../css/edit-profile.css" />


        </head>
        <body>
          <?php include("../includes/2ndlevelheader1.php"); ?>

        <main>

        <form action="process-edit-profile.php" method="POST" enctype="multipart/form-data">

<div class="profileInfo">

                <br><br>
                <label>Upload Profile Picture:</label><br>

                <input type="file" name="profilePicFile"><br><br>


                <label>First Name:</label>
                <input type="text" name="fName" value= "<?php echo($fName); ?>" required/><br><br>

                <label>Last Name:</label>
                <input type="text" name="lName" value= "<?php echo($lName); ?>"required/><br><br>

                <label>Email:</label>
                <input type="email" name="email" value= "<?php echo($email); ?>"required/><br><br>

              <label>Show email in profile? </label>
                <select id= "opt" name="showEm">
                <?php if ($showEm==1) { ?>
                <option value=1 selected>Yes</option>
                <option value=0>No</option>
                <?php } else { ?>
                <option value=1 >Yes</option>
                <option value=0 selected>No</option>
                <?php } ?>
                </select><br><br>

                <label>Country:</label>
                <select id= "opt" name="countryId" required>
                                <?php
                                //prepare and execute mysql statement
                                $stmt = $pdo->prepare("SELECT * FROM `country`");
                                $stmt->execute();
                                //display results from SELECT statement
                                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    if ($countryId==$row["countryId"]) {
                                ?>
                                <option value="<?php echo($row["countryId"]) ?>" selected><?php echo($row["countryName"]) ?></option>
                                <?php } else { ?>

                                <option value="<?php echo($row["countryId"]) ?>"><?php echo($row["countryName"]) ?></option>
                                <?php } ?>
                                <?php } ?>
                </select><br><br>

                <label>Date of Birth:</label>
                <input type="date" name="DOB" value="<?php echo($DOB) ?>"><br><br>

            <label>Show birthday in profile</label>
                <select id= "opt" name="showDOB" required>
                        <?php if ($showDOB==1) { ?>
                        <option value=1 selected>Yes</option>
                        <option value=0>No</option>
                        <?php } else { ?>
                        <option value=1>Yes</option>
                        <option value=0 selected>No</option>
                        <?php } ?>
                </select><br><br>

              <label>Show year of birth in profile</label>
                <select id= "opt" name="showYOB" required>
                            <?php if ($showYOB==1) { ?>
                            <option value=1 selected>Yes</option>
                            <option value=0>No</option>
                            <?php } else { ?>
                            <option value=1 >Yes</option>
                            <option value=0 selected>No</option>
                            <?php } ?>
                </select><br><br>

                <label>Gender:</label>
                <select id= "opt" name="genderId" required>
                            <?php
                            //prepare and execute mysql statement
                            $stmt = $pdo->prepare("SELECT * FROM `gender`");
                            $stmt->execute();
                            //display results from SELECT statement
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            if ($genderId==$row["genderId"]) {
                            ?>
                            <option value="<?php echo($row["genderId"]) ?>" selected><?php echo($row["genderName"]) ?></option>
                            <?php } else { ?>

                            <option value="<?php echo($row["genderId"]) ?>"><?php echo($row["genderName"]) ?></option>
                            <?php } ?>
                            <?php } ?>
                </select><br><br>

                <label>Feel free to tell buddies more on your belief or orientation: </label>
                <p><textarea name="genderNote"><?php echo($genderNote) ?></textarea></p>

                <label>Show gender in profile</label>
                <select id= "opt" name="showGen">
                            <?php if ($showGen==1) { ?>
                            <option value=1 selected>Yes</option>
                            <option value=0>No</option>
                            <?php } else { ?>
                            <option value=1 >Yes</option>
                            <option value=0 selected>No</option>
                            <?php } ?>
                </select><br><br>


                <label>Relationship:</label>
                <select id= "opt"  name="relationshipId" >
                            <?php
                            //prepare and execute mysql statement
                            $stmt = $pdo->prepare("SELECT * FROM `relationship`");
                            $stmt->execute();
                            //display results from SELECT statement
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            if ($relationshipId==$row["relationshipId"]) {
                                ?>
                                <option value="<?php echo($row["relationshipId"]) ?>" selected><?php echo($row["relationshipName"]) ?></option>
                                <?php } else { ?>

                                <option value="<?php echo($row["relationshipId"]) ?>"><?php echo($row["relationshipName"]) ?></option>
                                <?php } ?>
                                <?php } ?>
                </select><br><br>

                <label>Feel free to tell buddies more about your relationship: </label>
                <p><textarea name="relationshipNote"><?php echo("$relationshipNote") ?> </textarea></p>

                <label>Show relationship status in profile</label>
                <select id= "opt" name="showRe">
                            <?php if ($showRe==1) { ?>
                            <option value=1 selected>Yes</option>
                            <option value=0>No</option>
                            <?php } else { ?>
                            <option value=1 >Yes</option>
                            <option value=0 selected>No</option>
                            <?php } ?>
                </select><br><br>

                <label>Education:</label>
                <select id= "opt" name="eduId" >
                            <?php
                            //prepare and execute mysql statement
                            $stmt = $pdo->prepare("SELECT * FROM `education`");
                            $stmt->execute();
                            //display results from SELECT statement
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            if ($eduId==$row["eduId"]) {
                                ?>
                                <option value="<?php echo($row["eduId"]) ?>" selected><?php echo($row["eduName"]) ?></option>
                                <?php } else { ?>
                                <option value="<?php echo($row["eduId"]) ?>"><?php echo($row["eduName"]) ?></option>
                                <?php } ?>
                                <?php } ?>
                </select><br><br>

                <label>Feel free to tell buddies more about your school:</label>
                <p><textarea name="eduNote"><?php echo($eduNote) ?></textarea></p>

                <label>Show education in profile</label>
                            <select id= "opt" name="showEd">
                            <?php if ($showEd==1) { ?>
                            <option value=1 selected>Yes</option>
                            <option value=0>No</option>
                            <?php } else { ?>
                            <option value=1 >Yes</option>
                            <option value=0 selected>No</option>
                            <?php } ?>
                </select><br><br>

                <label>Job:</label>
                <input type="text" name="job" value="<?php echo($job) ?>" ><br><br>

                <label>Feel free to tell buddies more about your job:</label>
                <p><textarea class="textBox" name="jobNote"><?php echo($jobNote) ?></textarea></p>

                <label>Show job in profile</label>
                <select id= "opt" name="showJob" >
                            <?php if ($showJob==1) { ?>
                            <option value=1 selected>Yes</option>
                            <option value=0>No</option>
                            <?php } else { ?>
                            <option value=1 >Yes</option>
                            <option value=0 selected>No</option>
                            <?php } ?>
                </select><br><br>

                            <?php $stmt = $pdo->prepare("SELECT * FROM `person-interest` WHERE `personId`=$personId;");
                            $stmt->execute();
                            $interestId=array();
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                array_push($interestId, $row["interestId"]);
                            }
                            ?>

                <label>Interest: (hold Ctrl or Shift key for multiple selections)</label><br>
                <div >
                  <select class="multipleSelect" name="interestId[]" multiple>
                            <!-- name="Interest"  -->
                            <?php
                            //prepare and execute mysql statement
                            $stmt = $pdo->prepare("SELECT * FROM `interest`");
                            $stmt->execute();
                            $i=0;
                            //display results from SELECT statement
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            if ($interestId[$i]==$row["interestId"]) {
                                $i+=1;
                                ?>
                                <option value="<?php echo($row["interestId"]) ?>" selected><?php echo($row["interestName"]) ?></option>
                                <?php } else {
                                $i+=1;?>
                                <option value="<?php echo($row["interestId"]) ?>"><?php echo($row["interestName"]) ?></option>
                                <?php } ?>
                                <?php } ?>
                                <!-- ?> -->
                              </select>

              <br><br>

                                <?php $stmt = $pdo->prepare("SELECT * FROM `person-dealBreaker` WHERE `personId`=$personId;");
                                $stmt->execute();
                                $dealBreakerId=array();
                                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    array_push($dealBreakerId, $row["dealBreakerId"]);
                                }
                                ?>

            <label>Dealbreaker: (hold Ctrl or Shift key for multiple selections)</label><br>
                <select class="multipleSelect" name="dealBreakerId[]" multiple>
                        <?php
                        $stmt = $pdo->prepare("SELECT * FROM `dealbreaker`");
                        $stmt->execute();
                        $i=0;
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        if ($dealBreakerId[$i]==$row["dealBreakerId"]) {
                        $i+=1;
                        ?>
                        <option value="<?php echo($row["dealBreakerId"]) ?>" selected><?php echo($row["dealBreakerName"]) ?></option>
                        <?php } else { ?>
                        $i+=1;
                        <option value="<?php echo($row["dealBreakerId"]) ?>"><?php echo($row["dealBreakerName"]) ?></option>
                        <?php } ?>
                        <?php } ?>
                        ?>
                </select><br><br>
                  </div>

                <input type="hidden" name="password" value="<?php echo($password) ?>" />
                <input type="hidden" name="regTime" value="<?php echo($regTime) ?>" />
                <input type="hidden" name="userId" value="<?php echo($userId) ?>" />
                <input type="hidden" name="statusId" value="<?php echo($statusId) ?>" />
                <input type="hidden" name="statusNote" value="<?php echo($statusNote) ?>" /><br>

                <input class="submit" id="submit" type="submit" value="submit"><br><br>
</div>
    </form>

    </main>
    <?php include("../includes/2ndlevelfooter.php"); ?>

​  </body>
</html>

<?php } ?>
