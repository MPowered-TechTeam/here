<?php

?>
<!DOCTYPE html>
<html>
	<head>
		<title>MPowered SQL Inject</title>
		<!-- Bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	  	<link rel="stylesheet" type="text/css" href="style.css" />
	  	<link rel="stylesheet" type="text/css" href="pageslide/jquery.pageslide.css" />
	</head>
<body class="everything">
	<div class="container">
		<br />
		<br />
		<br />
		<br />
		<h1 class="title">MPowered SQL Injection Challenge</h1>

	    <div class="row-fluid">
		    <div class="span6 offset3">
			<p>
				What better way to learn some database coding than breaking the stuff someone else made?  To log into this website you need to understand the idea of a mysql query.
				Exploit the login process and your name will be added to the kudos board.  Good luck!
		    </div>
	    </div>
	    <br />
		<div class="row-fluid">
		    <div class="span2 offset3">
				<a class="btn btn-primary btn-large open_login">Login</a>
		    </div>
		    <div class="span2 offset2">
				<a class="btn btn-primary btn-large catalog">Kudos</a>
		    </div>
	    </div>
	</div>

<div id="add_form" class="slider_background">
<h2>
	Login
</h2>
<form class="login_form">
	Name:
	<br />
	<input class="input-taller" type="text" placeholder="name for kudos table" name="name" required>
	<br />
	Login:
	<br />
	<input class="input-taller" type="text" name="login">
	<br />
	Password:
	<br />
	<input class="input-taller" type="password" placeholder="no it is not password" name="password">
	<br />
	<button type="submit" class="btn btn-primary">Submit</button>
	<button class="btn cancel">Cancel</button>
	<br />
	<br />
	<div class="result_text"></div>
</form>
<script src="bootstrap/js/bootstrap.min.js"></script>
</div>

	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="pageslide/jquery.pageslide.min.js"></script>
    <script>

    	$(function() {
	        /* Default pageslide, moves to the right */
	        $(".open_login").pageslide({ direction: "right", modal: true, href: '#add_form' });
	        
	        /* Slide to the left, and make it model (you'll have to call $.pageslide.close() to close) */
	        $(".catalog").pageslide({ direction: "left", modal: true, href: 'catalog.php' });

	        //$("form.select").attr("selectedIndex",-1);
	        $(".cancel").click(function() {
	        	$.pageslide.close();
	        });

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
</body>
</html>
