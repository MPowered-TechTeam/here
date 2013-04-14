<?php
include("../include/mysql_connect.php");

?>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<!--<link rel="stylesheet" type="text/css" href="style.css" />-->
<body class="slider_background">

<table class="table">
<?php

	$conn = connect_to_db_with_sqli();

	$my_long = $_REQUEST['my_long'];
	$my_lat = $_REQUEST['my_lat'];

	//Query modified from http://stackoverflow.com/questions/2441757/optimising-sql-distance-query
	$query = "
SELECT `id`, `name`, `creator`, 
(
  (6371 
     * acos(
        cos(radians(?))
        * cos(radians(`lat`))
        * cos(radians(`long`) - radians(?))
        + sin(radians(?))
        * sin(radians(`lat`))
      )
  )
)
AS distance
FROM `event`
HAVING `distance` < 0.06
ORDER BY `distance`";
	

	$stmt = $conn->prepare($query);
	$stmt->bind_param('ddd',
		$my_lat,
		$my_long,
		$my_lat
		);
	$stmt->execute();
	$stmt->bind_result(
		$id,
		$name,
		$creator,
		$distance
		);

	echo "<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Creator</td>
			<td>Distance</td>
		</tr>";

	while ($stmt->fetch()) {

		echo "<tr class='event_item'>
				<td class='event_id'>$id</td>		
				<td>$name</td>	
				<td>$creator</td>
				<td>$distance</td>
			</tr>
			";
	}

?>
</table>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>