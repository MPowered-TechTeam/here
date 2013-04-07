<?php
	if (isset($_COOKIE['uniqname'])) {
		header('Location: nav.php' ) ;	
	}

?>
<!DOCTYPE html>
<head>
	<title>Submit Page</title>
	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" type="text/css" href="style.css" />

	<script src="index_cookie.js"></script>

</head>
<body>
	<h1>Radius</h1>
	<form class="login_form" action="nav.php">
		<br />
		<input id="uniqname" name="uniqname"class="input-taller" type="text" placeholder="Uniqname" name="login"><br />
		<button type="submit" class="btn btn-inverse">Sign In</button>
		<!--<button class="btn cancel">Cancel</button>-->
		<div class="result_text"></div>
	</form>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script>

   $(function() {
	    $(".login_form").submit(function() {    	
	    	setCookie("uniqname", document.getElementById("uniqname").value, 365);

	    	return true;
        });
    });
</script>
</body>

