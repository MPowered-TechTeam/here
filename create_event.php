<?php

?>
<!DOCTYPE html>
<html>
	<head>
		<title>MPowered SQL Inject</title>
		<!-- Bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	  	<!--<link rel="stylesheet" type="text/css" href="style.css" />-->
	  	<link rel="stylesheet" type="text/css" href="pageslide/jquery.pageslide.css" />
	</head>
<body class="everything">

<div id="add_form" >
<h2>
	Create Event
</h2>
<form class="login_form">
	Name of Event:
	<br />
	<input class="input-taller" type="text" placeholder="name for kudos table" name="name" required>
	<br />
	Creator:
	<br />
	<input class="input-taller" type="text" name="creator">
	<br />
	Latitude:
	<br />
	<input class="input-taller" type="text" placeholder="Latitude" name="lat">
	<br />
	Longitude:
	<br />
	<input class="input-taller" type="text" placeholder="Longitude" name="long">
	<br />
	<button type="submit" class="btn btn-primary">Submit</button>
	<button class="btn cancel">Cancel</button>
	<br />
	<br />
	<div class="result_text"></div>
</form>
</div>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
