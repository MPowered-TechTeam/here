<?php

?>
<link rel="stylesheet" type="text/css" href="style.css" />
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<body class="slider_background">
<h2>
	Catalog
</h2>

<table class="table">
<?php

	$conn = connect_to_db_with_sqli();

	$query = "SELECT * FROM `monsters` WHERE 1 ORDER BY `votes` DESC";
	
	$stmt = $conn->prepare($query);
	$stmt->execute();
	$stmt->bind_result(
		$id,
		$name,
		$type,
		$body,
		$feature,
		$skill,
		$votes
		);

	echo "<tr><td>Name</td><td>Type</td><td>Body</td><td>Feature</td><td>Skill</td><td>Votes</td><td></td><td>";

	while ($stmt->fetch()) {

		echo "<tr><td>$name</td><td>$type</td><td>$body</td><td>$feature</td><td>$skill</td><td>$votes</td><td><button class='btn'><i class='icon-arrow-up'></i></button></td><td>";
	}

function connect_to_db_with_sqli() {
	####################################
	# Database connection information   #
	#####################################

	$hostname = "localhost";
	$database = "csescholars";
	$username = "cseschol";
	$password = "JAwNuTrJ";

	$conn = new mysqli($hostname, $username, $password, $database) or die("<p> Error connecting to database. </p>");

	return $conn;
}


?>
</table>

<script src="bootstrap/js/bootstrap.min.js"></script>
</body>