<?
@session_start();
require_once("ConnectDB.php");
$MatchID = $_POST['MatchID'];
$CupID = $_POST['CupID'];
$Team1ID = $_POST['Team1ID'];
$Team2ID = $_POST['Team2ID'];
$StaduimID = $_POST['StaduimID'];
$Round = $_POST['Round'];
$MatchDate = $_POST['MatchDate'];
$MatchTime = $_POST['MatchTime'];

$MatchDate = $MatchDate.' '.$MatchTime;


mysql_query("UPDATE `cup_schdule` SET `Team1ID`='$Team1ID',`Team2ID`='$Team2ID',`MatchDate`='$MatchDate',`StaduimID`='$StaduimID',`Round`='$Round',`CupID`='$CupID' WHERE ID = $MatchID");

@header("location:cupschdule.php?ID=$CupID");

?>