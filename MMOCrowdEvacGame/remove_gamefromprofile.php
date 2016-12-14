<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

	$gid = $_GET['gameid'];


	$conn = mysqli_connect("localhost", "root", "RutgersRah", "mmocrowdgame");
	
	if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
	}

	$sql = "DELETE FROM usergames WHERE gameid=" . $gid . " and userid=" . $_SESSION["userid"] ;

	if ($conn->query($sql) === TRUE) {
		unset($_SESSION["game". $gid]);
		$_SESSION["game-response"] = "deleted";
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}


$conn->close();	


}

?>