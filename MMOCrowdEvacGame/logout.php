<?php
session_start();
$uid=$_SESSION["userid"];
session_destroy();

header("Location: http://spanky.rutgers.edu/MMOCrowdEvacGame/openGame.php?task=delete&userid=" . $uid); 
?>