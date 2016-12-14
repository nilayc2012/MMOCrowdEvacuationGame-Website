<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>MMO Arcade</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <h1><a style="text-decoration:none; color: #000000" href='http://spanky.rutgers.edu/MMOCrowdEvacGame/'>MMOArcade</a> <small>The World of Gamers</small></h1>
<div id="searchdiv1">
<form action="http://spanky.rutgers.edu/MMOCrowdEvacGame/profile.php" method="get">

        <button class="btn btn-default" id="buttonstyle" type="submit">Home</button>

</div>
<div class="center-div" id="userlistupdate">
<?php 

if(count($_SESSION["userlist"])!=0){

foreach ($_SESSION["userlist"] as $value)
{?>
<div class="center-div" id="update"><?php echo $value ?>
</div>
<?php
}}
else
{?>
<div class="center-div" id="update"><span style="color:#000000;">No Matching User Found</span>
</div>
<?php
}
?>
</div>

    <script src="js/index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
