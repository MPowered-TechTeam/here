<?php

include("../include/mysql_connect.php");
include("../include/functions.php");

if (isset($_REQUEST['event_id'])) {

	$event_id = $_REQUEST['event_id'];
}
else {
	die("ERROR: please pass in event_id");
}

get_attendies($event_id);
echo "success";

?>