<?php
session_start();
	$conn = new mysqli("localhost", "root", "RutgersRah", "mmocrowdgame");
	
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}

	$user_list=array();
	$sql="SELECT * FROM games where live='y'";
	$result = $conn->query($sql);


	if($result->num_rows >=1)
	{
		while ($row = $result->fetch_assoc())
		{ 
				$sql1="SELECT * FROM crowduser where uid=" . $row["owner"];
				$result1 = $conn->query($sql1);
				$row1=$result1->fetch_assoc();
			array_push($user_list, "<a href='http://spanky.rutgers.edu/MMOCrowdEvacGame/gamedata.php?gid=" . $row["gameid"] . "'>" . $row["gamename"] . "</a> created by <a href='http://spanky.rutgers.edu/MMOCrowdEvacGame/homepageupdates.php?uid=" . $row1["uid"] . "'>" . $row1["fname"] . " " . $row1["lname"] . "</a>"); 
		}

		
	}
		$_SESSION["livegameslist"]=$user_list;
			

$_SESSION["tab"]="livegames";

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>