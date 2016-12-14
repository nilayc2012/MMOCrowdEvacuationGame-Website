<?php
session_start();
	$conn = new mysqli("localhost", "root", "RutgersRah", "mmocrowdgame");
	
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}

	$user_list=array();
	$sql="SELECT * FROM relation where follower=" . $_GET["uid"] ;
	$result = $conn->query($sql);


	if($result->num_rows >=1)
	{
		while ($row = $result->fetch_assoc())
		{ 
			$sql="SELECT * FROM crowduser where uid=" . $row["following"] ;
			$result = $conn->query($sql);
			$row1=$result->fetch_assoc();
			array_push($user_list, "<a href='http://spanky.rutgers.edu/MMOCrowdEvacGame/homepageupdates.php?uid=" . $row["following"] . "'>" . $row1["fname"] . " " . $row1["lname"] . "</a>"); 
		}

		
	}
		$_SESSION["followinglist"]=$user_list;
			

$_SESSION["tab"]="following";

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>