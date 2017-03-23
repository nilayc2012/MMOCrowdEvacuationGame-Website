<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

	$gid = $_GET['gid'];
	$gname = $_GET['gname'];
	$owner=$_GET['owner'];

	$user_url="http://spanky.rutgers.edu/MMOCrowdEvacGame/report_page.php?gid=" . $gid . "&gname=" . $gname . "&owner=" . $owner;

	$conn = mysqli_connect("localhost", "root", "RutgersRah", "mmocrowdgame");
	
	if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
	}

	$sql="SELECT * FROM report where gameid='".$gid."'";
	$result = $conn->query($sql);
	
	if($result->num_rows >=1)
	{
		while ($row = $result->fetch_assoc())
		{ 
			if($row["startpos"]==='y')
			{
				$user_url= $user_url . $row["gameid"]
			}
			elseif($row["startpos"]==='y')
			{
			
			}
			elseif($row["startpos"]==='y')
			{
			
			}
			elseif($row["startpos"]==='y')
			{
			
			}
			elseif($row["startpos"]==='y')
			{
			
			}
			elseif($row["startpos"]==='y')
			{
			
			}
			elseif($row["startpos"]==='y')
			{
			
			}

			 . "," . $row1["gamename"] . "," . $row1["gamenvid"] . "," .$row1["gameruleid"] . "," . $row1["gameoverid"] . "," . $row1["diffid"] . "," . $row1["ctypeid"] . "," . $row1["minplayers"] . "," . $row1["maxplayers"] . "," . $row1["owner"] . "," . $row1["game_desc"] . "~"; 
		}

		
	}

header('Location: ' . $_SERVER['HTTP_REFERER']);


$conn->close();	


}

?>