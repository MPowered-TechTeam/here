<?php

function get_event_name($event_id) {
	
	$conn = connect_to_db_with_sqli();

	$query = "SELECT name FROM `event` WHERE id=?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param('d', 
		$event_id
		);
	$stmt->bind_result(
		$event_name
		);
	$stmt->execute();
	if (!$stmt->fetch()) {

		die("ERROR: Invalid event_id");
	}
	$stmt->close();

	return $event_name;
}

function get_attendies($event_id) {

	$conn = connect_to_db_with_sqli();

	$query = "SELECT uniqname FROM `attend` WHERE event_id=? ORDER BY uniqname";
	$stmt = $conn->prepare($query);
	$stmt->bind_param('d', 
		$event_id
		);
	$stmt->bind_result(
		$uniqname
		);
	$stmt->execute();

	//$query = "SELECT uniqname, event_id FROM attended WHERE event_id=?";
	while($stmt->fetch()) 
	{ 
	 	echo "<tr><td>$uniqname</td></tr>";
	} 
	$stmt->close();
}

function sign_in_uniqname($uniqname_passed, $event_id) {

	$conn = connect_to_db_with_sqli();

	// check the table to make sure they haven't signed in already
	$check = "SELECT * FROM attend WHERE event_id=? AND uniqname=?";
	$stmt = $conn->prepare($check);
	$stmt->bind_param('is',
		$event_id, 
		$uniqname_passed
		);
	$stmt->execute();
	$stmt->store_result();

	if($stmt->num_rows == 0)
	{
		// then sign them in
		$query = "INSERT INTO `attend`(`event_id`, `uniqname`) VALUES (?, ?)";
		$stmt = $conn->prepare($query);
		$stmt->bind_param('ds', 
			$event_id,
			$uniqname_passed
			);
		$stmt->execute();
		$message = $uniqname_passed . " signed-in.";
	}
	else 
	{
		$message = $uniqname_passed . " already signed-in.";
	}

	return $message;
}

function remove_event($event_id) {

	$conn = connect_to_db_with_sqli();

	$query = "UPDATE `event` SET `active`=0 WHERE id=?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param('d', 
		$event_id
		);
	$stmt->execute();
	$stmt->close();
}

function check_login() {

	//Check if cookie isn't set
	if(!isset($_COOKIE['uniqname']))
		header( 'Location: index.php');
}

function owns_event($event_id, $uniqname) {

	$conn = connect_to_db_with_sqli();

	$query = "SELECT * FROM `event` WHERE id=?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param('d', 
		$event_id
		);
	$stmt->execute();
	$stmt->store_result();
	$num_row = $stmt->num_rows();
	$stmt->close();

	if ($num_row == 0) {

		return false;
	}
	return true;
} 

?>