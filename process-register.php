<?php

$uploaddir = "./profiles/img/";
$uploadfile = $uploaddir.basename($_FILES["profilePicFile"]["name"]);
move_uploaded_file($_FILES["profilePicFile"]["tmp_name"], $uploadfile);

//receive POST data from edit form
$statusId = $_POST["statusId"];
$fName = $_POST["fName"];
    $aFName = addslashes ($fName);
$lName = $_POST["lName"];
    $aLName = addslashes ($lName);
$email = $_POST["email"];
$showEm = $_POST["showEm"];
$password = $_POST["password"];
$countryId = $_POST["countryId"];
$DOB = $_POST["DOB"];
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
$job = $_POST["job"];
$jobNote = $_POST["jobNote"];
    $aJobNote = addslashes ($jobNote);
$showJob = $_POST["showJob"];


$profilePicFile = $_FILES["profilePicFile"]['name'];
$interestId = $_POST["interestId"];
$dealBreakerId = $_POST["dealBreakerId"];

include('includes/db-config.php');

$stmt = $pdo->prepare("INSERT INTO `person` (`personId`, `profileId`, `profilePicFile`, `fName`, `lName`, `email`, `showEm`, `password`, `countryId`, `DOB`, `showDOB`, `showYOB`, `genderId`, `genderNote`, `showGen`, `relationshipId`, `relationshipNote`, `showRe`, `eduId`, `eduNote`, `showEd`, `job`, `jobNote`, `showJob`, `regTime`, `userId`, `statusId`, `statusNote`) 
VALUES (NULL, '1', '$profilePicFile', '$aFName', '$aLName', '$email', '$showEm', '$password', '$countryId', '$DOB', '1', '0', '$genderId', '$aGenderNote', '$showGen', '$relationshipId', '$aRelationshipNote', '$showRe', '$eduId', '$aEduNote', '1', '$job', '$aJobNote', '$showJob', NULL, '2', '1', '');");
$stmt->execute();

$stmt = $pdo->prepare ("SELECT * FROM `person` WHERE `personId`= LAST_INSERT_ID()");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC); 
$personId=$row["personId"];
$profileId=$row["personId"];

$stmt = $pdo->prepare("UPDATE `person` SET `profileId`='$profileId' WHERE `person`.`personId`='$profileId'");
$stmt->execute();

for ($i=0; $i<count($dealBreakerId); $i++) {
    if(isset($dealBreakerId[$i])){
               $stmt = $pdo -> prepare ("INSERT INTO `person-dealBreaker`(`personId`, `dealBreakerId`) VALUES ('$personId', '$dealBreakerId[$i]');");
       $stmt -> execute();}
   }

for ($i=0; $i<count($interestId); $i++) {
if(isset($interestId[$i])){
            $stmt = $pdo -> prepare ("INSERT INTO `person-interest`(`personId`, `interestId`) VALUES ('$personId', '$interestId[$i]');");
    $stmt -> execute();}
}
header ("Location: login.php");
?>
