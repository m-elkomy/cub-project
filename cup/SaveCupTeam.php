<?
@session_start();
require_once("ConnectDB.php");
?>
<?
$TeamID = $_POST['TeamID'];
$CupID = $_POST['CupID'];


mysql_query("INSERT INTO `cup_team`(`CupID`, `TeamID`) VALUES ('$CupID','$TeamID')");
@header("location:CupTeamView.php?ID=$CupID");
?>
