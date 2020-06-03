<?
@session_start();
require_once("ConnectDB.php");
?>
<?
$CupID = $_POST['CupID'];
$MatchID = $_POST['MatchID'];
$PlayerID = $_POST['PlayerID'];
$CardTime = $_POST['CardTime'];
$CardID = $_POST['CardID'];


mysql_query("INSERT INTO `match_card`( `MatchID`, `PlayerID`, `CardTime`, `Type`) VALUES ('$MatchID','$PlayerID','$CardTime','$CardID')");

@header("location:Results.php?ID=$MatchID&CupID=$CupID");

?>
