<?php
session_start();
	$conn = new mysqli("localhost", "root", "RutgersRah", "mmocrowdgame");
	

	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}

	$update_list=array();
	$sql="SELECT * FROM updates";
	$result = $conn->query($sql);

	if($result->num_rows >=1)
	{
		while ($row = $result->fetch_assoc())
		{ 

			$sql1="SELECT * FROM crowduser where uid =" . $row["userid"];
			$result1 = $conn->query($sql1);
			$row1 = $result1->fetch_assoc();

			if($row1["type"]=="gamer")
			{
				$sql3="SELECT * FROM relation where following =" . $row["userid"] . " and follower =" . $_SESSION["userid"] ;
				$result3 = $conn->query($sql3);
				$row3 = $result3->fetch_assoc();
				if($result3->num_rows <1)
				{
					continue;
				}
			
			}
			$sql2="SELECT * FROM games where gameid=" . $row["gameid"];
			$result2 = $conn->query($sql2);
			
	if($result2->num_rows >=1){
			$row2 = $result2->fetch_assoc();
			array_push($update_list, "<a href='http://spanky.rutgers.edu/MMOCrowdEvacGame/homepageupdates.php?uid=" . $row["userid"] . "'>" . $row1["fname"] . " " . $row1["lname"] . "</a>" . " " . $row["action"] . " " . "<a href='http://spanky.rutgers.edu/MMOCrowdEvacGame/gamedata.php?gid=" . $row["gameid"] . "'>" . $row2["gamename"] . "</a>");
			}
			$fresh=True;
		}
		$_SESSION["update"]=$update_list;

		
	}

	$gamrule_list=array();
	$sql="SELECT * FROM gamerule";
	$result = $conn->query($sql);

	if($result->num_rows >=1)
	{
		while ($row = $result->fetch_assoc())
		{ 

			array_push($gamrule_list, $row["gamerulename"]);

		}
		$_SESSION["gamerulelist"]=$gamrule_list;

		
	}

	$gamover_list=array();
	$sql="SELECT * FROM gameoverstrategy";
	$result = $conn->query($sql);

	if($result->num_rows >=1)
	{
		while ($row = $result->fetch_assoc())
		{ 

			array_push($gamover_list, $row["gameovername"]);

		}
		$_SESSION["gameoverlist"]=$gamover_list;

		
	}

	$diff_list=array();
	$sql="SELECT * FROM difficulty";
	$result = $conn->query($sql);

	if($result->num_rows >=1)
	{
		while ($row = $result->fetch_assoc())
		{ 

			array_push($diff_list, $row["diffname"]);

		}
		$_SESSION["difflist"]=$diff_list;

		
	}

	$ctype_list=array();
	$sql="SELECT * FROM competition_type";
	$result = $conn->query($sql);

	if($result->num_rows >=1)
	{
		while ($row = $result->fetch_assoc())
		{ 

			array_push($ctype_list, $row["ctypename"]);

		}
		$_SESSION["ctypelist"]=$ctype_list;

		
	}

$_SESSION["tab"]="liveupdate";
	header("Location: http://spanky.rutgers.edu/MMOCrowdEvacGame/profile.php");


?>