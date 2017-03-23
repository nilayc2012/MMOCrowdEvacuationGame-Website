<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$gid = $_POST['game-id'];
	$gpid = $_POST['gameplay-id'];
	$gname = $_POST['game-name'];
	$ownid = $_POST['owner-id'];
	$pid=$_POST['userid'];
	$score = $_POST['score'];
	$stype = $_POST['stype'];
	$gtype = $_POST['gtype'];
	$scrtype = $_POST['scrtype'];
	

	$conn = mysqli_connect("localhost", "root", "RutgersRah", "mmocrowdgame");
	
	if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
	}
	
	$sql = "INSERT INTO gameplay
	VALUES (" . $gid . "," . $gpid . ",'" . $gname . "', '" . $ownid . "','" . $pid . "','" . $score . "','" . $stype . "','" . $gtype . "','" . $scrtype ."')";

	if ($conn->query($sql) === TRUE) {

		echo $gameplayid;
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

$conn->close();	


}

?>