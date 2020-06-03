<?
@session_start();
require_once("ConnectDB.php");

$ID = $_GET['ID'];
$CupID = $_GET['CupID'];

mysql_query("DELETE FROM `cup_schdule` WHERE `ID` = $ID ");

@header("location:cupschdule.php?ID=$CupID");

?>