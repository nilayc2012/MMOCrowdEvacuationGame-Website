<?php
session_start();
	$conn = new mysqli("localhost", "root", "RutgersRah", "mmocrowdgame");
	
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}


	$sql="SELECT * FROM games where gameid=" . $_GET["gid"];
	$result = $conn->query($sql);

	if($result->num_rows >=1)
	{
		$row = $result->fetch_assoc(); 
		
		$sql2="SELECT * FROM gamerule where gamruleid=" . $row["gameruleid"];
		$result2 = $conn->query($sql2);
		$row1 = $result2->fetch_assoc();

		$sql3="SELECT * FROM crowduser where uid=" . $row["owner"];
		$result3 = $conn->query($sql3);
		$row3 = $result3->fetch_assoc();

		$sql4="SELECT * FROM usergames where userid=" . $_SESSION["userid"] . " and gameid=" . $_GET["gid"];
		$result4 = $conn->query($sql4);
		if($result4->num_rows >= 1)
		{
			$_SESSION["game".$_GET["gid"]]="added";
		}

		header('Location: http://spanky.rutgers.edu/MMOCrowdEvacGame/gameprofile.php?gid=' . $row["gameid"] . '&gname=' . $row["gamename"] . '&gdesc=' . $row["game_desc"] . '&gamerule=' . $row1["gamerulename"] . '&minp=' . $row["minplayers"] . '&maxp=' . $row["maxplayers"] . '&owner=' . $row3["fname"] . $row3["lname"]);
		
	}
			




?>