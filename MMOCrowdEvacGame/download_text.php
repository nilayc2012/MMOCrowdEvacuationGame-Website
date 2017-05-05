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
				
				$totalstring="";
				while($row1=$result->fetch_assoc())
				{
					$totalstring=$totalstring . "userdetails," . $row1["gameid"] ."," . $row1["gameplayid"] . "," . $row1["playerid"] . "," . $gname . "," . $row1["score"] . "," . $row1["scoretype"] . "," . $row1["goaltype"] ."," . $row1["scorertype"] . "~";

					$goaldata=file_get_contents("./position_data/goals/". $row1['gameplayid'] . ".txt");
					$totalstring=$totalstring . $goaldata;

					$pathdata=file_get_contents("./position_data/paths/". $row1['gameplayid'] . "/" . $row1['playerid'] . ".txt");
					
					$totalstring=$totalstring . $pathdata;
					$totalstring=substr($totalstring, 0, -1);
					$totalstring=$totalstring . "#";
					
				}


				$temp_file = tempnam("/tmp", "GameData.txt");

				$handle = fopen($temp_file, "w");
				fwrite($handle, $totalstring);
				fclose($handle);

    				header('Content-Description: File Transfer');
    				header('Content-Type: application/octet-stream');
    				header('Content-Disposition: attachment; filename="GameData.txt"');
    				header('Expires: 0');
    				header('Cache-Control: must-revalidate');
    				header('Pragma: public');
    				header('Content-Length: ' . filesize($temp_file));
    				readfile($temp_file);
				unlink($temp_file);

			}
			else
			{
				$_SESSION['report-load-response']="failed";
			}

	}

//header('Location: http://spanky.rutgers.edu/MMOCrowdEvacGame/report_page.php?gid=' . $gid . '&gname=' . $gname . '&owner=' . $owner . '&gameplayid=' . $row1["gameplayid"] . '&playerid=' . $row1["playerid"]);


$conn->close();	


}

?>