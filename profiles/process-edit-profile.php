<?php
session_start();
$personId = $_SESSION["personId"];
$profileId = $_GET["profileId"];
include('../includes/db-config.php');

$uploaddir = "./profiles/img/";
$uploadfile = $uploaddir.basename($_FILES["profilePicFile"]["name"]);


//receive POST data from edit form
$fName = $_POST["fName"];
    $aFName = addslashes ($fName);
$lName = $_POST["lName"];
    $aLName = addslashes ($lName);
$email = $_POST["email"];
$showEm = $_POST["showEm"];
$password = $_POST["password"];
$countryId = $_POST["countryId"];
$DOB = $_POST["DOB"];
$showDOB = $_POST["showDOB"];
$showYOB = $_POST["showYOB"];
$genderId = $_POST["genderId"];
$genderNote = $_POST["genderNote"];
    $aGenderNote = addslashes ($genderNote);
$showGen = $_POST["showGen"];
$relationshipId = $_POST["relationshipId"];
$relationshipNote = $_POST["relationshipNote"];
    $aRelationshipNote = addslashes ($relationshipNote); 
$showRe = $_POST["showRe"];
$eduId = $_POST["eduId"];
$eduNote = $_POST["eduNote"];
    $aEduNote = addslashes ($eduNote);
$showEd = $_POST["showEd"];
$job = $_POST["job"];
$jobNote = $_POST["jobNote"];
    $aJobNote = addslashes ($jobNote);
$showJob = $_POST["showJob"];
$regTime = $_POST["regTime"];
$userId = $_POST["userId"];
$statusId = $_POST["statusId"];
$statusNote = $_POST["statusNote"];
$profilePicFile = $_FILES["profilePicFile"]['name'];
$interestId = $_POST["interestId"];
$dealBreakerId = $_POST["dealBreakerId"];

    // move_uploaded_file($_FILES["profilePicFile"]["tmp_name"], $uploadfile);
if (move_uploaded_file($_FILES["profilePicFile"]["tmp_name"], $uploadfile)) {
$stmt = $pdo->prepare ("UPDATE `person` SET `personId`='$personId',`profileId`='$personId',`profilePicFile`='$profilePicFile',`fName`='$aFName',`lName`='$aLName', `email`='$email',`showEm`='$showEm',`password`='$password',`countryId`='$countryId',`DOB`='$DOB',`showDOB`='$showDOB',`showYOB`='$showYOB',`genderId`='$genderId',
    `genderNote`='$aGenderNote',`showGen`='$showGen',`relationshipId`='$relationshipId',`relationshipNote`='$aRelationshipNote',`showRe`='$showRe',`eduId`='$eduId',`eduNote`='$aEduNote',
    `showEd`='$showEd',`job`='$job',`jobNote`='$aJobNote',`showJob`='$showJob',`regTime`='$regTime',`userId`='$userId',`statusId`='$statusId',`statusNote`='$statusNote' 
    WHERE `person`.`personId`='$personId';");

$stmt -> execute();

} else {

    $stmt = $pdo->prepare ("UPDATE `person` SET `personId`='$personId',`profileId`='$personId',`fName`='$aFName',`lName`='$aLName', `email`='$email',`showEm`='$showEm',`password`='$password',`countryId`='$countryId',`DOB`='$DOB',`showDOB`='$showDOB',`showYOB`='$showYOB',`genderId`='$genderId',
    `genderNote`='$aGenderNote',`showGen`='$showGen',`relationshipId`='$relationshipId',`relationshipNote`='$aRelationshipNote',`showRe`='$showRe',`eduId`='$eduId',`eduNote`='$aEduNote',
    `showEd`='$showEd',`job`='$job',`jobNote`='$aJobNote',`showJob`='$showJob',`regTime`='$regTime',`userId`='$userId',`statusId`='$statusId',`statusNote`='$statusNote' 
    WHERE `person`.`personId`='$personId';");

$stmt -> execute();

}

$stmt = $pdo -> prepare ("DELETE FROM `person-interest` WHERE `person-interest`.`personId`='$personId';");
$stmt -> execute();

$stmt = $pdo -> prepare ("DELETE FROM `person-dealbreaker` WHERE `person-dealbreaker`.`personId`='$personId';");
$stmt -> execute();

for ($i=0; $i<count($interestId); $i++) {
    if(isset($interestId[$i])){
                $stmt = $pdo -> prepare ("INSERT INTO `person-interest`(`personId`, `interestId`) VALUES ('$personId', '$interestId[$i]');");
        $stmt -> execute();}
    }

for ($i=0; $i<count($dealBreakerId); $i++) {
    if(isset($dealBreakerId[$i])){
               $stmt = $pdo -> prepare ("INSERT INTO `person-dealBreaker`(`personId`, `dealBreakerId`) VALUES ('$personId', '$dealBreakerId[$i]');");
       $stmt -> execute();}
   }
    

header("Location: profile.php?profileId=$personId");

?>