<?php
session_start();
	$conn = new mysqli("localhost", "root", "RutgersRah", "mmocrowdgame");
	
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}

	$user_list=array();
	$sql="SELECT * FROM usergames where userid=" . $_GET["uid"] ;
	$result = $conn->query($sql);


	if($result->num_rows >=1)
	{
		while ($row = $result->fetch_assoc())
		{ 
			$sql1="SELECT * FROM games where gameid=" . $row["gameid"] ;
			$result1 = $conn->query($sql1);
			$row1 = $result1->fetch_assoc();
			array_push($user_list, "<a href='http://spanky.rutgers.edu/MMOCrowdEvacGame/gamedata.php?gid=" . $row["gameid"] . "'>" . $row1["gamename"] . "</a>"); 
		}

		
	}
		$_SESSION["usergamelist"]=$user_list;
			

$_SESSION["tab"]="games";

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>