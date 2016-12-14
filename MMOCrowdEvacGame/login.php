<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (!isset($_POST['uname']) || empty($_POST['uname'])){
		exit(0);
	}
	if (!isset($_POST['pwd']) || empty($_POST['pwd'])){
		exit(0);
	}


	$uname = $_POST['uname'];
	$pwd = $_POST['pwd'];

	
	$conn = new mysqli("localhost", "root", "RutgersRah", "mmocrowdgame");
	
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}

	$sql="SELECT * FROM crowduser  WHERE username='". $uname . "' and type='gamer'";
	$result = $conn->query($sql);

	if($result->num_rows >=1)
	{
		$row = $result->fetch_assoc();

		if($row["password"] === $pwd)
		{
			echo "pass," . $row["uid"] . "," . $row["fname"] . "," . $row["lname"] . "," . $row["nickname"];
		}
		else{
			echo "wrong pwd";
		}
		
	}
	else
	{
			echo "wrong username";
	}

$conn->close();	

}

?>