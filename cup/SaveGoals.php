<?
@session_start();
require_once("ConnectDB.php");
?>
<?
$CupID = $_POST['CupID'];
$MatchID = $_POST['MatchID'];
$PlayerID = $_POST['PlayerID'];
$GoalTime = $_POST['GoalTime'];



mysql_query("INSERT INTO `match_goal`( `MatchID`, `PlayerID`, `GoalTime`) VALUES ('$MatchID','$PlayerID','$GoalTime') ");



@header("location:Results.php?ID=$MatchID&CupID=$CupID");

?>
