<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (!isset($_POST['uname']) || empty($_POST['uname'])){
		exit(0);
	}
	if (!isset($_POST['pwd']) || empty($_POST['pwd'])){
		exit(0);
	}
		if (!isset($_POST['fname']) || empty($_POST['fname'])){
		exit(0);
	}
	if (!isset($_POST['cpwd']) || empty($_POST['cpwd'])){
		exit(0);
	}
		if (!isset($_POST['fname']) || empty($_POST['fname'])){
		exit(0);
	}
	if (!isset($_POST['lname']) || empty($_POST['lname'])){
		exit(0);
	}
		if (!isset($_POST['age']) || empty($_POST['age'])){
		exit(0);
	}
	if (!isset($_POST['type']) || empty($_POST['type'])){
		exit(0);
	}
	if (!isset($_POST['nick']) || empty($_POST['nick'])){
		exit(0);
	}


	$uname = $_POST['uname'];
	$pwd = $_POST['pwd'];
	$cpwd=$_POST['cpwd'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$age = $_POST['age'];
	$type = $_POST['type'];
	$nick = $_POST['nick'];

	if($pwd === $cpwd)
	{
	

	$conn = new mysqli("localhost", "root", "RutgersRah", "mmocrowdgame");
	
	if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
	}

	$sql="SELECT * FROM crowduser  WHERE username='". $uname . "'";
	$result = $conn->query($sql);

	if($result->num_rows >=1)
	{
		$_SESSION["response"] = "Username exists";
		header("Location: http://spanky.rutgers.edu/MMOCrowdEvacGame/");
	}
	else{
	$sql="SELECT * FROM crowduser";
	$result = $conn->query($sql)->num_rows;
	$result=$result+1;
			
	$sql = "INSERT INTO crowduser
	VALUES (" . $result. ",'" . $uname . "', '" . $fname . "','" . $lname . "','" . $pwd . "','" . $age . "','" . $type . "','" . $nick ."')";

	if ($conn->query($sql) === TRUE) {
		$_SESSION["response"] = "Registered";
		mkdir("./user_profiles/" . $result , 0777);
		chmod("./user_profiles/" . $result , 0777);
		header("Location: http://spanky.rutgers.edu/MMOCrowdEvacGame/");
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	}
$conn->close();	
}
else
{
		$_SESSION["response"] = "Password Mismatch";
		header("Location: http://spanky.rutgers.edu/MMOCrowdEvacGame/");
}
}

?>