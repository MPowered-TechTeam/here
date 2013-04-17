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



}

function owns_event($event_id, $uniqname) {



	return true;
} 

?>