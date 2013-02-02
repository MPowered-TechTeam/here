<?php

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Mobilemon</title>
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
		<h1 class="title">Mobilemon</h1>

	    <div class="row-fluid">
		    <div class="span6 offset3">
			<p>
				Pitch 17 out of Startup Weekend Ann Arbor.  Make up a creature and the best will make it into our mobile game!  Get uber creative and add attacks names.
			</p>
		    </div>
	    </div>
	    <br />
		<div class="row-fluid">
		    <div class="span2 offset3">
				<a class="btn btn-primary btn-large add_creature">Create</a>
		    </div>
		    <div class="span2 offset2">
				<a class="btn btn-primary btn-large catalog">Catalog</a>
		    </div>
	    </div>
	</div>

<div id="add_form" class="slider_background">
<h2>
	Creature Creator
</h2>
<form class="add_creature_form">
	Name:
	<br />
	<input class="input-taller" type="text" name="name" required>
	<br />
	Type:
	<br />
	<select name="type" >
		<option value="Dark">Dark</option>
		<option value="Earth">Earth</option>
		<option value="Energy">Energy</option>
		<option value="Flame">Flame</option>
		<option value="Light">Light</option>
		<option value="Vegetation">Vegetation</option>
		<option value="Water">Water</option>
		<option value="Wind">Wind</option>
	</select>
	<br />
	Body Style:
	<br />
	<select name="body">
		<option value="Head">Head</option>
		<option value="Head_and_body">Head and body</option>
		<option value="Slime">Slime</option>
		<option value="Snake">Snake</option>
		<option value="Multibody">Multibody</option>
		<option value="2_Legs">2 Legs</option>
		<option value="4_Legs">4 Legs</option>
	</select>
	<br />
	Feature:
	<br />
	<input class="input-taller" type="text" placeholder="exp: nose, tails, or fins." name="feature">
	<br />
	Skill:
	<br />
	<select name="skill">
		<option value="Fast">Fast</option>
		<option value="Powerful">Powerful</option>
		<option value="Protective">Protective</option>
		<option value="Stocky">Stocky</option>
	</select>
	<br />
	<button type="submit" class="btn btn-primary">Submit</button>
	<button class="btn cancel">Cancel</button>
</form>
<script src="bootstrap/js/bootstrap.min.js"></script>
</div>

	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="pageslide/jquery.pageslide.min.js"></script>
    <script>

    	$(function() {
	        /* Default pageslide, moves to the right */
	        $(".add_creature").pageslide({ direction: "right", modal: true, href: '#add_form' });
	        
	        /* Slide to the left, and make it model (you'll have to call $.pageslide.close() to close) */
	        $(".catalog").pageslide({ direction: "left", modal: true, href: 'catalog.php' });

	        //$("form.select").attr("selectedIndex",-1);
	        $(".cancel").click(function() {
	        	$.pageslide.close();
	        });

	        $(".add_creature_form").submit(function() {

	        	$.ajax({
	        		type: "POST",
			        url: "ajax/add_creature.php",
			        data: $('.add_creature_form').serialize(),
			        success: function(text) {
	       	 			$.pageslide.close();
			        }
	        	});
	        	return false;
	        });
	    });
    </script>
</body>
</html>
