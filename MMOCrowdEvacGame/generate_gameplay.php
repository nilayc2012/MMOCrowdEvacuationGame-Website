<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	

	$conn = mysqli_connect("localhost", "root", "RutgersRah", "mmocrowdgame");
	
	if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
	}

	$sql="SELECT max(gameplayid) FROM gameplay";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	$gameplayid = intval($row["max(gameplayid)"])+1;	

		echo $gameplayid;


$conn->close();	


}

?>