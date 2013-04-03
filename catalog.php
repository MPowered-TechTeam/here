<?php

?>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<!--<link rel="stylesheet" type="text/css" href="style.css" />-->
<body class="slider_background">

<table class="table">
<?php

	$conn = connect_to_db_with_sqli();

	$query = "SELECT * FROM event WHERE 1";
	
//SELECT DeviceType, ClientName, UniqueIdentifier, ( 3959 * acos( cos( radians('%s') ) * cos( radians( Latitude ) ) * cos( radians( Longitude ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( Latitude ) ) ) ) AS distance FROM Users Where Connected = 1 and UniqueIdentifier != '$uniqueIdentifer' HAVING distance < '%s' ORDER BY distance LIMIT 0 , 20

	$stmt = $conn->prepare($query);
	$stmt->execute();
	$stmt->bind_result(
		$id,
		$name,
		$creator,
		$long,
		$lat
		);

	echo "<tr><td>Name</td><td>Type</td><td></td><td>";

	while ($stmt->fetch()) {

		echo "<tr class='event_item'>
				<td>$name</td>	
				<td>$creator</td>
				<td>$long</td>
				<td>$lat</td>		
			</tr>
			";
	}

function connect_to_db_with_sqli() {
	####################################
	# Database connection information   #
	#####################################

	$hostname = "localhost";
	$database = "mpowered";
	$username = "root";
	$password = "";

	$conn = new mysqli($hostname, $username, $password, $database) or die("<p> Error connecting to database. </p>");

	return $conn;
}


?>
</table>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>