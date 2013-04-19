<?php

include("../include/mysql_connect.php");
include("../include/functions.php");

if (isset($_REQUEST['event_id']) && isset($_REQUEST['uniqname_passed'])) {

	$uniqname_passed = $_REQUEST['uniqname_passed'];
	$event_id = $_REQUEST['event_id'];
}
else {
	die("ERROR: please pass in event_id and uniqname_passed");
}

echo sign_in_uniqname($uniqname_passed, $event_id);

?>