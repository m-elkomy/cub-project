<?
@session_start();
require_once("ConnectDB.php");

$CupID = $_GET[ID];
if($CupID == '' or $_GET[ID] == NULL){
echo 'Error';
exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Cup Track - Cup Schdule Manage</title>
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
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.html"> <img alt="Charisma Logo" src="img/logo20.png" /> <span>Charisma</span></a>
				
				<!-- theme selector starts -->
				<div class="btn-group pull-right theme-container" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-tint"></i><span class="hidden-phone"> Change Theme / Skin</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu" id="themes">
						<li><a data-value="classic" href="#"><i class="icon-blank"></i> Classic</a></li>
						<li><a data-value="cerulean" href="#"><i class="icon-blank"></i> Cerulean</a></li>
						<li><a data-value="cyborg" href="#"><i class="icon-blank"></i> Cyborg</a></li>
						<li><a data-value="redy" href="#"><i class="icon-blank"></i> Redy</a></li>
						<li><a data-value="journal" href="#"><i class="icon-blank"></i> Journal</a></li>
						<li><a data-value="simplex" href="#"><i class="icon-blank"></i> Simplex</a></li>
						<li><a data-value="slate" href="#"><i class="icon-blank"></i> Slate</a></li>
						<li><a data-value="spacelab" href="#"><i class="icon-blank"></i> Spacelab</a></li>
						<li><a data-value="united" href="#"><i class="icon-blank"></i> United</a></li>
					</ul>
				</div>
				<!-- theme selector ends -->
				
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"> admin</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#">Profile</a></li>
						<li class="divider"></li>
						<li><a href="login.html">Logout</a></li>
					</ul>
				</div>
				<!-- user dropdown ends -->
				
				<div class="top-nav nav-collapse">
					<ul class="nav">
						<li><a href="#">Visit Site</a></li>
						<li>
							<form class="navbar-search pull-left">
								<input placeholder="Search" class="search-query span2" name="query" type="text">
							</form>
						</li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
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
<h2><i class="icon-user"></i> Cup Schdule</h2>
<div class="box-icon">
<a href="AddMatch.php?ID=<? echo $CupID; ?>" class="btn btn-round"><i class="icon-cog"></i></a>
<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
</div>
</div>
<div class="box-content">
<table class="table table-striped table-bordered bootstrap-datatable datatable">
<thead>
<tr>
<th width="8%">Match ID</th>
<th width="12%">Cup Name</th>
<th width="10%">Home Team</th>
<th width="10%">Away Team</th>
<th width="13%">Match Date</th>
<th width="15%">Staduim</th>
<th width="7%">Round</th>
<th width="25%">Actions</th>
</tr>
</thead>   
<tbody>
<?
$GetCupSchdule = mysql_query("SELECT cup_schdule.ID AS MatchID,
       cup_schdule.CupID AS CupID,
       cup.Name AS CupName,
       cup_schdule.Team1ID AS Team1ID,
       team.Name AS Team1Name,
       cup_schdule.Team2ID AS Team2ID,
       team_1.Name AS Team2Name,
       cup_schdule.MatchDate AS MatchDate,
       cup_schdule.StaduimID AS StaduimID,
       staduim.Name AS StaduimName,
       cup_schdule.Round AS CupRound
  FROM (((cup_schdule cup_schdule
          INNER JOIN team team_1 ON (cup_schdule.Team2ID = team_1.TeamID))
         INNER JOIN cup cup ON (cup_schdule.CupID = cup.CupID))
        INNER JOIN team team ON (cup_schdule.Team1ID = team.TeamID))
       INNER JOIN staduim staduim
          ON (cup_schdule.StaduimID = staduim.StaduimID)
where cup_schdule.CupID = '$CupID'
ORDER BY MatchDate ASC");
while($GetCupSchduleFetch = mysql_fetch_array($GetCupSchdule)){
?>
    <tr>
    <td><? echo $GetCupSchduleFetch[MatchID]; ?></td>
    <td class="center"><? echo $GetCupSchduleFetch[CupName]; ?></td>
    <td class="center"><? echo $GetCupSchduleFetch[Team1Name]; ?></td>
    <td class="center"><? echo $GetCupSchduleFetch[Team2Name]; ?></td>
    <td class="center"><? echo $GetCupSchduleFetch[MatchDate]; ?></td>
    <td class="center"><? echo $GetCupSchduleFetch[StaduimName]; ?></td>
    <td class="center"><? echo $GetCupSchduleFetch[CupRound]; ?></td>
    <td class="center">
      <a class="btn btn-info" href="MatchEdit.php?ID=<? echo $GetCupSchduleFetch[MatchID]; ?>"><i class="icon-edit icon-white"></i>Edit</a>
      <a class="btn btn-danger" href="MatchDelete.php?ID=<? echo $GetCupSchduleFetch[MatchID]; ?>&CupID=<? echo $CupID; ?>"><i class="icon-trash icon-white"></i>Delete</a>
      
<a class="btn btn-success" href="Results.php?ID=<? echo $GetCupSchduleFetch[MatchID]; ?>&CupID=<? echo $CupID; ?>"><i class="icon-pencil icon-white"></i> Results</a>

    </td>
    </tr>
<? } ?>

<!-- <tr>
<td>Brown Blue</td>
<td class="center">2012/03/01</td>
<td class="center">Member</td>
<td class="center">
<span class="label label-warning">Pending</span>
</td>
<td class="center">
<a class="btn btn-success" href="#">
<i class="icon-zoom-in icon-white"></i>  
View                                            
</a>
<a class="btn btn-info" href="#">
<i class="icon-edit icon-white"></i>  
Edit                                            
</a>
<a class="btn btn-danger" href="#">
<i class="icon-trash icon-white"></i> 
Delete
</a>
</td>
</tr>
<tr>
<td>Worth Name</td>
<td class="center">2012/03/01</td>
<td class="center">Member</td>
<td class="center">
<span class="label label-warning">Pending</span>
</td>
<td class="center">
<a class="btn btn-success" href="#">
<i class="icon-zoom-in icon-white"></i>  
View                                            
</a>
<a class="btn btn-info" href="#">
<i class="icon-edit icon-white"></i>  
Edit                                            
</a>
<a class="btn btn-danger" href="#">
<i class="icon-trash icon-white"></i> 
Delete
</a>
</td>
</tr> -->
</tbody>
</table>            
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
