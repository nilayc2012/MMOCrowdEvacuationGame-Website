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
<link rel="stylesheet" href="css/bootstrap-dialog.min.css">
<link rel="stylesheet" href="css/bootstrap-dialog.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
  </style>

<script type="text/javascript">
$( document ).ready(function() {
    	document.getElementById("srch-term4").value=2;
	document.getElementById("srch-term4").disabled=true;
	document.getElementById("srch-term5").value=2;
	document.getElementById("srch-term5").disabled=true;
});
function changeMinMaxVav()
{
    var e = document.getElementsByName("ctype")[0];
    var ctype = e.options[e.selectedIndex].value; 

    if(ctype==1)
    {
	document.getElementById("srch-term4").placeholder = "Minimum Number of Players";
	document.getElementById("srch-term5").placeholder = "Maximum Number of Players";
	document.getElementById("srch-term4").value=2;
	document.getElementById("srch-term4").disabled=true;
	document.getElementById("srch-term5").value=2;
	document.getElementById("srch-term5").disabled=true;
    }
    else if(ctype==2)
    {
	document.getElementById("srch-term4").placeholder = "Minimum Number of Players Per Team";
	document.getElementById("srch-term4").disabled=false;
	document.getElementById("srch-term5").placeholder = "Maximum Number of Players Per Team";
	document.getElementById("srch-term5").disabled=false;
	document.getElementById("srch-term4").value="";
	document.getElementById("srch-term5").value="";
    }
    else if(ctype==3 || ctype==5)
    {
	document.getElementById("srch-term4").placeholder = "Minimum Number of Players";
	document.getElementById("srch-term5").placeholder = "Maximum Number of Players";
	document.getElementById("srch-term4").disabled=false;
	document.getElementById("srch-term5").disabled=false;
	document.getElementById("srch-term4").value="";
	document.getElementById("srch-term5").value="";
    }
    else if(ctype==4)
    {
	document.getElementById("srch-term4").placeholder = "Minimum Number of Players";
	document.getElementById("srch-term5").placeholder = "Maximum Number of Players";
	document.getElementById("srch-term4").value=1;
	document.getElementById("srch-term4").disabled=true;
	document.getElementById("srch-term5").value=1;
	document.getElementById("srch-term5").disabled=true;
    }

}
</script>

  </head>
 
<body>

  <h1><a style="text-decoration:none; color: #000000" href='http://spanky.rutgers.edu/MMOCrowdEvacGame/'>MMOArcade</a> <small>The World of Gamers</small>
<div class="container">
<div class="col-md-3" id="searchdiv">
  <form class="navbar-form" role="search" action="http://spanky.rutgers.edu/MMOCrowdEvacGame/search.php" method="get">
    <div class="input-group add-on">
      <input class="form-control" placeholder="Gamer Search" name="srch-term" id="srch-term" type="text">
      <div class="input-group-btn">
        <button class="btn btn-default" id="buttonstyle1" type="submit"><i class="glyphicon glyphicon-search"></i></button>
      </div>
    </div>
  </form>
</div>
</div>
</h1>
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
      <li><a class = "mainlinks" href="http://spanky.rutgers.edu/MMOCrowdEvacGame/updates.php"><span class="mainlinks1">Live Updates</span></a></li>
<?php if($_SESSION['type']==="gamer"){ ?>
      <li><a class = "mainlinks" href="http://spanky.rutgers.edu/MMOCrowdEvacGame/usergames.php?uid=<?php echo $_SESSION["userid"]?>" ><span class="mainlinks1">Games</span></a></li>
      <li><a class = "mainlinks" href="http://spanky.rutgers.edu/MMOCrowdEvacGame/livegames.php" ><span class="mainlinks1">Live Games</span></a></li>
<?php }
else{ ?>
      <li><a class = "mainlinks" href="http://spanky.rutgers.edu/MMOCrowdEvacGame/createdgame.php?uid=<?php echo $_SESSION["userid"]?>"><span class="mainlinks1">Create Game</span></a></li>
      <li><a class = "mainlinks" href="http://spanky.rutgers.edu/MMOCrowdEvacGame/startedgames.php?uid=<?php echo $_SESSION["userid"]?>" ><span class="mainlinks1">Started Games</span></a></li>
<?php
}
?>
      <li><a class = "mainlinks" href="http://spanky.rutgers.edu/MMOCrowdEvacGame/following.php?uid=<?php echo $_SESSION["userid"]?>"><span class="mainlinks1">Following</span></a></li>
    </ul>
  </div>
<input type="hidden" id="text" value="<?php echo $_SESSION["first"] ?>"/>
  <h1><?php echo $_SESSION["fname"] ?> <small><?php echo $_SESSION["nick"] ?></small></h1>
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
if(count($_SESSION["update"])!=0){
foreach ($_SESSION["update"] as $value)
{?>
<div class="center-div" id="update"><?php echo $value ?>
</div>
<?php
}}
else
{?>
<div class="center-div" id="update"><span style="color:#000000;">No Updates Found</span>
</div>
<?php
}
?>
</div>
<div class="center-div" id="livegames">
<?php 
if(count($_SESSION["livegameslist"])!=0){
foreach ($_SESSION["livegameslist"] as $value)
{?>
<div class="center-div" id="update"><?php echo $value ?>
</div>
<?php
}}
else
{?>
<div class="center-div" id="update"><span style="color:#000000;">No Updates Found</span>
</div>
<?php
}
?>
</div>

