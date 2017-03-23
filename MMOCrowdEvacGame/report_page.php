<?php
// Start the session
session_start();

?>



<!DOCTYPE html>
<html>
  <head>
  
    <meta charset="utf-8">
		
		<title>MMO Arcade</title>

		<!-- description text that displays below the link in google search results -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<meta name="description" content="Description of site" /> 
      <link rel="stylesheet" href="css/style1.css">

<link rel="stylesheet" href="css/bootstrap-dialog.min.css">
<link rel="stylesheet" href="css/bootstrap-dialog.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	</head>
	
	<body>

  <div class="top"><h1><a style="text-decoration:none; color: #000000" href='http://spanky.rutgers.edu/MMOCrowdEvacGame/'>MMOArcade</a> <small>The World of Gamers</small></h1></div>
<div id="searchdiv1">
<form action="http://spanky.rutgers.edu/MMOCrowdEvacGame/profile.php" method="get">

        <button class="btn btn-default" id="buttonstyle" type="submit">Home</button>

</div>
		
		<section class="page-wrap">

	
			<header> <!-- Defining the header section of the page with the appropriate tag -->
				
				<div>
					<h1><?php echo $_GET["gname"] ?></h1>
					<p>Created By <?php echo $_GET["owner"] ?></p>
				</div>

			</header>

	  
			<article id="block1" class="module-block">
			
			<h2>Description</h2>
				

				<p><?php echo $_GET["gdesc"] ?></p>

				<h4>Number of Current User</h4>
				

				<p><?php echo $_GET["numuser"] ?></p>

				<h4>Game Style</h4>
				

				<p><?php echo $_GET["gamerule"] ?></p>

				<h4>Game Over Strategy</h4>
				

				<p><?php echo $_GET["gameover"] ?></p>

				<h4>Game Difficulty</h4>
				

				<p><?php echo $_GET["diff"] ?></p>

				<h4>Game Competition Type</h4>
				

				<p><?php echo $_GET["ctype"] ?></p>


				<h4>Minimum Number Of Players</h4>
				

				<p><?php echo $_GET["minp"] ?></p>
				<h4>Maximum Number Of Players</h4>
				

				<p><?php echo $_GET["maxp"] ?></p>


<?php
$_SESSION['gid']= $_GET['gid'];

if($_SESSION["type"]==="surveyor")
{?>
				        <div class="container">
<a href="#" onclick="removeGame(<?php echo $_GET['gid'] ?> )" class="btn btn-info" role="button">Remove The Game</a>
</div>
<?php
}
else
{
if(isset($_SESSION["game" . $_GET['gid']]))
{
?>
				        <div class="container">
<a href="#" onclick="removeGame1(<?php echo $_GET['gid'] ?> )" class="btn btn-info" role="button">Remove The Game</a>
</div>
<?php
}
else
{?>
				        <div class="container">
<a href="http://spanky.rutgers.edu/MMOCrowdEvacGame/addusergame.php" class="btn btn-info" role="button">Add The Game</a>
</div>
<?php
}}
?>
			</section>


	


    <script src="js/index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="js/bootstrap-dialog.min.js"></script>
<script src="js/bootstrap-dialog.js"></script>
<script src="js/index.js"></script>
<?php 
if ( $_SESSION["game-response"]==="deleted")
{
$_SESSION["game-response"]="";
?>
<script>
BootstrapDialog.alert('Game Deleted');
window.location = " http://spanky.rutgers.edu/MMOCrowdEvacGame/updates.php";
</script>
<?php
}
elseif ( $_SESSION["game-response"]==="cantdelete")
{
$_SESSION["game-response"]="";
?>
<script>
BootstrapDialog.alert('Cannot Delete : The Game is Being Used');
</script>
<?php
}
elseif ( $_SESSION["game-response"]==="notowner")
{
$_SESSION["game-response"]="";
?>
<script>
BootstrapDialog.alert('Cannot Delete : You are not the owner');
</script>
<?php
}
elseif ( $_SESSION["game-response"]==="added")
{
$_SESSION["game-response"]="";
?>
<script>
BootstrapDialog.alert('Game Added to Your Profile. Play on the Desktop application.');
</script>
<?php
}
elseif ( $_SESSION["game-response"]==="deleted")
{
$_SESSION["game-response"]="";
?>
<script>
BootstrapDialog.alert('The Game is removed from Your Profile.');
</script>
<?php
}

?>

	</body>
</html>