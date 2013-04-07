<!DOCTYPE html>

<?php
if(!isset($_COOKIE['uniqname']))
	header( 'Location: index.php');
?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="nav_style.css" rel="stylesheet" media="screen">


<html>
	<div class="navbar navbar-inverse">
	  <div class="navbar-inner">
	    <a class="brand" href="#"><span id="uniqtext"><?php echo $_COOKIE["uniqname"]?><span></a>
	    <ul class="nav pull-right">
	      <li class="icon"><a href="#"><img class="logout" src="logout.png"></a></li>
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



