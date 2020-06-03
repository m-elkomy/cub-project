<?
@session_start();
require_once("ConnectDB.php");

$ID = $_GET['ID'];
$CupID = $_GET['CupID'];

mysql_query("DELETE FROM `cup_team` WHERE `CupID` = $CupID and `TeamID` = $ID ");

@header("location:CupTeamView.php?ID=$CupID");

?>