<?
@session_start();
require_once("ConnectDB.php");

$ID = $_GET['ID'];
$CupID = $_GET['CupID'];
$MatchID = $_GET['MatchID'];

mysql_query("DELETE FROM match_card WHERE MatchCardID = $ID ");

@header("location:Results.php?ID=$MatchID&CupID=$CupID");

?>