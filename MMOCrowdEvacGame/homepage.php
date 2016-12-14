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
  <h1><a style="text-decoration:none; color: #000000" href='http://spanky.rutgers.edu/MMOCrowdEvacGame/'>MMOArcade</a> <small>The World of Gamers</small><div class="container">
<div id="searchdiv1">
<form action="http://spanky.rutgers.edu/MMOCrowdEvacGame/updates.php" method="get">

        <button class="btn btn-default" id="buttonstyle" type="submit">Home</button>

</div>
</h1>
<header>
  <figure class="profile-banner">
<?php
	if (!file_exists("./user_profiles/". $_GET['uid'] . "/coverpage.jpg"))	{
?>
<img src="img/default_cover.jpg"  alt="Profile banner" />
<?php
}
else{
?>
 <div class="cover"> 
</span>
 <img src="user_profiles/<?php echo $_GET['uid'] ?>/coverpage.jpg" onmouseover="activateLink();" onmouseout="deactivateLink();" alt="Profile banner"></img>
</div>
<?php
}
?>

  </figure>
<?php
	if (!file_exists("./user_profiles/". $_GET['uid'] . "/profile.jpg"))	{
?>
  <figure class="profile-picture" 
    style="background-image: url('img/profile.jpg')">
  </figure>
<?php
}
else{
?>

  <figure class="profile-picture" 
    style="background-image: url('user_profiles/<?php echo $_GET['uid'] ?>/profile.jpg' )">
  </figure>
<?php
}
?>
  <div class="profile-stats">
    <ul>
      <li><a class = "mainlinks" href="http://spanky.rutgers.edu/MMOCrowdEvacGame/homepageupdates.php?uid=<?php echo $_GET['uid'] ?>"><span class="mainlinks1">Updates</span></a></li>
<?php if($_GET['type']==="gamer"){ ?>
      <li><a class = "mainlinks" href="http://spanky.rutgers.edu/MMOCrowdEvacGame/usergames.php?uid=<?php echo $_GET['uid'] ?>"><span class="mainlinks1">Games</span></a></li>
<?php }
else{ ?>
      <li><a class = "mainlinks" href="http://spanky.rutgers.edu/MMOCrowdEvacGame/startedgames.php?uid=<?php echo $_GET['uid'] ?>"><span class="mainlinks1">Started Games</span></a></li>
<?php
}
?>
      <li><a class = "mainlinks" href="http://spanky.rutgers.edu/MMOCrowdEvacGame/following.php?uid=<?php echo $_GET["uid"]?>"><span class="mainlinks1">Following</span></a></li>
    </ul>
<?php if($_GET['type']==="gamer"){ 
?> <?php
if($_SESSION["follow_status"]==="y")
{
?>
    <a href="http://spanky.rutgers.edu/MMOCrowdEvacGame/unfollowaction.php?uid= <?php echo $_GET['uid']?>" class="follow">
      Followed
    </a>

<?php }
else
{
?>
    <a href="http://spanky.rutgers.edu/MMOCrowdEvacGame/followaction.php?uid= <?php echo $_GET['uid']?>" class="follow">
      Follow <?php echo $_GET["fname"] ?>
    </a>

<?php
}}
?>
  </div>
<input type="hidden" id="text" value="<?php echo $_GET["fname"] ?>"/>
  <h1><?php echo $_GET["fname"] . " " . $_GET["lname"] ?> <small><?php echo $_GET["nick"] ?></small></h1>
</header>
<div class="center-div" id="games">
<?php 
if(count($_SESSION["usergamelist"])!=0){
foreach ($_SESSION["usergamelist"] as $value)
{?>
<div class="center-div" id="update"><?php echo $value ?>
</div>
<?php
}}
else
{?>
<div class="center-div" id="update"><span style="color:#000000;">No Game Played</span>
</div>
<?php
}
?>
</div>
<div class="center-div" id="liveupdate">
<?php 
if(count($_SESSION["userupdate"])!=0){
foreach ($_SESSION["userupdate"] as $value)
{?>
<div class="center-div" id="update"><?php echo $value ?>
</div>
<?php
}}
else
{?>
<div class="center-div" id="update"><span style="color:#000000;">No Updates Available</span>
</div>
<?php
}
?>
</div>

<div class="center-div" id="started">
<?php 
if(count($_SESSION["gamelist"])!=0){
foreach ($_SESSION["gamelist"] as $value)
{?>
<div class="center-div" id="update"><?php echo $value ?>
</div>
<?php
}}
else
{?>
<div class="center-div" id="update"><span style="color:#000000;">No Game Created</span>
</div>
<?php
}
?>
</div>

<div class="center-div" id="following">
<?php 
if(count($_SESSION["followinglist"])!=0){
foreach ($_SESSION["followinglist"] as $value)
{?>
<div class="center-div" id="update"><?php echo $value ?>
</div>
<?php
}}
else
{?>
<div class="center-div" id="update"><span style="color:#000000;">Following No One</span>
</div>
<?php
}
?>
</div>


    <script src="js/index.js"></script>
<script>
activatedivhome("<?php echo $_SESSION['tab'] ?>");
</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
