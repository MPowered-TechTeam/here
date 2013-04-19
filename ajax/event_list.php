<?php
include("../include/mysql_connect.php");

?>

<table class="table">
<?php

	$conn = connect_to_db_with_sqli();

	$my_long = $_REQUEST['my_long'];
	$my_lat = $_REQUEST['my_lat'];

	//Query modified from http://stackoverflow.com/questions/2441757/optimising-sql-distance-query
	$query = "
SELECT `id`, `name`, `creator`, 
(
  (6371 * 2000 
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
WHERE active=1 
HAVING `distance` < 200
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
			<td class = 'hidden'>ID</td>
			<th>Name</th>
			<th>Creator</th>
			<th>Distance</th>
		</tr>";

	while ($stmt->fetch()) {

		echo "<tr class='event_item'>
				<td class='event_id hidden'>$id</td>		
				<td>$name</td>	
				<td>$creator</td>
				<td>". round($distance) ." m</td>
			</tr>
			";
	}

?>
</table>
