<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

	$gid = $_GET['gameid'];


	$conn = mysqli_connect("localhost", "root", "RutgersRah", "mmocrowdgame");
	
	if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
	}
	
	$sql = "select * FROM usergames WHERE gameid=" . $gid;
	$result =$conn->query($sql);

	if($result->num_rows >=1){
		$_SESSION["game-response"] = "cantdelete";
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	else{
	$sql = "select * FROM games WHERE gameid=" . $gid;
	$result =$conn->query($sql);
	$row =$result->fetch_assoc();
	if($_SESSION["userid"]===$row["owner"]){
	$sql = "DELETE FROM games WHERE gameid=" . $gid;

	if ($conn->query($sql) === TRUE) {
		$_SESSION["game-response"] = "deleted";
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	}
	else
	{
		$_SESSION["game-response"] = "notowner";

		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
}
$conn->close();	


}

?>