<?php

?>
<!DOCTYPE html>
<head>
	<title>Submit Page</title>
	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<h1>Radius</h1>
	<form class="login_form">
		<br />
		<input id="uniqname" class="input-taller" type="text" placeholder="Uniqname" name="login"><br />
		<button type="submit" class="btn btn-inverse">Sign In</button>
		<!--<button class="btn cancel">Cancel</button>-->
		<div class="result_text"></div>
	</form>
</body>

<script>

    $(function() {
	    $(".login_form").submit(function() {

        	$.ajax({
        		type: "POST",
		        url: "ajax/open_login.php",
		        data: $('.login_form').serialize(),
		        success: function(text) {
		        	$('.result_text').html(text);
		        }
        	});
        	return false;
        });
    });
</script>