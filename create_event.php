<?php

include("include/functions.php");
check_login();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Create Event</title>
		<!-- Bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	  	<!--<link rel="stylesheet" type="text/css" href="style.css" />-->
	  	<link rel="stylesheet" type="text/css" href="pageslide/jquery.pageslide.css" />
	  	<link rel="stylesheet" type="text/css" href="nav_style.css" />
	</head>
<body class="everything">

<div id="add_form" >

	<h1>Create Event</h1>
	<form class="create_event_form">
		<br />
		<input type="hidden" id="lat" name="lat" value="0"></input>
		<input type="hidden" id="long" name="long" value="0"></input>
		<input class="input-taller" type="text" placeholder="Event name" name="name" required><br/>
		<button type="submit" class="btn btn-inverse" >Submit</button>
		<button class="btn cancel">Cancel</button>
	</form>
	<br />
	<br />
	<div class="result_text"></div>

</div>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script>
    $(function() {

	    $(".login_form").submit(function() {
	    	getLocation();
        	return false;
        });
    });

    function getLocation()
	{
	  	if (navigator.geolocation)
	    {
	    	navigator.geolocation.getCurrentPosition(setPosition);
	    }
	  	else
	  	{
	  		$('.result_text').html("Geolocation is not supported by this browser.");
		}
	}
	function setPosition(position)
	  { 
			document.getElementById("lat").value = position.coords.latitude;
			document.getElementById("long").value = position.coords.longitude;
			$.ajax({
        		type: "POST",
		        url: "ajax/create_event_database.php",
		        data: $('.login_form').serialize(),
		        success: function(text) {

		        	window.location = "nav.php";
		        	//$('.result_text').html(text);
		        }
        	});
	  }
</script>
</body>
</html>
