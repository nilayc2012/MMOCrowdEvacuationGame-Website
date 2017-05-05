<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

	$gid = $_GET['gameid'];


	$conn = mysqli_connect("localhost", "root", "RutgersRah", "mmocrowdgame");
	
	if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
	}

	$sql = "update games set live='y' WHERE gameid=" . $gid ;

	if ($conn->query($sql) === TRUE) {
		$_SESSION["game-live"] = "y";
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}


$conn->close();	


}

?>