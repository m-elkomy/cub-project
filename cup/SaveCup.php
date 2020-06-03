<?
@session_start();
require_once("ConnectDB.php");
?>
<?
$Name = $_POST['Name'];
$Start = $_POST['Start'];
$End = $_POST['End'];

$TeamID = $_POST['TeamID'];

if(count($TeamID) == 0 or is_float(count($TeamID)/2) == true){
echo "Error, Please select correct team number!!";
echo '<meta http-equiv="refresh" content="3;URL=AddCup.php" />';
exit;	
}

mysql_query("INSERT INTO `cup`(`Name`, `Start`, `End`) VALUES ('$Name','$Start','$End')");

$CupID = mysql_insert_id();

foreach($TeamID AS $key=>$value){
	mysql_query("INSERT INTO `cup_team`(`CupID`, `TeamID`) VALUES ('$CupID','$value')");	
}

@header("location:cup.php");
?>
