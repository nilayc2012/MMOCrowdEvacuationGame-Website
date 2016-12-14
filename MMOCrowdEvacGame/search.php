<?php
session_start();
	$conn = new mysqli("localhost", "root", "RutgersRah", "mmocrowdgame");
	
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}

	$user_list=array();
	$sql="SELECT * FROM crowduser" ;
	$result = $conn->query($sql);

	if($result->num_rows >=1)
	{
		while ($row = $result->fetch_assoc())
		{ 
			if(strpos(strtolower($row["fname"] . " " . $row["lname"]),strtolower($_GET["srch-term"]))!==false)
			{

				array_push($user_list, "<a href='http://spanky.rutgers.edu/MMOCrowdEvacGame/homepageupdates.php?uid=" . $row["uid"] . "'>" . $row["fname"] . " " . $row["lname"] . "</a>"); 
			}


		}
		$_SESSION["userlist"]=$user_list;

		
	}



header('Location: http://spanky.rutgers.edu/MMOCrowdEvacGame/userlist.php');

?>