<?
@session_start();
require_once("ConnectDB.php");
?>
<?
$PlayerName = $_POST['PlayerName'];
$PlayerNum = $_POST['PlayerNum'];
$DOB = $_POST['DOB'];
$DOB = date("Y-m-d", strtotime($DOB));
$TeamID = $_POST['TeamID'];

mysql_query("INSERT INTO `player`(`PlayerName`, `DOB`, `TeamID` , `PlayerNum`) VALUES ('$PlayerName','$DOB','$TeamID','$PlayerNum')");
@header("location:player.php");
?>
