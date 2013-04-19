<?php

include("../include/mysql_connect.php");
include("../include/functions.php");

if (isset($_REQUEST['event_id']) && isset($_REQUEST['uniqname'])) {

	$uniqname = $_REQUEST['uniqname'];
	$event_id = $_REQUEST['event_id'];
}
else {
	die("ERROR: please pass in event_id and uniqname");
}

echo sign_in_unqiname($uniqname, $event_id);

?>