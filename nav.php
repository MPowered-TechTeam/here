<!DOCTYPE html>

<?php
if(!isset($_COOKIE['uniqname']))
	header( 'Location: index.php');
?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<style type="text/css">

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
.logout:hover
{
	cursor: pointer;
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
	      <li class="icon"><img class="logout" src="logout.png"></li>
	      <li class="icon"><a href="#"><img class="plus1" src="plus1.png"></a></li>
	    </ul>
	  </div>
	</div>
<html>

<script type="text/javascript">
$(".logout").click(
	function()
	{
		<?php setcookie("uniqname", "",  time()-3600); ?>
		window.location = "index.php";
	}
)
</script>



