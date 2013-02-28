<?php

?>
<head>
	<title>Submit Page</title>
	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="stylesheet" type="text/css" href="pageslide/jquery.pageslide.css" />
</head>
<body>
	<form class="login_form">
	Name:
	<br />
	<input id="name" class="input-taller" type="text" placeholder="Name" name="name" required>
	<br />
	Uniqname:
	<br />
	<input id="uniqname" class="input-taller" type="text" placeholder="Uniqname" name="login">
	<br />
	<button type="submit" class="btn btn-primary">Sign In</button>
	<button class="btn cancel">Cancel</button>
	<br />
	<br />
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