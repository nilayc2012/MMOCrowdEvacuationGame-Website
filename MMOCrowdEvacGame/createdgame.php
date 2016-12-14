<?php
session_start();
			

$_SESSION["tab"]="create";

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>