<div class="center-div" id="create">
<div class="center-div" id="update1">
<div class="container">
<div class="col-md-3" id="searchdiv">
  <form class="navbar-form" role="search" action="http://spanky.rutgers.edu/MMOCrowdEvacGame/create_game.php" method="post">
    <div class="input-group add-on">
      <input class="form-control" placeholder="Enter Game Name" name="game-name" id="srch-term2" type="text" required />
	<textarea class="form-control" placeholder="Enter Game Description" name="game-desc" id="srch-term1" type="text"></textarea>

<div class="textstyle">Choose The Game Environment</div>

  <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false" style="width:500px; height:350px; position:relative; top:150px; left:-370px;">
<br/><br/><br/><br/> <br/><br/>  
<div class="carousel-inner" role="listbox" style="position:relative; top:-75px;">
      <div class="item active">
        <img src="img/env/1.jpg" alt="Chania" >
      </div>

      <div class="item">
        <img src="img/env/2.jpg" alt="Chania">
      </div>
    
      <div class="item">
        <img src="img/env/3.jpg" alt="Flower">
      </div>

      <div class="item">
        <img src="img/env/4.jpg" alt="Flower">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
<input type="hidden" name="env-ch" id="env-ch" value="1"/>
<div class="textstyle1">Choose The Game Rule</div>
<select name="rule" id="srch-term3">
<?php 
if(count($_SESSION["gamerulelist"])!=0){
$count=1;
foreach ($_SESSION["gamerulelist"] as $value)
{?>
  <option class="optionclass" value="<?php echo $count ?>"><?php echo $value ?> </option>
<?php
$count=$count+1;
}}?>
</select>
<br/><br/><br/><br/>
<div class="textstyle1">Game Over Strategy</div>
<select name="gameover" id="srch-term3">
<?php echo count($_SESSION["gameoverlist"]) ?>
<?php 
if(count($_SESSION["gameoverlist"])!=0){
$count=1;
foreach ($_SESSION["gameoverlist"] as $value)
{?>
  <option class="optionclass" value="<?php echo $count ?>"><?php echo $value ?> </option>
<?php
$count=$count+1;
}}?>
</select>
<br/><br/><br/><br/>
<div class="textstyle1">Difficulty</div>
<select name="diff" id="srch-term3">
<?php 
if(count($_SESSION["difflist"])!=0){
$count=1;
foreach ($_SESSION["difflist"] as $value)
{?>
  <option class="optionclass" value="<?php echo $count ?>"><?php echo $value ?> </option>
<?php
$count=$count+1;
}}?>
</select>
<br/><br/><br/><br/>
<div class="textstyle1">Competition Type</div>
<select name="ctype" id="srch-term3" onchange="changeMinMaxVav();">
<?php 
if(count($_SESSION["ctypelist"])!=0){
$count=1;
foreach ($_SESSION["ctypelist"] as $value)
{?>
  <option class="optionclass" value="<?php echo $count ?>"><?php echo $value ?> </option>
<?php
$count=$count+1;
}}?>
</select>
<br/><br/><br/><br/><br/><br/>
<div class="textstyle1">Report Details</div>
<ul id="checkpos">
<li><input type="checkbox" name="pstartpos" value="y"/>Player Start Position </li>
<li><input type="checkbox" name="pendpos" value="y"/>Player End Position </li>
<li><input type="checkbox" name="score" value="y"/>Score </li>
<li><input type="checkbox" name="scoretype" value="y"/>Score Type</li>
<li><input type="checkbox" name="pathpoints" value="y">Path Points </li>
<li><input type="checkbox" name="goaltype" value="y"/>Goal Type</li>
<li><input type="checkbox" name="goalpos" value="y"/>Goal Positions</li>
</ul>
</select>
      <input class="form-control" placeholder="Minimum Number of Players" name="minp" id="srch-term4" type="number" min=1 required />
      <input class="form-control" placeholder="Maximum Number of Players" name="maxp" id="srch-term5" type="number" min=1 required />


<button class="btn btn-default" id="buttonstyle2" type="submit" >Create Game</button>

    </div>
  </form>
</div>

</div>
</div>
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
<script src="js/dropdownJS.js"></script>
<script src="js/bootstrap-dialog.min.js"></script>
<script src="js/bootstrap-dialog.js"></script>
<script>
activatediv("<?php echo $_SESSION['tab'] ?>");
</script>

<?php 
if( $_SESSION["game-response"]==="created")
{
$_SESSION["game-response"]="";
?>
<script>
BootstrapDialog.alert('Game Created');
</script>
<?php
}
else if( $_SESSION["game-response"]==="failed")
{
$_SESSION["game-response"]="";
?>
<script>
BootstrapDialog.alert('Gamename Exits');
</script>
<?php
}
?>

</body>
</html>
