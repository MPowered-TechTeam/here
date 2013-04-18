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