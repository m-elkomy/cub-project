<?
@session_start();
require_once("ConnectDB.php");

$CupID = $_GET['ID'];

mysql_query("DELETE FROM `cup` WHERE `CupID` = $CupID ");
mysql_query("DELETE FROM `cup_schdule` WHERE `CupID` = $CupID ");
mysql_query("DELETE FROM `cup_team` WHERE `CupID` = $CupID ");

@header("location:cup.php");

?>