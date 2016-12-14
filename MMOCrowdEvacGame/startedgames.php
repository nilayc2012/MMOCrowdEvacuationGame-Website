<?php
session_start();
	$conn = new mysqli("localhost", "root", "RutgersRah", "mmocrowdgame");
	
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}

	$user_list=array();
	$sql="SELECT * FROM games where owner=" . $_GET["uid"] ;
	$result = $conn->query($sql);


	if($result->num_rows >=1)
	{
		while ($row = $result->fetch_assoc())
		{ 
			array_push($user_list, "<a href='http://spanky.rutgers.edu/MMOCrowdEvacGame/gamedata.php?gid=" . $row["gameid"] . "'>" . $row["gamename"] . "</a>"); 
		}

		
	}
		$_SESSION["gamelist"]=$user_list;
			

$_SESSION["tab"]="started";

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>