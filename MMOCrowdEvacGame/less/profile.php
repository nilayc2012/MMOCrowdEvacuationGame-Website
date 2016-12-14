<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>MMO Arcade</title>

  <link rel="stylesheet" href="css/reset.css">

    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
  <script src="js/index.js"></script>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
</head>

<body>

<h1 class="top"><a class="linkclass" href='http://spanky.rutgers.edu/MMOCrowdEvacGame/'><img src="img/topimg.jpg" alt="Profile banner" /> </a><small>The World of Gamers</small></h1>
<header>
  <figure class="profile-banner">
<?php
	if (!file_exists("./user_profiles/". $_SESSION['userid'] . "/coverpage.jpg"))	{
?>
<img src="img/default_cover.jpg"  alt="Profile banner" />
<?php
}
else{
?>
 <div class="cover"> 
<span class="coverspan"><a href="#" id="updatelink" onmouseover="activateLink();" onclick = "activateLink();activateDropDown()">Update Cover</a>
<ul id="updatelist">
<li><a href="">Upload Cover</a></li>
<li><a href="">Reposition</a></li>
<li><a href="">Remove</a></li>
</ul>

</span>
 <img src="user_profiles/<?php echo $_SESSION['userid'] ?>/coverpage.jpg" onmouseover="activateLink();" onmouseout="deactivateLink();" alt="Profile banner"></img>
</div>
<?php
}
?>
  </figure>

<?php
	if (!file_exists("./user_profiles/". $_SESSION['userid'] . "/profile.jpg"))	{
?>
  <figure class="profile-picture" 
    style="background-image: url('img/profile.jpg')">
  </figure>
<?php
}
else{
?>

  <figure class="profile-picture" 
    style="background-image: url('user_profiles/<?php echo $_SESSION['userid'] ?>/profile.jpg' )">
  </figure>
<?php
}
?>
  <div class="profile-stats">
    <ul>
      <li>13    <span>Friends</span></li>
      <li>1,354 <span>Played Games</span></li>
      <li>32    <span>Live Games</span></li>
    </ul>
    <a href="#" class="follow" onclick="alert("hello");">
      Follow <?php echo $_SESSION["first"] ?>
    </a>
  </div>
  <h1><?php echo $_SESSION["fname"] ?> <small><?php echo $_SESSION["nick"] ?></small></h1>
</header>

</body>

</html>