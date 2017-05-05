<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$gname = $_POST['game-name'];
	$gdsc = $_POST['game-desc'];
	$env=$_POST['env-ch'];
	$rule = $_POST['rule'];
	$minp = $_POST['minp'];
	$maxp = $_POST['maxp'];

	$gameover = $_POST['gameover'];

	$diff = $_POST['diff'];
	$ctype = $_POST['ctype'];

	if($rule==3)
	{
		$gameover=2;
 		$ctype=4;

	}
	if($rule==4)
	{
		$gameover=2;

	}
	if(isset($_POST['pstartpos']))
		$spos=$_POST['pstartpos'];
	else
		$spos='n';

	if(isset($_POST['pendpos']))
		$epos=$_POST['pendpos'];
	else
		$epos='n';

	if(isset($_POST['score']))
		$score=$_POST['score'];
	else
		$score='n';

	if(isset($_POST['scoretype']))
		$stype=$_POST['scoretype'];
	else
		$stype='n';
	if(isset($_POST['scorertype']))
		$scrtype=$_POST['scorertype'];
	else
		$scrtype='n';

	if(isset($_POST['pathpoints']))
		$ppoints=$_POST['pathpoints'];
	else
		$ppoints='n';

	if(isset($_POST['goaltype']))
		$gtype=$_POST['goaltype'];
	else
		$gtype='n';

	if(isset($_POST['goalpos']))
		$gpos=$_POST['goalpos'];
	else
		$gpos='n';

	if($ctype==='1')
	{
		$minp=2;
		$maxp=2;
	}
	else if($ctype==='2')
	{
		$minp=2*$minp;
		$maxp=2*$maxp;
	}
	
	else if($ctype==='4')
	{
		$minp=1;
		$maxp=1;
	}

	$conn = mysqli_connect("localhost", "root", "RutgersRah", "mmocrowdgame");
	
	if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
	}

	$sql="SELECT * FROM games where gamename='".$gname."'";
	$result = mysqli_query($conn,$sql);
	$rowcount=mysqli_num_rows($result);
	
	if($rowcount>0)
	{
		$_SESSION["game-response"] = "failed";
		$_SESSION["tab"]="create";
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

else{
	$sql="SELECT max(gameid) FROM games";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	$gid = intval($row["max(gameid)"])+1;	
	$sql = "INSERT INTO games
	VALUES (" . $gid. ",'" . $gname . "', '" . $env . "','" . $rule . "','" . $minp . "','" . $maxp . "','" . $_SESSION["userid"] . "','" . $gdsc . "','" . $gameover . "','" . $diff . "','" . $ctype ."','y')";

	$sql3 = "INSERT INTO report
	VALUES (" . $gid. ",'" . $spos . "', '" . $epos . "','" . $score . "','" . $stype . "','" . $ppoints . "','" . $gtype . "','" . $gpos . "','" . $scrtype ."')";
	
	if ($conn->query($sql) === TRUE && $conn->query($sql3) === TRUE) {

	$sql1="SELECT max(updateid) FROM updates";
	$result1 = mysqli_query($conn,$sql1);
	$row1 = mysqli_fetch_array($result1);
	$upid = intval($row1["max(updateid)"])+1;

	$sql2 = "INSERT INTO updates
	VALUES (" . $upid . "," . $_SESSION['userid'] . ",'created'," . $gid . ")";
		$conn->query($sql2);
		
		$_SESSION["game-response"] = "created";
		$_SESSION["tab"]="create";
		
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
$conn->close();	


}

?>