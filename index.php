<?php
	if (isset($_COOKIE['uniqname'])) {
		header('Location: nav.php' );	
	}

?>
<!DOCTYPE html>
<head>
	<title>Radius</title>
	<!-- Bootstrap -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" type="text/css" href="style.css" />
	<style type="text/css">

    /* Landscape phone to portrait tablet */
    @media (max-width: 767px) { 

    }
     
    /* Landscape phones and down */
    @media (max-width: 480px) { 

    }
	</style>
	<script src="index_cookie.js"></script>

</head>
<body>
	<h1>Radius</h1>
	<form class="login_form" action="nav.php">
		<br />
		<input class="uniqname input-taller" id="uniqname" name="uniqname" type="text" placeholder="Uniqname" name="login"><br />
		<button type="submit" class="btn btn-inverse">Sign In</button>
		<!--<button class="btn cancel">Cancel</button>-->
		<div class="result_text"></div>
	</form>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script>

   $(function() {
	    $(".login_form").submit(function() {  

	    	var uniqname_input = document.getElementById("uniqname").value.toLowerCase();

	    	if (uniqname_input == '') {
	    	
	    		return false;
	    	}

	    	if (uniqname_input.match(/[a-z]/) != uniqname_input) {

	    		var text = "uniqname should only contain letters"
	    		$(".uniqname").popover('destroy');
				$(".uniqname").popover({
					content: "<div style='text-align: center;'>" + text + "</div>",
					trigger: "manual"
				});
				$(".uniqname").popover('show');
	    		return false;
	    	}

	    	setCookie("uniqname", document.getElementById("uniqname").value, 365);
	    	return true;
        });
    });
</script>
</body>

