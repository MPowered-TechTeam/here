<!DOCTYPE html>

<?php
if(!isset($_COOKIE['uniqname']))
	header( 'Location: index.php');
?>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<style type="text/css">
.navbar
.brand
{
	margin-top: 10px; 
	text-align: center;
	width: 66%;
}
#uniqtext
{
	font-size: 50px;
	vertical-align: middle;
}
.logout
{
	margin-right: 10px;
	margin-left: 10px;
	height: 50px;
	width: 50px;
}

.plus1
{
	margin-left: 10px;
	margin-right: 10px;
	height: 53px;
	width: 53px;
}

</style>


<html>
	<div class="navbar">
	  <div class="navbar-inner">
	    <a class="brand" href="#"><span id="uniqtext"><?php echo $_COOKIE["uniqname"]?><span></a>
	    <ul class="nav">
	      <li class="icon"><a href="#"><img class="logout" src="logout.png"></a></li>
	      <li class="icon"><a href="#"><img class="plus1" src="plus1.png"></a></li>
	    </ul>
	  </div>
	</div>
<html>



