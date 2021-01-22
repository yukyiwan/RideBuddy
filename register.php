<?php

?>

<DOCTYPE html>
<head>
  <title> Ride Buddy | <?php echo($row["fName"]);echo($row["lName"]);?></title>
  <meta charset="utf-8">
  <meta name="description" content="Edit; profile; <?php echo($row["fName"]);echo($row["lName"]);?>">
  <meta name="keywords" content="<?php echo($row["fName"]);echo($row["lName"]);?>">
  <link rel="canonical" href="profile.php?profileId=<?php echo($row["profileId"]); ?>" />
  <link rel="icon" type="image/x-icon" href = "favicon.ico" />
  <link rel="stylesheet" href="css/register.css" />

</head>
<body>

    <main>

    <h1>Create new account</h1>
    <div class="profileInfo">

    <form action="process-register.php" method="POST" enctype="multipart/form-data">

        <label>Upload Profile Picture:</label><br>
        <input type="file" name="profilePicFile" required><br><br>

        <label>First Name:</label>
        <input type="text" name="fName" required /><br><br>

        <label>Last Name:</label>
        <input type="text" name="lName" required /><br><br>

        <label>Email:</label>
        <input type="email" name="email" required /><br><br>

        <input type="hidden" name="showEm" value="1">

        <label>Password:</label>
        <input type="password" name="password" required /><br><br>

        
        
        <label>Country:</label>
        <?php
        include('includes/db-config.php');
        ?>
        <select id="open" name="countryId" required>
        <?php
        //prepare and execute mysql statement
        $stmt = $pdo->prepare("SELECT * FROM `country`");
        $stmt->execute();
        //display results from SELECT statement
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <option value="<?php echo($row["countryId"]) ?>"><?php echo($row["countryName"]) ?></option>
        <?php
        }
        ?>
        </select><br><br>

        <section>
        <label>Date of Birth:</label>
        <input type="date" name="DOB" required /><br><br>

        <input type="hidden" name="showDOB" value="1">


        <label>Gender:</label>
        <?php
        include('includes/db-config.php');
        ?>
        <select  name="genderId" required>
        <?php
        //prepare and execute mysql statement
        $stmt = $pdo->prepare("SELECT * FROM `gender`");
        $stmt->execute();
        //display results from SELECT statement
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <option value="<?php echo($row["genderId"]) ?>"><?php echo($row["genderName"]) ?></option>
        <?php
        }
        ?>
        </select><br><br>

        <label>Feel free to tell buddies more on your belief or orientation (optional): </label>
        <p><textarea placeholder="I am a ..."  name="genderNote"> </textarea></p>

        <input type="hidden" name="showGen" value="1">

        
        <label>Relationship:</label>
        <?php
        include('includes/db-config.php');
        ?>
        <select name="relationshipId" >
        <?php
        //prepare and execute mysql statement
        $stmt = $pdo->prepare("SELECT * FROM `relationship`");
        $stmt->execute();
        //display results from SELECT statement
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <option value="<?php echo($row["relationshipId"]) ?>"><?php echo($row["relationshipName"]) ?></option>
        <?php
        }
        ?>
        </select><br><br>

        <label>Feel free to tell buddies more about your relationship (optional): </label>
        <p><textarea placeholder="I am a ..."  name="relationshipNote"> </textarea></p>

        <input type="hidden" name="showRe" value="1">


        <label>Education:</label>
        <?php
        include('includes/db-config.php');
        ?>
        <select name="eduId" >
        <?php
        //prepare and execute mysql statement
        $stmt = $pdo->prepare("SELECT * FROM `education`");
        $stmt->execute();
        //display results from SELECT statement
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <option value="<?php echo($row["eduId"]) ?>"><?php echo($row["eduName"]) ?></option>
        <?php
        }
        ?>
        </select><br><br>

        <label>Feel free to tell buddies more about your school (optional):</label>
        <p><textarea placeholder="I am a ..."  name="eduNote"> </textarea></p>

        <input type="hidden" name="showEd" value="1">

        <label>Job (optional):</label>
        <input type="text" name="job"><br><br>

        <label>Feel free to tell buddies more about your job (optional):</label>
        <p><textarea placeholder="CEO"  name="jobNote"> </textarea></p>

        <input type="hidden" name="showJob" value="1">

        <input type="hidden" name="statusId" value="1">

        <label>Interest: (hold Ctrl or Shift key for multiple selections)</label><br>
        <div id="multipleSelect">
        <?php
        include('includes/db-config.php');
        ?>
        <select class="multipleSelect" name="interestId[]" multiple required>
        <!-- name="Interest"  -->
        <?php
        //prepare and execute mysql statement
        $stmt = $pdo->prepare("SELECT * FROM `interest`");
        $stmt->execute();
        //display results from SELECT statement
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <option value="<?php echo($row["interestId"]) ?>"><?php echo($row["interestName"]) ?></option>
        <?php
        }
        ?>
      </div>

        </select><br><br>

        <label>Dealbreaker: (hold Ctrl or Shift key for multiple selections)</label><br>


        <?php
        include('includes/db-config.php');
        ?>
          <div id="multipleSelect">
        <select class="multipleSelect" name="dealBreakerId[]" multiple required>
        <!-- name="dealBreakerId" -->
        <?php
        //prepare and execute mysql statement
        $stmt = $pdo->prepare("SELECT * FROM `dealbreaker`");
        $stmt->execute();
        //display results from SELECT statement
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <option value="<?php echo($row["dealBreakerId"]) ?>"><?php echo($row["dealBreakerName"]) ?></option>
        <?php
        }
        ?>
      </div>
        </select><br><br>

      </section>

        <!-- <input id="submit" type="submit"> -->
        <input class="submit" id="submit" type="submit" value="submit"><br><br>
</div>
    </form>

    <p>Already have an account? <a href="login.php">Login</a> </p>

    </main>

</body>
<script src="open.js"></script>
</html>
