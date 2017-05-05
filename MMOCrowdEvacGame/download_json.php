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
				$count=0;
				$temp_list=array();
				while($row1=$result->fetch_assoc())
				{
					$temp=array("gameid" => $row1["gameid"],"gameplayid" => $row1["gameplayid"], "playerid" => $row1["playerid"],"gameName" => $gname,"score" => $row1["score"],"scoretype" => $row1["scoretype"],"goaltype" => $row1["goaltype"],"ScorerType" => $row1["scorertype"] );

					$goaldata=file_get_contents("./position_data/goals/". $row1['gameplayid'] . ".txt");
					$goaldata_array=explode("~",$goaldata);
					
					$border1_array =explode(",",$goaldata_array[0]);
					$border2_array =explode(",",$goaldata_array[1]);
					$border3_array =explode(",",$goaldata_array[2]);
					$border4_array =explode(",",$goaldata_array[3]);
					
					$temp1=array($border1_array[0] => array("x" => $border1_array[1],"y" => $border1_array[2]), $border2_array[0] => array("x" => $border2_array[1],"y" => $border2_array[2]),$border3_array[0] => array("x" => $border3_array[1],"y" => $border3_array[2]),$border4_array[0] => array("x" => $border4_array[1],"y" => $border4_array[2]));
					$temp["borderPoints"] = $temp1;

					$temp1=array();

					for($i=4;$i<count($goaldata_array)-1;$i++)
					{
						$pos_array=explode(",",$goaldata_array[$i]);
						$index=$i-3;
						$temp1["Goalposition" . $index]= array("x" => $pos_array[1],"y" => $pos_array[2]);
					}
					$temp["GoalPositions"] = $temp1;


					$pathdata=file_get_contents("./position_data/paths/". $row1['gameplayid'] . "/" . $row1['playerid'] . ".txt");

					$pathdata_array=explode("~",$pathdata);
					
					$start_array =explode(",",$pathdata_array[4]);
					$end_array =explode(",",$pathdata_array[5]);

					$temp["startposition"] = array("x" => $start_array[1],"y" => $start_array[2]);
					$temp["endposition"] = array("x" => $end_array[1],"y" => $end_array[2]);

					$temp1=array();
					for($i=6;$i<count($pathdata_array)-1;$i++)
					{
						$pos_array=explode(",",$pathdata_array[$i]);
						$index=$i-5;
						$temp1["position" . $index]= array("x" => $pos_array[1],"y" => $pos_array[2]);
					}
					$temp["PathPositions"] = $temp1;

					$temp_list["GamePlayData" . $count]=$temp;
					$count=$count+1;
				}
				$report_list["GamePlayDataCollection"] = $temp_list;
				$json_string= json_encode($report_list);

				$temp_file = tempnam("/tmp", "GameData.json");

				$handle = fopen($temp_file, "w");
				fwrite($handle, $json_string);
				fclose($handle);

    				header('Content-Description: File Transfer');
    				header('Content-Type: application/octet-stream');
    				header('Content-Disposition: attachment; filename="GameData.json"');
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