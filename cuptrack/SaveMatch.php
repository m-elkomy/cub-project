<?
@session_start();
require_once("ConnectDB.php");
?>
<?
$CupID = $_POST['CupID'];
$Team1ID = $_POST['Team1ID'];
$Team2ID = $_POST['Team2ID'];
$StaduimID = $_POST['StaduimID'];
$Round = $_POST['Round'];
$MatchDate = $_POST['MatchDate'];
$MatchTime = $_POST['MatchTime'];

$MatchDate = $MatchDate.' '.$MatchTime;

mysql_query("INSERT INTO `cup_schdule` (`CupID`,`Team1ID`, `Team2ID`, `MatchDate`, `StaduimID`, `Round`) VALUES  ('$CupID','$Team1ID','$Team2ID','$MatchDate','$StaduimID','$Round')");



@header("location:cupschdule.php?ID=$CupID");
?>
