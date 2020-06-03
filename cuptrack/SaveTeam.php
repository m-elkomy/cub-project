<?
@session_start();
require_once("ConnectDB.php");
?>
<?
$TeamName = $_POST['TeamName'];
$CoachID = $_POST['CoachID'];

if($CoachID == '-1'){
	$CoachName = $_POST['CoachName'];
	mysql_query("INSERT INTO `coach`(`Name`) VALUES ('$CoachName')");
	$CoachID = mysql_insert_id();	
}

echo $CoachID;
mysql_query("INSERT INTO `team` (`Name`, `CoachID`) VALUES ('$TeamName','$CoachID')");

@header("location:team.php");
?>
