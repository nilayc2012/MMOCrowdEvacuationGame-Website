<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$conn = new mysqli("localhost", "root", "RutgersRah", "mmocrowdgame");
	
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}

	$datafile=fopen("./user_profiles/" . $_POST["uid"] . "/currentgame.txt", "r");
	$datacount=fread($datafile,filesize("./user_profiles/" . $_POST["uid"] . "/currentgame.txt"));
	fclose($datafile);

	$sql="SELECT * FROM games where gameid=" . $datacount;
	$result = $conn->query($sql);

	$row = $result->fetch_assoc();

	echo $row["gamename"] . "," . $row["gamenvid"] . "," . $row["gameruleid"] . "," . $row["minplayers"] . "," . $row["maxplayers"] . "," . $row["owner"];


}
?>