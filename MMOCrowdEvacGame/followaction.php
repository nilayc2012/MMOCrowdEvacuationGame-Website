<?php
session_start();
	$conn = new mysqli("localhost", "root", "RutgersRah", "mmocrowdgame");
	
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}

	$sql1="SELECT * FROM relation where following =" . $_GET["uid"] . " and follower=" . $_SESSION["userid"];
	$result1 = $conn->query($sql1);

	if($result1->num_rows <1){
	$sql = "INSERT INTO relation
	VALUES (" . $_GET["uid"]. ",'" . $_SESSION["userid"] ."')";

	$row1=NULL;

	$conn->query($sql);
	}
	

			$sql1="SELECT * FROM crowduser where uid =" . $_GET["uid"];
			$result1 = $conn->query($sql1);
			$row1 = $result1->fetch_assoc();
			$_SESSION["follow_status"]="y";

header('Location: http://spanky.rutgers.edu/MMOCrowdEvacGame/homepage.php?uid=' . $row1["uid"] . '&fname=' . $row1["fname"] . '&lname=' . $row1["lname"] . '&nick=' . $row1["nickname"] . '&type=' . $row1["type"]);

?>