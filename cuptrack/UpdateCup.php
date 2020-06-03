<?
@session_start();
require_once("ConnectDB.php");

$CupID = $_POST['CupID'];
$Name = $_POST['Name'];
$Start = $_POST['Start'];
$End = $_POST['End'];

mysql_query("UPDATE `cup` SET `Name`='$Name',`Start`='$Start',`End`='$End' WHERE CupID = $CupID");

@header("location:CupEdit.php?ID=$CupID");

?>