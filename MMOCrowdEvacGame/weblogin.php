<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (!isset($_POST['uname']) || empty($_POST['uname'])){
		exit(0);
	}
	if (!isset($_POST['pwd']) || empty($_POST['pwd'])){
		exit(0);
	}
	if (!isset($_POST['type']) || empty($_POST['type'])){
		exit(0);
	}


	$uname = $_POST['uname'];
	$pwd = $_POST['pwd'];
	$type = $_POST['type'];

	
	$conn = new mysqli("localhost", "root", "RutgersRah", "mmocrowdgame");
	
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}

	$sql="SELECT * FROM crowduser  WHERE username='". $uname . "' and type='". $type ."'";
	$result = $conn->query($sql);

	if($result->num_rows >=1)
	{
		$row = $result->fetch_assoc();

		if($row["password"] === $pwd)
		{
			$_SESSION["uname"] = $uname;
			$_SESSION["first"] = $row["fname"];
			$_SESSION["fname"] = $row["fname"] . " " . $row["lname"];
			$_SESSION["userid"] = $row["uid"];
			$_SESSION["type"] = $row["type"];
			$_SESSION["nick"] = $row["nickname"];
			header("Location: http://spanky.rutgers.edu/MMOCrowdEvacGame/updates.php"); 
		}
		else{
			$_SESSION["response"] = "Wrong Password";
			header("Location: http://spanky.rutgers.edu/MMOCrowdEvacGame/"); 
		}
		
	}
	else
	{
			$_SESSION["response"] = "Wrong Username";
			header("Location: http://spanky.rutgers.edu/MMOCrowdEvacGame/"); 
	}

$conn->close();	

}

?>