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

		$sql5="SELECT * FROM gameoverstrategy where gameoverid=" . $row["gameoverid"];
		$result5 = $conn->query($sql5);
		$row5 = $result5->fetch_assoc();

		$sql6="SELECT * FROM difficulty where diffid=" . $row["diffid"];
		$result6 = $conn->query($sql6);
		$row6 = $result6->fetch_assoc();

		$sql7="SELECT * FROM competition_type where ctypeid=" . $row["ctypeid"];
		$result7 = $conn->query($sql7);
		$row7 = $result7->fetch_assoc();

		$sql3="SELECT * FROM crowduser where uid=" . $row["owner"];
		$result3 = $conn->query($sql3);
		$row3 = $result3->fetch_assoc();

		$sql8="SELECT * FROM usergames where gameid=" . $_GET["gid"];
		$result8 = $conn->query($sql8);

		$sql4="SELECT * FROM usergames where userid=" . $_SESSION["userid"] . " and gameid=" . $_GET["gid"];
		$result4 = $conn->query($sql4);
		if($result4->num_rows >= 1)
		{
			$_SESSION["game".$_GET["gid"]]="added";
		}

		$_SESSION["game-live"]=$row["live"];
		header('Location: http://spanky.rutgers.edu/MMOCrowdEvacGame/gameprofile.php?gid=' . $row["gameid"] . '&ownid=' . $row["owner"] . '&gname=' . $row["gamename"] . '&numuser=' . $result8->num_rows . '&gdesc=' . $row["game_desc"] . '&gamerule=' . $row1["gamerulename"] . '&gameover=' . $row5["gameovername"] . '&diff=' . $row6["diffname"] . '&ctype=' . $row7["ctypename"] . '&minp=' . $row["minplayers"] . '&maxp=' . $row["maxplayers"] . '&owner=' . $row3["fname"] . $row3["lname"]);
		
	}
			




?>