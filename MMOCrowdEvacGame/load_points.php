<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

	$gid = $_GET['gameid'];
	$gname = $_GET['gname'];
	$owner=$_GET['owner'];
	$gpid=$_GET['gameplayid'];
	$ppid=$_GET['playerid'];

$_SESSION["goalfilelink"]="<a href='http://spanky.rutgers.edu/MMOCrowdEvacGame/position_data/goals/" . $gpid. ",txt' >Goals</a>";
$_SESSION["pathfilelink"]="<a href='http://spanky.rutgers.edu/MMOCrowdEvacGame/position_data/paths/" . $gpid . "/" . $ppid ".txt'>Points</a>";


header('Location: http://spanky.rutgers.edu/MMOCrowdEvacGame/report_page.php?gid=' . $gid . '&gname=' . $gname . '&owner=' . $owner);



}

?>