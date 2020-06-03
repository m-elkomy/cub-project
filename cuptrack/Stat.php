<?
@session_start();
require_once("ConnectDB.php");
$MatchID = $_GET[ID];
$CupID = $_GET[CupID];
if($CupID == '' or $_GET[CupID] == NULL or $MatchID == '' or $_GET[ID] == NULL){
echo 'Error';
exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Results</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
	<meta name="author" content="Muhammad Usman">

	<!-- The styles -->
	<link id="bs-css" href="css/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/charisma-app.css" rel="stylesheet">
	<link href="css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='css/fullcalendar.css' rel='stylesheet'>
	<link href='css/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='css/chosen.css' rel='stylesheet'>
	<link href='css/uniform.default.css' rel='stylesheet'>
	<link href='css/colorbox.css' rel='stylesheet'>
	<link href='css/jquery.cleditor.css' rel='stylesheet'>
	<link href='css/jquery.noty.css' rel='stylesheet'>
	<link href='css/noty_theme_default.css' rel='stylesheet'>
	<link href='css/elfinder.min.css' rel='stylesheet'>
	<link href='css/elfinder.theme.css' rel='stylesheet'>
	<link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='css/opa-icons.css' rel='stylesheet'>
	<link href='css/uploadify.css' rel='stylesheet'>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="img/favicon.ico">
		
</head>

<body>
		<!-- topbar starts -->
	<div class="navbar">
		
	</div>
	<!-- topbar ends -->
		<div class="container-fluid">
		<div class="row-fluid">
				
			<!-- left menu starts -->
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
        <? require_once "rightmenu.php"; ?>
					
				</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu ends -->
			
                <div id="content" class="span10">
                <!-- content starts -->
                
<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i>
						<?
                        $GetCup = mysql_query("SELECT cup.CupID, cup.Name, cup.Start, cup.End FROM cup where cup.CupID = $CupID");
                        $GetCupFetch = mysql_fetch_array($GetCup);
                        echo $GetCupFetch[Name].' - Cards';
                        ?>
                        </h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
					  <div class="row-fluid sortable">		
  <div class="box span12">
<div class="box-header well" data-original-title>
<h2><i class="icon-user"></i> Cards</h2>
</div>
<div class="box-content">
<table class="table table-striped table-bordered  ">
<thead>
<tr>
<th width="32%">Player Name</th>
<th width="20%">Player Number</th>
<th width="14%">Card</th>
<th width="14%">Time</th>
</tr>
</thead>   
<tbody>
<?
$GetMatchCard = mysql_query("
SELECT match_card.MatchCardID AS MatchCardID,
       match_card.MatchID AS MatchID,
       match_card.PlayerID AS PlayerID,
       player.PlayerName AS PlayerName,
       player.PlayerNum AS PlayerNum,
       match_card.CardTime AS CardTime,
       match_card.Type AS Type,
       card_type.CardType AS CardName
  FROM (cup.match_card match_card
        INNER JOIN cup.card_type card_type
           ON (match_card.Type = card_type.CardID))
       INNER JOIN cup.player player
          ON (match_card.PlayerID = player.PlayerID)
 WHERE match_card.MatchID = $MatchID
");
while($GetMatchCardFetch = mysql_fetch_array($GetMatchCard)){
?>
    <tr>
    <td class="center"><? echo $GetMatchCardFetch[PlayerName]; ?></td>
    <td class="center"><? echo $GetMatchCardFetch[PlayerNum]; ?></td>
    <td class="center"><? echo $GetMatchCardFetch[CardName]; ?></td>
    <td class="center"><? echo $GetMatchCardFetch[CardTime]; ?></td>
    </tr>
<? } ?>
</tbody>
</table>            
</div>
</div><!--/span-->

</div>
             
             
             <div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i>
						<?
                        $GetCup = mysql_query("SELECT cup.CupID, cup.Name, cup.Start, cup.End FROM cup where cup.CupID = $CupID");
                        $GetCupFetch = mysql_fetch_array($GetCup);
                        echo $GetCupFetch[Name].' - Goals';
                        ?>
                        </h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div> <br><br>
					<div class="row-fluid sortable">		
  <div class="box span12">
<div class="box-header well" data-original-title>
<h2><i class="icon-user"></i> Goals</h2>
</div>
<div class="box-content">
<table class="table table-striped table-bordered  ">
<thead>
<tr>
<th width="32%">Player Name</th>
<th width="20%">Player Number</th>
<th width="14%">Goal</th>
<th width="14%">Time</th>
</tr>
</thead>   
<tbody>
<?
$GetMatchGoal = mysql_query("
SELECT match_goal.MatchGoalID AS MatchGoalID,
       match_goal.MatchID AS MatchID,
       player.PlayerID AS PlayerID,
       player.PlayerName AS PlayerName,
       player.PlayerNum AS PlayerNumber,
       match_goal.GoalTime AS GoalTime
  FROM cup.match_goal match_goal
       INNER JOIN cup.player player
          ON (match_goal.PlayerID = player.PlayerID)
 WHERE match_goal.MatchID = $MatchID
");
while($GetMatchGoalFetch = mysql_fetch_array($GetMatchGoal)){
?>
    <tr>
    <td class="center"><? echo $GetMatchGoalFetch[PlayerName]; ?></td>
    <td class="center"><? echo $GetMatchGoalFetch[PlayerNumber]; ?></td>
    <td class="center"><? echo '1'; ?></td>
    <td class="center"><? echo $GetMatchGoalFetch[GoalTime]; ?></td>
    </tr>
<? } ?>
</tbody>
</table>            
</div>
</div><!--/span-->

</div>                          
                          
					
					</div>
				</div><!--/span-->
			
			</div>
    
                <!-- content ends -->
                </div>
                
			</div><!--/fluid-row-->
				
		<hr>

	

		<footer>
			<p class="pull-left">&copy; <a href="#">Osman Ahmed</a> 2015</p>
			<p class="pull-right">Powered by: <a href="#">Splash</a></p>
		</footer>
		
	</div><!--/.fluid-container-->

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- jQuery -->
	<script src="js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
	<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
	<script src="js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="js/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="js/bootstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="js/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="js/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="js/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src='js/fullcalendar.min.js'></script>
	<!-- data table plugin -->
	<script src='js/jquery.dataTables.min.js'></script>

	<!-- chart libraries start -->
	<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.min.js"></script>
	<script src="js/jquery.flot.pie.min.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="js/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
	<script src="js/charisma.js"></script>
	
		
</body>
</html>
