<?php
session_start();
	$conn = new mysqli("localhost", "root", "RutgersRah", "mmocrowdgame");
	
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}

	$update_list=array();
	$sql="SELECT * FROM updates where userid=" . $_GET["uid"];
	$result = $conn->query($sql);
	$row1=NULL;
	$row=NULL;
	$row2=NULL;	

	if($result->num_rows >=1)
	{
		while ($row = $result->fetch_assoc())
		{ 
			$sql1="SELECT * FROM crowduser where uid =" . $row["userid"];
			$result1 = $conn->query($sql1);
			$row1 = $result1->fetch_assoc();

			$sql2="SELECT * FROM games where gameid=" . $row["gameid"];
			$result2 = $conn->query($sql2);
			if($result2->num_rows >= 1){
			$row2 = $result2->fetch_assoc();
			array_push($update_list, "<a href='http://spanky.rutgers.edu/MMOCrowdEvacGame/homepageupdates.php?uid=" . $row["userid"] . "'>" . $row1["fname"] . " " . $row1["lname"] . "</a>" . " " . $row["action"] . " " . "<a href='http://spanky.rutgers.edu/MMOCrowdEvacGame/gamedata.php?gid=" . $row["gameid"] . "'>" . $row2["gamename"] . "</a>");
		}
		}
		$_SESSION["userupdate"]=$update_list;

		
	}
			$sql1="SELECT * FROM crowduser where uid =" . $_GET["uid"];
			$result1 = $conn->query($sql1);
			$row1 = $result1->fetch_assoc();
			
			$sql2="SELECT * FROM relation where following=" . $_GET["uid"] . " and follower= " . $_SESSION["userid"] ;
			$result2 = $conn->query($sql2);

			if($result2->num_rows >=1)
			{
				$_SESSION["follow_status"]="y";
			}
			else
			{
				$_SESSION["follow_status"]="n";
			}
	
$_SESSION["tab"]="liveupdate";
header('Location: http://spanky.rutgers.edu/MMOCrowdEvacGame/homepage.php?uid=' . $row1["uid"] . '&fname=' . $row1["fname"] . '&lname=' . $row1["lname"] . '&nick=' . $row1["nickname"] . '&type=' . $row1["type"]);

?>