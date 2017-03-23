<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (!isset($_POST['gameplayid']) || empty($_POST['gameplayid'])) {
		exit(0);
	}
	if (!isset($_POST['querystring']) || empty($_POST['querystring'])){
		exit(0);
	}
	
	$gpid=$_POST['gameplayid'];
	$content = $_POST["querystring"];

	$newfile = fopen("./position_data/goals/". $gpid . ".txt", "w");
	fwrite($newfile,$content);
	fclose($newfile);
echo "pass1";
}
?>