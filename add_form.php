<?php

?>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" type="text/css" href="style.css" />
<body class="add_form slider_background">
<h2>
	Creature Creator
</h2>
<form>
	Name:
	<br />
	<input class="input-taller" type="text" name="name">
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
</form>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>