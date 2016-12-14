<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

	$gid = $_SESSION['gid'];
	$uid = $_SESSION['userid'];


	$conn = mysqli_connect("localhost", "root", "RutgersRah", "mmocrowdgame");
	
	if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
	}
	
	$sql = "SELECT * FROM usergames
	where gameid =" . $gid . " and userid=" . $uid;
	$result=$conn->query($sql);
	
	if($result->num_rows>=1)
	{
		$_SESSION["game-response"] = "failed";
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	else
	{
	$sql = "INSERT INTO usergames
	VALUES (" . $uid . "," . $gid .")";

	if ($conn->query($sql) === TRUE) {

	$sql1="SELECT max(updateid) FROM updates";
	$result1 = mysqli_query($conn,$sql1);
	$row1 = mysqli_fetch_array($result1);
	$upid = intval($row1["max(updateid)"])+1;

	$sql1 = "INSERT INTO updates
	VALUES (" . $upid . "," . $uid . ",'started playing'," . $gid . ")";
	$conn->query($sql1);
		$_SESSION["game-response"] = "added";
		$_SESSION["game" . $gid]="added";
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
$conn->close();	


}

?>