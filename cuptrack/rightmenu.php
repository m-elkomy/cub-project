<ul class="nav nav-tabs nav-stacked main-menu">
<li class="nav-header hidden-tablet">Cups</li>
<?
$GetCup = mysql_query("SELECT cup.CupID, cup.Name, cup.Start, cup.End FROM cup ORDER BY cup.Name ASC");
while($GetCupFetch = mysql_fetch_array($GetCup)){
?>
<li><a class="ajax-link" href="cupschdule.php?ID=<? echo $GetCupFetch['CupID']; ?>"><i class="icon-arrow-right"></i><span class="hidden-tablet"> <? echo $GetCupFetch['Name']; ?></span></a></li>
<? } ?>
<!--<li><a class="ajax-link" href="cupschdule.php"><i class="icon-font"></i><span class="hidden-tablet"> Cup Schdule</span></a></li>-->
</ul>