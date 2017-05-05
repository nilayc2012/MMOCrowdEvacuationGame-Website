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
      <link rel="stylesheet" href="css/style2.css">

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
			
			

</table>	

<section>
  <!--for demo wrap-->
 <h2>Report Details</h2>
<span style="position:absolute; top:330px; left:950px;" class="container">
<a href="#" onclick="downloadData('<?php echo $_GET['gid'] ?>','<?php echo $_GET['gname'] ?>','<?php echo $_GET['owner'] ?>' )" class="btn btn-info" style ="background-color: green;"role="button">Download Data</a>
</span>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
<th>Game ID</th><th>Game Play ID</th><th>Player ID</th><th>Game Name</th><th>Score</th><th>Score Type</th><th>Goal Type</th><th>Scorer Type</th><th>Goal Positions</th><th>Player Positions</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
<?php 
if(count($_SESSION["report_list"])!=0){
?>
<table>
<?php
foreach ($_SESSION["report_list"] as $value)
{?>
<?php echo $value ?>
<?php
}}
?>
      </tbody>
    </table>
  </div>
</section>

	


    <script src="js/index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="js/bootstrap-dialog.min.js"></script>
<script src="js/bootstrap-dialog.js"></script>
<script src="js/index.js"></script>

<?php 
if( $_SESSION["report-load-response"]==="failed")
{
$_SESSION["report-load-response"]="";
?>
<script>
BootstrapDialog.alert('No Game Data');
</script>
<?php
}
?>
	</body>
</html>