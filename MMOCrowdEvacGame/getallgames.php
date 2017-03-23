<?php
session_start();

$uid=$_POST["uid"];
	$conn = new mysqli("localhost", "root", "RutgersRah", "mmocrowdgame");
	
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}

	$user_list="";
	$sql="SELECT * FROM usergames where userid=" . $uid;
	$result = $conn->query($sql);


	if($result->num_rows >=1)
	{
		while ($row = $result->fetch_assoc())
		{ 
				$sql1="SELECT * FROM games where gameid=" . $row["gameid"];
				$result1 = $conn->query($sql1);
				$row1=$result1->fetch_assoc();
		$data_list=array();
			$user_list= $user_list . $row1["gameid"] . "," . $row1["gamename"] . "," . $row1["gamenvid"] . "," .$row1["gameruleid"] . "," . $row1["gameoverid"] . "," . $row1["diffid"] . "," . $row1["ctypeid"] . "," . $row1["minplayers"] . "," . $row1["maxplayers"] . "," . $row1["owner"] . "," . $row1["game_desc"] . "~"; 
		}

		
	}
		echo trim($user_list,"~");
			

?>