<?php
session_start();

	if($_GET["task"]==="create")
	{
		if (!file_exists("./user_profiles/" . $_SESSION["userid"] . "/currentgame.txt"))	
		{
			$newfile = fopen("./user_profiles/" . $_SESSION["userid"] . "/currentgame.txt", "w");
			$writestring = $_GET["gid"];
			fwrite($newfile,$writestring);
			fclose($newfile);
		}
		else
		{
			file_put_contents("./user_profiles/" . $_SESSION["userid"] . "/currentgame.txt",$_GET["gid"]);
			
		}
	}
	else
	{
		unlink("./user_profiles/" . $_GET["userid"] . "/currentgame.txt");
		header("Location: http://spanky.rutgers.edu/MMOCrowdEvacGame/"); 
	}


?>