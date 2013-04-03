<?php

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Create Event</title>
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
	<input class="input-taller" type="text" placeholder="Event name" name="name" required>
	<button type="submit" class="btn btn-primary" >Submit</button>
	<button class="btn cancel">Cancel</button>
	<input type="hidden" id="lat" name="lat" value="0"></input>
	<input type="hidden" id="long" name="long" value="0"></input>
	<br />
	<br />
	<div class="result_text"></div>
</form>

</div>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script>
    $(function() {
	    $(".login_form").submit(function() {
	    		getLocation();
        	$.ajax({
        		type: "POST",
		        url: "ajax/create_event_database.php",
		        data: $('.login_form').serialize(),
		        success: function(text) {

		        	$('.result_text').html(text);
		        }
        	});
        	return false;
        });
    });

    function getLocation()
	{
	  	if (navigator.geolocation)
	    {
	    	navigator.geolocation.getCurrentPosition(showPosition);
	    }
	  	else
	  	{
	  		$('.result_text').html("Geolocation is not supported by this browser.");
		}
	}
	function showPosition(position)
	  { 
			document.getElementById("lat").value = position.coords.latitude;
			document.getElementById("long").value = position.coords.longitude;
	  }
</script>
</body>
</html>
