<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

	$gid = $_GET['gameid'];
	$gname = $_GET['gname'];
	$owner=$_GET['owner'];


	$conn = mysqli_connect("localhost", "root", "RutgersRah", "mmocrowdgame");
	
	if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
	}

	$sql="SELECT * FROM report where gameid='".$gid."'";
	$result = $conn->query($sql);
	$report_list=array();	

	if($result->num_rows >=1)
	{
		$row = $result->fetch_assoc();

		$sql="SELECT gameid,gameplayid,playerid";

			if($row["startpos"]==='y')
			{
				
			}
			if($row["endpos"]==='y')
			{
			
			}
			if($row["score"]==='y')
			{
				$sql=$sql . ",score";
			}
			if($row["scoretype"]==='y')
			{
				$sql=$sql . ",scoretype";
			}
			if($row["scorertype"]==='y')
			{
				$sql=$sql . ",scorertype";
			}
			if($row["pathpoints"]==='y')
			{
			
			}
			if($row["goaltype"]==='y')
			{
				$sql=$sql . ",goaltype";
			}
			if($row["goalpos"]==='y')
			{
				
			}
			
			$sql= $sql . " from gameplay where gameid='" . $gid . "'"; 
			$result = $conn->query($sql);
			if($result->num_rows >=1)
			{
				while($row1=$result->fetch_assoc())
				{
					array_push($report_list,"<tr><td>" . $row1["gameid"] . "</td><td>" . $row1["gameplayid"] . "</td><td>" . $row1["playerid"] . "</td><td>" . $gname . "</td><td>" . $row1["score"] . "</td><td>" . $row1["scoretype"]. "</td><td>" . $row1["goaltype"]. "</td><td>" . $row1["scorertype"] . "</td><td><a href='http://spanky.rutgers.edu/MMOCrowdEvacGame/position_data/goals/" . $row1["gameplayid"] . ".txt' >Goals</a></td><td><a href='http://spanky.rutgers.edu/MMOCrowdEvacGame/position_data/paths/" . $row1["gameplayid"] . "/" . $row1["playerid"] . ".txt'>Points</a></td></tr>");		
				}
				
				$_SESSION["report_list"]=$report_list;
			}
			else
			{
				$_SESSION['report-load-response']="failed";
			}

	}

header('Location: http://spanky.rutgers.edu/MMOCrowdEvacGame/report_page.php?gid=' . $gid . '&gname=' . $gname . '&owner=' . $owner . '&gameplayid=' . $row1["gameplayid"] . '&playerid=' . $row1["playerid"]);


$conn->close();	


}

?>