<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$gname = $_POST['game-name'];
	$gdsc = $_POST['game-desc'];
	$env=$_POST['env-ch'];
	$rule = $_POST['rule'];
	$minp = $_POST['minp'];
	$maxp = $_POST['maxp'];


	$conn = mysqli_connect("localhost", "root", "RutgersRah", "mmocrowdgame");
	
	if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
	}

	$sql="SELECT max(gameid) FROM games";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	$gid = intval($row["max(gameid)"])+1;	
	$sql = "INSERT INTO games
	VALUES (" . $gid. ",'" . $gname . "', '" . $env . "','" . $rule . "','" . $minp . "','" . $maxp . "','" . $_SESSION["userid"] . "','" . $gdsc ."')";

	if ($conn->query($sql) === TRUE) {

	$sql1="SELECT max(updateid) FROM updates";
	$result1 = mysqli_query($conn,$sql1);
	$row1 = mysqli_fetch_array($result1);
	$upid = intval($row1["max(updateid)"])+1;

	$sql2 = "INSERT INTO updates
	VALUES (" . $upid . "," . $_SESSION['userid'] . ",'created'," . $gid . ")";
		$conn->query($sql2);
		
		$_SESSION["game-response"] = "created";
		$_SESSION["tab"]="create";
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

$conn->close();	


}

?>