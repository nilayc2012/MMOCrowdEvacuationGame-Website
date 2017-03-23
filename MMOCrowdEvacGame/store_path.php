<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (!isset($_POST['gameplayid']) || empty($_POST['gameplayid'])) {
		exit(0);
	}
	if (!isset($_POST['userid']) || empty($_POST['userid'])){
		exit(0);
	}
	if (!isset($_POST['querystring']) || empty($_POST['querystring'])){
		exit(0);
	}
	
	$gpid=$_POST['gameplayid'];
	$userid=$_POST['userid'];
	$content = $_POST["querystring"];
	

	mkdir("./position_data/paths/". $gpid , 0777);

	$newfile = fopen("./position_data/paths/". $gpid . "/" . $userid . ".txt", "w");
	fwrite($newfile,$content);
	fclose($newfile);
echo "mypass";
}
?>